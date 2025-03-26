<?php

namespace App\Http\Controllers\Auth {

    use App\Http\Controllers\Controller;
    use App\Http\Requests\CreateUserProfile;
    use App\Models\User;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Validation\ValidationException;
    use Inertia\Inertia;
    use Inertia\Response;

    class RegisteredUserController extends Controller
    {
        /**
         * Display the registration view.
         */
        public function index(): Response
        {
            // render the inertia view
            return Inertia::render('Auth/Register');
        }

        /**
         * Handle an incoming registration request.
         *
         * @throws ValidationException
         */
        public function store(CreateUserProfile $request): RedirectResponse
        {
            // validate the request
            $request->validated();

            // create the user
            $user = User::create([
                'name'     => $request['name'],
                'email'    => $request['email'],
                'password' => Hash::make($request['password']),
            ]);

            // assign the default role (member)
            $user->assignRole(env('APP_DEFAULT_ROLE'));

            // log the new user in
            Auth::login($user);

            // redirect to their profile
            return to_route('users.show', $user);
        }
    }
}
