@if( $type=='vertical')
<div>
  <button type="button" class="wishlist" onClick=""><i class="fa fa-heart"></i> Add to Wish List</button>
  <br />
  <button type="button" class="wishlist" onClick=""><i class="fa fa-exchange"></i> Compare this Product</button>
</div>
@elseif( $type=='btnonly')
	<button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i class="fa fa-heart"></i></button>
	<button type="button" data-toggle="tooltip" title="Compare this Product" onClick=""><i class="fa fa-exchange"></i></button>
@endif