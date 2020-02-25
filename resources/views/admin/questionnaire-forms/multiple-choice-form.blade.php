@extends('layout.layout-master')
@section('title','Create Questionnaire')
@section('breadcrumb')
	<h3 class="text-themecolor m-b-0 m-t-0">Multiple Choice</h3>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
		<li class="breadcrumb-item active">Manage</li>
		<li class="breadcrumb-item active"><a href="{{ route('questionnaire') }}">Questionnaire</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('create.questionnaire', $id) }}">Multiple Choice</a></li>
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
			<label for="name">Answer</label>
			<select class="form-control" name="answerkey" required>
				@foreach($choicesKeys as $choiceKey)
					<option>{{ $choiceKey }}</option>
				@endforeach
			</select>
		</div>
	@endsection
	@include('admin.questionnaire-forms.question-form')
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-block">
					<dl>
						@foreach($choicesKeys as $choiceKey)
						<dt>
							{{-- <input type="radio" class="with-gap radio-col-deep-purple" id="radio{{ $choiceKey }}" name="choices" value="{{ $choiceKey }}" required> --}}
							<label {{-- for="radio{{ $choiceKey }}" --}}>{{ $choiceKey }}.</label>
							<input type="hidden" name="choicekey[]" value="{{ $choiceKey }}">		
						</dt>
					  	<dd>
					  		<textarea class="form-control makeMeRichTextarea" id="{{ uniqid() }}" name="choicesValue[]" placeholder="Choices for"></textarea>
					  	</dd>
						@endforeach
					</dl>
				</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-rounded btn-primary">Save</button>
	</div>
</form>
@section('ckeditor')
<script src="/assets/plugins/ckeditor/ckeditor.js" class="ckeEditor"></script>
<script src="/assets/plugins/ckeditor/custom/config.js"></script>
@endsection
@section('ajax')
<script type="text/javascript">
	$('.makeMeRichTextarea').each( function () {
		CKEDITOR.replace(this.id,options)
	});
</script>
@include('template.modal')
@endsection
@endsection

