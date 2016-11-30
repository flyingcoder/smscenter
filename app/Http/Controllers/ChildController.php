<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Child;

use App\Vaccine;

use App\Schedule;

use DB;

class ChildController extends Controller
{
    public function index()
    {
    	$children = Child::orderBy('created_at', 'desc')->paginate(5);
    	return view('pages.profiles', compact('children'));
    }

    public function display()
    {
        $children = Child::orderBy('created_at', 'desc')->paginate(5);
        return view('pages.messages', compact('children'));
    }

    public function register(Request $request)
    {
    	$child = new Child;
    	$child->name = $request->name;
    	$child->birthday = $request->birthday;
    	$child->parent = $request->parent;
    	$child->phone_number = $request->phone_number;
    	$child->barangay = $request->barangay;
    	$child->save();
    	$vaccineCovered = $request->vaccine;
        $vaccine = Vaccine::all();
        foreach ($vaccine as $key => $value) {
           if(count($vaccineCovered) != 0 && in_array($value->id, $vaccineCovered)){
              $child->vaccineCovered()->attach([$value->id => ['status' => 'covered']]);
           } else {
              $child->vaccineCovered()->attach([$value->id => ['status' => 'ongoing']]);
           }
        }

        $this->setSchedule($child);

    	return redirect()->back()->with('message', 'Saved!');
    }

    public function setSchedule(Child $child)
    {
        $now = date_create(date('Y-m-d', time()));
        $birthday = date_create(date('Y-m-d', strtotime($child->birthday)));
        $age = date_diff($now, $birthday);
        
        $vaccines = $child->vaccineCovered()->where('status', 'ongoing')->get();

        foreach ($vaccines as $key => $value) {
            switch ($value->dosage) {
                case 'B':
                    //week 6, 42 days, starts at 35
                    $this->saveReminder(['child_id' => $child->id,'age' => $age->days, 'dosage_sched' => 35, 'birthday' => $child->birthday, 'pivot_id' => $value->pivot->id]);
                    $from = date('Y-m-d', strtotime("+35 day", strtotime($child->birthday)));
                    $until = date('Y-m-d', strtotime("+7 day", strtotime($from)));
                    $value->pivot->vaccination_range = $from." - ".$until;
                    $value->pivot->save();
                    break;
                case 'C':
                   
                    $this->saveReminder(['child_id' => $child->id,'age' => $age->days, 'dosage_sched' => 49, 'birthday' => $child->birthday, 'pivot_id' => $value->pivot->id]);
                    $from = date('Y-m-d', strtotime("+49 day", strtotime($child->birthday)));
                    $until = date('Y-m-d', strtotime("+7 day", strtotime($from)));
                    $value->pivot->vaccination_range = $from." - ".$until;
                    $value->pivot->save();
                    break;
                case 'D':
                   
                    $this->saveReminder(['child_id' => $child->id,'age' => $age->days, 'dosage_sched' => 63, 'birthday' => $child->birthday, 'pivot_id' => $value->pivot->id]);
                    $from = date('Y-m-d', strtotime("+63 day", strtotime($child->birthday)));
                    $until = date('Y-m-d', strtotime("+7 day", strtotime($from)));
                    $value->pivot->vaccination_range = $from." - ".$until;
                    $value->pivot->save();
                    break;
                case 'E':
                    
                    $this->saveReminder(['child_id' => $child->id,'age' => $age->days, 'dosage_sched' => 252, 'birthday' => $child->birthday, 'pivot_id' => $value->pivot->id]);
                    $from = date('Y-m-d', strtotime("+252 day", strtotime($child->birthday)));
                    $until = date('Y-m-d', strtotime("+30 day", strtotime($from)));
                    $value->pivot->vaccination_range = $from." - ".$until;
                    $value->pivot->save();
                    break;
                case 'F':
                   
                    $this->saveReminder(['child_id' => $child->id,'age' => $age->days, 'dosage_sched' => 330, 'birthday' => $child->birthday, 'pivot_id' => $value->pivot->id]);
                    $from = date('Y-m-d', strtotime("+330 day", strtotime($child->birthday)));
                    $until = date('Y-m-d', strtotime("+60 day", strtotime($from)));
                    $value->pivot->vaccination_range = $from." - ".$until;
                    $value->pivot->save();
                    break; 
                case 'J':
                    
                    $this->saveReminder(['child_id' => $child->id,'age' => $age->days, 'dosage_sched' => 720, 'birthday' => $child->birthday, 'pivot_id' => $value->pivot->id]);
                    $from = date('Y-m-d', strtotime("+720 day", strtotime($child->birthday)));
                    $until = date('Y-m-d', strtotime("+720 day", strtotime($from)));
                    $value->pivot->vaccination_range = $from." - ".$until;
                    $value->pivot->save();
                    break; 
            }
        }

    }

