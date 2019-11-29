@extends('layout.layout-master')
@section('title','School-Year Setting')
@section('breadcrumb')
	<h3 class="text-themecolor m-b-0 m-t-0">School-Year Setting</h3>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
		<li class="breadcrumb-item active">settings</li>
		<li class="breadcrumb-item active">School-Year Setting</li>
	</ol>
@endsection
@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-block">
					<h3>
						Open School-Year
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
						<table class="table table-condensed table-hover table-bordered table-striped stylish-table" id="categoryTable">
							<thead>
								<tr>
									<th>ID #</th>
									<th>Name</th>
									<th>Date modified</th>
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
									<h4 class="modal-title">Open School-Year</h4>
								</div>
								<div class="modal-body">
									<form method="POST" role="form" id="openSchoolYear">
										@csrf
										<div class="form-group">
											<label for="school-year">School-Year *</label>
											@php
												$currentYear = date('Y');
												$nextYear = ($currentYear+1);
												$currentSchoolYear = $currentYear.'-'.$nextYear;
												$nextSchoolYear = $nextYear.'-'.($nextYear+1);
											@endphp
											<select id="selectschoolyear" class="form-control">
												<optgroup label="Current School Year">
													<option>{{ $currentSchoolYear.'/1st Semester' }}</option>
													<option>{{ $currentSchoolYear.'/2nd Semester' }}</option>
												</optgroup>
												<optgroup label="Next School Year">
													<option>{{ $nextSchoolYear.'/1st Semester' }}</option>
													<option>{{ $nextSchoolYear.'/2nd Semester' }}</option>
												</optgroup>
											</select>
										</div>
										<div class="form-group">
											<label>Password *</label>
											<input type="password" class="form-control" name="password" id="adminPassword" required>
										</div>
										<div class="form-group">
											<button type="submit" class="btn waves-effect waves-light btn-rounded btn-outline-primary" id="openSchooYear-btn">Open</button>
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
	<script>
	$(document).ready(function () {
  		$.ajaxSetup({
    		headers: {
      			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		}
  		});   

		$('#openSchoolYear').on('submit',function(e){
			e.preventDefault();
			let form = $(this).parents('form');
			let pwd = $('#adminPassword').val();
			let sy = $('#selectschoolyear').val();
			let dataString = 'password='+ pwd + '&schoolyear='+ sy;
			$.ajax({
				url:'{{ action('SchoolYearController@store') }}',
				type:"POST",
				dataType:"json",
				data: dataString,
				success:function(data){
   					if (data.message==true) {
						swal({
						  title: "Success!",
						  text: "School-Year "+data.schoolyear+" was officially open",
						  icon: "success",
						});
						pwd.val('');
   					}
   					else{
			        	swal({
			            	title: "Invalid Password!",
			            	icon: "warning",
			        	});
   					}
				}
			});
		});
	}); 
	</script>
	@endsection
@endsection
