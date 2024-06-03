<!-- Topbar Start -->
<div class="container-fluid">
        <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
            </a>
        </div>
        <div class="col-lg-9 col-9 text-left">


            <form action="{{route('search')}}" method="post" autocomplete="off"
            enctype="multipart/form-data">
            {{ method_field('post') }}
            @csrf
                <div class="input-group">
                    <input type="text" name="product" class="form-control" placeholder="Search for products">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Topbar End -->
