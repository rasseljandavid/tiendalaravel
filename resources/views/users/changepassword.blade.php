@extends('layouts.app')

@section('metainfo')
	<title>{{ Auth::user()->getFullname() }} on Tienda</title>
	<meta name="description" content="{{ Auth::user()->getFullname() }} Tienda Profile">
@endsection

@section('content')
    
<div class="container">
  <div class="row">
  	<div class="col-sm-9">
  		<h1>Change Password</h1>
  		<hr />
  		<form method="POST" action="{{ url('/account/changepassword') }}" method="POST" class="form">
  			{{ csrf_field() }}
    		<div class="col-md-12">
    			<div class="table-responsive">
    				<table class="table table-bordered table-">
              <thead>
                <tr>
                  <th colspan="2">Password</th>
                </tr>
              </thead>
    				  <tbody>

                <tr>
                  <td>Password</td>
                  <td>
                    <input type="password" name="password" required class="form-control">
                  </td>
                </tr>

                <tr>
                  <td>Password Confirmation</td>
                  <td>
                    <input type="password" name="password_confirmation" required class="form-control">
                  </td>
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

