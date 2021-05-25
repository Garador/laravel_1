@extends('blog.layout.base')
@section('content')
    <div class="row">
        <!-- About Me (Left Sidebar) Start -->
        <div class="col-md-3">
            @include('blog.components.about_blogger', [
                "user" => $data['user']
            ])
        </div>
        <!-- About Me (Left Sidebar) End -->

        <!-- Blog Post (Right Sidebar) Start -->
        <div class="col-md-9">
            <div class="col-md-12 page-body">
                @include('blog.components.back_home')
                <div class="row">
                    <div class="title" style="display: flex;justify-content: center;align-items: center;">
                        <h1>{{$data['user']->name}} Posts</h1>
                    </div>
                    <div class="col-md-12 content-page">
                        @forelse ($data['posts'] as $post)
                            @include('blog.components.blog_post_preview', [
                                'post' => $post
                            ])
                        @empty
                            <h3>No posts to show.</h3>
                        @endforelse
                    </div>
                    <div class="col-md-12">
                        <div class="row" style="padding-bottom: 10pt; padding-top: 10pt;">
                            {{$data['posts']->links()}}
                        </div>
                    </div>
                </div>
                @if (Session::get('article_sort'))
                    @include('blog.components.sort', [
                        "labels" => Session::get('article_sort')['labels'],
                        "sorts" => Session::get('article_sort')['orders'],
                        "field" => Session::get('article_sort')['field'],
                        "order" => Session::get('article_sort')['order']
                    ])
                @endif
            </div>
            <!-- Footer Start -->
            @include('blog.components.footer')
            <!-- Footer End -->
        </div>
        <!-- Blog Post (Right Sidebar) End -->
    </div>
@endsection
