@extends('layout.layout-master')
@section('title','Questionnaire')
@section('breadcrumb')
	<h3 class="text-themecolor m-b-0 m-t-0">Questionnaire</h3>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
		<li class="breadcrumb-item active">Manage</li>
		<li class="breadcrumb-item active"><a href="{{ route('questionnaire') }}">Questionnaire</a></li>
	</ol>
@endsection
@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-block">
					<h3>
						Questionnaire
						<a class="btn btn-circle btn-outline-primary btn-sm pull-right" data-toggle="modal" href='#modal-id-addquestion'>
							<i class="fa fa-plus"></i>
						</a>   
					</h3>
				</div>
			</div>
		</div>
	</div>
	@php
		$i = 1;
	@endphp
	@foreach($questions as $question)
		<div class="row" id="{{ uniqid() }}">
			<div class="col-md-12">
				<div class="card">
					<div class="card-block">
						<form action="{{ route('delete.question', $question->id) }}" method="POST" class="pull-right">
							@csrf
							<a class="btn btn-circle btn-outline-info btn-sm edit-question" href="javascript:void(0)" data-toggle="modal" data-target="#modal-id-crud" data-id="{{ $question->id }}" data-backdrop="static">
								<i class="mdi mdi-pencil"></i>
							</a>
							<input name="_method" type="hidden" value="DELETE">
							<button type="button" class="btn btn-circle btn-outline-danger btn-sm btn-delete" data-toggle="tooltip" title="Delete" data-textval="{{ $question->name }}">
								<i class="mdi mdi-delete"></i>
							</button>
						</form>
						<h4>Question #{{ $i++ }}</h4>
						<div class="clearfix"></div>
						<hr>
						<h4 class="row">
							<div class="col-md-6"> {!! $question->content !!}</div>
						</h4>
						<table class="table table-hover table-condensed table-striped table-bordered">
							<tbody>
								<form>
									@foreach($question->choices as $choice)
										<tr>
											<th style="width: 2px;">
												<input name="group5" type="radio" id="{{ $question->id }}radio_{{ $choice->key }}" value="{{ $choice->key }}" class="with-gap radio-col-deep-purple">
												<label for="{{ $question->id }}radio_{{ $choice->key }}">{{ $choice->key }}</label>
											</th>
											<td>
												{!! $choice->content !!}
											</td>
										</tr>
									@endforeach
								</form>
							</tbody>
						</table>
						<hr>
						<small class="pull-left">Answer: {{ $question->answers_key }}{{md5(rand(1,999))}}</small>
						<small class="pull-right">Category: {{ $question->categories->name }}</small>
					</div>
				</div>
			</div>
		</div>
	@endforeach

	<div class="modal fade" id="modal-id-addquestion">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Add Question</h4>
				</div>
				<div class="modal-body">
				<form action="{{ route('post.question') }}" method="POST" role="form">
					@csrf
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<div class="form-group">
								<label for="category">Category</label>
								<select class="form-control" name="category" required>
									<option></option>
									@foreach($categories as $category)
										<option value="{{ $category->id }}">{{ $category->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="name">Question</label>
								<textarea class="form-control makeMeRichTextarea" id="questionEditor" name="name"></textarea>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="border-left: 1px solid#ccc;">
							<div class="table-responsive" style="height: 500px; overflow-y: visible;">
								<table class="table table-condensed table-hover table-striped">
									<tbody>
										@foreach($choicesKeys as $choiceKey)
										<tr>
											<td>
												<input type="radio" class="with-gap radio-col-deep-purple" id="radio{{ $choiceKey }}" name="choices" value="{{ $choiceKey }}" required>
												<label for="radio{{ $choiceKey }}">{{ $choiceKey }}</label>
												<input type="hidden" name="choicekey[]" value="{{ $choiceKey }}">
											</td>
											<td>
												<textarea class="form-control makeMeRichTextarea" id="{{ uniqid() }}" name="choicesValue[]" placeholder="Choices for"></textarea>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
	@section('ajax')
		<script src="/js/ajax/edit-question-ajax.js"></script>
	    <script type="text/javascript">
		  $('.makeMeRichTextarea').each( function () {
		  	CKEDITOR.replace(this.id,options)
		  });
	    </script>
	@endsection
	@include('template.modal')
@endsection

