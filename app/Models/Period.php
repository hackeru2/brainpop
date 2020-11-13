<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * Class Period
 * @package App\Models
 * @version November 11, 2020, 4:21 am UTC
 *
 * @property \App\Models\Teacher $teacher
 * @property string $name
 * @property integer $teacher_id
 */
class Period extends Model
{
    use SoftDeletes , HasFactory;

    public $table = 'periods';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'teacher_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'teacher_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function teacher()
    {
        return $this->hasOne(\App\Models\Teacher::class, 'teacher_id', 'id');
    }
}
