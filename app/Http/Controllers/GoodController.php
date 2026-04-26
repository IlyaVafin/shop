<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Good;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class GoodController extends Controller
{
    public function index()
    {
        $products = Good::with("images")->paginate(5)->getCollection();
        return view('products', compact('products'));
    }

    public function show(Good $product)
    {
        $product->load('images');
        $category = Category::where('id', $product->category_id)->first();
        return view('product-view', compact('product', 'category'));
    }

    public function store(Request $req)
    {
        $data = $req->validate([
            "title" => "required|max:20",
            "description" => "sometimes|max:50",
            "price" => "required|numeric|gt:10",
            "category" => "required|string|max:15",
            "images" => "array|min:1|max:5",
            "images.*" => "required|mimes:jpg,jpeg,png|max:3584"
        ]);

        $category = Category::where('title', $data['category'])->first();


        $good = Good::create([
            "title" => $data['title'],
            "description" => $data['description'] ?? "",
            "price" => $data['price'],
            'category_id' => $category->id
        ]);

        $imagesPaths = [];
        foreach ($data['images'] as $index => $image) {
            $imagesPaths[] = [
                'path' => $image->store('good', 'public'),
                'default' => $index === 0
            ];
        }

        $good->images()->createMany($imagesPaths);

        return back();
    }

    public function create()
    {
        $categories = Category::all();
        return view("product-create", compact('categories'));
    }

    public function edit(Good $product)
    {
        $categories = Category::all();
        $product->load("images");
        $product->load("category");
        return view('product-edit', compact('product', "categories"));
    }

    public function update(Request $req, Good $product)
    {
        $data = $req->validate([
            "title" => "sometimes|string|max:20",
            "description" => "sometimes|string|max:50",
            "price" => "sometimes|numeric|gt:10",
            "category" => "sometimes|string",
            "images" => "array|max:5",
            "images.*" => "sometimes|mimes:jpg,jpeg,png|max:3584",
        ]);

        if ($req->has("category")) {
            $category = Category::where("title", $data['category'])->first();
            $product->category_id = $category->id;
            $product->save();
        }

        if ($req->hasFile(['images'])) {
            $countImages = $product->images()->count();
            if ($countImages == 5) return back()->withErrors(["images" => "Too many images"]);
            $images = [];
            foreach ($data['images'] as $image) {
                $images[] = [
                    "path" => $image->store("good", "public"),
                    "default" => false
                ];
            }
            $product->images()->createMany($images);
        }

        $product->update(Arr::except($data, ['images']));
        return back();
    }

    public function destroy(Good $product)
    {
        $product->delete();
        return back();
    }

    public function getGood(Good $product)
    {
        $images = $product->images()->select('path', 'default')->get();
        $defaultPath = $images->firstWhere('default', true);
        $images_urls = $images->filter(function ($img) use ($defaultPath) {
            return $img->path != $defaultPath->path;
        });
        $product->makeHidden(['created_at', 'updated_at', 'category_id', 'title']);
        $product->name = $product->title;

        return response()->json(["data" => [
            ...$product->toArray(),
            "images_urls" => $images_urls->pluck('path'),
            "default_img" => $defaultPath->path
        ]]);
    }
}
