<div class="col-md-8 col-md-offset-2">
	@if(Session::has('message'))
		<div class="alert alert-success">
			{{ Session::get('message')}}
		</div>
	@endif
</div>

 <div class="col-md-8 col-md-offset-2">
 	@if(count($errors))
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
 	@endif
 </div>
 