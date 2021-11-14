@extends('admin.layouts.app')

@section('title', 'Users')

@section('content')

    @if (session('user_create_message'))
        <div class="alert alert-success mb-2">
            {{ session('user_create_message') }}
        </div>

        @elseif (session('delete_user_msg'))
        <div class="alert alert-success mb-2">
            {{ session('delete_user_msg') }}
        </div>
    @endif

    <h1 class="mb-3">Users</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableUsers" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Email</th>
                            <th>Created</th>
                            <th>Updated</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Email</th>
                            <th>Created</th>
                            <th>Updated</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if (! empty($users))
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <img height="44" src="{{ $user->photo ? $user->photo->name : 'https://via.placeholder.com/50' }}" alt="">
                                    </td>
                                    <td><a href="{{ route('users.edit', $user->id) }}">{{ $user->name }}</a></td>
                                    <td>{{ $user->role->name }}</td>
                                    <td>
                                        @if ($user->is_active == 1)
                                            <i class="fas fa-circle text-success"></i>
                                            Active
                                            @else
                                            <i class="fas fa-circle text-muted"></i>
                                            Not Active
                                        @endif</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td>{{ $user->updated_at->diffForHumans() }}</td>
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
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTableUsers').DataTable();
        });

    </script>
@endsection