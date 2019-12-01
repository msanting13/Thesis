<form action="{{ action('CoursesController@destroy',$course->id) }}" method="POST">
	@csrf
	<a class="btn btn-circle btn-outline-primary btn-sm edit-course" href="javascript:void(0)" data-toggle="modal" data-target="#modal-id-crud" data-id="{{ $course->id }}" data-backdrop="static">
		<i class="mdi mdi-pencil"></i>
	</a>
	<input name="_method" type="hidden" value="DELETE">
	<button type="button" class="btn btn-circle btn-outline-danger btn-sm btn-delete" data-toggle="tooltip" title="Delete" data-textval="{{ $course->course_code }}">
		<i class="mdi mdi-delete"></i>
	</button>
</form>
<script src="/assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>