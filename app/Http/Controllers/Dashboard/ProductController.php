<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Products\ProductRepositoryInterface;
use App\Models\Product;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use UploadTrait;

    private $Products;

    public function __construct(ProductRepositoryInterface $Products)
    {
        $this->Products = $Products;
    }

    public function index()
    {
        return $this->Products->index();
    }
    public function create()
    {
        return $this->Products->create();
    }

    public function store(Request $request)
    {
        return $this->Products->store($request);
    }

    public function edit($id)
    {
        return $this->Products->edit($id);
    }

    public function update(Request $request)
    {
        return $this->Products->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Products->destroy($request);
    }

    //show view product to improve
    public function improve()
    {
        return $this->Products->improve();
    }

    //store view product to improve
    public function improveProduct(Request $request)
    {
        return $this->Products->improveProduct($request);
    }
}
