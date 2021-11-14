@extends('admin.layouts.app')


@section('content')
    <a href="{{ route('skills.index') }}" class="btn btn-primary mb-4"><i class="fas fa-arrow-left  fa-sm  "></i> All Skills</a>

    <h2 class="mb-3">New Skill</h2>

    {!! Form::open(['method' => 'POST', 'route' => 'skills.store', 'files' => true]) !!}
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    {!! Form::label('name', 'Skill Name: ') !!}
                    {!! Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
                <div class="form-group">
                    {!! Form::label('progress', 'Progress(%): ') !!}
                    {!! Form::text('progress', null, ['class' => $errors->has('progress') ? 'form-control is-invalid' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('progress') }}</small>
                </div>
                
            </div>
        </div>
        

        {!! Form::submit('Create Skill', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}

@endsection