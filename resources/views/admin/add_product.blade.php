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
                <form action="{{ url('upload_product') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Name</label>
                            <input style="color: white" type="text" class="form-control" name="name">
                        </div>
                        <div class="col-md-6">
                            <label for="">Slug</label>
                            <input style="color: white"  type="text" class="form-control" name="slug">
                        </div>
                        <div class="col-md-12">
                          <label for="">Small Description</label>
                            <textarea style="color: white"  name="small_description" rows="3" class="form-control" placeholder="small description"></textarea>
                        </div>
                        <div class="col-md-12">
                          <label for="">Description</label>
                            <textarea style="color: white"  name="description" rows="3" class="form-control" placeholder="description"></textarea>
                        </div>
                       
                        <div style="padding: 15px">
                          <label>Category</label>
                          <select class="form-control" name="cate_id" style="color: black" required="" >
                            <option value="">select Category</option>
                            
                            @foreach ($categry as $item )
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="">Original Price</label>
                          <input type="number" class="form-control" name="original_price">
                      </div>
                      <div class="col-md-6 mb-3">
                          <label for="">Selling Price</label>
                          <input type="number" class="form-control"  name="selling_price">
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="">Tax</label>
                        <input type="number" class="form-control"  name="tax">
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="">Quantity</label>
                      <input type="number" class="form-control"  name="qty">
                  </div>
                      <div class="col-md-6">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-6">
                        <label for="">Trending</label>
                        <input type="checkbox"  name="popular">
                    </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Title</label>
                            <input style="color: white"  type="text" class="form-control" name="meta_title">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta keywords</label>
                            <textarea style="color: white"  name="meta_keywords" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Description</label>
                            <textarea style="color: white"  name="meta_description" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12 ">
                            <input  style="color: white" type="file" name="image" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
              