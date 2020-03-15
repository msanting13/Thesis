<div class="modal fade" id="modal-id-crud">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="modaltitle"></h4>
			</div>
			<div id="modal-loader" style="display: none; text-align: center;">
				<img src="/assets/images/loader.gif" class="img-responsive">
			</div>
			<div class="modal-body" id="crud-content">
				
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-id-addquestion">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Choose Type of Question</h4>
			</div>
			<div class="modal-body">
				@foreach($quesiontypes as $questionType)
					<a href="{{ route('create.questionnaire', $questionType->id) }}" class="btn btn-primary">{{ $questionType->name }}</a>
				@endforeach	
			</div>
		</div>
	</div>
</div>