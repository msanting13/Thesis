<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Summernote Lite</title>
       <script src="/assets/plugins/ckeditor/ckeditor.js"></script>
{{--     <link href="/assets/plugins/summernote/summernote-lite.css" rel="stylesheet">
    <script src="/assets/plugins/summernote/summernote-lite.js"></script> --}}
  </head>
  <body>
    <div id="summernote"></div>
    <textarea id="editor2"></textarea>
    <script src="/assets/plugins/ckeditor/custom/config.js"></script>
    <script type="text/javascript">
      CKEDITOR.replace('editor2',options)
    </script>

{{--     <script type="text/javascript">
    CKEDITOR.replace('editor2',options);
    </script> --}}
{{--     <script>

    //Define function to open filemanager window
    var lfm = function(options, cb) {
      var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
      window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
      window.SetUrl = cb;
    };

    // Define LFM summernote button
    var LFMButton = function(context) {
      var ui = $.summernote.ui;
      var button = ui.button({
        contents: '<i class="note-icon-picture"></i> ',
        tooltip: 'Insert image with filemanager',
        click: function() {

          lfm({type: 'image', prefix: '/laravel-filemanager'}, function(lfmItems, path) {
            lfmItems.forEach(function (lfmItem) {
              context.invoke('insertImage', lfmItem.url);
            });
          });

        }
      });
      return button.render();
    };

    //Initialize summernote with LFM button in the popover button group
    // /Please note that you can add this button to any other button group you'd like
    $('#summernote').summernote({
      toolbar: [
        ['popovers', ['lfm']],
      ],
      buttons: {
        lfm: LFMButton,
      }
    });
    </script> --}}
  </body>
</html>



