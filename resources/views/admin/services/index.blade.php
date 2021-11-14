@extends('admin.layouts.app')

@section('content')

<a href="{{ route('services.create') }}" class="btn btn-primary mb-4"><i class="fas fa-plus fa-sm  "></i> New Service</a>

    @if (session('service_create_msg'))
        <div class="alert alert-success">
            {{ session('service_create_msg') }}
        </div>
    @endif
    
    @if (session('service_delete_msg'))
        <div class="alert alert-danger">
            {{ session('service_delete_msg') }}
        </div>
    @endif
    
    



    <h2 class="mb-3">Services</h2>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Services</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTableServices" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Thumbnail</th>
                            <th>Service</th>
                            <th>Description</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Thumbnail</th>
                            <th>Service</th>
                            <th>Description</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if (!empty($services))
                            @foreach ($services as $service)
                                <tr>
                                    <td>{{ $service->id }}</td>
                                    <td>
                                        <img style="max-height: 60px; border-radius: 4px;" src="{{ $service->thumbnail }}" alt="">
                                    </td>
                                    <td style="min-width: 130px;"><a href="{{ route('services.edit', $service->id) }}">{{ $service->name }}</a></td>
                                    <td>
                                        <div class="mb-1">{{ $service->description }}</div>
                                        <small class="mr-2">Created: {{ $service->created_at->diffForHumans() }}</small>
                                        <small>Updated: {{ $service->updated_at->diffForHumans() }}</small>
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['services.destroy', $service->id]]) !!}
                                            {!! Form::button('<i class="fas fa-trash-alt fa-sm"></i>', ['class' => 'btn btn-danger', 'type'=>'submit']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTableServices').DataTable({
                order: [0, 'asc']
            });
        });

    </script>
@endsection