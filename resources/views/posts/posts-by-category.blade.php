@extends('layouts.app')

@section('content')
<div class="container">
    
    <h2>Category: {{ $category->name }}</h2>
    <hr>

        <!-- Blog Post Section: START -->
        <div class="blog-posts">
            <div class="row"> 
    
                @if (!empty($posts))
                    @foreach ($posts as $post)
                        <!-- Blog-post Item: START -->
                        <div class="col-md-4 blog-post-item">
                            <div class="card h-100" >
                                <div class="view overlay">
                                    <img class="card-img-top" src="{{ $post->thumbnail ? $post->thumbnail : 'https://via.placeholder.com/300x150?text=No+Image' }}" alt="Thumbnail">
                                    <a href="#!">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>

                                <div class="card-body d-flex flex-column">
                                    <div class="categories">
                                        <a href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                                    </div>
                                    {{-- <h4 class="card-title"><a href="{{ route('single-post', $post->id)}}">{{ $post->title }}</a></h4> --}}
                                    <h4 class="card-title"><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                    <div class="card-text mb-0">
                                        {!! Str::limit($post->body, 100, '...') !!}
                                    </div>
                                    <div class="mt-auto">
                                        <span class="post-time"><i class="fas fa-edit mr-1"></i> Posted {{ $post->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Blog-post Item: END -->
                    @endforeach
                @endif


            </div>
        </div>
        
        <!-- Blog Post Section: END -->
        <div class="mt-2">
            {{ $posts->links('vendor.pagination.bootstrap-4') }}
        </div>
        


</div>
@endsection
