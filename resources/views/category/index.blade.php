<ul>
@foreach($categories as $category)
	<li><a href="{{ $category->slugLink() }}">{{ $category->title }}</a></li>
@endforeach
</ul>