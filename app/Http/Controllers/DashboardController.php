<?php

namespace App\Http\Controllers {

    use App\Http\Requests;
    use App\Models\User;
    use Illuminate\Http;
    use Inertia\Response;

    class DashboardController extends Controller
    {
        public function __invoke(): Response
        {
            return inertia('Dashboard/Index');
        }
    }
}
