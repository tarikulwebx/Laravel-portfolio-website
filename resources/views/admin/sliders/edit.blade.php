@extends('admin.layouts.app')

@section('content')

    <a href="{{ route('sliders.index') }}" class="btn btn-primary mb-3"> <i class="fas fa-arrow-left    "></i> All Slides</a>

    @if (session('slide_update_msg'))
        <div class="alert alert-success">
            {{ session('slide_update_msg') }}
        </div>
    @endif

    <h2 class="mb-3">Slide: {{ $slider->caption }}</h2>

    <div class="row">
        <div class="col-lg-8">
            {!! Form::model($slider, ['method' => 'PATCH', 'route' => ['sliders.update', $slider->id]]) !!}

                <div class="form-group">
                    {!! Form::label('photo', 'Photo: ') !!}
                    <div class="mb-3 d-block slider-holder" id="holder">
                        <img width="100" src="{{ $slider->photo }}" alt="">
                    </div>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="photo" data-preview="holder" class="btn btn-secondary text-white px-4" style="border-top-right-radius: 0; border-bottom-right-radius: 0">
                            <i class="fa fa-picture-o"></i> Change
                            </a>
                        </span>
                        {!! Form::text('photo', null, ['class' => $errors->has('photo') ? 'form-control is-invalid' : 'form-control']) !!}
                    </div>
                    <small class="text-danger">{{ $errors->first('photo') }}</small>
                </div>

                <div class="form-group">
                    {!! Form::label('caption', 'Caption: ') !!}
                    {!! Form::text('caption', null, ['class' => $errors->has('caption') ? 'form-control is-invalid' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('caption') }}</small>
                </div>

                {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>

    

@endsection