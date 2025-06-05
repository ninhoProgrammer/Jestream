<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

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

	public function store(Request $request) 
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:tags',
            'extract' => 'required',
            'body' => 'required',
            'status' => 'required|in:published,draft',
            
        ]);
        $post = Post::create($request->all());

        return redirect()->route('admin.posts.edit', compact('post'))
            ->with('info', 'El post se creó con éxito');
    } 

	public function show(Post $post) 
    {
        return view('admin.posts.show', compact('post'));
    } 

	public function edit(Post $post) 
    {
        return view('admin.posts.edit', compact('post'));
    } 

	public function update(Request $request, Post $post) 
    {
        $request->validate([
            'title' => 'required',
            'slug' => "required|unique:tags,slug,$post->id",
            'extract' => 'required',
            'body' => 'required',
            'status' => 'required|in:published,draft',
        ]);
        $post->update($request->all());

        return redirect()->route('admin.posts.edit', compact('post'))
            ->with('info', 'El post se actualizó con éxito');
    } 

	public function destroy(Post $post) 
    {
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('info', 'El post se eliminó con éxito');
    } 
}
