@extends('layouts.app')
@section('content')
<div class="listcontainer">
	<div class="row justify-content-center">
		<div class="col-md-8 ">
			<div class="card">
				<div class="card-header">Display all animals</div>
				<div class="card-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>Picture</th>
								<th>Species</th>
								<th>Name</th>
								<th>Date of Birth</th>
								<th>Description</th>
								<th>Owner</th>
							</tr>
						</thead>
						<tbody>
@foreach($animals as $animal)
							<tr>
								<td>{{$animal['id']}}</td>
								<td><a target="_blank" href="/storage/images/{{$animal['picture']}}"><img width="50px" src="/storage/images/{{$animal['picture']}}"></a></td>
								<td>{{$animal['species']}}</td>
								<td>{{$animal['name']}}</td>
								<td>{{$animal['dob']}}</td>
								<td>{{$animal['description']}}</td>
								<td>{{$animal['ownerusername']}}</td>
								<td>
									<a href="{{action('AnimalController@show', $animal['id'])}}" class="btn
btn- primary">Details</a>
								</td>
								<td>
									<a href="{{action('AnimalController@edit', $animal['id'])}}" class="btn
btn- warning">Edit</a>
								</td>
								<td>
									<form action="{{action('AnimalController@destroy', $animal['id'])}}"
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
@endsection