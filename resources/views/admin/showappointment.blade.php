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
            <div align="center" style="padding:70px">
                <table>
                    <tr style="background-color: #00D9A5">
                        <th style="padding:10px ; font-size: 20px; color:#fff;">Customer Name</th>
                        <th style="padding:10px ; font-size: 20px; color:#fff;">Email</th>
                        <th style="padding:10px ; font-size: 20px; color:#fff;">phone</th>
                        <th style="padding:10px ; font-size: 20px; color:#fff;">Pet name</th>
                        <th style="padding:10px ; font-size: 20px; color:#fff;">Date</th>
                        <th style="padding:10px ; font-size: 20px; color:#fff;">Message</th>
                        <th style="padding:10px ; font-size: 20px; color:#fff;">status</th>
                    </tr>
                    
                    
                        
                    
                    <tr style="background-color:#00D9A5" align="center">
                        @foreach ($data as $appointment )
                    
                     <td style="padding:10px ;  color:#fff;" >{{ $appointment->name }} </td>
                     <td style="padding:10px ;  color:#fff;" > {{ $appointment->email}} </td>
                     <td style="padding:10px ;  color:#fff;" >{{ $appointment->phone }}  </td>
                     <td style="padding:10px ;  color:#fff;" >{{ $appointment->name }}  </td>
                     <td style="padding:10px ;  color:#fff;" >{{ $appointment->date }}  </td>
                     <td style="padding:10px ;  color:#fff;" >{{ $appointment->message }}  </td>
                     <td style="padding:10px ;  color:#fff;" >{{ $appointment->status }}  </td>
                     <td >   <a class="btn btn-danger" onclick="return confirm('sure you want to cancel the appointment')" href="{{ url('cancel_appoint',$appoints->id )}}">cancel</a> </td>
                     @endforeach
                    </tr>
                    
                
                      
                   
                    
                </table>
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