<?php

namespace App\Repositories;

use App\Models\Period;
use App\Repositories\BaseRepository;

/**
 * Class PeriodRepository
 * @package App\Repositories
 * @version November 11, 2020, 4:21 am UTC
*/

class PeriodRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return Period::class;
    }
}
