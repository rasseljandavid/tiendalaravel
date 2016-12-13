<div class="col-md-12">
  <div class="panel panel-{{$class}}">
    <!-- Default panel contents -->
    <div class="panel-heading">{{ $title }} <span class="badge">@if($new) {{$new}} @endif</span></div>
    <!-- Table -->
    <table class="table">
      <thead>
        <tr>
          <th>Order Id</th>
          <th>Name</th>
          <th>Branch</th>
          <th>Orders</th>
        </tr>
      </thead>
      <tbody>
        @foreach($orders as $o)
          @if($o)
            <tr>
              <td>>{{ $o->id }}</td>
              <td>{{ $o->name}}</td>
              <td>{{ $o->branch }}</td>
              <td>{{ $o->orders }}</td>
            </tr>
          @endif
        @endforeach
      </tbody>
    </table>
  </div>
</div>