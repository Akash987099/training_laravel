<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <title>Document</title>
</head>
<body>
    
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <form action="{{route('user-edit')}}" method="POST">
        @csrf

        <input type="hidden" name="id" value="{{$data->id}}">
       <div class="modal-header">						
           <h4 class="modal-title">Add Employee</h4>
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       </div>
       
       <div class="modal-body">					
           <div class="form-group">
               <label>Name</label>
               <input name="name" type="text" class="form-control" value="{{$data->name}}" required>
           </div>
           <div class="form-group">
               <label>Email</label>
               <input name="email" type="email" class="form-control" value="{{$data->email}}" required>
           </div>
           <div class="form-group">
               <label>Address</label>
               <textarea name="address" class="form-control" required></textarea>
           </div>
           <div class="form-group">
               <label>Phone</label>
               <input type="text" name="phone" class="form-control" required>
           </div>					
       </div>
       <div class="modal-footer">
           <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
           <input type="submit" class="btn btn-success" value="Add">
       </div>
   </form>

</body>
</html>