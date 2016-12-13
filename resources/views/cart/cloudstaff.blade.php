<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="/image/favicon.ico" rel="icon" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta property="og:site_name" content="Tienda - Online Grocery in Pampanga" />
<meta property="og:title" content="Tienda - Online shopping in Pampanga" />
<meta property="og:image" content="image/banner/meta-image.jpg" />

<meta property="og:url" content="http://www.tienda.ph/">
<meta property="og:description" content="First Online Grocery Shopping in Pampanga & Philippines offering the lowest prices." />

<meta name="description" content="Pampanga online grocery delivery service, Tienda, first in the Philippines. Order now!"/>


<title>Tienda - Pampanga Online Grocery, First in the Pilippines</title>

<!-- CSS Part Start-->
<link rel="stylesheet" type="text/css" href="/js/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/css/notify.css">
<link rel="stylesheet" type="text/css" href="/css/prettify.css">
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


<style type="text/css">
.order-steps .circle-no { width:28px;line-height:1.4;color:#fff;float:left;margin-bottom:0;border-radius:49%;font-size:20px;background-color:#ae242a;text-align:center }
.keep-simple {font-family:open_sanssemibold}
.step-text {font-family:open_sansbold;font-size:16px;line-height:2}

.pointer1,.pointer2,.pointer3{width:75px;position:absolute;right:-25px}
.pointer1,.pointer3{top:-18px}
.pointer2{top:25px;transform:rotateX(180deg);-webkit-transform:rotateX(180deg)}

.pointer3{right:-65px}

.greentext {
    color: #2c982c;
}

  </style>


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
  <div id="header" class="navbar-fixed-top" style="position: fixed;">
    <!-- Top Bar End-->
    <!-- Header Start-->
    <header class="header-row" style="padding-top: 5px; padding-bottom: 5px;">
      <div class="container">
        <div class="table-container">
          <!-- Logo Start -->
          <div class="col-table-cell col-lg-6 col-md-6 col-sm-12 col-xs-12 inner">
            <div id="logo"><a href="/"><img style="height: 60px;" class="img-responsive" src="/image/logo.png" title="Tienda" alt="Tienda - Online Grocery & Delivery in Pampanga" /></a></div>
          </div>
          <!-- Logo End -->
          <!-- Mini Cart Start-->
          <div class="col-table-cell col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right" id="minicart-container">
                <!--  <form class="form-inline">
  <div class="form-group">
    <input type="text" class="form-control" id="exampleInputName2" placeholder="Enter your name here">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form> -->

<img style="height: 60px; margin: auto;" class="img-responsive" src="/image/cloudstaff-logo.png"  />


          </div>
        </div>
      </div>
    </header>
    <!-- Header End-->
    <!-- Main Menu Start-->
    
   
    
    <!-- Main Menu End-->
  </div>
  <div id="container" style="padding-top: 100px;">
        @include('helpers.flasher')
        @include('errors.validation')
        <!-- @yield('content') -->

      <div class="container">

          <div class="row visible-desktop">
            <img src="/image/infographic.jpg" alt="how to order" class="img-responsive" style="margin:auto; " />
          </div>
          <hr />
          <div class="row">
            <div class="col-md-6 col-sm-12">
                <img class="checkbox img-responsive" src="/image/product/featured/2823.jpg" alt="Chicken Cordon Bleu" />
                <div class="row">
                    <h2 class="col-xs-6" style="    margin-top: 0;
    font-size: 20px;
    font-weight: bold;
    padding-left: 20px;">
                        Chicken Cordon Bleu
                    </h2>
                    <p class="col-xs-6 price" style="padding-right: 25px; text-align: right; font-size: 20px; font-weight: bold;">
                        P89.00
                    </p>
                </div>

                <p class="col-md-12" style="padding-left: 5px; padding-right: 5px;">
                  Bringing a French classic to everyone's meal. Ham and cheese wrapped delicately in a finely prepared chicken rolled in breading, this meal will surprise you with each bite as it reveals the glazed soft flavore hidden from within. A perfect source of protein.
                </p>
            </div>

            <div class="col-md-6 col-sm-12">
                <img class="checkbox img-responsive" src="/image/product/featured/2823.jpg" alt="Morcon & Salad" />
                <div class="row">
                    <h2 class="col-xs-6" style="    margin-top: 0;
    font-size: 20px;
    font-weight: bold;
    padding-left: 20px;">
                        Morcon & Salad
                    </h2>
                    <p class="col-xs-6 price" style="padding-right: 25px; text-align: right; font-size: 20px; font-weight: bold;">
                        P89.00
                    </p>
                </div>

                <p class="col-md-12" style="padding-left: 5px; padding-right: 5px;">
                  This different take on morcon will flood your mouth with the most delicious taste a food can give. It's tender ground pork riddled with different vegetables steamed under low heat for hours will definitely fill your belly with happiness.
                </p>
            </div>

          </div>

           <div class="row">
            <div class="col-md-6 col-sm-12">
                <img class="checkbox img-responsive" src="/image/product/featured/2823.jpg" alt="Crab Stick Temaki" />
                <div class="row">
                    <h2 class="col-xs-6" style="    margin-top: 0;
    font-size: 20px;
    font-weight: bold;
    padding-left: 20px;">
                        Crab Stick Temaki
                    </h2>
                    <p class="col-xs-6 price" style="padding-right: 25px; text-align: right; font-size: 20px; font-weight: bold;">
                        P59.00
                    </p>
                </div>

                <p class="col-md-12" style="padding-left: 5px; padding-right: 5px;">
                  A healthy meal for people who are always on the go. This Japanese food is wrapped in nori, which is a nutritious seaweed product. Inside you will savor a mixed delight of mango, cucumber, carrot, and lettuce with rice.
                </p>
            </div>

            <div class="col-md-6 col-sm-12">
                <img class="checkbox img-responsive" src="/image/product/featured/2823.jpg" alt="Maki Rolls 8pcs" />
                <div class="row">
                    <h2 class="col-xs-6" style="    margin-top: 0;
    font-size: 20px;
    font-weight: bold;
    padding-left: 20px;">
                        Maki Rolls 8pcs
                    </h2>
                    <p class="col-xs-6 price" style="padding-right: 25px; text-align: right; font-size: 20px; font-weight: bold;">
                        P89.00
                    </p>
                </div>

                <p class="col-md-12" style="padding-left: 5px; padding-right: 5px;">
                  A traditional Japanese food with a hint of Filipino taste. Maki with fresh cucumber and mango bundled with crab meat, wrapped in glistening Japanese rice and rolled in healthy nori, made of nutritious seaweed. Perfect for people who are shying away from red meat.
                </p>
            </div>

          </div>

           <div class="row">
            <div class="col-md-6 col-sm-12">
                <img class="checkbox img-responsive" src="/image/product/featured/2823.jpg" alt="Kimchi" />
                <div class="row">
                    <h2 class="col-xs-6" style="    margin-top: 0;
    font-size: 20px;
    font-weight: bold;
    padding-left: 20px;">
                        Kimchi
                    </h2>
                    <p class="col-xs-6 price" style="padding-right: 25px; text-align: right; font-size: 20px; font-weight: bold;">
                        P70.00
                    </p>
                </div>

                <p class="col-md-12" style="padding-left: 5px; padding-right: 5px;">
                  Order 60 grams of kimchi in Angeles City through Tienda and savor the taste of this traditional Korean side dish that many Filipinos enjoy with their meals. Made from fresh ingredients and seasonings imported from South Korea, this delectable side dish will surely make your day more "hotter".
                </p>
            </div>

           

          </div>

          <hr>
     <div class="row">

        <form class="form-inline" style=" font-size: 2em; display: block;text-align: center;">
          <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Enter your name here">
          </div>
          <div class="form-group">
            <select class="form-control" name="branch">
              <option value="SM City Clark">SM City Clark</option>
              <option value="New Street">New Street</option>
              <option value="Living Rock 1">Living Rock 1</option>
              <option value="Living Rock 2">Living Rock 2</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Order</button>
        </form>
     </div>


     </div>

        <!-- end content -->
  </div>

  <!--Footer Start-->
  <footer id="footer">
    <div class="fpart-first">
      <div class="container">
        <div class="row">
          <div class="contact col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <h5>About Tienda</h5>

            <p>
            Your online grocery delivery service in Pampanga is here to help you say good bye to long queues in supermarkets. Say hi to low prices and convenience! Tienda is an online grocery service that also delivers goods straight to your doorsteps.
            </p>
            <a href="/"><img alt="Tienda - Online Grocery & Delivery in Pampanga" src="/image/logo-small.png"></a>
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
<script type="text/javascript" src="/js/notify.js"></script>
<script type="text/javascript" src="/js/prettify.js"></script>
<script type="text/javascript" src="/js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="/js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/js/contact.js"></script>
<script type="text/javascript" src="/js/custom.js"></script>
<script type="text/javascript" src="/js/jquery.jscroll.min.js"></script>
<script type="text/javascript" src="/js/jquery.imgcheckbox.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

    $("img.checkbox").imgCheckbox({
        onload: function(){
          // Do something fantastic!
        }
    });

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