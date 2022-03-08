<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
   <style>
     label{
       display: inline-block;
       width: 200px;
     }
   </style>
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="container" align=center style="padding-top: 40px">
              @if(session()->has('message'))
              <div class="alert alert-success">
                <button type="button"class="close" data-dismiss="alert">x
                  
                </button>
                {{ session()->get('message') }}
  
              </div>
              @endif
            <form action="{{ url('upload_blog') }}" method="POST" enctype="multipart/form-data" >
              @csrf


              
              <div style="padding: 15px">
                <label>Title</label>
                <input style="color: black" type="text" placeholder="enter title...">
              </div>
              
             <div style="padding: 15px">
              <label> Description</label>
              <textarea
              style="color: black"
                name="description"
                placeholder="description....">
              </textarea>
            </div>
     
              <div style="padding: 15px">
              <label>News Image</label>
              <input type="file" name="file" required=""  >
              </div>
              <div style="padding: 15px">
                <input type="submit" class="btn btn-success">
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