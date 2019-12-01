@extends('layout.layout-master')
@section('title','Profile')
@section('breadcrumb')
	<h3 class="text-themecolor m-b-0 m-t-0">Profile of {{ $examinee->name }}</h3>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="javascript:void(0)">Examinee number: {{ $examinee->examinee_number }}</a></li>
	</ol>
@endsection
@section('content')
	<div class="row">
		<div class="col-12">
        	<div class="card">
        		<!-- Nav tabs -->
        		<ul class="nav nav-tabs profile-tab" role="tablist">
        			<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Personal</a> </li>
        			<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#preferred" role="tab">Preferred Course</a> </li>
        			<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Account</a> </li>
        		</ul>
        		<!-- Tab panes -->
        		<div class="tab-content">
        			<div class="tab-pane active" id="personal" role="tabpanel">
        				<div class="card-block">
        					<form class="form-horizontal form-material">
        						<div class="form-group">
        							<label class="col-md-12">Address</label>
        							<div class="col-md-12">
        								<input type="text" value="{{ $examinee->address }}" class="form-control form-control-line" readonly>
        							</div>
        						</div>
        						<div class="form-group">
        							<label class="col-md-12">Birth-day</label>
        							<div class="col-md-12">
        								<input type="text" value="{{ $examinee->birth_date }}" class="form-control form-control-line" readonly>
        							</div>
        						</div>
        						<div class="form-group">
        							<label class="col-md-12">Gender</label>
        							<div class="col-md-12">
        								<input type="text" value="{{ $examinee->gender }}" class="form-control form-control-line" readonly>
        							</div>
        						</div>
        						<div class="form-group">
        							<label class="col-md-12">Phone no.</label>
        							<div class="col-md-12">
        								<input type="text" value="{{ $examinee->cellnumber }}" class="form-control form-control-line" readonly>
        							</div>
        						</div>
        					</form>
        				</div>
        			</div>
        			<!--second tab-->
        			<div class="tab-pane" id="preferred" role="tabpanel">
        				<div class="card-block">
        					<form class="form-horizontal form-material">
        						<div class="form-group">
        							<label class="col-md-12">First course</label>
        							<div class="col-md-12">
        								<input type="text" value="{{ $examinee->preferredCourses->firstPreferredCourse->course_code }}" class="form-control form-control-line" readonly>
        							</div>
        						</div>
        						<div class="form-group">
        							<label class="col-md-12">Second course</label>
        							<div class="col-md-12">
        								<input type="text" value="{{ $examinee->preferredCourses->secondPreferredCourse->course_code }}" class="form-control form-control-line" readonly>
        							</div>
        						</div>
        					</form>
        				</div>
        			</div>
        			<div class="tab-pane" id="settings" role="tabpanel">
        				<div class="card-block">
        					<form class="form-horizontal form-material">
        						<div class="form-group">
        							<label class="col-md-12">Examinee Number</label>
        							<div class="col-md-12">
        								<input type="text" value="{{ $examinee->examinee_number }}" class="form-control form-control-line" readonly>
        							</div>
        						</div>
        						<div class="form-group">
        							<label class="col-md-12">Email</label>
        							<div class="col-md-12">
        								<input type="text" value="{{ $examinee->email }}" class="form-control form-control-line" readonly>
        							</div>
        						</div>
        					</form>
        				</div>
        			</div>
        		</div>
        	</div>
		</div>
	</div>
@endsection