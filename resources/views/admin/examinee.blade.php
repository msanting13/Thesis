@extends('layout.layout-master')
@section('title','Examinees')
@section('breadcrumb')
	<h3 class="text-themecolor m-b-0 m-t-0">Examinees</h3>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
		<li class="breadcrumb-item active">Manage</li>
		<li class="breadcrumb-item active">Examinees</li>
	</ol>
@endsection
@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-block">
					<h3>
						Add Examinee
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
						<table class="table table-condensed table-hover table-striped stylish-table" id="examinee" style="font-size: 16px;">
							<thead>
								<tr>
									<th>ID #</th>
									<th>Examinee #</th>
									<th>Name</th>
									<th>Date Registered</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							
							</tbody>
						</table>
					</div>
					<div class="modal fade" id="modal-id">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Add Examinee</h4>
								</div>
								<div class="modal-body">
									<form action="{{ route('post.examinee') }}" method="POST" role="form">
										@csrf
										<div class="row">
											<div class="col-md-6" style="border-right: 1px solid#ccc; max-height: 500px; overflow: auto;">
												<h3>School Year</h3>
												<div class="form-group">
													<input type="text" class="form-control" name="schooyear" value="@isset($activeSchoolYear[0]->school_year) {{ $activeSchoolYear[0]->school_year }} @endisset" disabled>
													<input type="hidden" name="syID" value="@isset($activeSchoolYear[0]->id) {{ $activeSchoolYear[0]->id }} @endisset">
												</div>
												<h3>Personal Info</h3>
												<div class="form-group">
													<label for="name">Fullname: *</label>
													<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
					                                @error('name')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
												</div>
												<div class="form-group">
													<label for="address">Address: *</label>
													<input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
												</div>
												<div class="form-group">
													<label for="date1">Date of Birth: *</label>
													<input id="date1" type="date" class="form-control @error('datebirth') is-invalid @enderror" name="birthdate" required autocomplete="birthdate" autofocus>
												</div>
												<div class="form-group">
													<label for="gender">Gender *</label>
													<select id="gender" class="form-control" name="gender" required autocomplete="gender" autofocus>
														<option></option>
														<option value="Male">Male</option>
														<option value="Female">Female</option>
													</select>
												</div>
												<div class="form-group">
													<label for="cellnumber">Cellphone number *</label>
													<input id="cellnumber" type="text" class="form-control @error('cellnumber') is-invalid @enderror" name="cellnumber" value="{{ old('cellnumber') }}" required autocomplete="cellnumber" autofocus>
												</div>
											</div>
											<div class="col-md-6">
												<h3>Preferred courses</h3>
												<div class="form-group">
													<label>First</label>
													<select class="form-control" name="first_preferred">
														@foreach($courses as $course)
															<option value="{{ $course->id }}">{{ $course->course_code }}</option>
														@endforeach
													</select>
												</div>
												<div class="form-group">
													<label>Second</label>
													<select class="form-control" name="second_preferred">
														@foreach($courses as $course)
															<option value="{{ $course->id }}">{{ $course->course_code }}</option>
														@endforeach
													</select>
												</div>
												<hr>
												<h3>Account</h3>
												<div class="form-group">
													<label for="email">Email: *</label>
													<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
												</div>
												<div class="form-group">
													<label for="password">Password: *</label>
													<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="p4ssword" required autocomplete="new-password">
												</div>
												<div class="form-group">
													<button type="submit" class="btn waves-effect waves-light btn-rounded btn-outline-primary">Register</button>
												</div>
											</div>
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
		<script src="/js/ajax/edit-examinee-ajax.js"></script>
	@endsection
	@section('dataTablesAjax')
	    <script type="text/javascript">
	    $(document).ready(function () {
	        $('#examinee').DataTable({
	        	"columnDefs": [{ 
	        		"orderable": false, "targets": [0,4]
	        	}],
	            "processing": true,
	            "serverSide": true,
	            "ajax":{
	                     "url": "{{ route('examinee.data') }}",
	                     "type": "POST",
	                     "data":{ _token: "{{csrf_token()}}"}
	                   },
	            "columns": [
	                { "data": "id" },
	                { "data": "examinee_number" },
	                { "data": "name" },
	                // { "data": "address" },
	                // { "data": "birth_date" },
	                // { "data": "gender" },
	                // { "data": "cellnumber" },
	                // { "data": "email" },
	                { "data": "created_at" },
	                { "data": "action" },
	            ]	 
	        });
	    });
	    </script>
	@endsection
@endsection