<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
    <div>
        <h1>Giải phương trình bậc nhất</h1>
        <form method="post" action="ptB1">
            @csrf
            <input type="text" style="width: 100px" name="a" value="{{ isset($a)?$a:'' }}" />
            x
            +
            <input type="text" style="width: 100px" name="b" value="{{ isset($b)?$b:'' }}" /> = 0
            <br><br>
            <button type="submit">Tính</button>
        </form>
        <h2>{{ isset($kq)?$kq:'' }}</h2>
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
</body>

</html>