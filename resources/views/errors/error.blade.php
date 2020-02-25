@if(count($errors))
<div class="alert alert-danger" style="text-align: left;">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<strong>Failed!</strong>
	@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
	@endforeach
</div>
@endif