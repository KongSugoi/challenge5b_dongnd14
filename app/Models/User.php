<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Cache;
use Request;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    static public function getSingle($id)
    {
        return self::find($id);
    }
    static public function getAdmin()
    {
        return self::select('users.*')
                    ->where('user_type','=',1)
                    ->where('is_delete','=',0)
                    ->orderBy('id','desc')
                    ->get();
    }

    static public function getStudent()
    {
        return self::select('users.*')
                    ->where('users.user_type','=',2)
                    ->where('users.is_delete','=',0)
                    ->orderBy('users.id','desc')
                    ->get();
    }
    static public function getEmailSingle($email)
    {
        return User::where('email', '=', $email)->first();
    }

    public function getProfile()
    {
        if(!empty($this->profile_pic) && file_exists('upload/profile/'.$this->profile_pic))
        {
            return url('upload/profile/'.$this->profile_pic);
        }
        else
        {
            return "";
        }
    }

    static public function getAllUser()
    {
        return self::select('users.*')
                ->where('users.is_delete','=',0)
                ->orderBy('users.id','desc')
                ->get();
    }

    static public function getTotalUser($user_type)
    {
        return self::select('users.id')
                    ->where('user_type','=', $user_type)
                    ->where('is_delete','=', 0)
                    ->count();
    }

    public function getProfileDirect()
    {
        if(!empty($this->profile_pic) && file_exists('upload/profile/'.$this->profile_pic))
        {
            return url('upload/profile/'.$this->profile_pic);
        }
        else 
        {
            return url('upload/profile/user.jpg');
        }
    }
    static public function OnlineUser($user_id)
    {
        return Cache::has('OnlineUser'.$user_id);
    }
}
