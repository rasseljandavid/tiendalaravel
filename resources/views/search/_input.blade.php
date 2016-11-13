<div id="search" class="input-group">
  <form method="GET" action="/search/" id="search-form" autocomplete="off">
  		{{ csrf_field() }}
      <input id="input-term" type="text" name="term" value="" placeholder="Search" class="form-control input-lg" />
      <button type="submit" class="button-search"><i class="fa fa-search"></i></button>
  </form>
  <ul id="search-result-suggestion">

  </ul>
</div>


