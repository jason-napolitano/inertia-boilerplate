<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;

class AboutController extends Controller
{
    public function __invoke(): Response
    {
        return inertia('About');
    }
}
