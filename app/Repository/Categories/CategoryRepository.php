<?php

namespace App\Repository\Categories;

use App\Interfaces\Categories\CategoryRepositoryInterface;
use App\Models\Category;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryRepository implements CategoryRepositoryInterface
{
    use UploadTrait;

    public function index()
    {
        if (Auth::user()->user_type == 1) {
            $categories = Category::get();
            return view('Dashboard.Categories.index', compact('categories'));
        }
        return redirect()->back()->withErrors(['error' => 'انت لا تمتلك حق الوصول لهذه الصفحة']);
    }

    public function create()
    {
        if (Auth::user()->user_type == 1) {
            return view('Dashboard.Categories.add');
        }
        return redirect()->back()->withErrors(['error' => 'انت لا تمتلك حق الوصول لهذه الصفحة']);
    }


    public function store($request)
    {
        try {
            $category = new Category();
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->status = 1;
            $category->save();


            session()->flash('add');
            return redirect()->route('add.category');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $category = Category::findorfail($id);
        return view('Dashboard.Categories.edit', compact('category'));
    }


    public function update($request)
    {
        // return $request->id;
        try {
            $category = Category::findorfail($request->id);
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->status = $request->status;
            $category->save();


            session()->flash('edit');
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        Category::destroy($request->id);
        session()->flash('delete');
        return redirect()->route('category.index');
    }




    public function improve()
    {
        if (Auth::user()->user_type == 1) {
            $categories = Category::get();
            return view('Dashboard.Categories.improve_category', compact('categories'));
        }
        return redirect()->back()->withErrors(['error' => 'انت لا تمتلك حق الوصول لهذه الصفحة']);
    }

    public function improveProduct($request)
    {
        if (Auth::user()->user_type == 1) {

            $category = Category::findOrFail($request->id);
            $category->status = $request->status;
            $category->save();
            session()->flash('edit');
            return redirect()->back();
        }
        return redirect()->back()->withErrors(['error' => 'انت لا تمتلك حق الوصول لهذه الصفحة']);
    }
}
