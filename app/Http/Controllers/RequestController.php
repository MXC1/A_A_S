<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Gate;
use Auth;
use App\Requests;

class RequestController extends Controller
{
    public function showRequests()
    {
		$username = Auth::user()->name;
        $requests = Requests::all();
		if (Gate::denies('isStaff')){
			$requests = $requests->where('username', $username);
			return view('animals/userrequests',compact('requests'));
		} else {
			return view('animals/staffrequests',compact('requests'));
		}
    }
	
	public function requestAdopt($id)
	{
		$request = new Requests;
		$request->animalid=$id;
		$request->username=auth()->user()->name;
		$request->save();
	
		return back()->with('success', 'Adoption request has been submitted.');
	}
	
	public function approve($id)
	{
		$request = Requests::find($id);
		$request->approved=1;
		$request->save();
		
		return back()->with('success', 'Adoption request has been approved.');
	}
	
	public function deny($id)
	{
		$request = Requests::find($id);
		$request->approved=2;
		$request->save();
		
		return back()->with('success', 'Adoption request has been denied.');
	}
}
