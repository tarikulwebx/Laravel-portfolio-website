@extends('admin.layouts.app')

@section('content')
    @if (session('about_update_msg'))
        <div class="alert alert-success">
            {{ session('about_update_msg') }}
        </div>
    @endif
    <h2 class="mb-3">About Info</h2>

    {!! Form::model($about, ['method' => 'PATCH', 'route' => ['about.update', $about->id], 'files' => true]) !!}
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('name', 'Name: ') !!}
                    {!! Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('profession', 'Profession: ') !!}
                    {!! Form::text('profession', null, ['class' => $errors->has('profession') ? 'form-control is-invalid' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('profession') }}</small>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('phone', 'Phone: ') !!}
                    {!! Form::text('phone', null, ['class' => $errors->has('phone') ? 'form-control is-invalid' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('phone') }}</small>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('email', 'Email: ') !!}
                    {!! Form::text('email', null, ['class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            {!! Form::label('facebook', 'Facebook (url): ') !!}
                            {!! Form::url('facebook', null, ['class' => $errors->has('facebook') ? 'form-control is-invalid' : 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('facebook') }}</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            {!! Form::label('github', 'Github (url): ') !!}
                            {!! Form::url('github', null, ['class' => $errors->has('github') ? 'form-control is-invalid' : 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('github') }}</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            {!! Form::label('twitter', 'Twitter (url): ') !!}
                            {!! Form::url('twitter', null, ['class' => $errors->has('twitter') ? 'form-control is-invalid' : 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('twitter') }}</small>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('address', 'Address: ') !!}
                    {!! Form::text('address', null, ['class' => $errors->has('address') ? 'form-control is-invalid' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('address') }}</small>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('cv_link', 'CV File: ') !!}
                    <div class="d-block" id="holder2">
                    </div>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm2" data-input="cv_link" data-preview="holder2" class="btn btn-secondary text-white px-4" style="border-top-right-radius: 0; border-bottom-right-radius: 0">
                                Change
                            </a>
                        </span>
                        {!! Form::text('cv_link', null, ['id'=>'cv_link', 'class' => $errors->has('cv_link') ? 'form-control is-invalid' : 'form-control']) !!}
                    </div>
                    <small class="text-danger">{{ $errors->first('cv_link') }}</small>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('cover_photo', 'Cover photo: ') !!}
                    <div class="mb-2 d-block" id="holder">
                        <img height="70" src="{{ $about->cover_photo == null ? 'https://via.placeholder.com/100' : $about->cover_photo }}" alt="">
                    </div>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="cover_photo" data-preview="holder" class="btn btn-secondary text-white px-4" style="border-top-right-radius: 0; border-bottom-right-radius: 0">
                             Change
                            </a>
                        </span>
                        {!! Form::text('cover_photo', null, ['class' => $errors->has('cover_photo') ? 'form-control is-invalid' : 'form-control']) !!}
                    </div>
                    <small class="text-danger">{{ $errors->first('cover_photo') }}</small>
                </div>
            </div>

            

            <div class="col-12">
                <div class="form-group">
                    {!! Form::label('short_description', 'Short description: ') !!}
                    {!! Form::textarea('short_description', null, ['class' => $errors->has('short_description') ? 'form-control is-invalid' : 'form-control', 'rows'=>3]) !!}
                    <small class="text-danger">{{ $errors->first('short_description') }}</small>
                </div>
    
                <div class="form-group">
                    {!! Form::label('more_description', 'More description: ') !!}
                    {!! Form::textarea('more_description', null, ['id' => 'tinyEditor', 'class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('more_description') }}</small>
                </div>
            
                {!! Form::submit('Update Info', ['class' => 'btn btn-success mt-3']) !!}
            </div>

            
        </div>
        

        
    {!! Form::close() !!}

@endsection