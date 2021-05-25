<div class="about-fixed">
    <div class="my-pic">
        <img src="{{asset('images/pic/my-pic.png')}}" alt="" style="display: none"/>
        <a href="javascript:void(0)" class="collapsed" data-target="#menu" data-toggle="collapse" style="display: none"><i
                class="icon-menu menu"></i></a>
        <div id="menu" class="collapse" style="display: none">
            <ul class="menu-link">
                <li><a href="about.html">About</a></li>
                <li><a href="work.html">Work</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
    </div>

    <div class="my-detail">
        <div class="white-spacing">
            <span>{{$user->name}}</span>
            <span class="my-sub-title">{{$user->email}}</span>
        </div>

        <ul class="social-icon" style="display: none">
            <li>
                <a href="#" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
            </li>
            <li>
                <a href="#" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
            </li>
            <li>
                <a href="#" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </li>
            <li>
                <a href="#" target="_blank" class="github"><i class="fa fa-github"></i></a>
            </li>
        </ul>
    </div>
</div>