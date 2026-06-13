<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersediaanObatController extends Controller
{
    public function index()
    {
        return view('statuspersediaanobat.index');
    }
}
