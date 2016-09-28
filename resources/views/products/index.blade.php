<ul>
@foreach($products as $product)
	<li><a href="{{ $product->slugLink() }}">{{ $product->title }}</a></li>
@endforeach
</ul>