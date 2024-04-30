<?php

namespace App\Repository\Products;

use App\Interfaces\Products\ProductRepositoryInterface;
use App\Models\Appointment;
use App\Models\Category;
use App\Models\Doctor;
use App\Models\Image;
use App\Models\Product;
use App\Models\Section;
use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductRepository implements ProductRepositoryInterface
{
    use UploadTrait;

    public function index()
    {
        if (Auth::user()->user_type == 2) {
            return view('Dashboard.Products.index');
        }
        return redirect()->back()->withErrors(['error' => 'انت لا تمتلك حق الوصول لهذه الصفحة']);
    }

    public function create()
    {
        if (Auth::user()->user_type == 2) {
            $categories = Category::get();
            return view('Dashboard.Products.add', compact('categories'));
        }
        return redirect()->back()->withErrors(['error' => 'انت لا تمتلك حق الوصول لهذه الصفحة']);
    }


    public function store($request)
    {
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->status = $request->status;
            $product->specifications = $request->specifications;
            $product->user_id = Auth::user()->id;
            $product->status = 0;
            $product->save();

            //save product categories

            $product->categories()->attach($request->categories);

            if ($request->has('photo')) {
                // Delete old photo
                if ($product->image) {
                    $old_img = $product->image->filename;
                    $this->Delete_attachment('upload_image', 'product/' . $old_img, $product->id);
                }
                //Upload img
                $this->verifyAndStoreImage($request, 'photo', 'product/', 'upload_image', $product->id, 'App\Models\Product');
            }

            DB::commit();
            session()->flash('add');
            return redirect()->route('products.create');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $product = Product::findorfail($id);
        return view('Dashboard.Products.edit', compact('product'));
    }


    public function update($request)
    {
        DB::beginTransaction();

        try {

            $product = Product::findorfail($request->id);

            $product->name = $request->name;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->status = $request->status;
            $product->specifications = $request->specifications;
            $product->user_id = Auth::user()->id;
            $product->status = 0;
            $product->save();

            //save product categories

            $product->categories()->sync($request->categories);

            if ($request->has('photo')) {
                // Delete old photo
                if ($product->image) {
                    $old_img = $product->image->filename;
                    $this->Delete_attachment('upload_image', 'product/' . $old_img, $product->id);
                }
                //Upload img
                $this->verifyAndStoreImage($request, 'photo', 'product/', 'upload_image', $product->id, 'App\Models\Product');
            }

            DB::commit();
            session()->flash('edit');
            return redirect()->route('products.create');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {

        if ($request->filename) {

            $this->Delete_attachment('upload_image', 'Products/' . $request->filename, $request->id, $request->filename);
        }
        Product::destroy($request->id);
        session()->flash('delete');
        return redirect()->route('products.index');
    }




    public function improve()
    {
        if (Auth::user()->user_type == 1) {
            $products = Product::get();
            return view('Dashboard.Products.improve_product', compact('products'));
        }
        return redirect()->back()->withErrors(['error' => 'انت لا تمتلك حق الوصول لهذه الصفحة']);
    }

    public function improveProduct($request)
    {
        if (Auth::user()->user_type == 1) {

            $product = Product::findOrFail($request->id);
            $product->status = $request->status;
            $product->save();
            session()->flash('edit');
            return redirect()->back();
        }
        return redirect()->back()->withErrors(['error' => 'انت لا تمتلك حق الوصول لهذه الصفحة']);
    }
}
