@extends('layout.layout-master')
@section('title','Account Setting')
@section('breadcrumb')
	<h3 class="text-themecolor m-b-0 m-t-0">Account</h3>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
		<li class="breadcrumb-item active">Settings</li>
		<li class="breadcrumb-item active">Account</li>
	</ol>
@endsection
@section('content')
	<div class="row">
		<div class="col-md-12">
				@include('errors.error')
				@include('template.success')
		</div>
	</div>
	<div class="row">
		<!-- Column -->
		<div class="col-lg-4 col-xlg-3 col-md-5">
			<div class="card">
				<div class="card-block">
					<center class="m-t-30"> <img src="/assets/images/users/{{ Auth::user()->profile_picture }}" class="img-circle" width="150" />
						<h4 class="card-title m-t-10">{{ Auth::user()->name }}</h4>
						<h6 class="card-subtitle">{{ Auth::user()->position }}</h6>
{{-- 						<div class="row text-center justify-content-md-center">
							<div class="col-12">
								<a href="javascript:void(0)" class="link">
									<i class="icon-people"></i> 
								</a>
							</div>
						</div> --}}
					</center>
				</div>
			</div>
		</div>
		<!-- Column -->
		<!-- Column -->
		<div class="col-lg-8 col-xlg-9 col-md-7">
			<div class="card">
				<div class="card-block">
					<form action="{{ route('admin.update.profile') }}" method="POST" enctype='multipart/form-data' class="form-horizontal form-material">
						<h3 class="card-title">Edit Profile</h3>
						@csrf
						<div class="form-group">
							<label class="col-md-12">Full Name</label>
							<div class="col-md-12">
								<input type="text" value="{{ Auth::user()->name }}" name="name" class="form-control form-control-line">
							</div>
						</div>
						<div class="form-group">
							<label for="example-email" class="col-md-12">Email</label>
							<div class="col-md-12">
								<input type="email" value="{{ Auth::user()->email }}" class="form-control form-control-line" name="email">
							</div>
						</div>
						<div class="form-group">
							<label for="example-email" class="col-md-12">Profile Picture</label>
							<div class="col-md-12">
								<input type="file" class="form-control" name="profile_picture">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-12">
								<button class="btn btn-success">Update Profile</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="card">
				<div class="card-block">
					<form action="{{ route('admin.change.password') }}" method="POST" class="form-horizontal form-material">
						<h3 class="card-title">Change Password</h3>
						@csrf
						<div class="form-group">
							<label class="col-md-12">Current Password</label>
							<div class="col-md-12">
								<input type="password" name="current_password" class="form-control form-control-line">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-12">New Password</label>
							<div class="col-md-12">
								<input type="password" name="password" class="form-control form-control-line">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-12">Confirm Your New Password</label>
							<div class="col-md-12">
								<input type="password" name="password_confirmation" class="form-control form-control-line">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-12">
								<button class="btn btn-success">Change Password</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Column -->
    </div>
@endsection
