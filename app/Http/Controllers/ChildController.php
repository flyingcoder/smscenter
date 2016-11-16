<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Child;

use App\Vaccine;

class ChildController extends Controller
{
    public function create()
    {
    	$children = Child::paginate(5);
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
    	$vaccine = $request->vaccine;
    	foreach ($vaccine as $key => $value) {
    		$child->vaccineCovered()->attach($value);
    	}      
    	return redirect()->back()->with('message', 'Saved!');
    }

    public function search(Request $request)
    {
    	$children = Child::where('parent', 'LIKE', '%'.$request->parent.'%')
        ->where()->paginate(5);
        return view('pages.messages', compact('children'));
    }

    public function details($id)
    {   
        $child = Child::find($id);
    	$child->vaccineCovered;
    	return view('pages.profiles', compact('child'));
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
}