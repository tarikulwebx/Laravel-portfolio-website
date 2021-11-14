@extends('admin.layouts.app')

@section('content')

<a href="{{ route('skills.create') }}" class="btn btn-primary mb-4"><i class="fas fa-plus fa-sm  "></i> New Skill</a>

    @if (session('skill_create_msg'))
        <div class="alert alert-success">
            {{ session('skill_create_msg') }}
        </div>
    @endif
    
    @if (session('skill_delete_msg'))
        <div class="alert alert-danger">
            {{ session('skill_delete_msg') }}
        </div>
    @endif
    
    



    <h2 class="mb-3">Services</h2>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Services</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTableSkills" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Skill</th>
                            <th>Progress</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Skill</th>
                            <th>Progress</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if (!empty($skills))
                            @foreach ($skills as $skill)
                                <tr>
                                    <td>{{ $skill->id }}</td>
                                    <td><a href="{{ route('skills.edit', $skill->id) }}">{{ $skill->name }}</a></td>
                                    <td>{{ $skill->progress }}%</td>
                                    <td>{{ $skill->created_at->diffForHumans() }}</td>
                                    <td>{{ $skill->updated_at->diffForHumans() }}</td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['skills.destroy', $skill->id]]) !!}
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
            $('#dataTableSkills').DataTable({
                order: [0, 'asc']
            });
        });

    </script>
@endsection