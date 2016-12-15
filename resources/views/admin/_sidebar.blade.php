<div class="col-sm-3 col-md-2 sidebar">
  <ul class="nav nav-sidebar">
    <li><a href="/dashboard"><i class="fa fa-dashboard fa-lg"></i> Dashboard</a></li>
    <li><a href="/orders-received">New Orders <span class="badge">{{$ctr->received}}</span></a></li>
    <li><a href="/orders-on-process">On Process <span class="badge">{{$ctr->onprocess}}</span></a></li>
    <li><a href="/orders-on-transit">On Transit <span class="badge">{{$ctr->ontransit}}</span></a></li>
    <li><a href="/orders-shipped">Shipped <span class="badge">{{$ctr->shipped}}</span></a></li>
    <li><a href="/orders-cancelled-by-user">Cancelled by User <span class="badge">{{$ctr->cbu}}</span></a></li>
    <li><a href="/orders-cancelled-by-admin">Cancelled by Admin <span class="badge">{{$ctr->cba}}</span></a></li> 
  </ul>
  <!-- <ul class="nav nav-sidebar">
    <li><a href="">Nav item again</a></li>
    <li><a href="">One more nav</a></li>
    <li><a href="">Another nav item</a></li>
  </ul> -->
</div>