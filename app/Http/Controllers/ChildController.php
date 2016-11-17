<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Child;

use App\Vaccine;

class ChildController extends Controller
{
    public function index()
    {
    	$children = Child::paginate(5);
    	return view('pages.profiles', compact('children'));
    }

    public function display()
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
    	$vaccineCovered = $request->vaccine;
        $vaccine = Vaccine::all();
    	foreach ($vaccine as $key => $value) {
           if(in_array($value->id, $vaccineCovered)){
             $child->vaccineCovered()->attach([$value->id => ['status' => 'covered']]);
           } else {
              $child->vaccineCovered()->attach([$value->id => ['status' => 'ongoing']]);
           }
    	}      
    	return redirect()->back()->with('message', 'Saved!');
    }

    public function search(Request $request)
    {
        if($request->parent!= '' && $request->barangay!=''){
            $children = Child::where('parent', 'LIKE', '%'.$request->parent.'%')
            ->where('barangay','=',$request->barangay)->paginate(5);
        }
        else if($request->barangay == '' && $request->parent != ''){
            $children = Child::where('parent', 'LIKE', '%'.$request->parent.'%')->paginate(5);
        }
        else if($request->barangay != '' && $request->parent == ''){
            $children = Child::where('barangay','=',$request->barangay)->paginate(5);
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
}