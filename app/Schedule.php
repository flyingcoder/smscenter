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

	protected $fillable = ['remind_date', 'pivot_id', 'status', 'type'];
   
}
