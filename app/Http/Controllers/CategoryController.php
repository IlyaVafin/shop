<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
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
}
