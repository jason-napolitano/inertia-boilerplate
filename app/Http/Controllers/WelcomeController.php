<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;

class WelcomeController extends Controller
{
    public function __invoke(): Response
    {
        return inertia('Welcome');
    }
}
