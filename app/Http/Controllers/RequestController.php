<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Gate;
use Auth;
use App\Requests;
use App\Animal;
use App\User;

class RequestController extends Controller
{
    public function showRequests()
    {
		$id = Auth::user()->id;
        $requests = Requests::all();
		if (Gate::denies('isStaff')){
			$requests = $requests->where('userid', $id);
			return view('animals/userrequests',compact('requests'));
		} else {
			return view('animals/staffrequests',compact('requests'));
		}
    }
	
	public function showAdoptions(){
		$requests = Requests::all();
		return view('animals/adoptionindex',compact('requests'));
	}
	
	public function requestAdopt($id)
	{
		$request = new Requests;
		$request->animalid=$id;
		$request->userid=auth()->user()->id;
		$request->save();
	
		return back()->with('success', 'Adoption request has been submitted.');
	}
	
	public function approve($id)
	{
		$request = Requests::find($id);
		$request->approved=1;
		$request->save();
		
		$animalid = $request->animalid;
		$ownerid = $request->userid;
		$owner = User::find($ownerid);
		$ownerusername = $owner['name'];
		
		$animal = Animal::find($animalid);
		$animal->availability=0;
		$animal->ownerusername=$ownerusername;
		$animal->save();
		
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
