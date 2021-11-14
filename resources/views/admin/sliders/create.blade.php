@extends('admin.layouts.app')

@section('content')

    <a href="{{ route('sliders.index') }}" class="btn btn-primary mb-3"> <i class="fas fa-arrow-left    "></i> All Slides</a>

    <h2 class="mb-3">New Slide</h2>

    <div class="row">
        <div class="col-lg-8">
            {!! Form::open(['method' => 'POST', 'route' => 'sliders.store']) !!}

                <div class="form-group">
                    {!! Form::label('photo', 'Photo: ') !!}
                    <div class="mb-3 d-block slider-holder" id="holder">
                        <img width="100" src="https://via.placeholder.com/300x200" alt="">
                    </div>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="photo" data-preview="holder" class="btn btn-secondary text-white px-4" style="border-top-right-radius: 0; border-bottom-right-radius: 0">
                            <i class="fa fa-picture-o"></i> Choose
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

                {!! Form::submit('Create', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>

    

@endsection