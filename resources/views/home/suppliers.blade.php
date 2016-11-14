<div id="carousel" class="owl-carousel nxt">
  @foreach($suppliers as $supplier)
    <div class="item text-center"> 
      <a href="{{ $supplier->slugLink() }}">
        <img src="image/suppliers/tienda-supplier-{{$supplier->id.'.jpg'}}" alt="{{$supplier->title}}" title="{{$supplier->title}}" class="img-responsive" />
      </a> 
    </div>
  @endforeach
</div>