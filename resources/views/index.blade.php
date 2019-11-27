@extends('layout.layout-master')
@section('content')
<form action="" method="POST" role="form">
	<legend>Form title</legend>

	<div class="form-group">
		<label for="">Firstname</label>
		<input type="text" class="form-control" id="" placeholder="Input field">
	</div>
	<div class="form-group">
		<label for="">Lastname</label>
		<input type="text" class="form-control" id="" placeholder="Input field">
	</div>

	

	<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection