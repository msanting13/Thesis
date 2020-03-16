<form action="{{ action('CoursesController@update',$program->id) }}" method="POST" role="form">
	@csrf
	<input name="_method" type="hidden" value="PUT">
	<div class="form-group">
		<label for="department">College</label>
		<select id="department" class="form-control" name="department">
			<option value="{{ $program->department->id }}">{{ $program->department->department_name }}</option>
			@foreach($departments as $department)
				<option value="{{ $department->id }}">{{ $department->department_name }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="courseCode">Program code</label>
		<input type="text" class="form-control" id="courseCode" name="course_code" value="{{ $program->course_code }}" placeholder="Course code">
	</div>
	<div class="form-group">
		<label for="courseDescription">Program</label>
		<input type="text" class="form-control" id="courseDescription" name="course_descr" value="{{ $program->course_descr }}" placeholder="Course description">
	</div>
	<div class="form-group">
		<button type="submit" class="btn waves-effect waves-light btn-rounded btn-outline-primary">Update</button>
	</div>
</form>