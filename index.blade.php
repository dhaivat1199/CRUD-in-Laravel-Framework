@extends('master.navbar')
@section('content')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

  </head>
  <body>

  <!--Seesion For Create Category-->
  @if(session()->has('create'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong>{{session()->get('create')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <!--Seesion For Edit Category-->
  @if(session()->has('edit'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong>{{session()->get('edit')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <!--Seesion For Delete Category-->
  @if(session()->has('delete'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong>{{session()->get('delete')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

    <div class="container mt-4">

    <table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">Category_ID</th>
      <th scope="col">Category_Name</th>
      <th scope="col">Created at</th>
      <th scope="col">Updated at</th>
      <th scope="col">Delete</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    @foreach($viewcategory as $pdata)
  <tr>
      <th scope="row">{{$pdata->category_id}}</th>
      <td>{{$pdata->category_name}}</td>
      <td>{{$pdata->created_at}}</td>
      <td>{{$pdata->updated_at}}</td>
      <td>
        <form method="post" action="{{route('category.destroy', $pdata->category_id)}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
      <td><a class="btn btn-primary" href="{{ route('category.edit', $pdata->category_id) }}">Edit</a></td>
    </tr>
    @endforeach
  </tbody>
</table>

    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>
  </body>
</html>
@endsection