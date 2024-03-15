<?php

namespace App\Interfaces\Products;

interface ProductRepositoryInterface
{
    // get Product
    public function index();

    // create Product
    public function create();

    // store Product
    public function store($request);

    // update Product
    public function update($request);

    // destroy Product
    public function destroy($request);

    // destroy Product
    public function edit($id);

    // improve Product from admin
    public function improve();

    // improve Product
    public function improveProduct($request);
}
