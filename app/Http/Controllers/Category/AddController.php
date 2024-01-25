<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddController extends Controller
{
    public function __invoke()
    {
        return view('pages.category.add');
    }
}
