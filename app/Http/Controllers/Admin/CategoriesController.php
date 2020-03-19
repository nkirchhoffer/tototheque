<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use Illuminate\Auth\AuthManager;

class CategoriesController extends Controller
{
    private $auth;

    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;
        $this->middleware('permission:manage_books');
    }

    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.categories.new');
    }

    public function submitCreate(CreateCategoryRequest $request)
    {
        $name = $request->get('name');
        $description = $request->get('description');

        $category = new Category();
        $category->name = $name;
        $category->description = $description;
        $category->user_id = $request->user()->id;
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'La catégorie '.$category->name.' a bien été créée !');
    }

    public function update(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function submitUpdate(CreateCategoryRequest $request, Category $category)
    {
        $name = $request->get('name');
        $description = $request->get('description');

        $category->name = $name;
        $category->description = $description;
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'La catégorie '.$category->name.' a bien été modifiée !');
    }

    public function delete(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('success', 'La catégorie a bien été supprimée.');
    }
}
