<div id="carousel" class="owl-carousel nxt">
  @foreach($suppliers as $supplier)
    <div class="item text-center"> <a href="#"><img src="image/suppliers/tienda-supplier-{{$supplier->id.'.jpg'}}" alt="{{$supplier->title}}" class="img-responsive" /></a> </div>
  @endforeach
  
  <!-- <div class="item text-center"> <a href="#"><img src="image/products/tienda-partner1.jpg" alt="Nutri Snack" class="img-responsive" /></a> </div>
  <div class="item text-center"> <a href="#"><img src="image/products/tienda-partner2.jpg" alt="Monde Nissin" class="img-responsive" /></a> </div>
  <div class="item text-center"> <a href="#"><img src="image/products/tienda-partner3psd.jpg" alt="Columbia's" class="img-responsive" /></a> </div>
  <div class="item text-center"> <a href="#"><img src="image/products/tienda-partner4.jpg" alt="Zesto" class="img-responsive" /></a> </div>
  <div class="item text-center"> <a href="#"><img src="image/products/tienda-partner5.jpg" alt="URC" class="img-responsive" /></a> </div>
  <div class="item text-center"> <a href="#"><img src="image/products/tienda-partner6.jpg" alt="ECCO" class="img-responsive" /></a> </div>
  <div class="item text-center"> <a href="#"><img src="image/products/tienda-partner7.jpg" alt="Mondelez" class="img-responsive" /></a> </div>
  <div class="item text-center"> <a href="#"><img src="image/products/tienda-partner8.jpg" alt="Del Monte" class="img-responsive" /></a> </div>
  <div class="item text-center"> <a href="#"><img src="image/products/tienda-partner9.jpg" alt="Nutri Asia" class="img-responsive" /></a> </div>
  <div class="item text-center"> <a href="#"><img src="image/products/tienda-partner10.jpg" alt="Pepsi" class="img-responsive" /></a> </div> -->
</div>