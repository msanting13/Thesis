<form action="{{ route('update.question', $question->id) }}" method="POST" role="form">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" name="category" required>
                        <option value="{{ $question->categories->id }}">{{ $question->categories->name }}</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Question</label>
                    <textarea class="form-control makeMeRichTextareaEdit" id="editQuestionEditor" name="name">{{ $question->content }}</textarea>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="border-left: 1px solid#ccc;">
                <div class="table-responsive" style="height: 520px; overflow-y: visible;">
                    <table class="table table-condensed table-hover table-striped">
                        <tbody>
                            @foreach($question->choices as $choice)
                            <tr>
                                <td>    
                                    <input type="radio" class="with-gap radio-col-deep-purple" id="edit-radio{{ $choice->key }}" name="choices" value="{{ $choice->key }}">
                                    <label for="edit-radio{{ $choice->key }}">{{ $choice->key }}</label>
                                </td>
                                <td>
                                    <textarea class="form-control makeMeRichTextareaEdit" id="{{ uniqid() }}" name="choicesValue[]" placeholder="Choices 1">{{ $choice->content }}</textarea>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
</form>
<script type="text/javascript">
  $('.makeMeRichTextareaEdit').each( function () {
    CKEDITOR.replace(this.id,options)
  });
</script>