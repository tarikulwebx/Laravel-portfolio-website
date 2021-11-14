@extends('admin.layouts.app')

@section('content')
    <a href="{{ route('sliders.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus  fa-sm  "></i> New Slide</a>

    @if (session('slide_create_msg'))
        <div class="alert alert-success">
            {{ session('slide_create_msg') }}
        </div>
    @endif

    <h2 class="mb-3">Intro Slides</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Caption</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @if (count($sliders) > 0)
                @foreach ($sliders as $slide)
                    <tr>
                        <td>{{ $slide->id }}</td>
                        <td>
                            <img height="50" src="{{ $slide->photo }}" alt="">
                        </td>
                        <td><a href="{{ route('sliders.edit', $slide->id) }}">{{ $slide->caption }}</a></td>
                        <td>{{ $slide->created_at->diffForHumans() }}</td>
                        <td>{{ $slide->updated_at->diffForHumans() }}</td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['sliders.destroy', $slide->id], 'class' => 'form-horizontal']) !!}
                            {!! Form::button('<i class="fas fa-trash-alt  fa-sm  "></i>', ['class' => 'btn btn-danger', 'type'=>'submit']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection