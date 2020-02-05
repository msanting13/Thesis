@extends('layout.layout-master')
@section('title','Questionnaire')
@section('breadcrumb')
	<h3 class="text-themecolor m-b-0 m-t-0">Fill in the Blank</h3>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
		<li class="breadcrumb-item active">Manage</li>
		<li class="breadcrumb-item active"><a href="{{ route('questionnaire') }}">Questionnaire</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('create.questionnaire', $id) }}">Fill in the blank</a></li>
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
						<label>Question</label>
						<br>
						<button type="button" id="addBlankField-btn" class="btn waves-effect waves-light btn-rounded btn-outline-info" data-toggle="tooltip" data-original-title="Add Blank Field">Add Blank Field <i class="fa fa-plus"></i></button>
					</div>
					<div class="form-group">
						<div id="questionnaireEditor" contenteditable="true" autofocus></div>
						<textarea id="questionnaireContainer" name="content" required hidden="hidden"></textarea>
					</div>
					<div class="form-group">
						<label for="numberAnswersKeyFields">Answer</label>
						<br>
						<select id="numberAnswersKeyFields" class="form-control col-md-4">
							<option>Number of answers field</option>
							@for($i=1; $i <= 5; $i++)
								<option>{{ $i }}</option>
							@endfor								
						</select>
						<button type="button" id="addAnswersKeyFields-btn" class="btn waves-effect waves-light btn-circle btn-outline-info" data-toggle="tooltip" data-original-title="Add number of answers field">
							<i class="fa fa-plus"></i>
						</button>
					</div>
					<div id="answersKeyFields" class="list-group"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary">Save</button>
	</div>
</form>
@section('fillintheblankJS')
<script type="text/javascript" src="/js/fillintheblank.js"></script>
@endsection
@include('template.modal')
@endsection

