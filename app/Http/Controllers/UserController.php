<?php

namespace App\Http\Controllers {

    use Illuminate\Support;
    use App\Http\Requests;
    use Inertia\Response;
    use App\Models\User;
    use Illuminate\Http;

    class UserController extends Controller
    {
        /**
         * Display the index view.
         *
         * @return Response
         */
        public function index(): Response
        {
            // collect users that are not deleted
            $users = User::withoutTrashed()->paginate(10);

            // map the users roles to $user
            $users->map(function ($user) {
                $user['roles'] = $user->getRoleNames();
                return $user;
            });

            // render the inertia view
            return inertia('Dashboard/Users/Index', compact('users'));
        }

        /**
         * Display the show view.
         *
         * @param User $user
         *
         * @return Response
         */
        public function show(User $user): Response
        {
            // render the inertia view
            return inertia('Dashboard/Users/Show', compact('user'));
        }

        /**
         * Update a user record.
         *
         * @param Requests\UpdateUserProfile $request
         * @param User              $user
         *
         * @return Http\RedirectResponse
         */
        public function update(Requests\UpdateUserProfile $request, User $user): Http\RedirectResponse
        {
            // validate the request
            $request->validated();

            // update the user
            $user['country'] = $request['country'] ?? $user['country'];
            $user['address'] = $request['address'] ?? $user['address'];
            $user['email'] = $request['email'] ?? $user['email'];
            $user['phone'] = $request['phone'] ?? $user['phone'];
            $user['name'] = $request['name'] ?? $user['name'];
            $user->save();

            // return the success message
            $request->session()->flash('message', 'Settings successfully updated.');

            // redirect back
            return back();
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param Requests\CreateUserProfile $request
         *
         * @return Http\RedirectResponse
         */
        public function store(Requests\CreateUserProfile $request): Http\RedirectResponse
        {
            // validate the request
            $request->validated();

            // create the user
            $user = User::create([
                'name'     => $request['name'],
                'email'    => $request['email'],
                'password' => Support\Facades\Hash::make($request['password']),
            ]);

            // assign the default role (member)
            $user->assignRole(env('APP_DEFAULT_ROLE'));

            $request->session()->flash('message', 'The user was created successfully.');

            // redirect to their profile
            return back();
        }

        /**
         * Soft-delete a user record.
         *
         * @param User $user
         *
         * @return Http\RedirectResponse
         */
        public function destroy(User $user): Http\RedirectResponse
        {
            $user->delete();
            return back();
        }

        /**
         * Upload a user's profile image.
         *
         * @param Requests\UploadProfilePhoto $request
         * @param User               $user
         *
         * @return void
         */
        public function uploadPhoto(Requests\UploadProfilePhoto $request, User $user): void
        {
            // validate the file
            $request->validated();

            // check if a file is uploaded
            if ($request->hasFile('profile_image') && $request->file('profile_image')?->isValid()) {
                // get the file from the request
                $file = $request->file('profile_image');

                // delete the preexisting file
                $oldFile = str_replace(url('/storage'), '', $user['profile_image']);
                Support\Facades\Storage::disk('public')->delete($oldFile);

                // transform the image name to the last 12 characters of a UUID
                $ext = $file->getClientOriginalExtension();
                $newFile = substr(Support\Str::uuid(), -12) . '.' . $ext;

                // store the file
                $path = $file->storeAs('uploads/users', $newFile, 'public');

                // save the information to the database
                $user['profile_image'] = url('/storage') . "/$path";
                $user->save();

                // return the success message
                $request->session()->flash('message', 'File uploaded successfully');
            }
            // return an error message
            $request->session()->flash('message', 'Something went wrong');
        }
    }
}
