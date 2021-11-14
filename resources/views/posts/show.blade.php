@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
    
            <!-- Page Content: START -->
            <div class="page-content">
                
                <div class="page-title post-meta margin-bottom-20">
                    <h2 class="post-title mb-3">{{ $post->title }}</h2>
                    <div class="post-date"><i class="fas fa-calendar-alt"></i> Posted {{ $post->created_at->diffForHumans() }}</div>
                </div>
                <hr>
                @if ($post->thumbnail)
                    <img class="w-100" src="{{ $post->thumbnail }}" alt="">
                    <hr>
                @endif
                
    
                <div class="post-body">
                    {!! $post->body !!}
                </div>
    
                <hr>
    
                <nav aria-label="Page navigation">
                  <ul class="pagination">
                      @if (isset($previous_post))
                        <li class="page-item">
                            <a class="page-link btn-success text-white" href="/posts/{{ $previous_post->slug }}" aria-label="Previous">
                                <span><i class="fas fa-angle-double-left    "></i> Previous</span>
                            </a>
                        </li>
                        @else
                        <li class="page-item disabled">
                            <span class="page-link btn-light text-muted" aria-label="Previous">
                                <span><i class="fas fa-angle-double-left    "></i> Previous</span>
                            </span>
                        </li>
                      @endif

                      @if (isset($next_post))
                        <li class="page-item ml-auto">
                            <a class="page-link btn-success text-white" href="/posts/{{ $next_post->slug }}" aria-label="Next">
                                <span>Next <i class="fas fa-angle-double-right    "></i></span>
                            </a>
                        </li>
                        @else
                        <li class="page-item disabled ml-auto">
                            <span class="page-link btn-light text-muted" aria-label="Previous">
                                <span>Next <i class="fas fa-angle-double-right    "></i></span>
                            </span>
                        </li>
                      @endif
                    

                  </ul>
                </nav>
    
                <hr>



                <!-- Comment: START -->
                

                @if ($comments)
                    <h2 class="mb-4">{{ count($comments) }} Comments: </h2>
                    <!-- Comments List -->
                    <div id="comments" class="comments">

                        @foreach ($comments as $comment)
                            <div class="comment mb-5">
                                <div class="media align-items-center mb-2">
                                    <a class="d-flex mr-2" href="#">
                                        <img src="{{ $comment->photo ? $comment->photo->name : 'https://avatars.dicebear.com/api/adventurer/.svg?scale=119&flip=1&translateX=2&translateY=3' }}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h5 class="text-primary mb-0">{{ $comment->author }}</h5>
                                        <span class="text-muted shared-date">Shared {{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <p class="mb-2">{{ $comment->body }}</p>

                                <div class="comment-reply-container">
                                    <a class="replyFormToggler font-weight-bold text-info text-decoration-none" href="javascript:void(0)" role="button"><i class="fas fa-reply    mr-1"></i>Reply</a>
                                    <div class="comment-reply-form mt-1">
                                        <div id="replySubmitMsg{{ $comment->id }}" class="alert d-none"></div>
                                        <div class="form-group mb-1">
                                            <textarea id="commentReplyBody{{ $comment->id }}" class="form-control" cols="30" rows="4" placeholder="Write reply"></textarea>
                                            <small id="commentReplyErrorText{{ $comment->id }}" class="form-text text-danger d-none"></small>
                                        </div>
                                        <button class="replySubmitBtn btn btn-primary btn-sm py-2 font-weight-normal" data-id="{{ $comment->id }}">Reply</button>
                                    </div>
                                </div>
                                
                                @if (count($comment->replies) > 0)
                                    <div class="comment-replies ">
                                        @foreach ($comment->replies as $reply)

                                            @if ($reply->is_active == 1)
                                                <div class="comment-reply mt-4 border-left ml-4 pl-4">
                                                    <div class="media align-items-center mb-2">
                                                        <a class="d-flex mr-2" href="#">
                                                            <img src="{{ $reply->photo ? $reply->photo->name : 'https://avatars.dicebear.com/api/adventurer/.svg?scale=119&flip=1&translateX=2&translateY=3' }}" alt="">
                                                        </a>
                                                        <div class="media-body">
                                                            <h5 class="text-primary mb-0">{{ $reply->author }}</h5>
                                                            <span class="text-muted shared-date">Replied {{ $reply->created_at->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                    <p>{{ $reply->body }}</p>
                                                </div>
                                            @endif
                                            

                            
                                            
                                        @endforeach
                                    </div>
                                @endif

                                

                            </div>
                        @endforeach
    
                    </div>
                @endif
    
                

                <!-- Comment Form -->
                <div class="">
                    <h4 class="mb-3">Leave a Comment: </h4>
                    <p id="comment-success-alert" class="alert alert-success d-none"></p>
                    <p id="comment-failed-alert" class="alert alert-danger d-none"></p>
                    <div class="form-group">
                        <input id="commentPostId" type="hidden" name="post_id" value="{{ $post->id }}">
                        <textarea id="commentBody" name="body" class="form-control" rows="8" placeholder="Write a comment"></textarea>
                        <small class="text-danger">{{ $errors->first('body') }}</small>                        
                    </div>
                    <div class="d-flex mb-5">
                        <button id="commentSubmitBtn" class="btn btn-primary py-2">Post Comment</button>
                        @if (! Auth::user())
                        <span class="form-text text-danger ml-auto">
                            Please login before submitting comment <a class="ml-2" href="{{ url('/login') }}"><b><i class="fas fa-user-alt    "></i> Login</b></a>
                        </span>
                        @endif
                        
                    </div>
                
                </div>
                <!-- Comment: END -->

    
            </div>
    
            <!-- Page Content: END -->
    
        </div>
        <div class="col-lg-4">
    
            <!-- Sidebar: START -->
            <div class="sidebar">
                <div class="sidebar-item media-sidebar wow fadeInUp" data-wow-delay="0.3s">
                    <h4 class="sidebar-title border-bottom pb-2">Recent Posts</h4>
                    <ul class="list-unstyled">

                        @if (count($recent_posts) > 0)
                            @foreach ($recent_posts as $post)
                                <li class="media">
                                    <img width="70px" class="d-flex mr-3" src="{{ $post->thumbnail == null ? 'https://via.placeholder.com/100?text=No+image' : $post->thumbnail }}" alt="Generic placeholder image">
                                    <div class="media-body">
                                    <h5 class="mt-0 mb-1 font-weight-bold"><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h5>
                                    <small>Posted {{ $post->created_at->diffForHumans() }}</small>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                        
                        
                      </ul>
                </div>
                <div class="sidebar-item category-sidebar wow fadeInUp" data-wow-delay="0.3s">
                    <h4 class="sidebar-title border-bottom pb-2">Categories</h4>
                    <ul class="list-unstyled">
                        @if (count($categories) > 0)
                            @foreach ($categories as $category)
                            <li><a href="/category/{{ $category->slug }}">{{ $category->name }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <!-- Sidebar: END -->
    
        </div>
    </div>
</div>
@endsection


@section('scripts')
    <script type="text/javascript">
        $('#commentSubmitBtn').click(function(){
            var postId  = $('#commentPostId').val();
            var commentBody  = $('#commentBody').val();

            $('#comment-success-alert').addClass('d-none')
            $('#comment-failed-alert').addClass('d-none')
            if($.trim(commentBody).length == 0) {
                $('#comment-failed-alert').html('Comment body is empty!');
                $('#comment-failed-alert').removeClass('d-none');
            } else {
                axios.post('/comment-submit', {
                    post_id     : postId,
                    comment_body: commentBody,
                })
                .then(res => {
                    if (res.status == 200) {
                        if (res.data == 1) {
                            $('#comment-success-alert').html('Comment shared successfully! Comment is awaiting moderation.');
                            $('#comment-success-alert').removeClass('d-none');
                        } else {
                            $('#comment-failed-alert').html('Comment Submit failed!');
                            $('#comment-failed-alert').removeClass('d-none');
                        }
                    }else {
                        $('#comment-failed-alert').html('Comment Submit failed!');
                        $('#comment-failed-alert').removeClass('d-none');
                    }
                })
                .catch(err => {
                    $('#comment-failed-alert').html('Error Occured!');
                    $('#comment-failed-alert').removeClass('d-none');
                })
            }

            
        });


        $('.comment-reply-form').hide();
        $('.replyFormToggler').click(function(){
            $(this).next().toggle(300);
        });


        $('.replySubmitBtn').click(function(){
            var commentId = $(this).data('id');
            var replyBody = $('#commentReplyBody'+commentId).val();

            if ($.trim(replyBody).length == 0) {
                $('#commentReplyErrorText'+commentId).html('Reply body is empty!').removeClass('d-none');
            } else {

                $('#commentReplyErrorText'+commentId).addClass('d-none');
                $('#replySubmitMsg'+commentId).removeClass('alert-success alert-danger').addClass('d-none');

                axios.post('/reply-submit', {
                    comment_id : commentId,
                    reply_body : replyBody,
                })
                .then(res => {
                    if (res.status == 200) {
                        if(res.data == 1) {
                            $('#replySubmitMsg'+commentId).html('Reply awaiting moderation').addClass('alert-success').removeClass('alert-danger d-none');
                        } else {
                            $('#replySubmitMsg'+commentId).html('Reply submission failed').addClass('alert-danger').removeClass('alert-success d-none');
                        }
                    } else {
                        $('#replySubmitMsg'+commentId).html('Reply submission failed').addClass('alert-danger').removeClass('alert-success d-none');
                    }
                })
                .catch(err => {
                    $('#replySubmitMsg'+commentId).html('Error occured').addClass('alert-danger').removeClass('alert-success d-none');
                })

            }
        });

    </script>
@endsection