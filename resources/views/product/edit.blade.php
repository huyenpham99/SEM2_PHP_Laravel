@extends("layout")
@section("title", "Edit Product Listing")
@section("contentHeader", "Edit Product")
@section("content")
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{url("/update-product/{$product->__get("id")}")}}" method="post">
            @method("PUT")
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text"  value="{{$product->__get("product_name")}}" name="product_name" class="form-control @error("product_name")  is-invalid @enderror" placeholder=" Product Name">
                    @error("product_name")
                    <span class="error invalid-feedback">  {{$message}}</span>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection
