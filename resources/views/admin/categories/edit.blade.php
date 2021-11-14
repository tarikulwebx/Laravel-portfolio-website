@extends('admin.layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <ul class="m-0">
                    <li>{{ $error }}</li>
                </ul>
            @endforeach
        </div>

    @endif

    <h2 class="mb-3">Category : {{ $category->name }}</h2>
    <div class="row">
        <div class="col-lg-5 mb-4">
            {!! Form::model($category, ['method' => 'PATCH', 'route' => ['categories.update', $category->id]]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => ($errors->has('name')) ? 'form-control is-invalid' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
                {!! Form::submit('Update Category', ['class' => 'btn btn-info float-right']) !!}
            {!! Form::close() !!}

            {{-- Delete form --}}
            {!! Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $category->id]]) !!}
            {!! Form::submit('Delete Category', ['class' => 'btn btn-danger float-right mr-3']) !!}
            {!! Form::close() !!}

        </div>
        <div class="col-lg-7">

        </div>
        
    </div>




@endsection