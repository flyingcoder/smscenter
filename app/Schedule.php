<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Child;
use Carbon\Carbon;

class Schedule extends Model
{
	/**
	 *
	 * interval before schedule
	 * remind 3 days before sched
	 *
	 */

	protected $interval = 3;

	/**
	 *
	 * main function to call to start making reminder
	 *
	 */
	

    public static function makeReminder(Child $child)
    {
    	$age = date_diff(Carbon::now(), Carbon::parse($child->birthday));
    	//dd($child->vaccineCovered);
    	dd($age->days);
    	foreach ($child->vaccineCovered as $key => $value) {
    		if(method_exists($this, 'type'.$value->dosage))
    			call_user_func(array($this, 'type'.$value->dosage), $age);
    	}
    }

    /*======================================
    =            Type of dosage            =
    ======================================*/
    
     public function typeB($age)
    {
    	$first = 42;
    	$second = 
    	if($age->days > $first - $this->interval)
    	Schedule::create([
    		])
    }
    
    /*=====  End of Type of dosage  ======*/
   
}
