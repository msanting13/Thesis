@extends('layout.layout-master')
@section('title','Questionnaire')
@section('breadcrumb')
	<h3 class="text-themecolor m-b-0 m-t-0">Edit</h3>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
		<li class="breadcrumb-item active">Manage</li>
		<li class="breadcrumb-item active"><a href="{{ route('questionnaire') }}">Questionnaire</a></li>
		<li class="breadcrumb-item active"><a href="#">Identification</a></li>
	</ol>
@endsection
@section('questionnaireTypeMenu')
	<a class="btn btn-circle btn-outline-primary btn-sm pull-right" data-toggle="modal" href='#modal-id-addquestion' title="Add Question">
		<i class="fa fa-plus"></i>
	</a>  
@endsection
@section('content')
<form action="{{ route('update.question', $question->id) }}" method="POST" role="form">
	@csrf
	<input name="_method" type="hidden" value="PATCH">
	<div class="form-group">
		<button type="submit" class="btn btn-rounded btn-primary">Update</button>
	</div>
	@section('answerKeySection')
		<div class="form-group">
			<label for="answer">Answer</label>
			<input type="text" id="answer" name="answerkey" class="form-control" placeholder="Answer" required>
		</div>
	@endsection
	@include('admin.crud.questionnaire-forms.question-form')
	<div class="form-group">
		<button type="submit" class="btn btn-rounded btn-primary">Update</button>
	</div>
</form>
@section('ckeditor')
<script src="/assets/plugins/ckeditor/ckeditor.js" class="ckeEditor"></script>
<script src="/assets/plugins/ckeditor/custom/config.js"></script>
@endsection
@section('ajax')
<script type="text/javascript">
	$('.makeMeRichTextareaEdit').each( function () {
		CKEDITOR.replace(this.id,options)
	});
</script>
@include('template.modal')
@endsection
@endsection

