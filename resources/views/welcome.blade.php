<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Document</title>
</head>

<body class="mt-5">
    <div class="container">
        <p>
            link to data article
        </p>
    <button class="btn btn-light">
        <a href="{{url('api/articles/')}}">
            Data Article
        </a>
    </button>
    <br>
    <br>
    <br>
    <p>
            link to data category
        </p>
    <button class="btn btn-light">
        <a href="{{url('api/category/')}}">
            Data Category
        </a>
    </button>
    <br>
    <br>
    <br>
    <p>
            link to login
        </p>
    <button class="btn btn-light">
        <a href="{{url('api/login/')}}">
            Login
        </a>
    </button>
    <br>
    <br>
    <br>
    <p>
            link to login
        </p>
    <button class="btn btn-light">
        <a href="{{url('api/register/')}}">
            register
        </a>
    </button>
    </div>

</body>

</html>