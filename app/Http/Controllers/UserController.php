<?php

namespace App\Http\Controllers {

    use App\Http\Requests;
    use Inertia\Response;
    use Illuminate\Http;
    use App\Models\User;

    class UserController extends Controller
    {
        /**
         * Display the index view.
         */
        public function index(): Response
        {
            // collect users that are not deleted
            $users = User::withoutTrashed()->paginate(10);

            // render the inertia view
            return inertia('Dashboard/Users/Index', compact('users'));
        }

        /**
         * Display the show view.
         */
        public function show(User $user): Response
        {
            // render the inertia view
            return inertia('Dashboard/Users/Show', compact('user'));
        }

        /**
         * Update a user record.
         */
        public function update(Requests\UpdateUserProfile $request): Http\RedirectResponse
        {
            // validate the request
            $request->validated();

            // locate the user
            $user = User::find(auth()->user()['id']);

            // update the user
            $user->address = $request['address'] ?? $user['address'];
            $user->email = $request['email'] ?? $user['email'];
            $user->phone = $request['phone'] ?? $user['phone'];
            $user->name = $request['name'] ?? $user['name'];
            $user->save();

            // return the success message
            $request->session()->flash('message', 'Settings successfully updated.');

            // redirect back
            return back();
        }

        /**
         * Delete a user record.
         */
        public function destroy(User $user): Http\RedirectResponse
        {
            $user->delete();
            return back();
        }

        /**
         * Upload a user's profile image.
         */
        public function uploadPhoto(Requests\UploadProfilePhoto $request, User $user): void
        {
            // validate the file
            $request->validated();

            // check if a file is uploaded
            if ($request->hasFile('profile_image') && $request->file('profile_image')?->isValid()) {
                // get the file from the request
                $file = $request->file('profile_image');

                // transform the image name to the users UUID
                $ext = $file->getClientOriginalExtension();
                $newFile = $user['id'] . '.' . $ext;

                // store the file
                $path = $file->storeAs('uploads/users', $newFile, 'public');

                // save the profile image to the database
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
