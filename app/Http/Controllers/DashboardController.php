<?php

namespace App\Http\Controllers {

    use Inertia\Response;

    class DashboardController extends Controller
    {
        public function __invoke(): Response
        {
            // render the inertia view
            return inertia('Dashboard/Index');
        }
    }
}
