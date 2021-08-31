<?php

namespace App\Http\Controllers;

class SiteProfileController extends Controller
{
    public function index()
    {
        return view('admin.pages.site-profile.index');
    }
}
