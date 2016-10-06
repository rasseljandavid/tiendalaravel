<form method="POST" action="/cart/removeItem" class="form">
	{{ method_field('DELETE') }}
	{{ csrf_field() }}
	<input type="hidden" name="item-id" value="{{$oi->id}}">
	<button class="btn btn-danger {{$btnclass}}" title="Remove" onClick="" type="submit"><i class="fa {{$iclass}}"></i></button></td>
</form>