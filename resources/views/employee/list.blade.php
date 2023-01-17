<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 9 CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="bg-dark py-3">
         <div class="container">
          <div class="h4 text-white">Laravel 9 CRUD</div>
         </div>
    </div>
    <div class="container">
               <div class="d-flex justify-content-between py-3">
                   <div class="h4">Employee</div>
                   <div>
                      <a href="{{route('employees.create')}}" class="btn btn-primary">Create</a>
                   </div>
               </div>

               <div class="card border-0 shadow-lg">
                  <div class="card-body">
                    <table class="table table-striped">
                       <tr>
                          <th>ID</th>
                          <th>Image</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Action</th>
                       </tr>
                   
                       @if($employees->isNotEmpty())
                       @foreach ($employees as $employee)
                           
                       
                          <tr valign="middle">
                            <td>{{$employee->id}}</td>
                            <td>
                                @if($employee->image != '' && file_exists(public_path().'/uploads/employees/'.$employee->image))
                                {{-- <img src="{{url('uploads/employees/'.$employee->image)}}" alt="" width="50" height="50" class="rounded-circle"> --}}
                                <img src="{{asset('uploads/employees/'.$employee->image)}}" alt="" width="40" height="40" class="rounded-circle">
                                @else
                                <img src="{{asset('assets/images/no-image.png')}}" alt="" width="40" height="40" class="rounded-circle">
                                @endif
                            </td>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->address}}</td>
                            <td>
                                <a href="{{route('employees.edit',$employee->id)}}" class="btn btn-primary btn-sm">Edit</a>    
                                <a href="#" onclick="deleteEmployee({{ $employee->id }})" class="btn btn-danger btn-sm">Delete</a>
                                
                                <from action="{{route('employees.destroy',$employee->id)}}" method="post">
                                  @csrf
                                  @method('delete')
                                </from>
                            </td>
                          </tr>
                          @endforeach
                        @else
                        <tr>
                            <td clospan="6">Record Not Found</td> 
                         </tr>
                        @endif
                    </table>
                  </div>
               </div>
               {{-- pagination --}}
               <div class="mt-2">
                {{$employees->links()}}
               </div>
                {{-- pagination --}}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>

<script>
  function deleteEmployee(id){
       if(confirm("Are you sure you want to delete?")){

       }
  }
</script>
