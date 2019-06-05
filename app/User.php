<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'alias', 'group_id', 'educational_institution', 'profession', 'activated', 'activated_at', 'country', 'email', 'password', 'administrator'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profession() {
        switch ($this->profession)
        {
            case 0:
                return "Student";
                break;
            case 1:
                return "Teacher";
                break;
            case 2:
                return "Professional";
                break;
            case 3:
                return "Hobbyist";
                break;
            default:
                return null;
        }
    }

    public function tutorialLog()
    {
        return $this->hasOne(TutorialLog::class);
    }

    public function group()
    {
        return $this->belongsTo(UserGroup::class);
    }
}
