<?php

namespace App\Http\Controllers {

    use App\Http\Requests;
    use Inertia\Response;
    use App\Models\User;
    use Illuminate\Http;

    class UserController extends Controller
    {
        public function index(): Response
        {
            $users = User::withoutTrashed()->paginate(10);
            return inertia('Dashboard/Users/Index', compact('users'));
        }

        public function show(User $user): Response
        {
            $user['roles'] = $user->getRoleNames();
            return inertia('Dashboard/Users/Show', compact('user'));
        }

        public function update(Requests\UpdateUserRequest $request): Http\RedirectResponse
        {
            $request->validated();

            $user = User::find(auth()->user()->id);

            $user->address = $request['address'] ?? $user['address'];
            $user->email = $request['email'] ?? $user['email'];
            $user->phone = $request['phone'] ?? $user['phone'];
            $user->name = $request['name'] ?? $user['name'];

            $user->save();

            $request->session()->flash('message', 'Settings successfully updated.');

            return back();
        }

        public function destroy(User $user): Http\RedirectResponse
        {
            $user->delete();
            return back();
        }

        public function uploadPhoto(Http\Request $request): void
        {
//            dd($request['profile_image']);
            // Validate the file
            $request->validate([
                'profile_image' => 'required|file|mimes:jpg,png',  // Adjust rules as needed
            ]);

            // Check if file is uploaded
            if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
                // Get the file from the request
                $file = $request->file('profile_image');

                // transform the image name to the users UUID
                $ext = $file->getClientOriginalExtension();
                $userID = auth()->user()['id'];
                $newFile = $userID . '.' . $ext;

                // store the file
                $path = $file->storeAs('uploads/users', $newFile, 'public');

                // save the profile image to the database
                $user = User::find($userID);
                $user->profile_image = url('/storage') . "/$path";
                $user->save();

                // return the success message
                $request->session()->flash('message', 'File uploaded successfully');
            }
            // return an error message
            $request->session()->flash('message', 'Something went wrong');
        }
    }
}
