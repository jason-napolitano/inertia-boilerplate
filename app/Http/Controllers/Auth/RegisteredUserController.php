<?php

namespace App\Http\Controllers\Auth {

    use Illuminate\Validation\ValidationException;
    use App\Http\Requests\Auth\RegisterRequest;
    use Illuminate\Auth\Events\Registered;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use App\Http\Controllers\Controller;
    use Inertia\Response;
    use Inertia\Inertia;
    use App\Models\User;

    class RegisteredUserController extends Controller
    {
        /**
         * Display the registration view.
         */
        public function index(): Response
        {
            return Inertia::render('Auth/Register');
        }

        /**
         * Handle an incoming registration request.
         *
         * @throws ValidationException
         */
        public function store(RegisterRequest $request): RedirectResponse
        {
            $request->validated();

            $user = User::create([
                'name'     => $request['name'],
                'email'    => $request['email'],
                'password' => Hash::make($request['password']),
            ]);

            $user->assignRole(env('APP_DEFAULT_ROLE'));

            event(new Registered($user));

            Auth::login($user);

            return to_route('dashboard');
        }
    }
}
