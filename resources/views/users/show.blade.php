@extends('layouts.app')
@section('content')
@if (Auth()->user()->isStaff())
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8 ">
			<div class="card">
				<div class="card-header">User Details</div>
				<div class="card-body">
					<table class="table table-striped" border="1" >
						<tr>
							<td>
								<b>ID</th>
								<td>{{$user['id']}}</td>
							</tr>
							<td>
								<b>Username</th>
								<td>{{$user['name']}}</td>
							</tr>
							<tr>
								<th>Email</th>
								<td>{{$user['email']}}</td>
							</tr>
							<tr>
								<th>Role</th>
								<td>{{$user['role']}}</td>
							</tr>
							<tr>
								<td>User since</th>
								<td>{{$user['created_at']}}</td>
							</tr>
						</table>
						<table>
							<tr>
								<td>
									<a href="javascript:history.back()" class="btn btn-primary" role="button">Return to list</a>
								</td>

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
@else
<div class="row justify-content-center">
	<div class="alert alert-danger">
					You are not authorised to view this page
	</div>
</div>
@endif

@endsection