@extends('admin.layouts.app')


@section('content')
    <a href="{{ route('services.index') }}" class="btn btn-primary mb-4"><i class="fas fa-arrow-left  fa-sm  "></i> All Services</a>

    @if (session('service_update_msg'))
        <div class="alert alert-success">
            {{ session('service_update_msg') }}
        </div>
    @endif

    <h2 class="mb-3">Edit Service: <a href="{{ route('services.edit', $service->id) }}">{{ $service->name }}</a></h2>

    {!! Form::model($service, ['method' => 'PATCH', 'route' => ['services.update', $service->id], 'files' => true]) !!}
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    {!! Form::label('name', 'Service Name: ') !!}
                    {!! Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Service Description: ') !!}
                    {!! Form::textarea('description', null, ['class' => $errors->has('description') ? 'form-control is-invalid' : 'form-control', 'rows'=>4]) !!}
                    <small class="text-danger">{{ $errors->first('description') }}</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('thumbnail', 'Thumbnail(200x200): ') !!}
                    <div class="mb-3 d-block" id="holder">
                        <img width="100" src="{{ $service->thumbnail }}" alt="">
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
        

        {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}

@endsection