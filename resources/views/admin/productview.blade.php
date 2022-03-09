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
            <div class="card">
              <div class="card-header">
                <h1>product table</h1>
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Selling price</th>
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($products as $item )
                      <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->cate_id }}</td>
                        <td>{{ $item->selling_price}}</td>
                        <td>{{ $item->description }}</td>
                        <td><img src="productimage/{{ $item->image }}" alt=""> </td>
                        <td><a class="btn btn-success"  href="{{url('edit-product/'.$item->id) }} "  >Edit</a></td>
                        <td><a  class="btn btn-danger" href="{{ url('delete-product/'.$item->id) }}"  >Delete</a></td>
                      </tr>
                      @endforeach
                    </tbody>

                  </table>

                </div>

              </div>
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