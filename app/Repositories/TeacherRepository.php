<?php

namespace App\Repositories;

use App\Models\Teacher;
use App\Repositories\BaseRepository;

/**
 * Class TeacherRepository
 * @package App\Repositories
 * @version November 10, 2020, 6:50 pm UTC
*/

class TeacherRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'username',
        'password',
        'full_name',
        'email'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Teacher::class;
    }
}
