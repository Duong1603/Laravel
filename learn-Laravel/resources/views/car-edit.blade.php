<!doctype html>
<html lang="en">

<head>
    <title>FORM</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h1>CREATE NEW CAR</h1>
        <form method="POST" action={{ $action == "create" ? "/Store" : "/Update/".$car["id"] }}
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="model">Model</label>
                <input type="text" name="model" class="form-control" id="formGroupExampleInput"
                    placeholder="Example input" value="{{isset($car) ? $car["model"] : ""}}">
            </div>
            <div class="form-group">
                <label for="img">Image</label>
                @if (isset($car))
                @method('put')
                <img src="/image/{{ $car->images }}" value="{{isset($images)?$images:''}}" class="col-6 img-thumbnail"
                    style="width: 10rem" alt="">
                @endif
                <input type="file" name="image" class="form-control" id="formGroupExampleInput2"
                    value="{{isset($images)?$images:''}}" placeholder="Another input">
            </div>

            <div class="form-group">
                <label for="decription">Decription</label>
                <input type="text" name="decription" class="form-control" id="formGroupExampleInput2"
                    placeholder="Another input" value="{{isset($car) ? $car["decription"] : ""}}">
            </div>
            <div class="form-group">
                <label for="mf_id">Company</label>
                <select name="mf_id">
                    @isset($prop)
                    @foreach ($prop as $mf){
                    <option value="{{$mf->id}}" {{isset($car) && $car-> mf_id === $mf->id ? 'selected': ''}}>
                        {{$mf->mf_name}}</option>
                    }
                    @endforeach
                    @endisset
                </select>
            </div>
            <div class="form-group">
                <label for="produced_on">Product_on</label>
                <input type="date" name="produced_on" class="form-control" id="formGroupExampleInput2"
                    placeholder="Another input" value="{{isset($car) ? $car["produced_on"] : ""}}">
            </div>
            <div>
                <button type="submit">submit</button>
                <br>

            </div>
        </form>
        <button><a href="{{ route('cars.index') }}"> back</a></button>
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