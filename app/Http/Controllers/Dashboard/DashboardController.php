<?php

namespace App\Http\Controllers\Dashboard {

    use App\Http\Controllers\Controller;
    use Illuminate\Support;
    use Inertia\Response;
    use PDO;

    class DashboardController extends Controller
    {
        /**
         * Display the index view.
         */
        public function __invoke(): Response
        {
            // data to send to the frontend
            $driver = uc_first(Support\Facades\DB::connection()->getPdo()->getAttribute(PDO::ATTR_DRIVER_NAME), 3);
            $version = Support\Facades\DB::connection()->getPdo()->getAttribute(PDO::ATTR_CLIENT_VERSION);

            $server = [
                'software' => PHP_VERSION,
                'database' => [
                    'driver'  => $driver,
                    'version' => $version
                ],
            ];

            // render the inertia view
            return inertia('Dashboard/Index', compact('server'));
        }
    }
}
