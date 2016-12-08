<div class="col-sm-3 col-md-2 sidebar">
  <ul class="nav nav-sidebar">
    <li class="active"><a href="#"><i class="fa fa-dashboard fa-lg"></i> Dashboard @if($current=='dashboard') <span class="sr-only">(current)</span> @endif</a></li>
    <li  data-toggle="collapse" data-target="#products" class="collapsed">
      <a href="#"><i class="fa fa-inbox fa-lg"></i> Orders <span class="caret"></span></a>
    </li>
    <ul class="sub-menu collapse" id="products">
        <li><a href="#">New Received Orders <span class="badge">@if($ctrReceived) {{$ctrReceived}} @endif</span></a></li>
        <li><a href="#">On Process <span class="badge">@if($ctrOnProcess) {{$ctrOnProcess}} @endif</span></a></li>
        <li><a href="#">On Transit <span class="badge">@if($ctrOnTransit) {{$ctrOnTransit}} @endif</span></a></li>
        <li><a href="#">Shipped <span class="badge">@if($ctrShipped) {{$ctrShipped}} @endif</span></a></li>
        <li><a href="#">Cancelled by Customer <span class="badge">@if($ctrCbc) {{$ctrCbc}} @endif</span></a></li>
        <li><a href="#">Cancelled by Admin <span class="badge">@if($ctrCba) {{$ctrCba}} @endif</span></a></li>
        <li><a href="#">Completed</a></li>
    </ul>
  </ul>
  <!-- <ul class="nav nav-sidebar">
    <li><a href="">Nav item again</a></li>
    <li><a href="">One more nav</a></li>
    <li><a href="">Another nav item</a></li>
  </ul> -->
</div>