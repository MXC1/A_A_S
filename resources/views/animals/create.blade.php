@include('layouts.app')
<!-- define the content section -->
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10 ">
			<div class="card">
				<div class="card-header">Enter a new animal</div>
				<!-- display the errors -->
@if ($errors->any())
				<div class="alert alert-danger">
					<ul> @foreach ($errors->all() as $error)
						<li>{{ $error }}</li> @endforeach
					</ul>
				</div>
				<br /> @endif
				<!-- display the success status -->
@if (\Session::has('success'))
				<div class="alert alert-success">
					<p>{{ \Session::get('success') }}</p>
				</div>
				<br /> @endif
				<!-- define the form -->
				<div class="container">
					<form class="form-horizontal" method="POST"
action="{{url('animals') }}" enctype="multipart/form-data">
@csrf
						<div class="col-md-8">
						<br>
							<label >Animal Name</label>
							<input type="text" name="name"
placeholder="Name" />
						</div>
						<div class="col-md-8">
						<br>
							<label>Date of Birth</label>
							<input type="date" name="dob">
						</div>
						<div class="col-md-8">
						<br>
							<label >Species</label>
							<input type="text" name="species"
placeholder="Species" />
						</div>
						<div class="col-md-8">
						<br>
							<label>Available for adoption?</label>
							<input type="checkbox" name="availability" value="1" checked>
						</div>
						<div class="col-md-8">
						<br>
							<label >Description</label>
							<textarea rows="4" cols="50" name="description" placeholder="Description of the animal"></textarea>
						</div>
						<div class="col-md-8">
						<br>
							<label>Image</label>
							<input type="file" name="image"
placeholder="Image file" >
						</div>
						<br>
						<div class="col-md-6 col-md-offset-4">
							<input type="submit" class="btn btn-primary" />
							<input type="reset" class="btn btn-primary" />
						</div>
						<br>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>