<?php

namespace App\Http\Controllers {

    use Inertia\Response;

    class AboutController extends Controller
    {
        /**
         * Display the index view.
         */
        public function __invoke(): Response
        {
            // render the inertia view
            return inertia('About');
        }
    }
}
