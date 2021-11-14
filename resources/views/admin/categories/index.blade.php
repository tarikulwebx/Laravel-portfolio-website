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

    @if (session('category_create_msg'))
        <div class="alert alert-success">
            {{ session('category_create_msg') }}
        </div>
        @elseif (session('category_update_msg'))
        <div class="alert alert-success">
            {{ session('category_update_msg') }}
        </div>
        @elseif (session('category_delete_msg'))
        <div class="alert alert-success">
            {{ session('category_delete_msg') }}
        </div>
        
    @endif
    <h2 class="mb-3">Categories</h2>
    <div class="row">
        <div class="col-lg-5 mb-4">
            {!! Form::open(['method' => 'POST', 'route' => 'categories.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => ($errors->has('name')) ? 'form-control is-invalid' : 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
                {!! Form::submit('Create Category', ['class' => 'btn btn-info']) !!}
            {!! Form::close() !!}
        </div>
        <div class="col-lg-7">
            
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
                </div>
                <div class="card-body">
                    @if ($categories)
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTableCategories" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td><a href="{{ route('categories.edit', $category->id) }}">{{ $category->name }}</a></td>
                                            <td>{{ $category->created_at->diffForHumans() }}</td>
                                            <td>{{ $category->updated_at->diffForHumans() }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        @else
                            <h3>No category yet!</h3>
                    @endif
                </div>
            </div>
        </div>
        
    </div>




@endsection