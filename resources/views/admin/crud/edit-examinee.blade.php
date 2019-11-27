<form action="{{ route('update.examinee',$id) }}" method="POST" role="form">
	@csrf
	<input name="_method" type="hidden" value="PATCH">
	<div class="row">
		<div class="col-md-6" style="border-right: 1px solid#ccc; max-height: 380px; overflow: auto;">
			<h3>Personal Info</h3>
			<div class="form-group">
				<label for="name">Fullname: *</label>
				<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $examinee->name }}" required autocomplete="name" autofocus>
				@error('name')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
			<div class="form-group">
				<label for="address">Address: *</label>
				<input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $examinee->address }}" required autocomplete="address" autofocus>
			</div>
			<div class="form-group">
				<label for="date1">Date of Birth: *</label>
				<input id="date1" type="date" class="form-control @error('datebirth') is-invalid @enderror" name="birthdate" value="{{ $examinee->birth_date }}" required autocomplete="birthdate" autofocus>
			</div>
			<div class="form-group">
				<label for="gender">Gender</label>
				<select id="gender" class="form-control" name="gender" required autocomplete="gender" autofocus>
					<option>{{ $examinee->gender }}</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
			</div>
			<div class="form-group">
				<label for="course">Prefered Course: *</label>
				<input type="text" class="form-control" id="course" name="course">
			</div>
		</div>
		<div class="col-md-6">
			<h3>Account</h3>
			<div class="form-group">
				<label for="email">Email: *</label>
				<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $examinee->email }}" required autocomplete="email">
			</div>
			<div class="form-group">
				<label for="password">Password: *</label>
				<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" readonly value="p4ssword" required autocomplete="new-password">
			</div>
			<div class="form-group">
				<button type="submit" class="btn waves-effect waves-light btn-rounded btn-outline-primary">Update</button>
			</div>
		</div>
	</div>
</form>