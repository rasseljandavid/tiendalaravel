$(document).ready(function(){



  // reload minicart
  function loadMinicart(){
    var minicart = $('#minicart-container');
    minicart.find('#loading-btn').addClass('bar');
    $.ajax({
        url : '/cart/minicart',
        type: 'GET',
        dataType: 'json',
    }).done(function (data) {
        console.log(data);
        minicart.empty();
        minicart.html(data);
        minicart.find('#loading-btn').removeClass('bar');
    }).fail(function () {
        alert('Failed to update the cart view');
        minicart.find('#loading-btn').removeClass('bar');
    });
  }

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
            // reload minicart
            loadMinicart();
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