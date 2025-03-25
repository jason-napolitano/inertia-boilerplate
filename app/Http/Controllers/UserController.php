<?php

namespace App\Http\Controllers {

    use App\Http\Requests;
    use Inertia\Response;
    use Illuminate\Http;
    use App\Models\User;

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
    }
}
