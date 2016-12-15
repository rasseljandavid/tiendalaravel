<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="image/favicon.ico" rel="icon" />
<meta name="csrf-token" content="{{ csrf_token() }}">
@yield('metainfo')
<!-- CSS Part Start-->
<link rel="stylesheet" type="text/css" href="/js/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/css/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="/css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="/css/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="/css/owl.transitions.css" />
<link rel="stylesheet" type="text/css" href="/css/responsive.css" />
<!-- <link rel="stylesheet" type="text/css" href="/css/stylesheet-skin2.css" /> -->
<!-- <link rel="stylesheet" type="text/css" href="/css/custom.css" /> -->
<link rel="stylesheet" type="text/css" href="/css/helpers/flasher.css" />
<link rel='stylesheet' href='//fonts.googleapis.com/css?family=Droid+Sans' type='text/css'>
<link rel="stylesheet" type="text/css" href="/css/tienda.css" />
<link rel="stylesheet" type="text/css" href="/css/loader.css" />
<link rel="stylesheet" type="text/css" href="/css/admin.css" />
<link rel="stylesheet" type="text/css" href="/css/daterangepicker.css" />
<!-- CSS Part End-->
</head>
<body>
  <!-- 
    back button refresh hack!!! 
    do we need to find a better cross browser solution here?
  -->
  <input id="alwaysFetch" type="hidden" />
  <script>
    setTimeout(function () {
        var el = document.getElementById('alwaysFetch');
        el.value = el.value ? location.reload() : true;
    }, 0);
  </script>
<div class="wrapper-wide">
  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/') }}">Tienda</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
           <!--  <li><a href="#">Settings</a></li> -->
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a><form id="logout-form" action="{{ url('/logout') }}" method="POST" >
                    {{ csrf_field() }}
                    <input type="submit" name="submit" value="Logout">
                </form></a>
            </li>
          </ul>
         <!--  <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form> -->
        </div>
      </div>
    </nav>


    @yield('content')

    

</div>
<!-- JS Part Start-->
<script type="text/javascript" src="/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="/js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/js/custom.js"></script>
<script type="text/javascript" src="/js/datetimepicker/moment.min.js"></script>
<script type="text/javascript" src="/js/datetimepicker/daterangepicker.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    // add the csrf_token to all ajax request
    $.ajaxSetup({
        headers:
        { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    // flash message close
    $('.message-close').each(function(){
      $(this).click(function(){
        $(this).parents('div .alert').slideToggle(300);
      });
    });

    // delete item confirmation
    $('.delete-cart-item').each(function(){
      $(this).on('submit', function(event){
        if( !confirm('Are you sure that you want to remove '+$(this).attr("data-itemtitle")) ) {
            event.preventDefault();
        }
      });
    });

    // admin scripts
    $(document).on('change', '#order_status_1, #order_status_2, #order_status_3, #order_status_4', function(e) {
      var sel = $(this).find('option:selected');
      var status = sel.val();
      var order_id = $(this).data('order-id');
      // console.log(status[0] + '_' + status[1]);
      if( sel.text() != "Select") {
        if(sel.text() == 'Transit') {
          $('#EstimatedDelivery').modal('show');
          $('#EstimatedDelivery').modal().one('click','#confirm', function() {
            //console.log(sel.text(), status[0], order_id, $('#daterange').val());
            submitForm(sel.text(), status[0], order_id, $('#daterange').val());
          });
        } else if(sel.text() == 'Shipped') {
          $('#delivered-at').modal('show');
          $('#delivered-at').modal().one('click','#confirm', function() {
            //console.log(sel.text(), status[0], order_id, $('#daterange').val());
            submitForm(sel.text(), status[0], order_id, $('#datetime').val());
          });
        } else {
          //console.log(sel.text(), status[0], order_id);
          submitForm(sel.text(), status[0], order_id);
        }
      }
    });
    function submitForm(selected, status_id, order_id, estimateddelivery) {
      var msg='';
      if(selected == 'Transit') {
        msg += ' and set estimated date and time delivery to ' + estimateddelivery;
      }

      if(selected == 'Shipped') {
        msg += ' and set shipment date at ' + estimateddelivery;
      }

      if(confirm('Are you sure you want to update this order status to '+ selected + '?' + msg)) {
        var f = document.createElement('form');
        f.action = '/order/statuschange';
        f.method = 'post';
        var i=document.createElement('input');
        var t=document.createElement('input');
        var id=document.createElement('input');
        var date=document.createElement('input');
        id.type='hidden';
        id.name='status_id';
        id.value= status_id;
        t.type='hidden';
        t.name='_token';
        t.value= $('#logout-form input:hidden[name=_token]').val();
        i.type='hidden';
        i.name='id';
        i.value= order_id;
        f.appendChild(i);
        f.appendChild(t);
        f.appendChild(id);
        if(selected == 'Transit') {
          date.type='hidden';
          date.name='estimateddelivery';
          date.value= estimateddelivery;
          f.appendChild(date);
        }
        if(selected == 'Shipped') {
          date.type='hidden';
          date.name='shipment';
          date.value= estimateddelivery;
          f.appendChild(date);
        }
        document.body.appendChild(f);
        f.submit();
      }
    }

    $('input[name="daterange"]').daterangepicker({
        timePicker: true,
        timePickerIncrement: 1,
        locale: {
            format: 'MM/DD/YYYY h:mm A'
        }
    });

    $('input[name="datetime"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: 1,
        locale: {
            format: 'MM/DD/YYYY h:mm A'
        }
    });

    $('.sidebar a[href="' + this.location.pathname + '"]').parents('li,ul').addClass('active');
  });
</script>
<script type="text/javascript" src="/js/tienda-cart.js"></script>
<!-- JS Part End-->
@yield('script')
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47080785-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>