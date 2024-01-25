<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __invoke()
    {
        auth()->logout();

        return redirect()->route('authentication.index');
    }
}
