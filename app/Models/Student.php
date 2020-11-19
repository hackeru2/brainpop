<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Student
 * @package App\Models
 * @version November 11, 2020, 8:13 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $periods
 * @property string $username
 * @property string $password
 * @property string $full_name
 * @property integer $grade
 */
class Student extends Model
{
    use SoftDeletes , HasFactory;
    use Traits\ShowPasswordsTesting;
    public $table = 'students';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'username',
        'password',
        'full_name',
        'grade'
    ];


    
    protected $hidden = [
          'password',
    
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'username' => 'string',
        'password' => 'string',
        'full_name' => 'string',
        'grade' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'username' => ['required', 'unique:students' , 'string', 'min:2', 'max:30', 'alpha_dash'],
        'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
        'full_name' => 'required|min:3',
        'grade' => 'required|min:0|max:12'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function periods()
    {
        return $this->belongsToMany(\App\Models\Period::class);
    }

    static public function errorMessages() {
  
        return [
            'username.required' => 'You forgot UserName! :) ',
            'password.regex' => 'The password must contain an uppercase (A) letter, a lowercase letter (a), a special character (*) and a number (5) ',
            ];
        }
}
