<?php

use App\User;

?>

@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8 ">
			<div class="card">
				<div class="card-header">Display all animals</div>
				<div class="card-body">
					<table class="table table-striped" border="1" >
						<tr>
							<td>
								<b>ID</th>
								<td>{{$animal['id']}}</td>
							</tr>
							<tr>
								<th>Name</th>
								<td>{{$animal['name']}}</td>
							</tr>
							<tr>
								<th>Date of Birth</th>
								<td>{{$animal['dob']}}</td>
							</tr>
							<tr>
								<td>Species</th>
								<td>{{$animal['species']}}</td>
							</tr>
							<tr>
								<td>Owner</th>
								<td>
								@if($animal['userid']!=null)
									{{User::find($animal['userid'])->name}}
								@endif
								</td>
							</tr>
							<tr>
								<th>Notes </th>
								<td style="max-width:150px;" >{{$animal['description']}}</td>
							</tr>
							<tr>
								<th>Picture</th>
								<td style="max-width:150px;" ><a target="_blank" href="/storage/images/{{$animal['image']}}"><img width="225px" src="/storage/images/{{$animal['image']}}"></a></td>
							</tr>
							</table>
							<table>
								<tr>
									<td>
										<a href="javascript:history.back()" class="btn btn-primary" role="button">Return to list</a>
									</td>
									<td>
										<a href="{{action('AnimalController@edit', $animal['id'])}}" class="btn
btn- warning">Edit</a>
									</td>
									<td>
										<form action="{{action('AnimalController@destroy', $animal['id'])}}"
method="post"> @csrf
											<input name="_method" type="hidden" value="DELETE">
												<button class="btn btn-danger" type="submit">Delete</button>
											</form>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection