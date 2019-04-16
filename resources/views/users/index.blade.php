@extends('layouts.app')
@section('content')
@if (Auth()->user()->isStaff())
<div class="listcontainer">
	<div class="row justify-content-center">
		<div class="col-md-8 ">
			<div class="card">
				<div class="card-header">Display all users</div>
				<div class="card-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>Username</th>
								<th>Email</th>
								<th>Role</th>
								<th>User Since</th>
							</tr>
						</thead>
						<tbody>
@foreach($users as $user)
							<tr>
								<td>{{$user['id']}}</td>
								<td>{{$user['name']}}</td>
								<td>{{$user['email']}}</td>
								<td>{{$user['role']}}</td>
								<td>{{$user['created_at']}}</td>
								<td>
									<a href="{{action('UserController@show', $user['id'])}}" class="btn
 btn-primary">Details</a>
								</td>
								<td>
									<form action="{{action('UserController@destroy', $user['id'])}}"
method="post"> @csrf
										<input name="_method" type="hidden" value="DELETE">
											<button class="btn btn-danger" type="submit"> Delete</button>
										</form>
									</td>
								</tr>
@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@else
<div class="row justify-content-center">
	<div class="alert alert-danger">
					You are not authorised to view this page
	</div>
</div>
@endif
@endsection