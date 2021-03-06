@extends('blog.layout.base')
@section('content')
    <div class="row">

        <!-- Blog Post (Right Sidebar) Start -->
        <div class="col-md-12">
            <div class="col-md-12 page-body">
                <div class="row">
                    <div class="sub-title">
                        <a href="{{ route('index') }}" title="Go to Home Page">
                            <h3>Back Home</h3>
                        </a>
                    </div>
                    <div class="title" style="display: flex;justify-content: center;align-items: center;">
                        <h1>Create a new article!</h1>
                    </div>
                    
                    @if ($errors->article_creation->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->article_creation->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-md-12 content-page">
                        <form action="{{route('store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Title</label>
                                <input type="string" class="form-control" id="title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea rows="6" class="form-control" id="content" name="content"></textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Create new post</button>
                        </form>
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
