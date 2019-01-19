<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('mycss.css') }}">
    <title>CREATE DIGITAL SIGNATURES</title>
  </head>
  <body>

    <div class="container">
        <div class="row justify-content-md-center">
            @include('menu')
            <div class="col-md-8 login-form-1 bg-light">
                <h3>CREATE DIGITAL SIGNATURES</h3>
                <form action="{{route('sign.create')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label> Private Key: </label>
                        <textarea class="form-control" name="private_key" rows="4">{{ $keys['private'] }}</textarea>
                    </div>
                    <div class="form-group">
                        <label> Public Key: </label>
                        <textarea class="form-control" name="public_key" rows="4">{{ $keys['public'] }}</textarea>
                    </div>
                    <div class="form-group">
                        <label> Messages: </label>
                        <textarea class="form-control" name="messages" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="CREATE" />
                    </div>
                </form>
            </div>
        </div>
    </div>

  </body>
</html>