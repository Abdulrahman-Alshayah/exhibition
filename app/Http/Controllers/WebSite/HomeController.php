<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

use function Laravel\Prompts\select;

class   HomeController extends Controller
{
    public function index()
    {

        $Products = Product::query()
            ->select('products.*')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->groupBy('users.id')
            ->orderByRaw('RAND()')
            ->get();

        $categories = Category::whereNull('parent_id')->get();
        return view('WebSite.index', compact('categories', 'products'));
    }

    public function category($cat)
    {
        $categories = Category::whereNull('parent_id')->get();
        $products = Category::where('name', $cat)->products;
        return view('WebSite.index', compact('categories', 'products'));
    }

    public function getProductCat($id)
    {
        $categories = Category::whereNull('parent_id')->get();
        $category = category::findorfail($id);
        if ($category) {
            $products = $category->products;
        }
        return view('WebSite.index', compact('categories', 'products'));
    }

    public function search(Request $request)
    {
        $categories = Category::whereNull('parent_id')->get();
        $products = Product::where('name', $request->product)->get();
        return view('WebSite.index', compact('categories', 'products'));
    }
    public function detail($id)
    {
        $categories = Category::whereNull('parent_id')->get();
        $product = Product::findorfail($id);
        return view('WebSite.detail', compact('categories', 'product'));
    }
}
