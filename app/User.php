<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable; //exposed the Notifiable class inside the class user

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'email', 'password', 'email_token','lname','title','nominee','relation_with_nominee','contact_no','dob','correspondence','username','ddno','amount','issuing_bank','issuing_date','bank_branch','business_id','student_id','side','sponsored_by','address','course','landmark'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
