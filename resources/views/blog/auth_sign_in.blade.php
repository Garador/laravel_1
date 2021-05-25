@extends('blog.layout.base')
@section('content')
    <div class="row">
        <!-- About Me (Left Sidebar) Start -->
        <div class="col-md-3">
            @include('blog.components.about_blogger')
        </div>
        <!-- About Me (Left Sidebar) End -->

        <!-- Blog Post (Right Sidebar) Start -->
        <div class="col-md-9">
            <div class="col-md-12 page-body">
                <div class="row">
                    <div class="sub-title">
                        <a href="{{ route('index') }}" title="Go to Home Page">
                            <h1>Back Home</h1>
                        </a>
                    </div>
                    <div class="col-md-12 content-page">
                        <form action="{{route('auth_sign_in_handle')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="content">Password</label>
                                <input type="password" class="form-control" id="password" name="password"/>
                            </div>
                            <button type="submit" class="btn btn-default">Sign In</button>
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
