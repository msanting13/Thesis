<form action="{{ route('update.examinee',$id) }}" method="POST" role="form">
	@csrf
	<input name="_method" type="hidden" value="PATCH">
	<div class="row">
		<div class="col-md-6" style="border-right: 1px solid#ccc; max-height: 500px; overflow: auto;">
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
				<label for="cellnumber">Cellphone number *</label>
				<input id="cellnumber" type="text" class="form-control @error('cellnumber') is-invalid @enderror" name="cellnumber" value="{{ $examinee->cellnumber }}" required autocomplete="cellnumber" autofocus>
			</div>
		</div>
		<div class="col-md-6">
			<h3>Preferred courses</h3>
			<div class="form-group">
				<label>First</label>
				<select class="form-control" name="first_preferred">
					<option value="{{ $examinee->preferredCourses->first_preferred_course }}">{{ $examinee->preferredCourses->firstPreferredCourse->course_code }}</option>
					@foreach($courses as $course)
						<option value="{{ $course->id }}">{{ $course->course_code }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Second</label>
				<select class="form-control" name="second_preferred">
					<option value="{{ $examinee->preferredCourses->second_preferred_course }}">{{ $examinee->preferredCourses->secondPreferredCourse->course_code }}</option>
					@foreach($courses as $course)
						<option value="{{ $course->id }}">{{ $course->course_code }}</option>
					@endforeach
				</select>
			</div>
			<hr>
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