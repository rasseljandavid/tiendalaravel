@if (count($errors) > 0)
    <div class="alert alert-danger error-container">
    	<div class="navbar-right" style="margin-right: 3px;">
    		<a id="error-close" class="plain-link" title="close" style="color:gray;">x</a>
    	</div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif