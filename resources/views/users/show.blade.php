@extends('layouts.app')

@section('content')
    
<div class="container">
  <div class="row">
  	<div class="col-sm-9">
		  <h1>My Account&nbsp;<small><a href="{{url('/account/edit')}}" class="ju">edit</a></small></h1>
		  <hr />
  		<div class="col-md-12">
  			<div class="table-responsive">
  				<table class="table table-bordered">
            <thead>
              <tr>
                <th colspan="2">Basic Information</th>
              </tr>
            </thead>
  				  <tbody>
  				    <tr>
  				      <td>Firstname</td>
  				      <td>{{ Auth::user()->firstname }}</td>
  				    </tr>
  				    <tr>
  				      <td>Lastname</td>
  				      <td>{{ Auth::user()->lastname }}</td>
  				    </tr>
  				    <tr>
  				      <td>Email</td>
  				      <td>{{ Auth::user()->email }}</td>
  				    </tr>
  				    <tr>
  				      <td>Contact Number</td>
  				      <td>{{ Auth::user()->contact }}</td>
  				    </tr>
  				  </tbody>
  				</table>
  			</div>
		  </div>
  	</div>

  	@include('account.links-login')
  	
  </div>
</div>
@endsection