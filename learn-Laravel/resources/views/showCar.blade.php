<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>DANH SÁCH TẤT CẢ CÁC XE</h1>
        <a href="{{ route('cars.create') }}">Create new car</a>
        <table class="table table-hover">
            @csrf
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Decription</th>
                    <th scope="col">Company</th>
                    <th scope="col">Product_on</th>
                    <th scope="col">Function</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($car as $car)
                <tr>
                    <td>{{$car['id']}}</td>
                    <td>{{$car['model']}}</td>
                    <td><img width="100px" height="100px" class="img-thumnail" src="/image/{{ $car['images']}}" alt="">
                    </td>
                    <td>{{$car['decription']}}</td>
                    <td>{{$car['produced_on']}}</td>
                    <td><a href="/{{$car["id"]}}/Edit" role="button" onclick="return confirm('do you want Update?')"
                            class="btn btn-primary">Edit</a></td>
                    <td><a href="/Delete/{{$car["id"]}}" role="button" onclick="return confirm('do you want Delete?')"
                            class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>