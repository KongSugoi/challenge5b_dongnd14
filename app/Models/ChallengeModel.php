<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeModel extends Model
{
    use HasFactory;

    protected $table ="challenge";

    static public function getChallenge()
    {
        return self::select('challenge.*')            
                ->where('challenge.is_delete','=',0)
                ->orderBy('challenge.id','desc')
                ->get();
    }
    static public function getSingle($id)
    {
        return  self::find($id);
    }
    static public function getRecord()
    {
        $return = ChallengeModel::select('challenge.*');
            $return= $return->where('challenge.is_delete', '=', 0)
                ->orderBy('challenge.id', 'desc')
                ->get();
               
        return $return;
    }
    
    public function getDocument()
    {
        if(!empty($this->challenge_file)&& file_exists('upload/challenge/'.$this->challenge_file))
        {
            return url('upload/challenge/'.$this->challenge_file);
        }
        else  
        {
            return "";
        }
    }
}
