@extends('admin.layouts.app')

@section('content')
    @if (session('reply_delete_msg'))
        <div class="alert alert-success">
            {{ session('reply_delete_msg') }}
        </div>
    @endif
    <h2 class="mb-4">All Replies</h2>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Replies</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableReplies" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Author</th>
                            <th>Comment</th>
                            <th>Reply</th>
                            <th>Status</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Author</th>
                            <th>Comment</th>
                            <th>Reply</th>
                            <th>Status</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if (!empty($replies))
                            @foreach ($replies as $reply)
                                <tr>
                                    <td>{{ $reply->id }}</td>
                                    <td style="max-width: 100px">
                                        <span class="d-block">{{ $reply->author }}</span>
                                        <small>{{ $reply->email }}</small>
                                    </td>
                                    <td style="max-width: 180px"><a href="{{ url('/posts/' . $reply->comment->post->id . '/#comments') }}">{{ Str::limit($reply->comment->body, 70, '...') }}</a></td>
                                    <td>{{  Str::limit($reply->body, 120, '...') }}</td>
                                    <td>
                                        <button id="approveReplyBtn-{{ $reply->id }}" class="approveReplyBtn btn btn-primary btn-sm {{ $reply->is_active == 1 ? 'd-none' : '' }}" data-id="{{ $reply->id }}">Approve</button>
                                        <button id="unApproveReplyBtn-{{ $reply->id }}" class="unApproveReplyBtn btn btn-warning btn-sm {{ $reply->is_active == 0 ? 'd-none' : '' }}" data-id="{{ $reply->id }}">Unapprove</button>
                                    </td>
                                    <td>

                                        {!! Form::open(['method' => 'DELETE', 'route' => ['replies.destroy', $reply->id]]) !!}
                                        {!! Form::submit('Delete', ['class' => 'deleteReplyBtn btn btn-danger btn-sm']) !!}
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
            $('#dataTableReplies').DataTable({
                "pageLength": 10,
                order: [[ 0, "desc" ]],
            });
        });


        $('.approveReplyBtn').click(function(){
            var replyId = $(this).data('id');
            var isActive = 1; //aprove
            
            var url = '/admin/comment/replies/'+replyId;
            axios.put(url, {
                id: replyId,
                is_active: isActive,
            })
            .then(res => {
                if (res.status == 200) {
                    if(res.data == 1) {
                        toastr.success('Reply Approved');
                        $('#approveReplyBtn-'+replyId).addClass('d-none');
                        $('#unApproveReplyBtn-'+replyId).removeClass('d-none');
                    } else {
                        toastr.error('Approve failed');
                        $('#approveReplyBtn-'+replyId).removeClass('d-none');
                        $('#unApproveReplyBtn-'+replyId).addClass('d-none');
                    }
                } else {
                    toastr.error('Approve failed');
                    $('#approveReplyBtn-'+replyId).removeClass('d-none');
                    $('#unApproveReplyBtn-'+replyId).addClass('d-none');
                }
            })
            .catch(err => {
                toastr.error('Error occured');
                $('#approveReplyBtn-'+replyId).removeClass('d-none');
                $('#unApproveReplyBtn-'+replyId).addClass('d-none');
            })

        });


        $('.unApproveReplyBtn').click(function(){
            var replyId = $(this).data('id');
            var isActive = 0; //aprove
            
            var url = '/admin/comment/replies/'+replyId;
            axios.put(url, {
                id: replyId,
                is_active: isActive,
            })
            .then(res => {
                if (res.status == 200) {
                    if(res.data == 1) {
                        toastr.success('Comment Unapproved');
                        $('#approveReplyBtn-'+replyId).removeClass('d-none');
                        $('#unApproveReplyBtn-'+replyId).addClass('d-none');
                    } else {
                        toastr.error('Approve failed');
                        $('#approveReplyBtn-'+replyId).addClass('d-none');
                        $('#unApproveReplyBtn-'+replyId).removeClass('d-none');
                    }
                } else {
                    toastr.error('Approve failed');
                    $('#approveReplyBtn-'+replyId).addClass('d-none');
                    $('#unApproveReplyBtn-'+replyId).removeClass('d-none');
                }
            })
            .catch(err => {
                toastr.error('Error occured');
                $('#approveReplyBtn-'+replyId).addClass('d-none');
                $('#unApproveReplyBtn-'+replyId).removeClass('d-none');
            })

        });


    </script>
@endsection