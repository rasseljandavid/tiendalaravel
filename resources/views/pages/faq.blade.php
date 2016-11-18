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
                <div> <a href="#faq1" data-parent="#accordion" data-toggle="collapse" class="panel-title">What is 'My Account'? How do I update my information? <i class="fa fa-caret-down"></i></a>
                  <div id="faq1" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>
                        "My Account" is the page where you can see and update your personal and contact information.
                      </p>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq2" data-parent="#accordion" data-toggle="collapse" class="panel-title">I forgot my password, can I get it from you? <i class="fa fa-caret-down"></i></a>
                  <div id="faq2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            The passwords of our users are encrypted, meaning they are "unreadable" even to us. This also means that we cannot make them "readable" for you. However, you can reset your password using the Forgot My Password page to make a new one.
                        </p>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq3" data-parent="#accordion" data-toggle="collapse" class="panel-title"> How do I know if my order has been confirmed? <i class="fa fa-caret-down"></i></a>
                  <div id="faq3" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>
                        A confirmation email with your invoice will be sent to you via email. You can also check your order in the order history page. If you are a first time customer, expect a call from us so that we can verify your address and your availability to receive the order.
                      </p>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq4" data-parent="#accordion" data-toggle="collapse" class="panel-title">Can I order a product that is 'Out of Stock'? <i class="fa fa-caret-down"></i></a>
                  <div id="faq4" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>
                        We only display the products that are available in our warehouse. The number of items that we have in stock is reflected on each of the product's page. Furthermore, we restock on our items daily -- if an item you are looking for is not currently available, there is a high probability that it will be the following day.
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
                <div> <a href="#faq5" data-parent="#accordion" data-toggle="collapse" class="panel-title">Why are your products so cheap? Are they low quality or near their expiration date? <i class="fa fa-caret-down"></i></a>
                  <div id="faq5" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            Our products are the same quality as with any supermarkets out there. The reason why we can sell our products at a more affordable price is because we have special arrangements with our suppliers. We also have a NO QUESTIONS ASKED RETURN POLICY, which means that if you are not satisfied with the items you received, you can return them to us and we will be happy to give you a refund.
                        </p>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq7" data-parent="#accordion" data-toggle="collapse" class="panel-title">Is it necessary to have an account to shop on Tienda.ph? <i class="fa fa-caret-down"></i></a>
                  <div id="faq7" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                          Yes. We need your address and contact information for us to deliver your order. We don't believe in guest checkout because we are here for the long term and our mission is to remove the "<a href="http://www.thekitchn.com/10-annoying-that-always-happen-when-youre-grocery-shopping-196839" target="_blank">10 Annoying Things That Happen When You're Grocery Shopping</a>" in your life.
                        </p>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq8" data-parent="#accordion" data-toggle="collapse" class="panel-title">Is there a minimum order? Are there any hidden charges? <i class="fa fa-caret-down"></i></a>
                  <div id="faq8" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            There is no minimum order. But for orders that are less than P500.00 there is a delivery charge for P50.00. Free shipping applies to orders P500.00 and up.
                        </p>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq9" data-parent="#accordion" data-toggle="collapse" class="panel-title">What is Tienda Points? <i class="fa fa-caret-down"></i></a>
                  <div id="faq9" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                          Tienda Points are points that you accumulate each time you order from our site. You can use these points on our "Super Secret VIP Program" that will launch soon. Think of it as an advantage card.
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
                            It is a mode of payment where you can pay in cash to our logistics personnel once your order has been personally delivered.
                        </p>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq13" data-parent="#accordion" data-toggle="collapse" class="panel-title">How do I pay using a credit/debit card? <i class="fa fa-caret-down"></i></a>
                  <div id="faq13" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            For security purposes our payment gateway is Paypal, which is the world's leading digital payment company trusted by millions. During the checkout page, choose Paypal as the mode of payment and you will be redirected to their website where you can use your credit/debit card to pay.
                        </p>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq14" data-parent="#accordion" data-toggle="collapse" class="panel-title">Is it safe to use my credit/debit card on Tienda.ph? <i class="fa fa-caret-down"></i></a>
                  <div id="faq14" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                          We do not store any of your payment information in our site. All payments are processed using a third-party organization called Paypal - which is trusted by millions of people.
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
                          You can check your order's status in your <a href="/order/history">order history page</a>. If you have questions about your order, feel free to <a href="/contact-us">contact us</a>.
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
                        You can reach us via the <a href="/contact-us">contact page</a> or using the online chat feature on our site. You can also reach us via <a href="https://www.facebook.com/tiendadotph/" target="_blank">Facebook</a>, phone call <a href="tel:639258166813">+639258166813</a> or email <a href="mailto:hello@tienda.ph">hello@tienda.ph</a>.
                        <p>
                          The only time you can't cancel your order is when it's already in transit or if it's already relaxing in your stomach. :)
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
                <div> <a href="#faq30" data-parent="#accordion" data-toggle="collapse" class="panel-title">What about delivery fee? <i class="fa fa-caret-down"></i></a>
                  <div id="faq30" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                          There is a P50.00 fee for orders below P500.00. Which means that we offer free delivery on orders P500.00 and up.
                        </p>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq32" data-parent="#accordion" data-toggle="collapse" class="panel-title">What is the estimated delivery time? <i class="fa fa-caret-down"></i></a>
                  <div id="faq32" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>
                          Orders are processed and delivered within 24 hours except during special holidays like Christmas, and unless stated otherwise.
                      </p>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq35" data-parent="#accordion" data-toggle="collapse" class="panel-title">Do you delivery in Manila? <i class="fa fa-caret-down"></i></a>
                  <div id="faq35" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            Currently our serviceable locations are within Pampanga. But we are planning on expanding in Manila and Tarlac soon.
                        </p>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq36" data-parent="#accordion" data-toggle="collapse" class="panel-title">I need to return an item, how do I arrange for a pick-up? <i class="fa fa-caret-down"></i></a>
                  <div id="faq36" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            Simply contact us about the product you wish to return and we will arrange a pick-up the next day.
                        </p>
                    </div>
                  </div>
                </div>
                <div> <a href="#faq37" data-parent="#accordion" data-toggle="collapse" class="panel-title">Do you deliver internationally? <i class="fa fa-caret-down"></i></a>
                  <div id="faq37" class="panel-collapse collapse">
                    <div class="panel-body">
                    <p>
                       We don't, but we accept orders from overseas as long as the delivery address is within our serviceable areas. 
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