<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeworkSubmitModel extends Model
{
    use HasFactory;
    protected $table ='homework_submit';

    static public function getRecord($homework_id)
    {
        $return = HomeworkSubmitModel::select('homework_submit.*','users.name as name')
                ->join('users','users.id','=','homework_submit.student_id')
                ->where('homework_submit.homework_id', '=', $homework_id)
                ->orderBy('homework_submit.id', 'desc')
                ->get();
        return $return;
    }
    static public function getRecordStudent($student_id)
    {
        $return = HomeworkSubmitModel::select('homework_submit.*') 
                    ->join('homework','homework.id','=','homework_submit.homework_id')                     
                    ->orderBy('homework_submit.id','desc')
                    ->get();

        return $return;
    }

    public function getDocument()
    {
        if(!empty($this->document_file)&& file_exists('upload/homework_submit/'.$this->document_file))
        {
            return url('upload/homework_submit/'.$this->document_file);
        }
        else  
        {
            return "";
        }
    }
    
    public function getHomework()
    {
        $home=$this->belongsTo(HomeworkModel::class, "homework_id");
        return $home;
    }

    public function getStudent()
    {
        $home=$this->belongsTo(User::class, "student_id");
        return $home;
    }
}
