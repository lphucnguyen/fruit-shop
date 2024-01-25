<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;

class AddController extends Controller
{
    public function __invoke()
    {
        return view('pages.invoice.add');
    }
}
