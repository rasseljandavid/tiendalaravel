@extends('layouts.app')

@section('metainfo')
	<title>FAQ : Tienda -Your First Online Grocery in the Philippines</title>
  <meta name="description" content="FAQ : Tienda -Your First Online Grocery in the Philippines">
@endsection

@section('content')
    
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li><a href="/faq">FAQ</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title">Help &amp; FAQ</h1>
          <div class="row">
            <div class="col-sm-3">
              <h3>My Account &amp; My Orders</h3>
            </div>
            <div class="col-sm-9">
              <div class="faq">
                <div> <a href="#faq1" data-parent="#accordion" data-toggle="collapse" class="panel-title">What is 'My Account'? How do I update my information ? <i class="fa fa-caret-down"></i></a>
                  <div id="faq1" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>
                        My account is a profile page where you can see your information such as firstname, lastname, contact and email address. You can also change your password together with your billing and shipping address.
                      </p>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq2" data-parent="#accordion" data-toggle="collapse" class="panel-title">I forgot my password, Can I get it from you? <i class="fa fa-caret-down"></i></a>
                  <div id="faq2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            Your password are encrypted using bcrypt cryptographic algorithm. Meaning, even if we store your password in our database we can't convert them back to plain text format for security reason. However, you can always use <a href="/password/reset">forgot my password</a> page so that you can set your new password if you forgot your old one.
                        </p>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq3" data-parent="#accordion" data-toggle="collapse" class="panel-title"> How do I know my order has been confirmed? <i class="fa fa-caret-down"></i></a>
                  <div id="faq3" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>
                        You will received a confirmation email with your invoice. You can also check your order in the <a href="/order/history">order history</a> page. If you are a first time customer, expect a call from us so that we can verify your address and your availability to receive the order.
                      </p>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq4" data-parent="#accordion" data-toggle="collapse" class="panel-title">Can I order a product that is 'Out of Stock'? <i class="fa fa-caret-down"></i></a>
                  <div id="faq4" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>
                        What you see is what you get. To provide an <strong>exceptional customer service</strong>, we only display the products that are available in our warehouse. Furthermore, almost everyday there are deliveries from our suppliers, so a product that is out of stock now doesn't necessary mean its still in the next hour. 
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h3>Shopping</h3>
            </div>
            <div class="col-sm-9">
              <div class="faq">
                <div> <a href="#faq5" data-parent="#accordion" data-toggle="collapse" class="panel-title">I'm curious about the quality of your products. With a very low prices, is there any chance that they are near in expiration? <i class="fa fa-caret-down"></i></a>
                  <div id="faq5" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            We ensure you that all our products are in same quality as with any supermarket out there. It is because we only have the same suppliers in most cases. We also have a <strong>NO QUESTIONS ASKED RETURN POLICY</strong>, meaning if you received your order  without satisfaction, you can always return them to our friendly logistics who are more happy to accept them back.
                        </p>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq7" data-parent="#accordion" data-toggle="collapse" class="panel-title">Is it necessary to have an account to shop on Tienda.ph? <i class="fa fa-caret-down"></i></a>
                  <div id="faq7" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                          Yes because we need your address and contact information to delivery your order. We don't believe in guest checkout because we are here for the long term and our mission is to remove the "<a href="http://www.thekitchn.com/10-annoying-that-always-happen-when-youre-grocery-shopping-196839" target="_blank">10 Annoying Things That Happen When You're Grocery Shopping</a>" in your life.
                        </p>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq8" data-parent="#accordion" data-toggle="collapse" class="panel-title">What is the minimum order that I can place? Are there any hidden charges? <i class="fa fa-caret-down"></i></a>
                  <div id="faq8" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            There is no minimum order that you can place in Tienda.ph although we encourage you to target the P500.00 mark so that you don't have to pay the P50.00 shipping fee. <span style="text-decoration: line-through;">Hidden charges?</span> There is no such thing in our vocabulary.
                        </p>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq9" data-parent="#accordion" data-toggle="collapse" class="panel-title">What is Tienda Points? <i class="fa fa-caret-down"></i></a>
                  <div id="faq9" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                          How did you know that? Tienda points are being accumulated everytime you order from our site. You can use those points in our secret program (or is it?) to be launch soon. If you ever use advantage card or other similar products, you already had a glimpse of its power.
                        </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h3>Payments</h3>
            </div>
            <div class="col-sm-9">
              <div class="faq">
                <div> <a href="#faq10" data-parent="#accordion" data-toggle="collapse" class="panel-title">How do I pay for a purchase? <i class="fa fa-caret-down"></i></a>
                  <div id="faq10" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                          <li>Cash on Delivery</li>
                          <li>Paypal and Credit Cards (Soon)</li>
                          <li>Tienda Points (Soon)</li>
                        </ul>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq12" data-parent="#accordion" data-toggle="collapse" class="panel-title">What is Cash on Delivery? <i class="fa fa-caret-down"></i></a>
                  <div id="faq12" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            Its a mode of payment where you pay in cash to our logistics when they delivery your order.
                        </p>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq13" data-parent="#accordion" data-toggle="collapse" class="panel-title">How do I pay using a credit/debit card? <i class="fa fa-caret-down"></i></a>
                  <div id="faq13" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            For your security purposes, we chose Paypal - World's Leading Digital Payments Company. In the checkout page, you can choose the paypal method and you will be redirected to their site where you can make your payments.
                        </p>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq14" data-parent="#accordion" data-toggle="collapse" class="panel-title">Is it safe to use my credit/debit card on this store? <i class="fa fa-caret-down"></i></a>
                  <div id="faq14" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                          You don't use it in our site. You will be using it in Paypal.
                        </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr><!-- 
          <div class="row">
            <div class="col-sm-3">
              <h3>Gift Voucher</h3>
            </div>
            <div class="col-sm-9">
              <div class="faq">
                <div> <a href="#faq21" data-parent="#accordion" data-toggle="collapse" class="panel-title">How do I buy/gift an e-Gift Voucher? <i class="fa fa-caret-down"></i></a>
                  <div id="faq21" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, sollicitudin eu, vehicula venenatis, tempor vitae, est. Praesent vitae dui. Morbi id tellus. Nullam ac nisi non eros gravida venenatis. Ut euismod, turpis sollicitudin lobortis pellentesque, libero massa dapibus dui, eu.</div>
                  </div>
                </div>
                <div> <a href="#faq22" data-parent="#accordion" data-toggle="collapse" class="panel-title">How do I make a purchase with an e-Gift Voucher? <i class="fa fa-caret-down"></i></a>
                  <div id="faq22" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, sollicitudin eu, vehicula venenatis, tempor vitae, est. Praesent vitae dui. Morbi id tellus. Nullam ac nisi non eros gravida venenatis. Ut euismod, turpis sollicitudin lobortis pellentesque, libero massa dapibus dui, eu.</div>
                  </div>
                </div>
                <div> <a href="#faq23" data-parent="#accordion" data-toggle="collapse" class="panel-title">Does an e-Gift Voucher expire? <i class="fa fa-caret-down"></i></a>
                  <div id="faq23" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, sollicitudin eu, vehicula venenatis, tempor vitae, est. Praesent vitae dui. Morbi id tellus. Nullam ac nisi non eros gravida venenatis. Ut euismod, turpis sollicitudin lobortis pellentesque, libero massa dapibus dui, eu.</div>
                  </div>
                </div>
                <div> <a href="#faq24" data-parent="#accordion" data-toggle="collapse" class="panel-title">Can I use promotional codes with e-Gift Vouchers? <i class="fa fa-caret-down"></i></a>
                  <div id="faq24" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, sollicitudin eu, vehicula venenatis, tempor vitae, est. Praesent vitae dui. Morbi id tellus. Nullam ac nisi non eros gravida venenatis. Ut euismod, turpis sollicitudin lobortis pellentesque, libero massa dapibus dui, eu.</div>
                  </div>
                </div>
                <div> <a href="#faq25" data-parent="#accordion" data-toggle="collapse" class="panel-title">Is there a limit on how many e-Gift vouchers I can use on a single order? <i class="fa fa-caret-down"></i></a>
                  <div id="faq25" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, sollicitudin eu, vehicula venenatis, tempor vitae, est. Praesent vitae dui. Morbi id tellus. Nullam ac nisi non eros gravida venenatis. Ut euismod, turpis sollicitudin lobortis pellentesque, libero massa dapibus dui, eu.</div>
                  </div>
                </div>
                <div> <a href="#faq26" data-parent="#accordion" data-toggle="collapse" class="panel-title">What Terms & Conditions apply to e-Gift Vouchers? <i class="fa fa-caret-down"></i></a>
                  <div id="faq26" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, sollicitudin eu, vehicula venenatis, tempor vitae, est. Praesent vitae dui. Morbi id tellus. Nullam ac nisi non eros gravida venenatis. Ut euismod, turpis sollicitudin lobortis pellentesque, libero massa dapibus dui, eu.</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr> -->
          <div class="row">
            <div class="col-sm-3">
              <h3>Order Status</h3>
            </div>
            <div class="col-sm-9">
              <div class="faq">
                <div> <a href="#faq27" data-parent="#accordion" data-toggle="collapse" class="panel-title">How do I check the current status of my orders? <i class="fa fa-caret-down"></i></a>
                  <div id="faq27" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                          You can check your order status in your <a href="/order/history">order history page</a>. You can also use our <a href="/contact-us">contact page</a> to connect with us.
                        </p>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq28" data-parent="#accordion" data-toggle="collapse" class="panel-title">What do the different order status mean? <i class="fa fa-caret-down"></i></a>
                  <div id="faq28" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                          <li>Processing - We are currently preparing your order in our headquarters. This is also the best time if you want to update or cancel your order.</li>
                          <li>Transit - Your order is already in our delivery fleet.</li>
                          <li>Shipped - You already received your order.</li>
                          <li>Cancelled - Your order has been canceled and won't be delivered anymore.</li>
                        </ul>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq29" data-parent="#accordion" data-toggle="collapse" class="panel-title">When and how can I cancel an order? <i class="fa fa-caret-down"></i></a>
                  <div id="faq29" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>
                        You can reach us in our <a href="/contact-us">contact page</a>, <a href="https://www.facebook.com/tiendadotph/" target="_blank">facebook</a>, <a href="tel:639258166813">call us</a>, <a href="mailto:hello@tienda.ph">email us</a>, or even in the online chat in our <a href="http://tienda.ph/">site</a>.</p>
                        <p>
                          You can also cancel your order anytime except if its already relaxing in your stomach. 
                        </p>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h3>Shipping</h3>
            </div>
            <div class="col-sm-9">
              <div class="faq">
                <div> <a href="#faq30" data-parent="#accordion" data-toggle="collapse" class="panel-title">What are the delivery charges? <i class="fa fa-caret-down"></i></a>
                  <div id="faq30" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                          <strong>P50.00 only</strong>. Free delivery on orders P500 and above. 
                        </p>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq32" data-parent="#accordion" data-toggle="collapse" class="panel-title">What is the estimated delivery time? <i class="fa fa-caret-down"></i></a>
                  <div id="faq32" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>Within 24 hours except for special holidays like Christmas.</p>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq35" data-parent="#accordion" data-toggle="collapse" class="panel-title">Do you delivery in Manila? <i class="fa fa-caret-down"></i></a>
                  <div id="faq35" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            We don't but planning to after we expand on Tarlac area, our next target will be Manila.
                        </p>
                        <p>
                          Currently we only deliver in Pampanga area.
                        </p>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq36" data-parent="#accordion" data-toggle="collapse" class="panel-title">I need to return an item, how do I arrange for a pick-up? <i class="fa fa-caret-down"></i></a>
                  <div id="faq36" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            Just contact us and we'll pick up the item the next day during our delivery time.
                        </p>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq37" data-parent="#accordion" data-toggle="collapse" class="panel-title">Does deliver internationally? <i class="fa fa-caret-down"></i></a>
                  <div id="faq37" class="panel-collapse collapse">
                    <div class="panel-body">
                    <p>
                        We don't. Although we have customers who always order in our site from outside the Philippines. They purchase the orders using their credit cards and arrange the delivery to their love ones. It is the main reason why we separate the billing and shipping address.
                    </p></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr>
        </div>
        <!--Middle Part End -->
      </div>
    </div>
@endsection