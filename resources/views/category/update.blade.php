<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

<div class="row">
    <div class="col">
      

    </div>
</div>
    <div class="container">
        <h1>
           Form Tambah Data Category
        </h1>
        <br>
        <form action="{{url('api/category/' . $category->id)}}" method="post" enctype='multipart/form-data'>
            @csrf
            @method('PATCH')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter value" name="name" value="{{$category->name}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama user</label>
            <select class="form-control" name="userid" id="">
                    <option value="">Pilih User</option>
                    @foreach($user as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
        </div>
        
       
        <button type="submit" class="btn btn-primary">
            submit
        </button>
        </form>
      
    </div>

</body>

</html>