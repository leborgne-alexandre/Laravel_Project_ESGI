<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Http\Requests\PostsUpdateValidator;
use App\Http\Requests\PostsValidator;
use App\Http\Requests\likeOrDislikeValidator;
use App\Posts;
use App\User;
use Auth;
use Illuminate\Http\Request;

class PostsController extends Controller
{


    public function __construct(){


        $this->middleware("CategoriesExist")->only(["create", "store"]);


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("posts.index")->with("categories", Categories::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('posts.index')->with('posts', Posts::all())->with('categories', Categories::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsValidator $request)
    {

        $post = new Posts;
        $post->title = $request->title;
        $post->id_image = $request->id_image->store("posts");
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category;

        $post->save();

        session()->flash("success", "Post successfully added");

        return redirect(route('home'));



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $post)
    {
        return view("posts.edit")->with("posts", $post)->with("categories", Categories::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsUpdateValidator $request, $id)
    {

        $data = request()->all();
        $posts = Posts::find($id);
        $posts->title = $data["title"];

        $posts->save();

        session()->flash("success", "Post has been update");

        return redirect(route("home"));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Posts::withTrashed()->where("id", $id)->firstOrFail();

        if ($post->trashed()) {

            $post->forceDelete();
            return redirect(route("trashed-posts"));

        } else {

            $post->delete();

        }

        session()->flash('success', 'Post deleted successfully');
        return redirect(route("home"));
    }

    /**
     * Display all trashed post
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {

        $trashed = Posts::onlyTrashed()->get();
        return view("posts.trashed")->with("posts", $trashed);

    }

    public function restore($id){



        $post = Posts::withTrashed()->where("id", $id)->firstOrFail();

        $post->restore();


        session()->flash("success", "Post have been restore (◕‿-) ");

        return redirect()->back();





    }

    public function likeOrDislike(Posts $post, User $user, $type, likeOrDislikeValidator $request)
    {


        $user_query = DB::table('users_posts')->select("id")->where('post_id', $post)->where('user_id', $user)->get();

        if(empty($user_query)){

        $user_post = new UserPost;
        $user_post->title = $request->title;
        $user_post->id_image = $request->id_image->store("posts");

        $user_post->save();




        }







    }

}
