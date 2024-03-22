<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeworkModel extends Model
{
    use HasFactory;
    protected $table ='homework';

    static public function getHomework()
    {
        return self::select('homework.*')
                ->where('homework.is_delete','=',0)
                ->orderBy('homework.id','desc')
                ->get();
    }
    static public function getSingle($id)
    {
        return  self::find($id);
    }
    static public function getRecord()
    {
        $return = HomeworkModel::select('homework.*');
            $return= $return->where('homework.is_delete', '=', 0)
                ->orderBy('homework.id', 'desc')
                ->get();
               
        return $return;
    }

    public function getDocument()
    {
        if(!empty($this->document_file)&& file_exists('upload/homework/'.$this->document_file))
        {
            return url('upload/homework/'.$this->document_file);
        }
        else  
        {

        }
    }

}
