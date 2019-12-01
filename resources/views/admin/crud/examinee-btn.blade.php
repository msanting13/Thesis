<form action="{{ route('delete.examinee',$id) }}" method="POST">
	@csrf
	<a class="btn btn-circle btn-outline-info btn-sm" href="{{ route('examinee.profile',$id) }}">
		<i class="fa fa-user"></i>
	</a>	
	<a class="btn btn-circle btn-outline-primary btn-sm edit-examinee" href="javascript:void(0)" data-toggle="modal" data-target="#modal-id-crud" data-id="{{ $id }}" data-backdrop="static">
		<i class="mdi mdi-pencil"></i>
	</a>
	<input name="_method" type="hidden" value="DELETE">
	<button type="button" class="btn btn-circle btn-outline-danger btn-sm btn-delete" data-toggle="tooltip" title="Delete" data-textval="{{ $name }}">
		<i class="mdi mdi-delete"></i>
	</button>
</form>
<script src="/assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>