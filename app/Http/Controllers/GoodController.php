<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Good;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GoodController extends Controller
{
    public function store(Request $req)
    {
        $data = $req->validate([
            "title" => "required|max:20",
            "description" => "sometimes|max:50",
            "price" => "required|integer|gt:10",
            "category" => "required|string|max:15",
            "images" => "required|mimes:jpg,jpeg,png|max:3584"
        ]);
        $category = Category::where('title', $data['category'])->first();
        
        if (!$category) return back()->withErrors(['category' => 'Категория не найдена']);

        $good = Good::create([
            "title" => $data['title'],
            "description" => $data['description'] ?? "",
            "price" => $data['price'],
            'category_id' => $category->id
        ]);

        $path = Storage::disk('local')->putFile("good", $req->file("images"));

        Image::create([
            "path" => $path,
            "good_id" => $good->id
        ]);

        return back();
    }
    public function create()
    {
        $categories = Category::all();
        return view("product-create", compact('categories'));
    }
}
