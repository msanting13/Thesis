	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-block">
					<div class="form-group">
						<label for="category">Category</label>
						<select class="form-control" name="category" required>
							<option></option>
							@foreach($categories as $category)
								<option value="{{ $category->id }}">{{ $category->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-block">
					<div class="form-group">
						<label for="name">Question</label>
						<textarea class="form-control makeMeRichTextarea" id="questionEditor" name="content"></textarea>
					</div>
					@yield('answerKeySection')
				</div>
			</div>
		</div>
	</div>