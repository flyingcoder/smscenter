<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Child;

use App\Vaccine;

use App\Schedule;

class ChildController extends Controller
{
    public function create()
    {
    	$children = Child::paginate(5);
    	return view('home', compact('children'));
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

    	$vaccine = Vaccine::all();

    	foreach ($vaccine as $key => $value) {
    		$child->vaccineCovered()->attach($value->id);
    	}

        Schedule::makeReminder($child);

    	//return redirect()->back()->with('message', 'Saved!');
    }

    public function search(Request $request)
    {
    	$children = Child::where('parent', 'LIKE', '%'.$request->parent.'%')->paginate(5);
    	return view('home', compact('children'));
    }

    public function details(Child $child)
    {
    	$child->vaccineCovered;
    	return view('details', compact('child'));
    }

    public function update($kid, Request $request)
    {
    	$child = Child::find($kid);
    	$child->parent = $request->parent;
    	$child->name = $request->name;
    	$child->phone_number = $request->phone_number;
    	$child->save();
    	return back()->with('message', 'Updated!');
    }
}