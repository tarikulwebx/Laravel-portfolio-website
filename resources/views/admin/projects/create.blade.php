@extends('admin.layouts.app')


@section('content')
    <a href="{{ route('projects.index') }}" class="btn btn-primary mb-4"><i class="fas fa-arrow-left  fa-sm  "></i> All Projects</a>

    <h2 class="mb-3">New Project</h2>

    {!! Form::open(['method' => 'POST', 'route' => 'projects.store', 'files' => true]) !!}
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    {!! Form::label('title', 'Title: ') !!}
                    {!! Form::text('title', null, ['class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control', 'placeholder'=>'Wiki Portfolio']) !!}
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                </div>
                <div class="form-group">
                    {!! Form::label('category', 'Category: ') !!}
                    {!! Form::text('category', null, ['class' => $errors->has('category') ? 'form-control is-invalid' : 'form-control', 'placeholder'=>'Laravel app']) !!}
                    <small class="text-danger">{{ $errors->first('category') }}</small>
                </div>
                
                
                <div class="form-group">
                    {!! Form::label('link', 'Project link: ') !!}
                    {!! Form::text('link', null, ['class' => $errors->has('link') ? 'form-control is-invalid' : 'form-control', 'placeholder'=>'https://github.com/exmaple']) !!}
                    <small class="text-danger">{{ $errors->first('link') }}</small>
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Short Description: ') !!}
                    {!! Form::textarea('description', null, ['class' => $errors->has('description') ? 'form-control is-invalid' : 'form-control', 'rows'=>4, 'placeholder'=>'write a short description']) !!}
                    <small class="text-danger">{{ $errors->first('description') }}</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('thumbnail', 'Thumbnail: ') !!}
                    <div class="mb-3 d-block" id="holder">
                        <img width="100" src="https://via.placeholder.com/300" alt="">
                    </div>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-secondary text-white px-4" style="border-top-right-radius: 0; border-bottom-right-radius: 0">
                            <i class="fa fa-picture-o"></i> Choose
                            </a>
                        </span>
                        {!! Form::text('thumbnail', null, ['class' => $errors->has('description') ? 'form-control is-invalid' : 'form-control']) !!}
                    </div>
                    <small class="text-danger">{{ $errors->first('thumbnail') }}</small>
                </div>
            </div>
        </div>
        

        {!! Form::submit('Create Project', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}

@endsection