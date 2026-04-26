<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('goods')->get();
        return view('categories', compact('categories'));
    }
    public function show(Category $category)
    {
        $category->load("goods");
        return view('category-view', ['category' => $category]);
    }

    public function create()
    {
        return view("category-create");
    }
    public function store(Request $req)
    {
        $data = $req->validate([
            "title" => "required|max:15|regex:/^[А-ЯЁа-яё\s\-.,:;]+$/u",
            "description" => "nullable|sometimes|max:50|regex:/^[А-ЯЁа-яё\s\-;,.:]*$/u"
        ]);
        Category::create([
            "title" => $data['title'],
            "description" => $data['description'] ?? ""
        ]);
        return back();
    }

    public function edit(Category $category)
    {
        return view("category-edit", compact('category'));
    }

    public function update(Request $req, Category $category)
    {
        $data = $req->validate([
            "title" => "sometimes|required|max:15|regex:/^[А-ЯЁа-яё\s\-.,:;]+$/u",
            "description" => "sometimes|max:50|regex:/^[А-ЯЁа-яё\s\-;,.:]*$/u"
        ]);
        $category->update($data);
        return back();
    }

    public function getCategories()
    {
        $categories = Category::select('id', 'title as name', 'description')->get();
        return response()->json(["data" => [
            ...$categories
        ]]);
    }

    public function getCategoryGoods(Category $category)
    {
        $goods = $category->goods()->select('id', 'title as name', 'description', 'price')->with('images:good_id,path,default')->get()->map(function ($item) {
            $images = $item->images->pluck('path');
            $defaultImage = $item->images->firstWhere("default", true);
            $item->default_img = $defaultImage->path;

            $imagesWithoutDefault = $images->filter(function ($img) use ($defaultImage) {
                return $img != $defaultImage->path;
            })->values();

            $item->images_urls = $imagesWithoutDefault;
            unset($item->images);
            return $item;
        });
        return response()->json(["data" => [
            ...$goods,
        ]]);
    }
}
