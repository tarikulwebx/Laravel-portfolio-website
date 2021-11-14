@extends('admin.layouts.app')

@section('content')
    <h2 class="mb-3">Create New User</h2>
    <div class="row">
        <div class="col-lg-6">
            {!! Form::open(['method' => 'POST', 'route' => 'users.store', 'files'=>true]) !!}
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
                    {!! Form::label('role_id', 'Role: ') !!}
                    {!! Form::select('role_id', [''=>'Choose Options', ] + $roles, null, ['class' => ($errors->has('role_id')) ? 'form-control is-invalid' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('role_id') }}</small>
                </div>
                
                <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }}">
                    {!! Form::label('is_active', 'Status:') !!}
                    {!! Form::select('is_active',  [''=>'Choose Options', '1'=>'Active', '0'=>'Not Active'], null, ['class' => ($errors->has('is_active')) ? 'form-control is-invalid' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('is_active') }}</small>
                </div>
    
                <div class="form-group">
                    {!! Form::label('photo_id', 'Photo:') !!}
                    {!! Form::file('photo_id', ['class' => ($errors->has('photo_id')) ? 'form-control-file is-invalid' : 'form-control-file']) !!}
                    <small class="text-danger">{{ $errors->first('photo_id') }}</small>
                </div>


                <div class="form-group">
                    {!! Form::label('password', 'Password: ') !!}
                    {!! Form::password('password', ['class' => ($errors->has('password')) ? 'form-control is-invalid' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                </div>
                
                <div class="text-right">
                    {!! Form::reset("Reset Data", ['class' => 'btn btn-warning']) !!}
                    {!! Form::submit('Create User', ['class' => 'btn btn-success']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>

    


@endsection