<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UsersPostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'allPosts', 'show']);
    }

    public function allPosts()
    {
        $usersPosts = User::with('posts')->get();
        $postsNumber = DB::table('posts')->count();
        return view('front.posts.allPosts', [
            'users' => $usersPosts,
            'postsNumber' => $postsNumber,
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Posts = Post::with('user')->latest()->limit(5)->get();
        // dd($usersPosts);
        return view('home', [
            'posts' => $Posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        return view('front.posts.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:100|min:3',
            'sub_title' => 'required|string|max:100|min:3',
            'paragraph' => 'required|min:5',
            'image' => 'required|image',
            'image_description' => 'required|min:5',
        ];
        $request->validate($rules);
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_path = $file->store('uploads', [
                'disk' => 'public'
            ]);
            $request->merge([
                'image_path' => $image_path,
            ]);
        }

        $request->merge([
            'user_id' => Auth::user()->id,
        ]);

        $post = Post::create($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $comments = Comment::where('post_id', '=', $id)->latest()->get();
        return view('front.posts.show', compact(['post', 'comments']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('front.posts.edit', compact('post'));
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
        $post = Post::find($id);
        $rules = [
            'title' => 'required|string|max:100|min:3',
            'sub_title' => 'required|string|max:100|min:3',
            'paragraph' => 'required|min:5',
            'image' => 'required|image',
            'image_description' => 'required|min:5',
            
        ];
        $request->validate($rules);
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_path = $file->store('uploads', [
                'disk' => 'public'
            ]);
            $request->merge([
                'image_path' => $image_path,
            ]);
        }

        $request->merge([
            'user_id' => Auth::user()->id,
        ]);

        $post->update($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Storage::disk('public')->delete($post->image_path);
        return redirect()->route('posts.index');
    }
}
