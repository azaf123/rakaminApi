<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Document</title>
</head>

<body class="p-5">

    <div class="container">
    <p>
        Link
      </p>
    <button class="btn btn-light">
      <a href="{{url('api/articles/')}}">
         Data Article
      </a>
    </button>
    <br>
    <br>
    <br>
    <br>
        <button class="btn btn-dark">
            <a href="{{url('api/category/create')}}">
                Tambah Data Category
            </a>
        </button>
        
        <table class="table">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">Nama user using user_id</th>

                </tr>
            </thead>
            <tbody>
                @foreach($category as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item-> name}}</td>
                    <td>{{$item->user->name}}</td>
                    <td>
                        <a href="{{url('/api/category/'.$item->id).'/edit'}}">
                            <button type="button" class="btn btn-social-icon btn-inverse-success btn-rounded">
                                Edit
                            </button>
                        </a>
                        <form method="POST" action="{{url('/api/category/' . $item->id)}}" enctype="multipart/form-data">
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