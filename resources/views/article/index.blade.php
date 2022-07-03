<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Document</title>
</head>

<body class="pt-5">
  <div class="container">
      <!-- link category -->
      <p>
        Link
      </p>
    <button class="btn btn-light">
      <a href="{{url('api/category/')}}">
         Data Category
      </a>
    </button>
    <br>
    <br>
    <br>
    <br>
    <button class="btn btn-dark">
      <a href="{{url('api/articles/create')}}">
        Tambah Data Article
      </a>
    </button>

  
   
    <table class="table">

      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">title</th>
          <th scope="col">content</th>
          <th scope="col">image</th>
          <th scope="col">Nama User using userID</th>
          <th scope="col">Nama category using categoryID</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($article as $item)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>{{$item-> title}}</td>
          <td>{{$item-> content}}</td>
          <td><img src="{{asset('img/'.$item->image)}}" alt="" width="100px" height="100px"></td>
          <td>{{$item-> user->name}}</td>
          <td>{{$item-> category->name}}</td>
          <td>
            <a href="{{url('/api/articles/'.$item->id).'/edit'}}">
              <button type="button" class="btn btn-social-icon btn-inverse-success btn-rounded">
                Edit
              </button>
            </a>
            <form method="POST" action="{{url('/api/articles/' . $item->id)}}" enctype="multipart/form-data">
              @csrf
              @method("DELETE")
              <button type="submit" class="btn btn-social-icon btn-inverse-danger btn-rounded">
              Delete
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</body>

</html>