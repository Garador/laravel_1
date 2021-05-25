@extends('blog.layout.base')
@section('content')
    <div class="row">
        <!-- Blog Post (Right Sidebar) Start -->
        <div class="col-md-12">
            <div class="col-md-12 page-body">
                <div class="row">
                    @include('blog.components.back_home')
                    <div class="col-md-12 content-page">
                        <div class="col-md-12 blog-post">
                            <!-- Post Headline Start -->
                            <div class="post-title">
                                <h2>{{$post->title}}</h2>
                            </div>
                            <!-- Post Headline End -->

                            <!-- Post Detail Start -->
                            <div class="post-info">
                                <span>{{date('Y-m-d H:i:s', strtotime($post->publication_date))}} UTC / by
                                    <a href="#" target="_blank">{{$post->poster->name}}</a></span>
                            </div>
                            <!-- Post Detail End -->

                            {{$post->content}}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Start -->
            @include('blog.components.footer')
            <!-- Footer End -->
        </div>
        <!-- Blog Post (Right Sidebar) End -->
    </div>
@endsection
