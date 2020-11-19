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

    public function create( $input)
    {

        $period =  parent::create($input);
        $this->syncStudents ( $period  , $input['students']);
        return $period;
    }

    public function update($input, $id)
    {

        $period =  parent::update($input, $id);
        $this->syncStudents ( $period  , $input['students']);
        return $period;
    }

    
    public function syncStudents(Period $period , $periodStudents  )
    {
         
        $studentsIDs = !$periodStudents ? [] :  explode( ',' ,  $periodStudents );
        $period->students()->sync($studentsIDs) ;

    }
}
