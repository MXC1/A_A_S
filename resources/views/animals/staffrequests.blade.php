@extends('layouts.app')
@section('content')
<div class="listcontainer">
	<div class="row justify-content-center">
		<div class="col-md-8 ">
			<div class="card">
				<div class="card-header">Display all requests</div>
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
								<th>Request Made By</th>
								<th>Animal ID</th>
							</tr>
						</thead>
						
						<tbody>
@foreach($requests as $request)
@if($request['approved']==0)
							<tr>
								<td>{{$request['id']}}</td>
								<td>{{$request['username']}}</td>
								<td>{{$request['animalid']}}</td>
								<td>
									<a href="{{action('AnimalController@show', $request['animalid'])}}" class="btn
btn- primary">Animal Details</a>
								</td>
								<td>
									<a href="{{action('UserController@show', $request['userid'])}}" class="btn
btn- warning">Requester Details</a>
								</td>
								<td>
									<form action="{{action('RequestController@approve', $request['id'])}}"
method="POST"> @csrf									
											<button class="btn btn-success" method="POST" type="submit"> Approve</button>
										</form>
									</td>
									<td>
									<form action="{{action('RequestController@deny', $request['id'])}}"
method="POST"> @csrf
											<button class="btn btn-danger" method="POST" type="submit"> Deny</button>
										</form>
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