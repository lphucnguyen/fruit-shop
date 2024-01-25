<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\LoginRequest;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $credentials = $request->only('user_code', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('invoice.index');
        }

        return redirect()->back()->with('error', 'User code or password is not correct!');
    }
}
