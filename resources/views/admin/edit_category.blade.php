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
                <form action="{{ url('update-categories/'.$category->id) }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Name</label>
                            <input style="color: white" value="{{ $category->name }}" type="text" class="form-control" name="name">
                        </div>
                        <div class="col-md-6">
                            <label for="">Slug</label>
                            <input style="color: white" value="{{ $category->slug }}" type="text" class="form-control" name="slug">
                        </div>
                        <div class="col-md-12">
                          <label for="">Description</label>
                            <textarea style="color: white"  name="description" rows="3" class="form-control" placeholder="description">{{ $category->description}}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="">Status</label>
                            <input type="checkbox" {{ $category->status=="1" ? 'checked':"" }} name="status">
                        </div>
                        <div class="col-md-6">
                            <label for="">Popular</label>
                            <input type="checkbox" {{ $category->popular=="1" ? 'checked':"" }}   name="popular">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Title</label>
                            <input style="color: white" value="{{ $category->meta_title }}" type="text" class="form-control" name="meta_title">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta keywords</label>
                            <textarea style="color: white"  name="meta_keywords" rows="3" class="form-control">"{{ $category->meta_keywords }}"</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Description</label>
                            <textarea style="color: white"  name="meta_description" rows="3" class="form-control">"{{ $category->meta_description }}"</textarea>
                        </div>
                        <div class="col-md-12 ">
                          @if ($category->image)
                          <img src="{{ asset('categoryimage/'.$category->image) }}" alt="">
                            
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