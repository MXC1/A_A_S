<?php

namespace App\Http\Controllers;
use App\Requests;
use Auth;

?>

@extends('layouts.app')
@section('content')

<div class="listcontainer">
	<div class="row justify-content-center">
		<div class="col-md-8 ">
			<div class="card">
				<div class="card-header">Display all animals</div>
				<div class="card-body">
@if (\Session::has('success'))
				<div class="alert alert-success">
					<p>{{ \Session::get('success') }}</p>
				</div>
				<br />
@endif
					<table class="table table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>Picture</th>
								<th>Name</th>
								<th>Species</th>
								<th>Date of Birth</th>
								<th>Description</th>
							</tr>
						</thead>
						<tbody>
@foreach($animals as $animal)
@if($animal['availability']==1 || $animal['ownerusername']==Auth::user()->name)
							<tr>
								<td>{{$animal['id']}}</td>
								<td><a target="_blank" href="/storage/images/{{$animal['image']}}"><img width="50px" src="/storage/images/{{$animal['image']}}"></a></td>
								<td>{{$animal['name']}}</td>
								<td>{{$animal['species']}}</td>
								<td>{{$animal['dob']}}</td>
								<td>{{$animal['description']}}</td>
								<td>
									<a href="{{action('AnimalController@show', $animal['id'])}}" class="btn
btn- primary">Details</a>
								</td>
								<td>
									<form action="{{action('RequestController@requestAdopt', $animal['id'])}}"
method="post"> @csrf
										@if(Requests::where('animalid', $animal['id'])->where('userid', Auth::user()->id)->first() == null)
											<button class="btn btn-success" type="submit"> Request to Adopt</button>
										@else
											<button class="alert badge-primary" type="submit"> Requested</button>
										@endif
										</td>
								</tr>
@endif
@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection