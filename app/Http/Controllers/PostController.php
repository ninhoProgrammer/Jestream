<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 1)->latest('id')->paginate(8);
        return view('posts.index' , compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
    

    public function category(Category $category)
    {
        $posts = Post::where('category_id', $category->id)
            ->where('status', 1)
            ->latest('id')
            ->paginate(6);

        return view('posts.category', compact('posts', 'category'));
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->posts()->where('status', 1)->latest('id')->paginate(4);
        
        return view('posts.tag', compact('posts', 'tag'));
    }
    /* 
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Logic to store the post
        return redirect()->route('posts.index');
    }
    public function edit($id)
    {
        return view('posts.edit', ['id' => $id]);
    }
    public function update(Request $request, $id)
    {
        // Logic to update the post
        return redirect()->route('posts.index');
    }
    public function destroy($id)
    {
        // Logic to delete the post
        return redirect()->route('posts.index');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        // Logic to search for posts
        return view('posts.search', ['query' => $query]);
    } */
}
