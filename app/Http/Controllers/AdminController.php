<?php

namespace App\Http\Controllers;


class AdminController extends Controller
{
    /**
     * Show the admin application dashboard.
     *
     */
    public function index()
    {
        return view('admin.admin');
    }
}
