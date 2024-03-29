<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Str; 
use Auth;
class AdminController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getAdmin();        
        return view("admin/admin/list",$data);
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
        $user->phone = trim ($request->phone);
        $user->password = Hash::make($request->password);
        $user->user_type = 1;
        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/',$filename);

            $user->profile_pic = $filename;
        }

        $user->save();

        return redirect('admin/admin/list')->with('success',"Teacher successfully created");    
    }

    public function edit($id)
    {
        $data['getRecord']= User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            return view('admin.admin.edit',$data);
        }        
        else 
        {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $user= User::getSingle($id);
        $user->name = trim ($request->name);
        $user->email = trim ($request->email);
        $user->phone = trim ($request->phone);
        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }    
        if(!empty($request->file('profile_pic')))
        {
            if(!empty($user->getProfile()))
            {
                unlink('upload/profile/'.$user->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/',$filename);

            $user->profile_pic = $filename;
        } 
        $user->save();

        return redirect('admin/admin/list')->with('success',"Teacher successfully updated"); 
    }

    public function delete($id)
    {
        $user= User::getSingle($id);
        $user->is_delete=1;
        $user->save();

        return redirect('admin/admin/list')->with('success',"Teacher successfully deleted"); 
    }
}
