<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class DashboardController extends Controller
{
    public function dashboard()
    {
        if(Auth::user()->user_type==1)
        {
            $data['TotalTeacher'] = User::getTotalUser(1);
            $data['TotalStudent'] = User::getTotalUser(2);
            return view("admin.dashboard", $data);
        }
        else if(Auth::user()->user_type==2)
        {
            return view("student.dashboard");
        }
    }
}
