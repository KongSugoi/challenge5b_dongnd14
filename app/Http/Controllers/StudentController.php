<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Str;
class StudentController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getStudent();
        return view('admin.student.list',$data);
    }

    public function add()
    {
        return view('admin.student.add');
    }

    public function insert(Request $request)
    {           
        $student= new User;
        $student->name = trim ($request->name);
        $student->email = trim ($request->email);
        $student->phone = trim ($request->phone);
        $student->password = Hash::make($request->password);
        $student->status = trim ($request->status);
        $student->user_type = 2;

        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/',$filename);

            $student->profile_pic = $filename;
        }
       // $user->photo = trim(strip_tags($request->photo));
        $student->save();

        return redirect('admin/student/list')->with('success',"Student successfully created");    
    }
}
