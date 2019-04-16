@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @guest
					<p style="text-align:center;">
						Welcome to the Aston Animal Sanctuary website. <br>
						<br>
						Here you can view the animals available for adoption here at AAS, and request to adopt animals you like the look of. <br>
						 <br>
						Please use the login button in the top right hand corner to access your account. <br>
						<br>
						If you are a new user, simply register using the register button.
						</p>
					@else
					<p style="text-align:center;">
					@if(Auth()->user()->isStaff())
						Use the 'Animals' tab to view all the animals at AAS and their status. <br>
						<br>
						Use the 'Add Animal' tab to add a new animal to the database. <br>
						<br>
						Use the 'Requests' tab to view the current pending adoption requests.
					</p>
					@else
					<p style="text-align:center;">
						On the 'Animals' page you can see all the animals we currently have available for adoption. <br>
						If you wish to adopt an animal, click the 'Request to Adopt' button alongside the desired animal. <br>
						 <br>
						On the 'Requests' page you can see all the adoption requests you have made, and whether they have been approved or denied. <br>
						<br>
						We hope you find the animal you are after!
					@endif
					@endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
