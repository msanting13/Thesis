	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-block">
					<div class="form-group">
						<label for="category">Category</label>
						<select class="form-control" name="category" required>
							<option value="{{ $question->categories->id }}">{{ $question->categories->name }}</option>
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
						<textarea class="form-control makeMeRichTextareaEdit" id="questionEditor" name="content">{!! $question->content  !!}</textarea>
					</div>
					@yield('answerKeySection')
				</div>
			</div>
		</div>
	</div>