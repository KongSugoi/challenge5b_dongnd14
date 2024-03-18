<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{
    use HasFactory;
    protected $table ='subject';

    static public function getSingle($id)
    {
        return self::find($id);
    }
    static public function getRecord()
    {
        $return = SubjectModel::select('subject.*');
                    
                    $return = $return->where('subject.is_delete', '=', 0)
                    ->orderBy('subject.id','desc')
                    ->get();
        
        return $return;
    }
   
}