<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="/image/favicon.ico" rel="icon" />
<meta name="csrf-token" content="{{ csrf_token() }}">
@yield('metainfo')
<!-- CSS Part Start-->
<link rel="stylesheet" type="text/css" href="/js/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/css/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="/css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="/css/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="/css/owl.transitions.css" />
<link rel="stylesheet" type="text/css" href="/css/responsive.css" />
<link rel="stylesheet" type="text/css" href="/css/stylesheet-skin2.css" />
<link rel="stylesheet" type="text/css" href="/css/custom.css" />
<link rel="stylesheet" type="text/css" href="/css/helpers/flasher.css" />
<link rel='stylesheet' href='//fonts.googleapis.com/css?family=Droid+Sans' type='text/css'>
<link rel="stylesheet" type="text/css" href="/css/tienda.css" />
<link rel="stylesheet" type="text/css" href="/css/loader.css" />
<link rel="stylesheet" type="text/css" href="/css/mobile.css" />
<!-- CSS Part End-->
<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '0b4731d52aed923c8f005f84210e97c00c7506e5';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='//www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>

</head>
<body onunload="">
  <!-- 
    back button refresh hack!!! 
    do we need to find a better cross browser solution here?
  -->
  <!-- <input id="alwaysFetch" type="hidden" />
  <script>
    setTimeout(function () {
        var el = document.getElementById('alwaysFetch');
        el.value = el.value ? location.reload() : true;
    }, 0);
  </script> -->
