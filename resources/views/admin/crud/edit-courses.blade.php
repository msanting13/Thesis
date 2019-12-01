<form action="{{ action('CoursesController@update',$course->id) }}" method="POST" role="form">
	@csrf
	<input name="_method" type="hidden" value="PUT">
	<div class="form-group">
		<label for="department">Department</label>
		<select id="department" class="form-control" name="department">
			<option value="{{ $course->id }}">{{ $course->department->department_name }}</option>
			@foreach($departments as $department)
				<option value="{{ $department->id }}">{{ $department->department_name }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="courseCode">Course code</label>
		<input type="text" class="form-control" id="courseCode" name="course_code" value="{{ $course->course_code }}" placeholder="Course code">
	</div>
	<div class="form-group">
		<label for="courseDescription">Course description</label>
		<input type="text" class="form-control" id="courseDescription" name="course_descr" value="{{ $course->course_descr }}" placeholder="Course description">
	</div>
	<div class="form-group">
		<button type="submit" class="btn waves-effect waves-light btn-rounded btn-outline-primary">Update</button>
	</div>
</form>