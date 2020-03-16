@extends('layout.layout-master')
@section('title','Question Types')
@section('breadcrumb')
	<h3 class="text-themecolor m-b-0 m-t-0">Question Types</h3>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
		<li class="breadcrumb-item active">Manage</li>
		<li class="breadcrumb-item active">Question Type</li>
	</ol>
@endsection
@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-block">
					@include('errors.error')
					@include('template.success')
					<br>
					<div class="table-responsive">
						<table class="table table-condensed table-hover table-bordered table-striped stylish-table" id="categoryTable">
							<thead>
								<tr>
									<th>ID #</th>
									<th>Code</th>
									<th>Name</th>
									<th>Instruction</th>
									<th>Date modified</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($qTypes as $qType)
								<tr>
									<td>{{ $qType->id }}</td>
									<td>{{ $qType->code }}</td>
									<td>{{ $qType->name }}</td>
									<td>{{ $qType->instruction }}</td>
									<td>{{ $qType->updated_at }}</td>
									<td>
										<a class="btn btn-circle btn-outline-primary btn-sm edit-questiontype" href="javascript:void(0)" title="Edit Question Type Instruction" data-toggle="modal" data-target="#modal-id-crud" data-id="{{ $qType->id }}" data-backdrop="static">
											<i class="mdi mdi-pencil"></i>
										</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					@include('template.modal')
				</div>
			</div>
		</div>
	</div>
	@section('ajax')
		<script src="/js/ajax/edit-questiontype-ajax.js"></script>
	@endsection
@endsection