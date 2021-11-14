@extends('admin.layouts.app')


@section('content')

    <a href="{{ route('projects.create') }}" class="btn btn-primary mb-4"><i class="fas fa-plus    fa-sm"></i> New Project</a>


    @if (session('project_action_success_msg'))
        <div class="alert alert-success">
            {{ session('project_action_success_msg') }}
        </div>
    @endif

    <h2 class="mb-3">Projects</h2>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Projects</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTableProjects" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Link</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Link</th>
                            <th>Description</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if (!empty($projects))
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>
                                        <img style="max-height: 60px; border-radius: 4px;" src="{{ $project->thumbnail }}" alt="">
                                    </td>
                                    <td style="min-width: 130px;"><a href="{{ route('projects.edit', $project->id) }}">{{ $project->title }}</a></td>
                                    <td style="min-width: 130px;">{{ $project->category }}</td>
                                    <td><a href="{{ $project->link }}" target="_blank">{{ $project->link }}</a></td>
                                    <td>
                                        <div class="mb-1">{{ $project->description }}</div>
                                       <small class="mr-2">Created: {{ $project->created_at->diffForHumans() }}</small>
                                        <small>Updated: {{ $project->updated_at->diffForHumans() }}</small>
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
            $('#dataTableProjects').DataTable({
                order: [0, 'desc']
            });
        });

    </script>
@endsection