<div class="col-md-12">
  <div class="row">
    @foreach( $products as $product )
      <div class="product-layout product-list col-xs-12">
        @include('products.portrait', ['product'=>$product])
      </div>
    @endforeach
  </div>
</div>

<div class="col-md-12">
  <div class="row">
    <div class="col-sm-6 text-left">
      {{$products->appends(Request::except('page'))->links()}}
    </div>
    <div class="col-sm-6 text-right">Showing {{ $products->toArray()['from'] }} to {{ $products->toArray()['to'] }} of {{ $products->total() }} ({{ $products->currentPage() }} Pages)
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    // remove loading bar on addtocart
  function removebar(elem){
    elem.removeClass('bar');
  }

  $('div.add-to-cart').each(function(){
    removebar($(this).children('.bar'));
  });

  // add to cart submit button
  $('div.add-to-cart').each(function(){
    var atc = $(this);
    var send = false;
    var form = atc.find('.form-addtocart');
    atc.find('#submit').on('click', function(){
      var qtyHolder = atc.find('#quantity-holder');
      var inputQty = atc.find('#input-quantity');
      var qty = inputQty.val();
      qty++;
      inputQty.val(qty);
      send = false;
      setTimeout(function(){
        // send here if quantity is changed
        if(qty == inputQty.val()){
          var bar = atc.children('#loading-btn');
          bar.addClass('bar');
          var data = form.serialize();
          $.ajax({
            url  : form.attr('action'),
            type : form.attr('method'),
            data : data,
            dataType : 'json',
          }).done(function (data) {
            
            if(data.success == true){
              qtyHolder.val(inputQty.val());
              console.log('successful');
            }else if(data.success == false){
              inputQty.val(qtyHolder.val());
              console.log("insufficient");
            }
            removebar(bar);
          }).fail(function (data){
            var errors = data.responseJSON;
            removebar(bar);
            console.log(data);
          });
          $(this).blur();
          return false;
        }
      }, 400);
    });
  });
  });
</script>