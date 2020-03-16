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
		@if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session::get('success') }}
		</div>
		@endif
		<div class="card">
			<div class="card-block">
				
				<form action="{{ route('sms.test') }}" method="POST">
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
			</div>
		</div>
	</div>
</div>