<div class="wrapper-wide">
  <div id="header">
    <!-- Top Bar Start-->
    <nav id="top" class="htop">
      <div class="container">
        <div class="row"> <span class="drop-icon visible-sm visible-xs"><i class="fa fa-align-justify"></i></span>
          <div class="pull-left flip left-top">
            <div class="links">
              <ul>
                <!-- <li class="mobile"><a href="tel:+639258166813"><img style="height: 16px; position: relative; top: 3px;" src="/image/socialicons/viber-icon.png" /> +63 9258166813</a></li>
                <li class="email"><a href="mailto:hello@tienda.ph"><i class="fa fa-envelope"></i>hello@tienda.ph</a></li> -->
                <li class="email"><a href="{{ url('/contact-us') }}"><i class="fa fa-envelope"></i>Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div id="top-links" class="nav pull-right flip">
            <ul>
              @if(Auth::check() && Auth::user()->isAdmin())
              <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
              <li>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <a href="{{ url('/logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>
              </li>
              @elseif(Auth::user())
              <li><a href="{{ url('/account') }}">{{ Auth::user()->getFullname() }}</a></li>
              <li>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <a href="{{ url('/logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>
              </li>
              @else
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
              @endif
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- Top Bar End-->
    <!-- Header Start-->
    <header class="header-row">
      <div class="container">
        <div class="table-container">
          <!-- Logo Start -->
          <div class="col-table-cell col-lg-6 col-md-6 col-sm-12 col-xs-12 inner">
            <div id="logo"><a href="/"><img class="img-responsive" src="/image/logo.png" title="Tienda" alt="Tienda" /></a></div>
          </div>
          <!-- Logo End -->
          <!-- Mini Cart Start-->
          <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12" id="minicart-container">
            @include('cart.minicart')
          </div>
          <!-- Mini Cart End-->
          <!-- Search Start-->
          <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
            @include('search._input')
          </div>
          <!-- Search End-->
        </div>
      </div>
    </header>
    <!-- Header End-->
    <!-- Main Menu Start-->
    
      <nav id="menu" class="navbar">
        <div class="navbar-header"> <span class="visible-xs visible-sm"> Menu <b></b></span></div>
        <div class="container">
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li><a class="home_link" title="Home" href="/">Home</a></li>
            
            @foreach($menus as $menu) 
              <li><a title="{{ $menu['title'] }}" href="/category/{{ $menu['slug'] }}">{{ $menu['title'] }}</a></li>
            @endforeach
            <li class="dropdown"><a href="#">More</a>
                  <div class="dropdown-menu">
                    <ul>
                      @foreach($moremenus as $more) 
                        <li>
                          <a title="{{ $more['title'] }}" href="/category/{{ $more['slug'] }}">
                            {{ $more['title'] }}
                          </a>
                        </li>
                      @endforeach
                    </ul>
                  </div>
                </li>

            <li class="custom-link-right"><a href="/cart/checkout"> Checkout Now!</a></li>
          </ul>
        </div>
        </div>
      </nav>
    
    <!-- Main Menu End-->
  </div>
  <div id="container">
        @include('helpers.flasher')
        @include('errors.validation')
        @yield('content')
  </div>
  <!-- Feature Box Start-->
    <div class="container">
      <div class="custom-feature-box row">
        <div class="col-md-3 col-sm-6 col-xs-12">
           <img src="/image/featurebox/1-rectangular.jpg" style="margin-bottom: 20px;" alt="Free Shipping. Free shipping on order over P500.00" title="Free Shipping. Free shipping on order over P500.00">
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
           <img src="/image/featurebox/2-rectangular.jpg" style="margin-bottom: 20px;" alt="Free Return. Free return in 24 hour after purchasing." title="Free Return. Free return in 24 hour after purchasing.">
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
           <img src="/image/featurebox/3-rectangular.jpg" alt="Gift Cards. Give the special perfect gifts." title="Gift Cards. Give the special perfect gifts." style="margin-bottom: 20px;">
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
           <img src="/image/featurebox/4-rectangular.jpg" alt="Reward Points. Earn and spend with ease." title="Reward Points. Earn and spend with ease." style="margin-bottom: 20px;">
        </div>                
      </div>
    </div>
    <!-- Feature Box End-->
  <!--Footer Start-->
  <footer id="footer">
    <div class="fpart-first">
      <div class="container">
        <div class="row">
          <div class="contact col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <h5>About Tienda</h5>
            <p>Say goodbye to long queues in supermarkets, wave your farewell to heavy plastic bags, and most importantly, say hi to low prices. Tienda is an online grocery that delivers convenience into your life.</p>
            <a href="/"><img alt="" src="/image/logo-small.png"></a>
          </div>
          <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
            <h5>Information</h5>
            <ul>
              <li><a href="/about-us">About Us</a></li>
              <li><a href="/privacy-policy">Privacy Policy</a></li>
              <li><a href="/terms-and-conditions">Terms &amp; Conditions</a></li>
            </ul>
          </div>
          <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
            <h5>Customer Service</h5>
            <ul>
              <li><a href="/how-it-works">How It Works</a></li>
              <li><a href="/faq">FAQ</a></li>
              <li><a href="/contact-us">Contact Us</a></li>
              <!-- <li><a href="/sitemap">Sitemap</a></li> -->
            </ul>
          </div>
          <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
            <h5>Extras</h5>
            <ul>
              <li><a href="/suppliers">Suppliers</a></li>
             <!--  <li><a href="#">Gift Vouchers</a></li>
              <li><a href="#">Affiliates</a></li>
              <li><a href="#">Specials</a></li> -->
            </ul>
          </div>
          <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
            <h5>My Account</h5>
            <ul>
              <li><a href="/account">My Account</a></li>
              <li><a href="/order/history">Order History</a></li>
             <!--  <li><a href="javascript:;">Wish List</a></li>
              <li><a href="javascript:;">Newsletter</a></li> -->
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="fpart-second">
      <div class="container">
        <div id="powered" class="clearfix">
          <div class="powered_text pull-left flip">
            <p>Tienda - Your First Online Grocery in the Philippines © {{ date('Y') }}</p>
          </div>
          <div class="social pull-right flip"> 
                <a href="https://www.facebook.com/tiendadotph" target="_blank"> 
                    <img data-toggle="tooltip" src="/image/socialicons/facebook.png" alt="Facebook" title="Facebook">
                </a> 
              <!--   <a href="#" target="_blank"> 
                    <img data-toggle="tooltip" src="image/socialicons/twitter.png" alt="Twitter" title="Twitter"> 
                </a> --> <!-- 
                <a href="#" target="_blank"> 
                    <img data-toggle="tooltip" src="image/socialicons/google_plus.png" alt="Google+" title="Google+"> 
                </a>  -->
         <!--        <a href="#" target="_blank"> 
                    <img data-toggle="tooltip" src="image/socialicons/pinterest.png" alt="Pinterest" title="Pinterest"> 
                </a>  -->
                <a href="#" target="_blank"> 
                    <img data-toggle="tooltip" src="/image/socialicons/rss.png" alt="RSS" title="RSS"> 
                </a> 
            </div>
        </div>
        <div class="bottom-row">
          <div class="custom-text text-center">
            <p>If you are not 100% satisfied with your purchase, you can call us at +63 9258166813 for a full refund. <br />We believe that in order to have the best possible online shopping experience, our customers should not be bothered returning the product, <br />so you can just contact us and we will get your purchase and deliver your refund to your doorstep.</p>
          </div>
          <div class="payments_types"> <a href="#" target="_blank"> <img data-toggle="tooltip" src="/image/payment/payment_paypal.png" alt="paypal" title="PayPal"></a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="/image/payment/payment_american.png" alt="american-express" title="American Express"></a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="/image/payment/payment_2checkout.png" alt="2checkout" title="2checkout"></a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="/image/payment/payment_maestro.png" alt="maestro" title="Maestro"></a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="/image/payment/payment_discover.png" alt="discover" title="Discover"></a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="/image/payment/payment_mastercard.png" alt="mastercard" title="MasterCard"></a> </div>
        </div>
      </div>
    </div>
    <div id="back-top"><a data-toggle="tooltip" title="Back to Top" href="javascript:void(0)" class="backtotop"><i class="fa fa-chevron-up"></i></a></div>
  </footer>
  <!--Footer End-->
  <!-- Twitter Side Block Start --><!-- 
  <div id="twitter_footer" class="twit-right sort-order-1">
    <div class="twitter_icon"><i class="fa fa-twitter"></i></div>
    <a class="twitter-timeline" href="https://twitter.com/" data-chrome="nofooter noscrollbar transparent" data-theme="light" data-tweet-limit="2" data-related="twitterapi,twitter" data-aria-polite="assertive" data-widget-id="347621595801608192">Tweets by @</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </div> -->
  <!-- Twitter Side Block End -->
  <!-- Facebook Side Block Start -->
  <div id="facebook" class="fb-right sort-order-2">
    <div class="facebook_icon"><i class="fa fa-facebook"></i></div>
    <div class="fb-page" data-href="https://www.facebook.com/tiendadotph/" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true" data-show-posts="false">
      <div class="fb-xfbml-parse-ignore">
        <blockquote cite="https://www.facebook.com/tiendadotph/"><a href="https://www.facebook.com/tiendadotph/">Tienda</a></blockquote>
      </div>
    </div>
    <div id="fb-root"></div>
      <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      </script>
  </div>
  <!-- Facebook Side Block End -->

