<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::User()->status_login == 0)
        {
            return view('admin.acl.user.password');
        }
        else {
            $count_patient = User::where('role_id', 3)->count();
            return view('admin.admin', compact('count_patient'));
        }
    }

}
