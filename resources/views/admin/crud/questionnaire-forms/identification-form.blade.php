@extends('layout.layout-master')
@section('title','Questionnaire')
@section('breadcrumb')
	<h3 class="text-themecolor m-b-0 m-t-0">Identification</h3>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
		<li class="breadcrumb-item active">Manage</li>
		<li class="breadcrumb-item active"><a href="{{ route('questionnaire') }}">Questionnaire</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('create.questionnaire', $id) }}">Identification</a></li>
	</ol>
@endsection
@section('questionnaireTypeMenu')
	<a class="btn btn-circle btn-outline-primary btn-sm pull-right" data-toggle="modal" href='#modal-id-addquestion' title="Add Question">
		<i class="fa fa-plus"></i>
	</a>  
@endsection
@section('content')
<form action="{{ route('post.question', $id) }}" method="POST" role="form">
	@csrf
	<div class="form-group">
		<button type="submit" class="btn btn-rounded btn-primary">Save</button>
	</div>
	@section('answerKeySection')
		<div class="form-group">
			<label for="answer">Answer</label>
			<input type="text" id="answer" name="answerkey" class="form-control" placeholder="Answer" required>
		</div>
	@endsection
	@include('admin.questionnaire-forms.question-form')
	<div class="form-group">
		<button type="submit" class="btn btn-rounded btn-primary">Save</button>
	</div>
</form>
@section('ajax')
<script type="text/javascript">
	$('.makeMeRichTextarea').each( function () {
		CKEDITOR.replace(this.id,options)
	});
</script>
@include('template.modal')
@endsection
@endsection

