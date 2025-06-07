<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
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
	
		return view('admin.posts.create', compact('categories', 'tags'));
	}

	public function store(StorePostRequest $request) 
    {
        $post = Post::create($request->all());

        if ($request->hasFile('image')) {
            $url = Storage::put('posts', $request->file('image'));
            $post->image()->create([
                'url' => $url,
            ]);
        }

        ;
	
        if($request->tags){
            $post->tags()->attach($request->tags);
        }
        
        return redirect()->route('admin.posts.edit', $post)
            ->with('info', 'El post se creó con éxito');
        } 

	public function show(Post $post) 
    {
        return view('admin.posts.show', compact('post'));
    } 

	public function edit(Post $post) 
    {
        $category = Category::pluck('name', 'id');
        $tags = Tag::all();
        return view('admin.posts.edit', compact('category','post'));
    } 

	public function update(Request $request, Post $post) 
    {
        $category = Category::pluck('name', 'id');
        $post->update($request->all());

        return redirect()->route('admin.posts.edit', compact('category','post'))
            ->with('info', 'El post se actualizó con éxito');
    } 

	public function destroy(Post $post) 
    {
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('info', 'El post se eliminó con éxito');
    } 
}
