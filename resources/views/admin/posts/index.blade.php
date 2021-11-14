@extends('admin.layouts.app')

@section('content')
<a class="btn btn-primary mb-3 px-3" href="{{ route('posts.create') }}" role="button">New Post</a>
    @if (session('post_action_msg'))
        <div class="alert alert-success">
            {{ session('post_action_msg') }}
        </div>
    @endif
    
    <h2 class="mb-3">All Posts</h2>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Posts</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTablePosts" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Created</th>
                            <th>Updated</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Created</th>
                            <th>Updated</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if (!empty($posts))
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td><img height="44" src="{{  $post->thumbnail  ? $post->thumbnail : 'https://via.placeholder.com/300x150?text=No image' }}" alt=""></td>
                                    <td><a href="{{ route('posts.edit', $post->id) }}">{{ $post->title }}</a></td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                    <td>{{ $post->updated_at->diffForHumans() }}</td>
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
            $('#dataTablePosts').DataTable({
                order: [0, 'desc']
            });
        });

    </script>
@endsection