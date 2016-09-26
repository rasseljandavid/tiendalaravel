<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="image/favicon.ico" rel="icon" />
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
<link rel='stylesheet' href='//fonts.googleapis.com/css?family=Droid+Sans' type='text/css'>
<!-- CSS Part End-->
</head>
<body>
<div class="wrapper-wide">
  <div id="header">
    <!-- Top Bar Start-->
    <nav id="top" class="htop">
      <div class="container">
        <div class="row"> <span class="drop-icon visible-sm visible-xs"><i class="fa fa-align-justify"></i></span>
          <div class="pull-left flip left-top">
            <div class="links">
              <ul>
                <li class="mobile"><i class="fa fa-phone"></i>+63 9258166813</li>
                <li class="email"><a href="mailto:hello@tienda.ph"><i class="fa fa-envelope"></i>hello@tienda.ph</a></li>

                <!-- <li class="wrap_custom_block hidden-sm hidden-xs"><a>Custom Block<b></b></a>
                  <div class="dropdown-menu custom_block">
                    <ul>
                      <li>
                        <table>
                          <tbody>
                            <tr>
                              <td><img alt="" src="image/banner/cms-block.jpg"></td>
                              <td><img alt="" src="image/banner/responsive.jpg"></td>
                            </tr>
                            <tr>
                              <td><h4>CMS Blocks</h4></td>
                              <td><h4>Responsive Template</h4></td>
                            </tr>
                            <tr>
                              <td>This is a CMS block. You can insert any content (HTML, Text, Images) Here.</td>
                              <td>This is a CMS block. You can insert any content (HTML, Text, Images) Here.</td>
                            </tr>
                            <tr>
                              <td><strong><a class="btn btn-default btn-sm" href="#">Read More</a></strong></td>
                              <td><strong><a class="btn btn-default btn-sm" href="#">Read More</a></strong></td>
                            </tr>
                          </tbody>
                        </table>
                      </li>
                    </ul>
                  </div>
                </li> -->
              </ul>
            </div>
            <div id="language" class="btn-group">
              <button class="btn-link dropdown-toggle" data-toggle="dropdown"> <span> <img src="/image/flags/ph.png" alt="English" title="English">Philippines</button>
            </div>
            <div id="currency" class="btn-group">
              <button class="btn-link dropdown-toggle" data-toggle="dropdown"> <span> &#8369; Peso</span></button>
            </div>
          </div>
          <div id="top-links" class="nav pull-right flip">
            <ul>
              <li><a href="login.html">Login</a></li>
              <li><a href="register.html">Register</a></li>
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
          <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div id="cart">
              <button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="heading dropdown-toggle">
              
              <span id="cart-total">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              2 item(s) - $1,132.00</span></button>
              <ul class="dropdown-menu">
                <li>
                  <table class="table">
                    <tbody>
                      <tr>
                        <td class="text-center"><a href="product.html"><img class="img-thumbnail" title="Xitefun Causal Wear Fancy Shoes" alt="Xitefun Causal Wear Fancy Shoes" src="/image/product/sony_vaio_1-50x75.jpg"></a></td>
                        <td class="text-left"><a href="product.html">Xitefun Causal Wear Fancy Shoes</a></td>
                        <td class="text-right">x 1</td>
                        <td class="text-right">$902.00</td>
                        <td class="text-center"><button class="btn btn-danger btn-xs remove" title="Remove" onClick="" type="button"><i class="fa fa-times"></i></button></td>
                      </tr>
                      <tr>
                        <td class="text-center"><a href="product.html"><img class="img-thumbnail" title="Aspire Ultrabook Laptop" alt="Aspire Ultrabook Laptop" src="/image/product/samsung_tab_1-50x75.jpg"></a></td>
                        <td class="text-left"><a href="product.html">Aspire Ultrabook Laptop</a></td>
                        <td class="text-right">x 1</td>
                        <td class="text-right">$230.00</td>
                        <td class="text-center"><button class="btn btn-danger btn-xs remove" title="Remove" onClick="" type="button"><i class="fa fa-times"></i></button></td>
                      </tr>
                    </tbody>
                  </table>
                </li>
                <li>
                  <div>
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <td class="text-right"><strong>Sub-Total</strong></td>
                          <td class="text-right">$940.00</td>
                        </tr>
                        <tr>
                          <td class="text-right"><strong>Eco Tax (-2.00)</strong></td>
                          <td class="text-right">$4.00</td>
                        </tr>
                        <tr>
                          <td class="text-right"><strong>VAT (20%)</strong></td>
                          <td class="text-right">$188.00</td>
                        </tr>
                        <tr>
                          <td class="text-right"><strong>Total</strong></td>
                          <td class="text-right">$1,132.00</td>
                        </tr>
                      </tbody>
                    </table>
                    <p class="checkout"><a href="/cart/show" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> View Cart</a>&nbsp;&nbsp;&nbsp;<a href="/cart/checkout" class="btn btn-primary"><i class="fa fa-share"></i> Checkout</a></p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <!-- Mini Cart End-->
          <!-- Search Start-->
          <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
            <div id="search" class="input-group">
              <input id="filter_name" type="text" name="search" value="" placeholder="Search" class="form-control input-lg" />
              <button type="button" class="button-search"><i class="fa fa-search"></i></button>
            </div>
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
            <li class="dropdown"><a href="category.html">Fashion</a>
              <div class="dropdown-menu">
              <ul>
                      <li><a href="category.html">Men <span>&rsaquo;</span></a>
                        <div class="dropdown-menu">
                          <ul>
                            <li><a href="category.html">Sub Categories </a> </li>
                            <li><a href="category.html">Sub Categories </a> </li>
                            <li><a href="category.html">Sub Categories </a> </li>
                            <li><a href="category.html">Sub Categories </a> </li>
                            <li><a href="category.html">Sub Categories New </a> </li>
                          </ul>
                        </div>
                      </li>
                      <li><a href="category.html" >Women</a> </li>
                      <li><a href="category.html">Girls<span>&rsaquo;</span></a>
                        <div class="dropdown-menu">
                          <ul>
                            <li><a href="category.html">Sub Categories </a></li>
                            <li><a href="category.html">Sub Categories New</a></li>
                            <li><a href="category.html">Sub Categories New</a></li>
                          </ul>
                        </div>
                      </li>
                      <li><a href="category.html">Boys</a></li>
                      <li><a href="category.html">Baby</a></li>
                      <li><a href="category.html">Accessories <span>&rsaquo;</span></a>
                        <div class="dropdown-menu">
                          <ul>
                            <li><a href="category.html">New Sub Categories</a></li>
                          </ul>
                        </div>
                      </li>
                    </ul>
              </div>
            </li>
            <li class="dropdown"> <a href="category.html">Electronics</a>
                  <div class="dropdown-menu">
                    <ul>
                      <li> <a href="category.html">Laptops <span>&rsaquo;</span></a>
                        <div class="dropdown-menu">
                          <ul>
                            <li> <a href="category.html">New Sub Categories </a> </li>
                            <li> <a href="category.html">New Sub Categories </a> </li>
                            <li> <a href="category.html">Sub Categories New </a> </li>
                          </ul>
                        </div>
                      </li>
                      <li> <a href="category.html">Desktops <span>&rsaquo;</span></a>
                        <div class="dropdown-menu">
                          <ul>
                            <li> <a href="category.html">New Sub Categories </a> </li>
                            <li> <a href="category.html">Sub Categories New </a> </li>
                            <li> <a href="category.html">Sub Categories New </a> </li>
                          </ul>
                        </div>
                      </li>
                      <li> <a href="category.html">Cameras <span>&rsaquo;</span></a>
                        <div class="dropdown-menu">
                          <ul>
                            <li> <a href="category.html">New Sub Categories</a></li>
                          </ul>
                        </div>
                      </li>
                      <li><a href="category.html">Mobile Phones <span>&rsaquo;</span></a>
                        <div class="dropdown-menu">
                          <ul>
                            <li><a href="category.html">New Sub Categories</a></li>
                            <li><a href="category.html">New Sub Categories</a></li>
                          </ul>
                        </div>
                      </li>
                      <li><a href="category.html">TV &amp; Home Audio <span>&rsaquo;</span></a>
                        <div class="dropdown-menu">
                          <ul>
                            <li><a href="category.html">New Sub Categories </a> </li>
                            <li><a href="category.html">Sub Categories New </a> </li>
                          </ul>
                        </div>
                      </li>
                      <li><a href="category.html">MP3 Players</a> </li>
                    </ul>
                  </div>
                </li>
                <li class="dropdown"><a href="category.html">Shoes</a>
                  <div class="dropdown-menu">
                    <ul>
                      <li><a href="category.html">Men</a> </li>
                      <li><a href="category.html">Women <span>&rsaquo;</span></a>
                        <div class="dropdown-menu">
                          <ul>
                            <li><a href="category.html">New Sub Categories </a> </li>
                            <li><a href="category.html">Sub Categories </a> </li>
                          </ul>
                        </div>
                      </li>
                      <li><a href="category.html">Girls</a> </li>
                      <li><a href="category.html">Boys</a> </li>
                      <li><a href="category.html">Baby</a> </li>
                      <li><a href="category.html">Accessories <span>&rsaquo;</span></a>
                        <div class="dropdown-menu">
                          <ul>
                            <li><a href="category.html">New Sub Categories</a></li>
                            <li><a href="category.html">New Sub Categories</a></li>
                            <li><a href="category.html">Sub Categories</a></li>
                          </ul>
                        </div>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="dropdown"> <a href="category.html">Watches</a>
                  <div class="dropdown-menu">
                    <ul>
                      <li> <a href="category.html">Men's Watches</a></li>
                      <li> <a href="category.html">Women's Watches</a></li>
                      <li> <a href="category.html">Kids' Watches</a></li>
                      <li> <a href="category.html">Accessories</a></li>
                    </ul>
                  </div>
                </li>
                <li class="dropdown"><a href="category.html">Health &amp; Beauty</a>
                  <div class="dropdown-menu">
                    <ul>
                      <li> <a href="category.html">Perfumes</a></li>
                      <li> <a href="category.html">Makeup</a></li>
                      <li> <a href="category.html">Sun Care</a></li>
                      <li> <a href="category.html">Skin Care</a></li>
                      <li> <a href="category.html">Eye Care</a></li>
                      <li> <a href="category.html">Hair Care</a></li>
                    </ul>
                  </div>
                </li>
            <li class="menu_brands dropdown"><a href="#">Brands</a>
              <div class="dropdown-menu">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="image/product/apple_logo-60x60.jpg" title="Apple" alt="Apple" /></a><a href="#">Apple</a></div>
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="image/product/canon_logo-60x60.jpg" title="Canon" alt="Canon" /></a><a href="#">Canon</a></div>
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"> <a href="#"><img src="image/product/hp_logo-60x60.jpg" title="Hewlett-Packard" alt="Hewlett-Packard" /></a><a href="#">Hewlett-Packard</a></div>
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="image/product/htc_logo-60x60.jpg" title="HTC" alt="HTC" /></a><a href="#">HTC</a></div>
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="image/product/palm_logo-60x60.jpg" title="Palm" alt="Palm" /></a><a href="#">Palm</a></div>
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="image/product/sony_logo-60x60.jpg" title="Sony" alt="Sony" /></a><a href="#">Sony</a> </div>
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="image/product/canon_logo-60x60.jpg" title="test" alt="test" /></a><a href="#">test</a> </div>
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="image/product/apple_logo-60x60.jpg" title="test 3" alt="test 3" /></a><a href="#">test 3</a></div>
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="image/product/canon_logo-60x60.jpg" title="test 5" alt="test 5" /></a><a href="#">test 5</a> </div>
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="image/product/canon_logo-60x60.jpg" title="test 6" alt="test 6" /></a><a href="#">test 6</a></div>
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="image/product/apple_logo-60x60.jpg" title="test 7" alt="test 7" /></a><a href="#">test 7</a> </div>
                
                
              </div>
            </li>
            <li class="dropdown wrap_custom_block hidden-sm hidden-xs"><a>Custom Block</a>
              <div class="dropdown-menu custom_block">
                <ul>
                  <li>
                    <table>
                      <tbody>
                        <tr>
                          <td><img alt="" src="image/banner/cms-block.jpg"></td>
                          <td><img alt="" src="image/banner/responsive.jpg"></td>
                          <td><img alt="" src="image/banner/cms-block.jpg"></td>
                        </tr>
                        <tr>
                          <td><h4>CMS Blocks</h4></td>
                          <td><h4>Responsive Template</h4></td>
                          <td><h4>Dedicated Support</h4></td>
                        </tr>
                        <tr>
                          <td>This is a CMS block. You can insert any content (HTML, Text, Images) Here.</td>
                          <td>This is a CMS block. You can insert any content (HTML, Text, Images) Here.</td>
                          <td>This is a CMS block. You can insert any content (HTML, Text, Images) Here.</td>
                        </tr>
                        <tr>
                          <td><strong><a class="btn btn-primary btn-sm" href="#">Read More</a></strong></td>
                          <td><strong><a class="btn btn-primary btn-sm" href="#">Read More</a></strong></td>
                          <td><strong><a class="btn btn-primary btn-sm" href="#">Read More</a></strong></td>
                        </tr>
                      </tbody>
                    </table>
                  </li>
                </ul>
              </div>
            </li>
            <li class="dropdown information-link"><a>Pages</a>
              <div class="dropdown-menu">
                <ul>
                  <li><a href="login.html">Login</a></li>
                  <li><a href="register.html">Register</a></li>
                  <li><a href="category.html">Category (Grid/List)</a></li>
                  <li><a href="product.html">Product</a></li>
                  <li><a href="cart.html">Shopping Cart</a></li>
                  <li><a href="checkout.html">Checkout</a></li>
                  <li><a href="compare.html">Compare</a></li>
                  <li><a href="wishlist.html">Wishlist</a></li>
                  <li><a href="search.html">Search</a></li>
                </ul>
                <ul>
                  <li><a href="about-us.html">About Us</a></li>
                  <li><a href="404.html">404</a></li>
                  <li><a href="elements.html">Elements</a></li>
                  <li><a href="faq.html">Faq</a></li>
                  <li><a href="sitemap.html">Sitemap</a></li>
                  <li><a href="contact-us.html">Contact Us</a></li>
                </ul>
              </div>
            </li>
            <li class="custom-link-right"><a href="#" target="_blank"> Buy Now!</a></li>
          </ul>
        </div>
        </div>
      </nav>
    
    <!-- Main Menu End-->
  </div>
  <div id="container">
        @yield('content')
  </div>
  <!-- Feature Box Start-->
    <div class="container">
      <div class="custom-feature-box row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="feature-box fbox_1">
            <div class="title">Free Shipping</div>
            <p>Free shipping on order over &#8369;500.00</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="feature-box fbox_2">
            <div class="title">Free Return</div>
            <p>Free return in 24 hour after purchasing</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="feature-box fbox_3">
            <div class="title">Gift Cards</div>
            <p>Give the special perfect gift</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="feature-box fbox_4">
            <div class="title">Reward Points</div>
            <p>Earn and spend with ease</p>
          </div>
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
              <li><a href="sitemap.html">Contact Us</a></li>
            </ul>
          </div>
          <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
            <h5>Extras</h5>
            <ul>
              <li><a href="#">Brands</a></li>
              <li><a href="#">Gift Vouchers</a></li>
              <li><a href="#">Affiliates</a></li>
              <li><a href="#">Specials</a></li>
            </ul>
          </div>
          <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
            <h5>My Account</h5>
            <ul>
              <li><a href="#">My Account</a></li>
              <li><a href="#">Order History</a></li>
              <li><a href="#">Wish List</a></li>
              <li><a href="#">Newsletter</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="fpart-second">
      <div class="container">
        <div id="powered" class="clearfix">
          <div class="powered_text pull-left flip">
            <p>Tienda - Your First Online Grocery in the Philippines © {{ date('Y') }} | Developed By <a href="http://nextvation.com" target="_blank">Nextvation</a></p>
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
}(document, 'script', 'facebook-jssdk'));</script>
  </div>
  <!-- Facebook Side Block End -->
</div>
<!-- JS Part Start-->
<script type="text/javascript" src="/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="/js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/js/custom.js"></script>
<!-- JS Part End-->

</body>
</html>