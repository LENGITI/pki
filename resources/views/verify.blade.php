<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('mycss.css') }}">
    <title>Verify</title>
  </head>
  <body>

    <div class="container">
        <div class="row justify-content-md-center">
            @include('menu')
            <div class="col-md-8 login-form-1 bg-light">
                <h3>Verify</h3>
                <form action="{{route('verify')}}" method="post" id="form">
                    @csrf
                    <div class="form-group">
                        <label> Public Key: </label>
                        <textarea class="form-control" rows="4" name="public_key"></textarea>
                    </div>
                    <div class="form-group">
                        <label> Signatures: </label>
                        <textarea class="form-control" rows="4" name="signatures"></textarea>
                    </div>
                    <div class="form-group">
                        <label> Messages: </label>
                        <textarea class="form-control" name="messages" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" id="verify" value="Verify" />
                    </div>
                </form>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    </body>
</html>