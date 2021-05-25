<?php

namespace App\Http\Controllers;

use App\Helper\MetadataHelper;
use App\Helper\SortHelper;
use App\Models\Post;
use App\Models\User;
use Database\Factories\PostFactory;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if(!SortHelper::hasArticleSort()){
            SortHelper::updateArticleSort('publication_date', 'DESC');
        }
        $posts = Post::orderBy(SortHelper::getArticleSortField(), SortHelper::getArticleSortOrder())
            ->cursorPaginate(10);
        //return view("blog.index")->with('posts', $posts);

        $routeName = $request->route()->getName();
        $metadata = MetadataHelper::assembleMetadata($routeName, [
            "articles" => $posts
        ]);
        return view("blog.index", array_merge($metadata, [
            "posts" => $posts
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
            return view("blog.new");
        }
        return redirect(route('auth_sign_in_show'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Auth::check()){

            $data = $request->only('title', 'content');

            $request->validateWithBag('article_creation', [
                "title" => ['required', 'unique:App\Models\Post,title', 'min:5', 'max:60'],
                "content" => ['required', 'min:10, max:60000']
            ]);

            $title = $data['title'];
            $content = $data['content'];
            $publication_date = now();

            $post = new Post;
            $post->title = $title;
            $post->content = $content;
            $post->poster_id = Auth::id();
            $post->publication_date = $publication_date;

            $post->save();
            return redirect(route('show_article', $post->id));
        }
        return redirect(route('index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($postID, Request $request)
    {
        $post = Post::find($postID);
        $routeName = $request->route()->getName();
        $metadata = MetadataHelper::assembleMetadata($routeName, [
            "article" => $post
        ]);
        //dd($post);
        return view("blog.single", array_merge($metadata, [
            "post" => $post
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort(403);
    }

    public function dumpImport(){
        $data = PostFactory::getFromEndpoint();
        dd($data);
    }

    public function showUserArticles($userId, Request $request){
        $user = User::find($userId);
        if(!$user){
            return Redirect::route('index')->with( ['search_error' => "The user doesn't exist."] );
        }

        if(!SortHelper::hasArticleSort()){
            SortHelper::updateArticleSort('publication_date', 'DESC');
        }
        $posts = Post::where([
            "poster_id" => $user->id
        ])
        ->orderBy(SortHelper::getArticleSortField(), SortHelper::getArticleSortOrder())
        ->cursorPaginate(10);

        $routeName = $request->route()->getName();
        $metadata = MetadataHelper::assembleMetadata($routeName, [
            "articles" => $posts
        ]);
        return view("blog.user_posts", array_merge($metadata, [
            "data" => [
                "posts" => empty($posts) ? [] : $posts,
                "user" => $user
            ]
        ]));

        /*
        return view("blog.user_posts")->with('data', [
            "posts" => empty($posts) ? [] : $posts,
            "user" => $user
        ]);
        */
    }


    public function updateSortOrder(Request $request){
        $sorting = $request->only('sort_order');
        $sort_data = explode('-', $sorting['sort_order']);
        try{
            SortHelper::updateArticleSort($sort_data[0], $sort_data[1]);
        }catch(Error $e){
            dd($e);
        }
        return redirect()->back();
    }
}
