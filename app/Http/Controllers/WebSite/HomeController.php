<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')->get();
        $products = Product::get();
        return view('WebSite.index', compact('categories', 'products'));
    }

    public function category($cat)
    {
        $categories = Category::whereNull('parent_id')->get();
        $products = Category::where('name', $cat)->products();
        return view('WebSite.index', compact('categories', 'products'));
    }

    public function getProductCat($cat)
    {
        $categories = Category::whereNull('parent_id')->get();
        $category = category::where('name', $cat);
        if ($category) {
            $products = $category->products();
        }
        return view('WebSite.index', compact('categories', 'products'));
    }
}
