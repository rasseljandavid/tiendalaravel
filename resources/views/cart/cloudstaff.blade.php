@extends('layouts.company')
@section('content')

      <div class="container">

          <div class="row">
            <img src="/image/infographic.jpg" alt="how to order" class="img-responsive" style="margin:auto; " />
          </div>
          <hr />
          <div class="row">

            @foreach($products as $product)
                <div class="col-md-6 col-sm-12 product">
                <img class="checkbox img-responsive" src="/image/product/featured/{{$product->id}}.jpg" alt="{{$product->title}}" />
                <div class="input-group add-minus-bar">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="item_{{$product->id}}">
                            <span class="glyphicon glyphicon-minus"></span>
                        </button>
                    </span>
                    <input type="text" name="item_{{$product->id}}" class="form-control input-number" value="0" min="0" max="999" maxlength=3>
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="item_{{$product->id}}">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </span>
                </div>

                <div class="row">
                    <h2 class="col-xs-6 product-title">
                        {{$product->title}}
                    </h2>
                    <p class="col-xs-6 product-price price">
                        P<span class="item-price">{{$product->salePrice}}</span>
                    </p>
                </div>

                <p class="col-md-12 product-body">
                  {{$product->body}}
                </p>



            </div>


            @endforeach

           

          </div>

          <hr>
     <div class="row">


        <form onkeypress="return event.keyCode != 13;" class="form-inline" style=" font-size: 2em; display: block;text-align: center; margin-left: 10px; margin-right: 10px;" id="companyOrder">
          {{ csrf_field() }}
          <div class="form-group">
            <input type="text" class="form-control" required name="name" id="cname" placeholder="Name" style="height: 44px;">
          </div>

           <div class="form-group">
            <input type="text" class="form-control" name="mobile" id="cmobile" placeholder="Mobile Number" style="height: 44px;">
          </div>

          <div class="form-group">
            <select class="form-control" id="cdeliverytime" name="deliverytime" style="height: 44px;">
                @foreach($deliverydates as $key => $item) 
                    <option value="{{$key}}"> {{$item}} </option>
                @endforeach 
            </select>
          </div>

          <div class="form-group">
            <select class="form-control" id="cbranch" name="branch" style="height: 44px;">
              <option value="SM City Clark">SM City Clark</option>
              <option value="New Street">New Street</option>
              <option value="Living Rock 1">Living Rock 1</option>
              <option value="Living Rock 2">Living Rock 2</option>
            </select>
          </div>

          <input type="hidden" id="ccompany" name="company" value="Cloudstaff" />
          <input type="hidden" name="orders" id="order-hidden" />
          <input type="hidden" name="total" id="total-hidden" />
          <input type="hidden" name="/cloudstaff" id="redirect-hidden" />
          <button type="submit" id="submit" class="btn btn-primary btn-lg">Order</button>
        </form>

        <p style="font-style: italic; text-align:  center; margin: 20px auto 10px; font-size: 1.5em; color: #999;">For bulk orders of 50 and up, please message us on Skype at <i class="fa fa-skype" aria-hidden="true"></i>hello@tienda.ph</p>
     </div>


     </div>

      
      @endsection