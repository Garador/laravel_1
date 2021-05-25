<div class="col-md-12 blog-post" style="display:block;">
    <div class="post-title">
        <a href="{{route('show_article', $post->id)}}">
            <h2>
                {{$post->title}}
            </h2>
        </a>
    </div>
    <div class="post-info">
        <span>{{date('Y-m-d H:i:s', strtotime($post->publication_date))}} UTC / by
            <a href="{{route('show_user_articles', $post->poster->id)}}" target="_blank">{{$post->poster->name}}</a></span>
    </div>
    <p>
        {{$post->content}}
    </p>
</div>
