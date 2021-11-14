@extends('admin.layouts.app')

@section('content')
    @if (session('user_update_msg'))
        <div class="alert alert-success">
            {{ session('user_update_msg') }}
        </div>
    @endif
    <h2 class="mb-3">Edit User: <a href="{{ route('users.edit', $user->id) }}">{{ $user->name }}</a></h2>
    <div class="row mb-5">
        <div class="col-lg-6">
            {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id], 'files'=>true]) !!}
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
                    <img id="image_preview" class="d-block mb-2 img-rendering" height="80" src="{{ $user->photo ? $user->photo->name : 'https://via.placeholder.com/70' }}" alt="">
                    {!! Form::file('photo_id', ['id' => 'image_input_with_preview', 'class' => ($errors->has('photo_id')) ? 'form-control-file is-invalid' : 'form-control-file']) !!}
                    <small class="text-danger">{{ $errors->first('photo_id') }}</small>
                </div>


                <div class="form-group">
                    {!! Form::label('password', 'Password: ') !!}
                    {!! Form::password('password', ['class' => ($errors->has('password')) ? 'form-control is-invalid' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                </div>
                
                <div class="text-right float-right">
                    <button type="button" class="btn btn-danger px-4 mr-2" data-toggle="modal" data-target="#deleteModal">Delete</button>
                    {!! Form::submit('Update User', ['class' => 'btn btn-success']) !!}
                </div>
            {!! Form::close() !!}
            
        </div>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            Are you sure? You wanna delete?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id]]) !!}
                {!! Form::submit('Confirm', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        </div>
    </div>


@endsection