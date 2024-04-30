<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Categories\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;

class CategoryController extends Controller
{
    use UploadTrait;

    private $Categories;

    public function __construct(CategoryRepositoryInterface $Categories)
    {
        $this->Categories = $Categories;
    }

    public function index()
    {
        return $this->Categories->index();
    }
    public function create()
    {
        return $this->Categories->create();
    }

    public function store(Request $request)
    {
        return $this->Categories->store($request);
    }

    public function edit($id)
    {
        return $this->Categories->edit($id);
    }

    public function update(Request $request)
    {
        return $this->Categories->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Categories->destroy($request);
    }

    //show view product to improve
    public function improve()
    {
        return $this->Categories->improve();
    }

    //store view product to improve
    public function improveProduct(Request $request)
    {
        return $this->Categories->improveProduct($request);
    }
}
