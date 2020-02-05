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
							<a class="btn btn-circle btn-outline-info btn-sm" href="{{ route('edit.question', $question->id ) }}">
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
							<div class="col-md-12"> {!! $question->content !!}</div>
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
						<details>
							<summary>Details</summary>
							<p class="questionDetails"><small>Answer: {{ $question->answers_key_hash }}{{md5(rand(1,999))}}</small></p>
							<p class="questionDetails"><small>Question type: {{ $question->type->name }}</small></p>
							<p class="questionDetails"><small>Category: {{ $question->categories->name }}</small></p>
							<p class="questionDetails"><small>Date created: {{ date('F d, Y h:i:s A, l', strtotime($question->created_at)) }}</small></p>
							<p class="questionDetails"><small>Last updated: {{ date('F d, Y h:i:s A, l', strtotime($question->updated_at)) }}</small></p>
						</details>
						
					</div>
				</div>
			</div>
		</div>
	@endforeach
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

