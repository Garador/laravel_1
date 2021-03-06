@extends('blog.layout.base')
@section('content')
    <div class="row">
        <!-- About Me (Left Sidebar) Start -->
        <!-- About Me (Left Sidebar) End -->

        <!-- Blog Post (Right Sidebar) Start -->
        <div class="col-md-12">
            <div class="col-md-12 page-body">
                <div class="row">
                    <div class="col-md-12 content-page">
                        <div class="title" style="display: flex;justify-content: center;align-items: center;">
                            <h1>Created Posts!</h1>
                        </div>
                        @forelse ($posts as $post)
                            @include('blog.components.blog_post_preview', [
                                'post' => $post
                            ])
                        @empty
                            <h3>No posts to show.</h3>
                        @endforelse
                    </div>
                    <div class="col-md-12">
                        <div class="row" style="padding-bottom: 10pt; padding-top: 10pt;">
                            {{$posts->links()}}
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
