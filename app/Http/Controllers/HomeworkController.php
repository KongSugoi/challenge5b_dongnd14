<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeworkModel;
use App\Models\HomeworkSubmitModel;
use Auth;
class HomeworkController extends Controller
{
    public function homework()
    {
        $data['getRecord'] = HomeworkModel::getRecord();
        return view('admin.homework.list',$data);
    }

    public function add()
    {        
        return view('admin.homework.add');
    }

    public function insert(Request $request)
    {
        $homework = new HomeworkModel;
        $homework->homework_date = trim($request->homework_date);
        $homework->submission_date = trim($request->submission_date);
        $homework->description = trim($request->description);
        $homework->homework_date = trim($request->homework_date);

        if(!empty($request->file('document_file')))
        {
            $file = $request->file('document_file');
            $filename = $file->getClientOriginalName();;                        
            $file->move('upload/homework/',$filename);

            $homework->document_file = $filename;
        }

        $homework->save();

        return redirect('admin/homework/homework')->with('success','Homework Successfully Created');
    }
    public function edit($id)
    {
        $data['getRecord'] = HomeworkModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            return view('admin.homework.edit',$data);
        }
        else
        {
            abort(404);
        }
    }
    
    public function update(Request $request, $id)
    {
        $homework = HomeworkModel::getSingle($id);
        $homework->homework_date = trim($request->homework_date);
        $homework->submission_date = trim($request->submission_date);
        $homework->description = trim($request->description);
        $homework->homework_date = trim($request->homework_date);

        if(!empty($request->file('document_file')))
        {
            $file = $request->file('document_file');
            $filename = $file->getClientOriginalName();;                        
            $file->move('upload/homework/',$filename);

            $homework->document_file = $filename;
        }

        $homework->save();

        return redirect('admin/homework/homework')->with('success','Homework Successfully Updated');
    }

    public function delete($id)
    {
        $getRecord = HomeworkModel::getSingle($id);
        if(!empty($getRecord))
        {
            $getRecord->is_delete=1;
            $getRecord->save();

            return redirect()->back()->with('success', "Homework Successfully Deleted");            
        }
        else
        {
            abort(404);
        }
    }

    //student side
    public function HomeworkStudent()
    {
        $data['getRecord'] = HomeworkModel::getHomework();
        return view('student.homework.list',$data);
    }

    public function SubmitHomework($homework_id)
    {
        $data['getRecord'] = HomeworkModel::getSingle($homework_id);
        return view('student.homework.submit',$data);    
    }

    public function SubmitHomeworkInsert(Request $request, $homework_id)
    {
        $homework= new HomeworkSubmitModel;
        $homework->homework_id = $homework_id;
        $homework->student_id = Auth::user()->id;
        $homework->description = trim($request->description);

        if(!empty($request->file('document_file')))
        {
            $file = $request->file('document_file');
            $filename = $file->getClientOriginalName();;                        
            $file->move('upload/homework_submit/',$filename);

            $homework->document_file = $filename;
        }

        $homework->save();

        return redirect('student/my_homework')->with('success','Homework Successfully Submitted');
    }

    public function HomeworkSubmittedStudent(Request $request)
    {
        $data['getRecord'] = HomeworkModel::getHomework();
        return view('student.homework.submitted_list',$data);
    }
}
