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
        <form method="post" action="{{ route('tinhToan.post') }}">
            @csrf
            <div class="form-row">
                <div class="col-3"> Số thứ nhất:
                    <input type="text" name="a" class="form-control" value="">
                </div>
                <div class="col-3"> số thứ hai:
                    <input type="text" name="b" class="form-control" value="">
                </div>
            </div>
            <br><br>

            <div>
                <input type="radio" id="cong" name="option" value="+" checked>
                <label for="cong">cong</label>
            </div>

            <div>
                <input type="radio" id="tru" name="option" value="-">
                <label for="tru">tru</label>
            </div>

            <div>
                <input type="radio" id="nhan" name="option" value="*">
                <label for="nhan">nhan</label>
            </div>
            <div>
                <input type="radio" id="chia" name="option" value="/">
                <label for="chia">chia</label>
            </div>
            <button type="submit">tính</button>
        </form>
        <br><br>
        <h2>Kết quả của phép tính là: {{isset($kq)?$kq:''}}</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
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