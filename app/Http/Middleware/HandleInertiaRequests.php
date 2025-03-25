<?php

namespace App\Http\Middleware {

    use Illuminate\Http\Request;
    use Inertia\Middleware;

    class HandleInertiaRequests extends Middleware
    {
        /**
         * Determine the current asset version.
         */
        public function version(Request $request): ?string
        {
            return parent::version($request);
        }

        /**
         * Define the props that are shared by default.
         *
         * @return array<string, mixed>
         */
        public function share(Request $request): array
        {
            return [
                ...parent::share($request),
                'flash' => [
                    'message' => fn() => $request->session()->get('message'),
                    'type'    => fn() => $request->session()->get('type') ?? 'info',
                ],
                'auth'  => [
                    'user'        => $request->user(),
                    'permissions' => $request->user() ? $request->user()->getPermissionsViaRoles() : [],
                ],
            ];
        }
    }
}
