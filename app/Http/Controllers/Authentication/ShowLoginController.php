<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowLoginController extends Controller
{
    public function __invoke()
    {
        return view('pages.authentication.login');
    }
}
