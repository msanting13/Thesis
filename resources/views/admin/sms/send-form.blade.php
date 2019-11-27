@extends('layout.layout-master')
@section('title','Send Message')
@section('breadcrumb')
	<h3 class="text-themecolor m-b-0 m-t-0">Category</h3>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
		<li class="breadcrumb-item active">Message</li>
		<li class="breadcrumb-item active">Send</li>
	</ol>
@endsection
@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-block">
					<h3>
						Send Message
					</h3>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-block">
					<form method="POST">
						@csrf
						<div class="form-group">
							<label for="phone">Phone Number</label>
							<input type="text" class="form-control" id="phone" name="phone_number" placeholder="+63919369344">
						</div>
						<div class="form-group">
							<label for="message">Message</label>
							<textarea name="message" id="message" class="form-control" cols="30" rows="10" placeholder="Enter your message here..."></textarea>
						</div>
						<div class="float-right">
							<input type="submit" value="Send" class="btn btn-primary">
						</div>
					</form>
					@include('template.modal')
				</div>
			</div>
		</div>
	</div>
@endsection