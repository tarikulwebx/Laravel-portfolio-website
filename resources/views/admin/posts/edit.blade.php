@extends('admin.layouts.app')

@section('content')
    <a class="btn btn-primary mb-3" href="{{ route('posts.index') }}" role="button"><i class="fas fa-arrow-alt-circle-left   mr-2 "></i>Back to Posts</a>
    @if (session('post_action_msg'))
        <div class="alert alert-success">
            {{ session('post_action_msg') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="m-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h2 class="mb-3">Edit Post</h2>
    {!! Form::model($post , ['method' => 'PATCH', 'route' => ['posts.update', $post->id], 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title: ') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('title') }}</small>
        </div>

        <div class="form-group">
            {!! Form::label('category_id', 'Category: ') !!}
            {!! Form::select('category_id', [''=>'Choose category',] + $categories, null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('category_id') }}</small>
        </div>

        <div class="form-group">
            {!! Form::label('thumbnail', 'Thumbnail: ') !!}
            <div class="mb-3" id="holder" style="max-height:70px;">
                @if ($post->thumbnail)
                    <img src="{{ $post->thumbnail }}" alt="" style="height: 5rem">
                @endif
            </div>
            <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-secondary text-white px-4" style="border-top-right-radius: 0; border-bottom-right-radius: 0">
                      <i class="fa fa-picture-o"></i> Choose
                    </a>
                </span>
                {!! Form::text('thumbnail', null, ['class' => 'form-control']) !!}
            </div>
             <small class="text-danger">{{ $errors->first('thumbnail') }}</small>
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Body: ') !!}
            {!! Form::textarea('body', null, ['id'=>'tinyEditor', 'class' => 'form-control']) !!}
            <small class="text-danger">{!! $errors->first('body') !!}</small>
        </div>

        {!! Form::submit('Update Post', ['class' => 'btn btn-info']) !!}
    {!! Form::close() !!}
@endsection

