<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
   
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="card-body">
                <form action="{{ url('update-product/'.$product->id) }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Name</label>
                            <input style="color: white" value="{{ $product->name }}" type="text" class="form-control" name="name">
                        </div>
                        <div class="col-md-6">
                            <label for="">Slug</label>
                            <input style="color: white" value="{{ $product->slug }}" type="text" class="form-control" name="slug">
                        </div>
                        <div class="col-md-6">
                            <label for="">Selling price</label>
                            <input style="color: white" value="{{ $product->selling_price }}" type="number" class="form-control" name="selling_price">
                        </div>
                        <div class="col-md-12">
                          <label for="">Description</label>
                            <textarea style="color: white"  name="description" rows="3" class="form-control" placeholder="description">{{ $product->description }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="">Status</label>
                            <input type="checkbox" {{ $product->status=="1" ? 'checked':"" }} name="status">
                        </div>
                        <div class="col-md-6">
                            <label for="">Trending</label>
                            <input type="checkbox" {{ $product->trending=="1" ? 'checked':"" }}   name="trending">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Title</label>
                            <input style="color: white" value="{{ $product->meta_title }}" type="text" class="form-control" name="meta_title">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta keywords</label>
                            <textarea style="color: white"  name="meta_keywords" rows="3" class="form-control">"{{ $product->meta_keywords }}"</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Description</label>
                            <textarea style="color: white"  name="meta_description" rows="3" class="form-control">"{{ $product->meta_description }}"</textarea>
                        </div>
                        <div class="col-md-12 ">
                          @if ($product->image)
                          <img src="{{ asset('productimage/'.$product->image) }}" alt="">
                            
                          @endif
                         
                            <input  style="color: white" type="file" name="image" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">update</button>
                        </div>
                    </div>
                </form>
            </div>

          </div>
        </div>
        <!-- main-panel ends -->
       </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.scripts')
  </body>
</html>