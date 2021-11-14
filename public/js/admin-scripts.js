/*
*   Image input preview
*/
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            $('#image_preview').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}

$("#image_input_with_preview").change(function(){
    readURL(this);
});



/*
*   Tiny MCE Editor 
*/

  var editor_config = {
      path_absolute: "/",
      selector: 'textarea#tinyEditor',
      height: '480',
      relative_urls: false,
      plugins: [
          "advlist autolink lists link image charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen",
          "insertdatetime media nonbreaking save table directionality",
          "emoticons template paste textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
      file_picker_callback: function (callback, value, meta) {
          var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
          var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

          var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
          if (meta.filetype == 'image') {
              cmsURL = cmsURL + "&type=Images";
          } else {
              cmsURL = cmsURL + "&type=Files";
          }

          tinyMCE.activeEditor.windowManager.openUrl({
              url: cmsURL,
              title: 'Filemanager',
              width: x * 0.8,
              height: y * 0.8,
              resizable: "yes",
              close_previous: "no",
              onMessage: (api, message) => {
                  callback(message.content);
              }
          });
      }
  };

  tinymce.init(editor_config);




/**
 * Laravel File manager Standalone
 */
 $('#lfm').filemanager('image'); // filemanager type image or file

 $('#lfm2').filemanager('file'); // filemanager type image or file