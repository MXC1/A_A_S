@extends('layouts.app')
@section('content')
<div class="listcontainer">
	<div class="row justify-content-center">
		<div class="col-md-8 ">
			<div class="card">
				<div class="card-header">Your adoption requests</div>
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
								<th>Animal ID</th>
								<th></th>
								<th>Status</th>
							</tr>
						</thead>
						
						<tbody>
@foreach($requests as $request)
							<tr>
								<td>{{$request['id']}}</td>
								<td>{{$request['animalid']}}</td>
								<td>
									<a href="{{action('AnimalController@show', $request['animalid'])}}" class="btn btn-primary">Animal Details</a>
								</td>
								<td>
								@if ($request['approved']==0)
								<label class="alert badge-secondary"> Not Yet Approved</label>
								@elseif ($request['approved']==1)
								<button class="alert badge-success"> Approved</button>
								@elseif ($request['approved']==2)
								<button class="alert badge-danger"> Denied</button>
								@endif
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