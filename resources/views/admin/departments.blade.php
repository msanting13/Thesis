@extends('layout.layout-master')
@section('title','Colleges')
@section('breadcrumb')
	<h3 class="text-themecolor m-b-0 m-t-0">Colleges</h3>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
		<li class="breadcrumb-item active">Manage</li>
		<li class="breadcrumb-item active">Colleges</li>
	</ol>
@endsection
@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-block">
					@include('errors.error')
					@include('template.success')
					<h3>
						Colleges
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
									<th>College</th>
									<th>Date modified</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($departments as $department)
									<tr>
										<td>{{ $department->id }}</td>
										<td>{{ $department->department_name }}</td>
										<td>{{ $department->updated_at }}</td>
										<td>
											<form action="{{ action('DepartmentsController@destroy',$department->id) }}" method="POST">
												@csrf
												<a class="btn btn-circle btn-outline-primary btn-sm edit-department" href="javascript:void(0)" data-toggle="modal" data-target="#modal-id-crud" data-id="{{ $department->id }}" data-backdrop="static">
													<i class="mdi mdi-pencil"></i>
												</a>
												<input name="_method" type="hidden" value="DELETE">
												<button type="button" class="btn btn-circle btn-outline-danger btn-sm btn-delete" data-toggle="tooltip" title="Delete" data-textval="{{ $department->department_name }}">
													<i class="mdi mdi-delete"></i>
												</button>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="modal fade" id="modal-id">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Add College</h4>
								</div>
								<div class="modal-body">
									<form action="{{ action('DepartmentsController@store') }}" method="POST" role="form">
										@csrf
										<div class="form-group">
											<label for="Name">College</label>
											<input type="text" class="form-control" id="departmentName" name="department_name" value="{{ old('department_name') }}" placeholder="College">
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
		<script src="/js/ajax/edit-department-ajax.js"></script>
		<script src="/assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>
	@endsection
@endsection