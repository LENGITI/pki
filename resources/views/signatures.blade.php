<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('mycss.css') }}">
    <title>DIGITAL SIGNATURES</title>
  </head>
  <body>

    <div class="container">
        <div class="row justify-content-md-center">
            @include('menu')
            <div class="col-md-8 login-form-1 bg-light">
                <h3>DIGITAL SIGNATURES</h3>
                    <div class="form-group">
                        <label> Public Key: </label>
                        <textarea class="form-control" rows="4">{{ $info_sign['public_key'] }}</textarea>
                    </div>
                    <div class="form-group">
                        <label> Signatures: </label>
                        <textarea class="form-control" rows="4">{{ $info_sign['signatures'] }}</textarea>
                    </div>
                    <div class="form-group">
                        <label> Messages: </label>
                        <textarea class="form-control" rows="4">{{ $info_sign['messages'] }}</textarea>
                    </div>
            </div>
        </div>
    </div>

  </body>
</html>