<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Teacher
 * @package App\Models
 * @version November 10, 2020, 6:50 pm UTC
 *
 * @property string $username
 * @property string $password
 * @property string $full_name
 * @property string $email
 */
class Teacher extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Traits\ShowPasswordsTesting;
    public $table = 'teachers';
    
    protected $dates = ['deleted_at'];



    public $fillable = [
        'username',
        'password',
        'full_name',
        'email'
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
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'username' => 'required|min:2',
        // 'password' => 'required|min:5',
        'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
        'full_name' => 'required|min:2',
        'email' => 'required|email'
    ];

    

    public function students()
    {
        return $this->periods->map->students ;
    }   
    
    public function periods()
    {
        return $this->hasMany('\App\Models\Period');
    }

    static  public function errorMessages()
    {

        // return Student::errorMessages();
        return [
            'username.required' => 'You forgot Teacher UserName! :) ',
            'password.regex' => 'The Teacher password must contain an uppercase (A) letter, a lowercase letter (a), a special character (*) and a number (5) ',
        ];
    }

    public function toArray()
{
    // Only show passwords if running tests
   
        $this->setAttributeVisibility();
   

    return parent::toArray();
}

    public function setAttributeVisibility()
    {
         if(env("APP_ENV") == "testing")
        $this->makeVisible(array_merge($this->fillable, $this->appends));
    }

    
}
