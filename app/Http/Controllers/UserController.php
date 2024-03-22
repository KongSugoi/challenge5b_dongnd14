<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Str;
class UserController extends Controller
{
    public function view($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            return view('student.view',$data);
        }
        else 
        {
            abort(404);
        }
    }
    public function listall()
    {
        $data['getRecord'] = User::getAllUser();
        return view('student/list',$data);
    }
    public function MyAccount()
    {    
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        if(Auth::user()->user_type == 1)
        {
            return view('admin.my_account',$data);
        }
        else
        {
            return view('student.my_account',$data);
        }
        
    }

    public function UpdateMyAccount(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::getSingle($id);
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

        return redirect()->back()->with('success',"Account successfully updated");
    }
    public function UpdateMyAccountStudent(Request $request)
    {
        $id = Auth::user()->id;
        $student = User::getSingle($id);
        $student->name = trim ($request->name);
        $student->email = trim ($request->email);
        $student->phone = trim ($request->phone);
        if(!empty($request->password))
        {
            $student->password = Hash::make($request->password);
        }    
        if(!empty($request->file('profile_pic')))
        {
            if(!empty($student->getProfile()))
            {
                unlink('upload/profile/'.$student->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/',$filename);

            $student->profile_pic = $filename;
        } 
        $student->save();

        return redirect()->back()->with('success',"Account successfully updated");
    }
    public function change_password()
    {
        return view('profile.change_password');
    }

    public function update_change_password(Request $request)
    {
        $user= User::getSingle(Auth::user()->id);
        if(Hash::check($request->old_password, $user->password))
        {
            $user->password = Hash::make($request->new_password);
            $user->save();
            
            return redirect()->back()->with('Success',"Password successfully updated");
        }
        else
        {
            return redirect()->back()->with('error',"Old Password is not correct");
        }
    }
}
