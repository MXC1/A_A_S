<?php

use App\Animal;
use App\User;

?>

@extends('layouts.app')
@section('content')
<div class="listcontainer">
	<div class="row justify-content-center">
		<div class="col-md-8 ">
			<div class="card">
				<div class="card-header">Display all processed adoptions</div>
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
								<th>Request ID</th>
								<th>Requester Name</th>
								<th>Animal Name</th>
								<th></th>
								<th></th>
								<th>Decision</th>
							</tr>
						</thead>
						
						<tbody>
@foreach($requests as $request)
@if($request['approved']!=0)
							<tr>
								<td>{{$request['id']}}</td>
								<td>{{User::find($request['userid'])->name}}</td>
								<td>{{Animal::find($request['animalid'])->name}}</td>
								<td>
									<a href="{{action('AnimalController@show', $request['animalid'])}}" class="btn
btn- primary">Animal Details</a>
								</td>
								<td>
									<a href="{{action('UserController@show', $request['userid'])}}" class="btn
btn- warning">Requester Details</a>
								</td>
								<td>
								@if ($request['approved']==1)
								<button class="alert badge-success"> Approved</button>
								@elseif ($request['approved']==2)
								<button class="alert badge-danger"> Denied</button>
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