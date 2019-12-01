<form action="{{ action('SchoolYearController@destroy', $schoolyear->id) }}" method="POST">
	@csrf
	<input name="_method" type="hidden" value="DELETE">
	<button type="button" class="btn btn-circle btn-outline-danger btn-sm btn-delete" data-toggle="tooltip" title="Delete" data-textval="{{ $schoolyear->school_year }}">
		<i class="mdi mdi-delete"></i>
	</button>
</form>
<script src="/assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>