    public function updateSchedule(Request $request)
    {
        $child = Child::find($request->child_id);
        $vaccine = $child->vaccineCovered()->wherePivot('id', $request->pivot_id)->first();
        $vaccine->pivot->status = $request->status;
        $vaccine->pivot->save();
        return $vaccine;
    }

    public function saveReminder(Array $info)
    {
        if($info['age'] < $info['dosage_sched']){
            if($info['age'] < $info['dosage_sched'] - 3){
                $day = $info['dosage_sched'] - 3;
                Schedule::create(['child_id' => $info['child_id'], 'type' => 'remind', 'remind_date' => date_create(date('Y-m-d', strtotime("+$day day", strtotime($info['birthday'])))), 'pivot_id' => $info['pivot_id']]);
            }
            $day1 = $info['dosage_sched'];
            Schedule::create(['child_id' => $info['child_id'],'type' => 'recall', 'remind_date' => date_create(date('Y-m-d', strtotime("+$day1 day", strtotime($info['birthday'])))), 'pivot_id' => $info['pivot_id']]);
            $day2 = $info['dosage_sched'] + 2;
            Schedule::create(['child_id' => $info['child_id'],'type' => 'recall', 'remind_date' => date_create(date('Y-m-d', strtotime("+$day2 day", strtotime($info['birthday'])))), 'pivot_id' => $info['pivot_id']]);
            $day3 = $info['dosage_sched'] + 4;
            Schedule::create(['child_id' => $info['child_id'],'type' => 'recall', 'remind_date' => date_create(date('Y-m-d', strtotime("+$day3 day", strtotime($info['birthday'])))), 'pivot_id' => $info['pivot_id']]);
            $day4 = $info['dosage_sched'] + 6;
            Schedule::create(['child_id' => $info['child_id'],'type' => 'last_call', 'remind_date' => date_create(date('Y-m-d', strtotime("+$day4 day", strtotime($info['birthday'])))), 'pivot_id' => $info['pivot_id']]);
        }
    }

    public function search(Request $request)
    {
        if($request->parent!= '' && $request->barangay!=''){
            $children = Child::where('parent', 'LIKE', '%'.$request->parent.'%')
            ->where('barangay','=',$request->barangay)->orderBy('created_at', 'desc')->paginate(5);
        }
        else if($request->barangay == '' && $request->parent != ''){
            $children = Child::where('parent', 'LIKE', '%'.$request->parent.'%')->orderBy('created_at', 'desc')->paginate(5);
        }
        else if($request->barangay != '' && $request->parent == ''){
            $children = Child::where('barangay','=',$request->barangay)->orderBy('created_at', 'desc')->paginate(5);
        }
        else{
            return redirect('/messages');
        }
        return view('pages.messages', compact('children'));
    }

    public function details($id)
    {   
        $child = Child::find($id);
    	$child->vaccineCovered;
    	return view('pages.profile', compact('child'));
    }

    public function update($id, Request $request)
    {
    	$child = Child::find($id);
    	$child->parent = $request->parent;
    	$child->name = $request->name;
    	$child->phone_number = $request->phone_number;
    	$child->save();
    	return back()->with('message', 'Updated!');
    }

    public function destroy($id)
    {
        $child = Child::find($id);
        $child->vaccineCovered()->detach();
        DB::table('schedules')->where('child_id', $id)->delete();
        return Child::destroy($id);
    }
}