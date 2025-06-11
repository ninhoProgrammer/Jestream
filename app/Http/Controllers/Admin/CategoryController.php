<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.categories.index')->only('index');
        $this->middleware('can:admin.categories.create')->only('create', 'store');
        $this->middleware('can:admin.categories.edit')->only('edit', 'update');
        $this->middleware('can:admin.categories.destroy')->only('destroy');
        $this->middleware('can:admin.categories.show')->only('show');
    }

    public function index()
    {
        $categories = Category::all();

        // Logic to list categories
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        // Logic to show form for creating a new category
        return view('admin.categories.create');
    }

   
    public function store(Request $request)
	{
		$request->validate([
			'name' => 'required',
			'slug' => 'required|unique:categories'
		]);
		$category = Category::create($request->all());
		
		return redirect()->route('admin.categories.edit', $category)
			->with('info', 'La categoría se creó con éxito');
	}
        

    public function edit(Category $category)
    {
        // Logic to show form for editing an existing category
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
	{
		$request->validate([
			'name' => 'required',
			'slug' => "required|unique:categories,slug,$category->id"
		]);
		$category->update($request->all());
		
		return redirect()->route('admin.categories.edit', $category)
			->with('info', 'La categoría se actualizó con éxito');
	}

    public function destroy(Category $category)
    {
        // Logic to delete a category
        $category->delete();
		
		return redirect()->route('admin.categories.index')
			->with('info', 'La categoría se eliminó con éxito');
    }

    public function show(Category $category)
    {
        // Logic to show a single category
        return view('admin.categories.show', compact('category'));
    }
}
