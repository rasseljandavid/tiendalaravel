@extends('layouts.admin')


@section('content')
  <div class="row">
    

    <div class="container-fluid">
      <div class="row">
        @include('admin._sidebar', ['current'=>'dashboard'])

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          @include('admin._ordertable', ['orders'=>$received, 'title'=>'New Orders', 'class'=>'success'])

          @include('admin._ordertable', ['orders'=>$onProcess, 'title'=>'On Process', 'class'=>'primary'])

          @include('admin._ordertable', ['orders'=>$onTransit, 'title'=>'On Transit', 'class'=>'info'])

          @include('admin._ordertable', ['orders'=>$shipped, 'title'=>'Shipped', 'class'=>'default'])

          @include('admin._ordertable', ['orders'=>$cancelled, 'title'=>'Cancelled', 'class'=>'danger'])

      </div>
    </div>

  </div>

@endsection

@section('script')

@endsection