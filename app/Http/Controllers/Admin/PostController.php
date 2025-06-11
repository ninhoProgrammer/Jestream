<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create', 'store');
        $this->middleware('can:admin.posts.edit')->only('edit', 'update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
        $this->middleware('can:admin.posts.show')->only('show');
    }

    public function index() 
    {
        // Fetch all posts with their related data
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    } 

	public function create() 
    {
		$categories = Category::pluck('name', 'id');
		$tags = Tag::all();
	    $post = new Post();
		return view('admin.posts.create',  compact('post', 'categories', 'tags'));
	}

	public function store(StorePostRequest $request) 
    {
        return Post::create($request->all());
        $post = Post::create($request->all());

        if ($request->hasFile('image')) {
            $url = $request->file('image')->store('posts', 'public');
            $post->image()->create(['url' => $url]);
        }

        if($request->tags){
            $post->tags()->attach($request->tags);
        }
        
        cache()->flush();

        $post->tags->sync($request->tags);
        return redirect()->route('admin.posts.index', $post)
            ->with('info', 'El post se creó con éxito');
    } 

	public function show(Post $post) 
    {
        return view('admin.posts.show', compact('post'));
    } 

    public function edit(Request $request, Post $post) 
    {
        $post->load('image');
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();
        //$post->tags->sync($request->tags);
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    } 

	public function update(Request $request, Post $post) 
    {
        $category = Category::pluck('name', 'id');
        $post->update($request->all());
        $post->tags->sync($request->tags);
        cache()->flush();
        return redirect()->route('admin.posts.edit', compact('category','post'))
            ->with('info', 'El post se actualizó con éxito');
    } 

	public function destroy(Post $post) 
    {
        $post->delete();
        cache()->flush();
        return redirect()->route('admin.posts.index')
            ->with('info', 'El post se eliminó con éxito');
    } 
}
