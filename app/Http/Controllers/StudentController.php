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
       
        $student->save();

        return redirect('admin/student/list')->with('success',"Student successfully created");    
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            return view('admin.student.edit',$data);
        }
        else
        {
            abort(404);
        }
    }
    
    public function update($id, Request $request)
    {
        $student= User::getSingle($id);
        $student->name = trim ($request->name);
        $student->email = trim ($request->email);
        $student->phone = trim ($request->phone);
        if(!empty($request->password))
        {
            $student->password = Hash::make($request->password);
        }    
        $student->status = trim ($request->status);

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

        return redirect('admin/student/list')->with('success',"Student successfully updated"); 
    }

    public function delete($id)
    {
        $getRecord = User::getSingle($id);
        if(!empty($getRecord))
        {
            $getRecord->is_delete=1;
            $getRecord->save();

            return redirect()->back()->with('success', "Student Successfully Deleted");            
        }
        else
        {
            abort(404);
        }
    }
}
