@extends('layouts.app')

@section('content')
    
<div class="container">
  <div class="row">
  	<div class="col-sm-9">
  		<h1>Editing Account information</h1>
  		<hr>
  		<form method="POST" action="{{ url('/account/update') }}" method="POST" class="form">
  			{{ csrf_field() }}
    		<div class="col-md-12">
    			<div class="table-responsive">
    				<table class="table table-bordered table-">
              <thead>
                <tr>
                  <th colspan="2">Basic Information</th>
                </tr>
              </thead>
    				  <tbody>
    				    <tr>
    				      <td>Firstname</td>
    				      <td><input type="text" name="firstname" value="{{ $user->firstname or old('firstname') }} " required="required" class="form-control"></td>
    				    </tr>
    				    <tr>
    				      <td>Lastname</td>
    				      <td><input type="text" name="lastname" value="{{ $user->lastname or old('lastname') }}" required="required" class="form-control"></td>
    				    </tr>
    				    <tr>
    				      <td>Email</td>
    				      <td><input type="email" name="email" value="{{ $user->email or old('email') }}" required="required" class="form-control"></td>
    				    </tr>
    				    <tr>
    				      <td>Contact Number</td>
    				      <td><input type="number" name="contact" value="{{ $user->contact or old('contact') }}" required="required" class="form-control"></td>
    				    </tr>
    				  </tbody>
    				</table>
            <button type="submit" name="submit" class="btn btn-lg btn-primary">Save Changes</button>
            <a href="/account"  class="btn btn-default btn-lg">Cancel</a>
    			</div>
  		  </div>
      </form>
    </div>
  	@include('account.links-login')
  </div>
</div>

@endsection
