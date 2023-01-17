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
                      <a href="{{route('employees.index')}}" class="btn btn-primary">Back</a>
                   </div>
               </div>
               <form action="{{route('employees.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
               <div class="card border-0 shadow-lg">
                  <div class="card-body">
                        <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                        </div>
                  

                        <div class="mb-3">
                            <label for="name" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email">
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Address</label>
                            <textarea class="form-control" name="address" id="address" cols="30" rows="4" placeholder="Enter Address"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                 </div>
               </div>
               <button type="submit" class="btn btn-primary mt-3">Save Employee</button>
            </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
