@extends('layouts.app')

@section('content')
	<style type="text/css">
		ul {
  list-style-type: none;
}

li {
  display: inline-block;
}

input[type="checkbox"][id^="cb"] {
  display: none;
}

label {
  border: 1px solid #fff;
  padding: 10px;
  display: block;
  position: relative;
  margin: 10px;
  cursor: pointer;
}

label:before {
  background-color: white;
  color: white;
  content: " ";
  display: block;
  border-radius: 50%;
  border: 1px solid grey;
  position: absolute;
  top: -5px;
  left: -5px;
  width: 25px;
  height: 25px;
  text-align: center;
  line-height: 28px;
  transition-duration: 0.4s;
  transform: scale(0);
}

label img {
  width: 180px;
  transition-duration: 0.2s;
  transform-origin: 50% 50%;
}

:checked + label {
  border-color: #ddd;
}

:checked + label:before {
  content: "✓";
  background-color: grey;
  transform: scale(1);
}

:checked + label img {
  transform: scale(0.9);
  box-shadow: 0 0 5px #333;
  z-index: -1;
}
	</style>

    <div class="container">
      <ul class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li><a href="/suppliers">Suppliers</a></li>
      </ul>
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-xs-12">
            <h1 class="title">Uehara's Cuisine</h1>
            <div class="row">
       			<ul>
					  <li><input type="checkbox" id="cb1" />
					    <label for="cb1"><img src="http://tienda.ph/image/product/2810.jpg" /></label>
					  </li>
					  <li><input type="checkbox" id="cb2" />
					    <label for="cb2"><img src="http://tienda.ph/image/product/2811.jpg" /></label>
					  </li>
					  <li><input type="checkbox" id="cb3" />
					    <label for="cb3"><img src="http://tienda.ph/image/product/2812.jpg" /></label>
					  </li>
					  <li><input type="checkbox" id="cb4" />
					    <label for="cb4"><img src="http://tienda.ph/image/product/2813.jpg" /></label>
					  </li>
					</ul>

           	</div>


				<div class="row">
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="input-firstname" placeholder="Name" value="{{old('firstname')}}" name="firstname" required>
                    </div>

                     <div class="col-sm-4">
                      <input type="submit" class="btn btn-primary" value="Place Order"></label>
                	</div>

        		</div>
      		</div>
   	 </div>
   	 <br>
@endsection