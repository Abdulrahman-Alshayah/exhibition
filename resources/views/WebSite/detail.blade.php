@extends('WebSite.layouts.master')
@section('title')
    Detail
@stop
@section('css')
@endsection



@section('content')

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div
        class="d-flex flex-column align-items-center justify-content-center"
        style="min-height: 300px"
    >
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shop Detail</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Shop Detail Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div
                id="product-carousel"
                class="carousel slide"
                data-ride="carousel">
                <div class="carousel-inner border">
                    <div class="carousel-item active">
                        <img
                            class="w-100 h-100"
                            src="{{URL::asset('Dashboard/img/product/' . $product->image->filename)}}"
                            alt="Image"
                        />
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold">{{ $product->name }}</h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
            </div>
            <h3 class="font-weight-semi-bold mb-4">${{ $product->price }}</h3>
            <p class="mb-4">
                {{ $product->specifications }}
            </p>

        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div
                class="nav nav-tabs justify-content-center border-secondary mb-4"
            >
                <a
                    class="nav-item nav-link active"
                    data-toggle="tab"
                    href="#tab-pane-1"
                    >Description</a
                >
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-1">
                    <h4 class="mb-3">Product Description</h4>
                    <p>
                        {{ $product->description }}
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Shop Detail End -->

@endsection

