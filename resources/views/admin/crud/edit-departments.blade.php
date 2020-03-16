<form action="{{ route('colleges.update', $college->id) }}" method="POST" role="form">
	@csrf
	<input name="_method" type="hidden" value="PUT">
	<div class="form-group">
		<label for="departmentName">College</label>
		<input type="text" class="form-control" id="departmentName" name="department_name" placeholder="College" value="{{ $college->department_name }}">
	</div>
	<div class="form-group">
		<button type="submit" class="btn waves-effect waves-light btn-rounded btn-outline-primary">Update</button>
	</div>
</form>