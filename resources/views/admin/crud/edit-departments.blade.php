<form action="{{ action('DepartmentsController@update', $department->id) }}" method="POST" role="form">
	@csrf
	<input name="_method" type="hidden" value="PUT">
	<div class="form-group">
		<label for="departmentName">Department name</label>
		<input type="text" class="form-control" id="departmentName" name="department_name" placeholder="Department name" value="{{ $department->department_name }}">
	</div>
	<div class="form-group">
		<button type="submit" class="btn waves-effect waves-light btn-rounded btn-outline-primary">Update</button>
	</div>
</form>