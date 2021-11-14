@extends('admin.layouts.app')

@section('content')
    <h2 class="mb-4">Widgets</h2>
    <div class="row">
        @foreach ($widgets as $widget)
            <div class="col-lg-6 mb-4 pb-3">

                <div id="success_msg_{{ $widget->id }}" class="alert alert-success d-none"></div>

                <h3>{{ Str::title(str_replace('_', ' ', $widget->location)) }}</h3>
                <div class="form-group">
                    <label for="title">Widget Title: </label>
                    <input type="text" name="title" id="title_{{ $widget->id }}" class="form-control" value="{{ $widget->title }}">
                    <small id="title_error_msg_{{ $widget->id }}" class="text-danger d-none"></small>
                </div>
                <div class="form-group">
                    <label for="body">Widget Body: </label>
                    <textarea name="body" id="body_{{ $widget->id }}" class="tinyWidgetEditor form-control">{!! $widget->body !!}</textarea>
                    <small id="body_error_msg_{{ $widget->id }}" class="text-danger d-none"></small>
                </div>
                <button class="updateWidgetBtn btn btn-primary btn-sm px-3" data-id="{{ $widget->id }}">Update</button>

            </div>
        @endforeach
        
    </div>
@endsection


@section('scripts')
    <script>
        
        tinymce.init({
            selector: 'textarea.tinyWidgetEditor',
            height: 300,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignjustify | bullist numlist | code',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });



        $('.updateWidgetBtn').click(function(){
            
            var id = $(this).data('id');
            var title = $('#title_'+id).val();
            var body = tinymce.get("body_"+id).getContent({format: "raw"});

            var errorFlag = 0;

            if($.trim(title).length == 0) {
                $('#title_error_msg_'+id).removeClass('d-none').html('The title field is empty.');
                $('#title_'+id).addClass('is-invalid');
                errorFlag = 1;
            } else {
                $('#title_error_msg_'+id).addClass('d-none');
                $('#title_'+id).removeClass('is-invalid');
            }
            if($.trim(body).length == 0) {
                $('#body_error_msg_'+id).removeClass('d-none').html('The body field is empty.');
                $('#body_'+id).addClass('is-invalid');
                errorFlag = 1;
            } else {
                $('#body_error_msg_'+id).addClass('d-none')
                $('#body_'+id).removeClass('is-invalid');
            }

            // If no errors found
            if (errorFlag == 0) {
                var url = '/admin/widgets/'+id;
                axios.put(url, {
                    title: title,
                    body: body,
                })
                .then(res => {
                    if(res.status == 200) {
                        if(res.data == 1) {
                            $('#success_msg_'+id).removeClass('alert-danger d-none').addClass('alert-success').html('Update success!');
                        } else {
                            $('#success_msg_'+id).removeClass('alert-success d-none').addClass('alert-danger').html('Update failed!');
                        }
                    } else {
                        $('#success_msg_'+id).removeClass('alert-success d-none').addClass('alert-danger').html('Update failed!');
                    }
                })
                .catch(err => {
                    $('#success_msg_'+id).removeClass('alert-success d-none').addClass('alert-danger').html(err);
                })
            }
            
            
        });


    </script>
@endsection