<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
 
use Gate;
use Auth;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::all()->toArray();
		if (Gate::allows('isStaff')) {
			return view('animals.staffindex',compact('animals'));
		} else {
			return view('animals.userindex',compact('animals'));
		}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('animals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // form validation
			
			$animal = $this->validate(request(), [
			'name' => 'required|max:20',
			'dob' => 'required|date',
			'species' => 'required|max:20',
			'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500'
			]);
			
			//Handles the uploading of the image
			if ($request->hasFile('image')){
				
				//Gets the filename with the extension
				$fileNameWithExt = $request->file('image')->getClientOriginalName();
				
				//just gets the filename
				$filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
				
				//Just gets the extension
				$extension = $request->file('image')->getClientOriginalExtension();
				
				//Gets the filename to store
				$fileNameToStore = $filename.'_'.time().'.'.$extension;
				
				//Uploads the image
				$path =$request->file('image')->storeAs('public/images', $fileNameToStore);
			} else {
				$fileNameToStore = 'noimage.jpg';
			}
			
			// create a Animal object and set its values from the input
			$animal = new Animal;
			$animal->name = $request->input('name');
			$animal->dob = $request->input('dob');
			$animal->species = $request->input('species');
			$animal->description = $request->input('description');
			$animal->availability = $request->input('availability');
			$animal->image = $fileNameToStore;
			// save the Animal object
			$animal->save();
			// generate a redirect HTTP response with a success message
			return back()->with('success', 'Animal has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal = Animal::find($id);
		return view('animals.show',compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal = Animal::find($id);
		return view('animals.edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
