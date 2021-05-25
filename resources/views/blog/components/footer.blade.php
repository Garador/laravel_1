<div class="col-md-12 page-body margin-top-50 footer">
    <footer>
        <ul class="menu-link">
            @auth
                <li><a href="{{route('auth_sign_out_handle')}}">Sign Out</a></li>
                <li><a href="{{route('create')}}">New Post <i class="icon-pencil"></i></a></li>
            @else
                <li><a href="{{route('auth_sign_in_show')}}">Sign In</a></li>
                <li><a href="{{route('auth_sign_up_show')}}">Sign Up</a></li>
            @endauth
        </ul>

        <div style="display:none;">
            <p>© Copyright 2016 DevBlog. All rights reserved</p>
            <!-- UiPasta Credit Start -->
            <div class="uipasta-credit">
                Design By
                <a href="https://www.uipasta.com" target="_blank">UiPasta</a>
            </div>
            <!-- UiPasta Credit End -->
        </div>
    </footer>
</div>