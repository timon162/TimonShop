<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewProfileAdmin()
    {
        return view('admins.content_admins.content_profiles.profile_admin');
    }
}
