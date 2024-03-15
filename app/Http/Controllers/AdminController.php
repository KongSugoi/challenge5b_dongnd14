<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
class AdminController extends Controller
{
    public function list()
    {
        
        return view("admin/admin/list");
    }
    public function add()
    {
        
        return view("admin/admin/add");
    }
    public function insert(Request $request)
    {
        $user= new User;
        $user->name = trim ($request->name);
        $user->email = trim ($request->email);
        $user->password = Hash::make($request->password);
        $user->photo = trim(strip_tags($request->photo));
        $user->save();
    }
}
