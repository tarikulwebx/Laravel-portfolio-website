@extends('layouts.app')

@section('content')

    <div class="container">

        

        <h2 class="mb-4">Edit Profile</h2>

        {!! Form::model($user, ['method' => 'POST', 'route' => ['update-profile', $user->id], 'files'=>true]) !!}
        <div class="row mb-5">
            <div class="col-md-4 col-xl-3">
                <div class="form-group">
                    {!! Form::label('photo', 'Profile picture:') !!}
                    <div class="square-image-box">
                        <img id="image_preview" class="d-block mb-2 img-rendering img-fluid rounded" src="{{ $user->photo ? $user->photo->name : 'https://via.placeholder.com/300' }}" alt="">
                    </div>
                    {!! Form::file('photo', ['id' => 'image_input_with_preview', 'class' => ($errors->has('photo')) ? 'form-control-file is-invalid' : 'form-control-file']) !!}
                    <small class="text-danger">{{ $errors->first('photo') }}</small>
                </div>
            </div>
            <div class="col-md-8 col-xl-9">
                <div class="form-group">
                    {!! Form::label('name', 'Name: ') !!}
                    {!! Form::text('name', null, ['class' => ($errors->has('name')) ? 'form-control is-invalid' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email: ') !!}
                    {!! Form::email('email', null, ['class' => ($errors->has('email')) ? 'form-control is-invalid' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                </div>
                
                <div class="form-group">
                    {!! Form::label('password', 'Password: ') !!}
                    {!! Form::password('password', ['class' => ($errors->has('password')) ? 'form-control is-invalid' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                </div>
                
                <div class="text-right float-right">
                    {!! Form::submit('Update', ['class' => 'btn btn-orange']) !!}
                </div>
                
            </div>
        </div>
        {!! Form::close() !!}


    </div>

    


@endsection