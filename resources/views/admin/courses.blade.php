@extends('layout.layout-master')
@section('title','Courses')
@section('breadcrumb')
	<h3 class="text-themecolor m-b-0 m-t-0">Courses</h3>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
		<li class="breadcrumb-item active">Manage</li>
		<li class="breadcrumb-item active">Courses</li>
	</ol>
@endsection
@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-block">
					<h3>
						Courses
						<a class="btn btn-circle btn-outline-primary btn-sm pull-right" data-toggle="modal" href='#modal-id'>
							<i class="fa fa-plus"></i>
						</a>   
					</h3>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-block">
					<div class="table-responsive">
						<table class="table table-condensed table-hover table-bordered table-striped stylish-table" id="coursesTable" style="font-size: 16px;">
							<thead>
								<tr>
									<th>ID #</th>
									<th>Department</th>
									<th>Course code</th>
									<th>Course description</th>
									<th>Updated at</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
					<div class="modal fade" id="modal-id">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Add Course</h4>
								</div>
								<div class="modal-body">
									<form action="{{ action('CoursesController@store') }}" method="POST" role="form">
										@csrf
										<div class="form-group">
											<label for="department">Department</label>
											<select id="department" class="form-control" name="department">
												@foreach($departments as $department)
													<option value="{{ $department->id }}">{{ $department->department_name }}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group">
											<label for="courseCode">Course code</label>
											<input type="text" class="form-control" id="courseCode" name="course_code">
										</div>
										<div class="form-group">
											<label for="courseDescription">Course description</label>
											<input type="text" class="form-control" id="courseDescription" name="course_descr">
										</div>
										<div class="form-group">
											<button type="submit" class="btn waves-effect waves-light btn-rounded btn-outline-primary">Save</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					@include('template.modal')
				</div>
			</div>
		</div>
	</div>
	@section('ajax')
		<script src="/js/ajax/edit-course-ajax.js"></script>
		<script src="/assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>
	@endsection
	@section('dataTablesAjax')
	    <script type="text/javascript">
	    $(document).ready(function () {
	        $('#coursesTable').DataTable({
	        	"columnDefs": [{ 
	        		"orderable": false, "targets": [0,5]
	        	}],
  				"order": [[ 4, "desc" ]],
	            "processing": true,
	            "serverSide": true,
	            "ajax":{
	                     "url": "{{ route('course.data') }}",
	                     "type": "POST",
	                     "data":{ _token: "{{csrf_token()}}"}
	                   },
	            "columns": [
	                { "data": "id" },
	                { "data": "department" },
	                { "data": "course_code" },
	                { "data": "course_descr" },
	                { "data": "created_at" },
	                { "data": "action" },
	            ]	 
	        });
	    });
	    </script>
	@endsection
@endsection