</div>
<!-- JS Part Start-->
<script type="text/javascript" src="/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/map.js"></script>

<script type="text/javascript" src="/js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="/js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/js/contact.js"></script>
<script type="text/javascript" src="/js/custom.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $.ajaxPrefilter(function( options, originalOptions, jqXHR ) {
        options.async = true;
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

    //setup before functions
    var typingTimer;                //timer identifier
    var doneTypingInterval = 500;  //time in ms (5 seconds)

    $('#search-form').find('input[name=term]').keyup(function(){

      $('#search-result-suggestion li').remove();
      clearTimeout(typingTimer);
      if ($(this).val() != '') {
          typingTimer = setTimeout(doneTyping($(this).val()), doneTypingInterval);
      }

    });

    //user is "finished typing," do something
    function doneTyping ( txt ) {
      
      var ul = $('#search-result-suggestion');

      if(txt == ''){
        return false;
      }

      var request = $.ajax({
          url : '/load-suggestion?term=' + txt,
          dataType: 'json',
      }).done(function (data) {
          if(data['total'] > 0){
            $('#search-result-suggestion li').remove();
            ul.append(data['items']);
            // console.log(data['items']);
          }
      }).fail(function () {
          console.log("failed to send request");
      });
      // console.log(getSuggestions($(this).val()));
    }

    $('#search-form').focusout(function(){
      if(!$('#search-result-suggestion').is(':hover')){
        $('#search-result-suggestion li').remove();
      }
    });

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
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1679290829049061');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1679290829049061&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->
</body>
</html>