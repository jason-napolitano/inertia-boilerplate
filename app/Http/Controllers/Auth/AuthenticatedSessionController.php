<?php

namespace App\Http\Controllers\Auth {

    use App\Http\Requests\Auth\LoginRequest;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Support\Facades\Auth;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Inertia\Response;
    use Inertia\Inertia;

    class AuthenticatedSessionController extends Controller
    {
        /**
         * Display the login view.
         */
        public function index(): Response
        {
            // render the inertia view
            return Inertia::render('Auth/Login', [
                'status' => session('status'),
            ]);
        }

        /**
         * Handle an incoming authentication request.
         */
        public function store(LoginRequest $request): RedirectResponse
        {
            // validate the request
            $request->authenticate();

            // regenerate the session
            $request->session()->regenerate();

            // return the success message
            $request->session()->flash('message', 'You have been logged in to your account.');

            // redirect to the dashboard
            return to_route('dashboard');
        }

        /**
         * Destroy an authenticated session.
         */
        public function destroy(Request $request): RedirectResponse
        {
            // log the user out
            Auth::guard('web')->logout();

            // invalidate the session
            $request->session()->invalidate();

            // regenerate the token
            $request->session()->regenerateToken();

            // return the success message
            $request->session()->flash('message', 'You have been logged out of your account.');

            // redirect to the login page
            return to_route('login.index');
        }
    }
}
