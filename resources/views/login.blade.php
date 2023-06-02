<!DOCTYPE html>
<html lang="">
<head>
    <title>Conference</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        h3 {
            font-style: italic;
        }
        .btn-login {
            background-color: #28a745;
            font-weight: bold;
        }
        .btn-guest {
            background-color: #87CEEB;
            font-weight: bold;
        }
        .btn-login:hover, .btn-guest:hover {
            opacity: 0.8;
        }
        .fancy-font {
            font-family: Snell Roundhand, cursive;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h3 class="text-center fancy-font">CONFERENCE</h3></div>

                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form method="post" action="{{ url('/checklogin') }}">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="email" class="form-label">Enter Email</label>
                            <input type="email" name="email" class="form-control" id="email" />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Enter Password</label>
                            <input type="password" name="password" class="form-control" id="password" />
                        </div>
                        <div class="d-grid gap-2">
                            <input type="submit" name="login" class="btn btn-login" value="Login" />
                        </div>
                    </form>
                    <form method="get" action="{{ route('loginGuest') }}" class="mt-3">
                        <div class="d-grid gap-2">
                            <input type="submit" name="guest" class="btn btn-guest" value="Continue as Guest" />
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
