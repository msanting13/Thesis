<form action="{{ route('update.category', $category->id) }}" method="POST" role="form">
	@csrf
	<input name="_method" type="hidden" value="PATCH">
	<div class="form-group">
		<label for="Name">Name</label>
		<input type="text" class="form-control" id="categoryName" name="name" placeholder="Category name" value="{{ $category->name }}">
	</div>
	<div class="form-group">
		<label for="description">Description</label>
		<textarea  class="form-control" id="categoryDescription" name="description" placeholder="Short description">{{ $category->description }}</textarea>
	</div>
	<div class="form-group">
		<button type="submit" class="btn waves-effect waves-light btn-rounded btn-outline-primary">Save</button>
	</div>
</form>