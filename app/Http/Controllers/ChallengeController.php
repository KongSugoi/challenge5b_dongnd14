<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChallengeModel;
use App\Models\HomeworkSubmitModel;
use Auth;
class ChallengeController extends Controller
{
    public function homework()
    {
        $data['getRecord'] = ChallengeModel::getRecord();
        return view('admin.challenge.list',$data);
    }

    public function add()
    {        
        return view('admin.challenge.add');
    }

    public function insert(Request $request)
    {
        $chall = new ChallengeModel;
        $chall->challenge_date = trim($request->challenge_date);    
        $chall->description = trim($request->description);

        if(!empty($request->file('challenge_file')))
        {
            $file = $request->file('challenge_file');
            $filename = $file->getClientOriginalName();;                        
            $file->move('upload/challenge/',$filename);

            $chall->challenge_file = $filename;
        }

        $chall->save();

        return redirect('admin/homework/challenge')->with('success','Challenge Successfully Created');
    }
    public function edit($id)
    {
        $data['getRecord'] = ChallengeModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            return view('admin.challenge.edit',$data);
        }
        else
        {
            abort(404);
        }
    }
    
    public function update(Request $request, $id)
    {
        $chall = ChallengeModel::getSingle($id);
        $chall->challenge_date = trim($request->challenge_date);
        $chall->description = trim($request->description);

        if(!empty($request->file('challenge_file')))
        {
            $file = $request->file('challenge_file');
            $filename = $file->getClientOriginalName();                       
            $file->move('upload/challenge/',$filename);

            $chall->challenge_file = $filename;
        }

        $chall->save();

        return redirect('admin/homework/challenge')->with('success','Challenge Successfully Updated');
    }

    public function delete($id)
    {
        $getRecord = ChallengeModel::getSingle($id);
        if(!empty($getRecord))
        {
            $getRecord->is_delete=1;
            $getRecord->save();

            return redirect()->back()->with('success', "Challenge Successfully Deleted");            
        }
        else
        {
            abort(404);
        }
    }

    //student side
    public function ChallengeStudent()
    {
        $data['getRecord'] = ChallengeModel::getChallenge();
        return view('student.challenge.list',$data);
    }


    public function SubmitChallenge($challenge_id)
    {
        $data['getRecord'] = ChallengeModel::getSingle($challenge_id);
        return view('student.challenge.submit',$data);    
    }

    public function ProcessChallenge(Request $request, $id)
    {
        
        $challenge = ChallengeModel::find($id);

        if (!$challenge) {
            return redirect()->back()->with('error', 'Challenge not found');
        }

        // So sánh giá trị nhập vào với tên file trong database
        if ($request->challenge_answer === $challenge->challenge_file) {
            // Nếu giống nhau, hiển thị nội dung của file
            $file_path = url('upload/challenge/'.$challenge->challenge_file);
            $content = file_get_contents($file_path);
            $status = "Correct Answer!";
            return view('student.challenge.result', ['status' => $status, 'content' => $content]);
        } else {
            // Nếu không giống, thông báo nhập lại
            $status = "Wrong Answer! Try Again";
            return redirect()->back()->with('error', $status);
        }
    }    
}
