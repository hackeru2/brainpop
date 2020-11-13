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
    public $table = 'teachers';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'username',
        'password',
        'full_name',
        'email'
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
        'password' => 'required|min:5',
        'full_name' => 'required|min:2',
        'email' => 'required|email'
    ];

    
}
