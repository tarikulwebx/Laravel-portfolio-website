@extends('admin.layouts.app')

@section('content')
    @if (session('comment_delete_msg'))
        <div class="alert alert-success">
            {{ session('comment_delete_msg') }}
        </div>
    @endif
    <h2 class="mb-4">All Comments</h2>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Comments</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableComments" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Author</th>
                            <th>Post</th>
                            <th>Comment</th>
                            <th>Status</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Author</th>
                            <th>Post</th>
                            <th>Comment</th>
                            <th>Status</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if (!empty($comments))
                            @foreach ($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td style="max-width: 170px">
                                        <span class="">{{ $comment->author }}</span>
                                        <small>{{ $comment->email }}</small>
                                    </td>
                                    <td><a href="{{ route('single-post', $comment->post->id) }}">{{ $comment->post->title }}</a></td>
                                    <td>
                                        {{  Str::limit($comment->body, 120, '...') }}
                                        <div>
                                            <a href="" style="font-size: 14px;" class="text-decoration-none font-weight-bold" data-toggle="collapse" data-target="#replies-{{ $comment->id }}"><small><i class="fas fa-eye fa-1x"></i></small> Replies ({{ count($comment->replies) }})</a>
                                            <div id="replies-{{ $comment->id }}" class="collapse">
                                                @if ($comment->replies)
                                                    <ol class="">
                                                        @foreach ($comment->replies as $reply)
                                                            <li class="text-black">
                                                                <small>{{ Str::limit($reply->body, 60, '...') }} 
                                                                    <a id="approveReplyBtn-{{ $reply->id }}" href="javasript:void(0)" class="approveReplyBtn text-decoration-none font-weight-bold {{ $reply->is_active == 1 ? 'd-none' : '' }}" data-id="{{ $reply->id }}">Approve</a>
                                                                    <a id="unApproveReplyBtn-{{ $reply->id }}" href="javasript:void(0)" class="unApproveReplyBtn text-decoration-none font-weight-bold {{ $reply->is_active == 0 ? 'd-none' : '' }}" data-id="{{ $reply->id }}">Unapprove</a>
                                                                </small> 
                                                            </li>
                                                        @endforeach
                                                    </ol>
                                                @endif
                                                
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button id="approveCommentBtn-{{ $comment->id }}" class="approveCommentBtn btn btn-primary btn-sm {{ $comment->is_active == 1 ? 'd-none' : '' }}" data-id="{{ $comment->id }}">Approve</button>
                                        <button id="unApproveCommentBtn-{{ $comment->id }}" class="unApproveCommentBtn btn btn-warning btn-sm {{ $comment->is_active == 0 ? 'd-none' : '' }}" data-id="{{ $comment->id }}">Unapprove</button>
                                    </td>
                                    <td>

                                        {!! Form::open(['method' => 'DELETE', 'route' => ['comments.destroy', $comment->id]]) !!}
                                        {!! Form::submit('Delete', ['class' => 'deleteCommentBtn btn btn-danger btn-sm']) !!}
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
            $('#dataTableComments').DataTable({
                "pageLength": 10,
                order: [[ 0, "desc" ]],
            });
        });


        $('.approveCommentBtn').click(function(){
            var commentId = $(this).data('id');
            var isActive = 1; //aprove
            
            var url = '/admin/comments/'+commentId;
            axios.put(url, {
                id: commentId,
                is_active: isActive,
            })
            .then(res => {
                if (res.status == 200) {
                    if(res.data == 1) {
                        toastr.success('Comment Approved');
                        $('#approveCommentBtn-'+commentId).addClass('d-none');
                        $('#unApproveCommentBtn-'+commentId).removeClass('d-none');
                    } else {
                        toastr.error('Approve failed');
                        $('#approveCommentBtn-'+commentId).removeClass('d-none');
                        $('#unApproveCommentBtn-'+commentId).addClass('d-none');
                    }
                } else {
                    toastr.error('Approve failed');
                    $('#approveCommentBtn-'+commentId).removeClass('d-none');
                    $('#unApproveCommentBtn-'+commentId).addClass('d-none');
                }
            })
            .catch(err => {
                toastr.error('Error occured');
                $('#approveCommentBtn-'+commentId).removeClass('d-none');
                $('#unApproveCommentBtn-'+commentId).addClass('d-none');
            })

        });


        $('.unApproveCommentBtn').click(function(){
            var commentId = $(this).data('id');
            var isActive = 0; //aprove
            
            var url = '/admin/comments/'+commentId;
            axios.put(url, {
                id: commentId,
                is_active: isActive,
            })
            .then(res => {
                if (res.status == 200) {
                    if(res.data == 1) {
                        toastr.success('Comment Unapproved');
                        $('#approveCommentBtn-'+commentId).removeClass('d-none');
                        $('#unApproveCommentBtn-'+commentId).addClass('d-none');
                    } else {
                        toastr.error('Approve failed');
                        $('#approveCommentBtn-'+commentId).addClass('d-none');
                        $('#unApproveCommentBtn-'+commentId).removeClass('d-none');
                    }
                } else {
                    toastr.error('Approve failed');
                    $('#approveCommentBtn-'+commentId).addClass('d-none');
                    $('#unApproveCommentBtn-'+commentId).removeClass('d-none');
                }
            })
            .catch(err => {
                toastr.error('Error occured');
                $('#approveCommentBtn-'+commentId).addClass('d-none');
                $('#unApproveCommentBtn-'+commentId).removeClass('d-none');
            })

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