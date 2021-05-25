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
                    @if (session()->get( 'sign_up_error' ))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{ session()->get( 'sign_up_error' ) }}</li>
                            </ul>
                        </div>
                    @endif
                    @if ($errors->signup->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->signup->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-md-12 content-page">
                        <form action="{{route('auth_sign_up_handle')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="content">Password</label>
                                <input type="password" class="form-control" id="password" name="password"/>
                            </div>
                            <div class="form-group">
                                <label for="content">Confirm Password</label>
                                <input type="password" class="form-control" id="password2" name="password2"/>
                            </div>
                            <button type="submit" class="btn btn-default">Sign Up</button>
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
