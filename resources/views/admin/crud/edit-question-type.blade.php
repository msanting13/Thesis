<form action="{{ route('question-type.update', $qType->id) }}" method="POST" role="form">
	@csrf
	<input name="_method" type="hidden" value="PATCH">
	<div class="form-group">
		<label for="introduction">Instruction</label>
		<textarea  class="form-control" id="instruction" name="instruction" placeholder="Instruction">{{ $qType->instruction }}</textarea>
	</div>
	<div class="form-group">
		<button type="submit" class="btn waves-effect waves-light btn-rounded btn-outline-primary">Update</button>
	</div>
</form>