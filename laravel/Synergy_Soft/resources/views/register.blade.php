<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <?php $enabled = false;?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    @if ($enabled)
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    @else
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

    </style>

    @endif

</head>
<body>
@include('includes.message-block')
<a href="{{route('home')}}">Back</a>
<div class="flex-center position-ref full-height">



        @if($enabled)
            <div class="container">
        <form action="{{route('registerme')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" id="username" value="{{Request::old('username')}}">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" value="{{Request::old('password')}}">
        </div>
        <div class="form-group">
            <label for="department"></label>
            <select name="department" id="department" class="form-control">
                <option value="0">Admin</option>
                <option value="1">Finance</option>
                <option value="2">Sales</option>

            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Register" class="btn btn-primary">
        </div>
    </form>
            </div>
@else

        <div class="content">
            <div class="title m-b-md">Sorry, but the registration is currently disabled on this website.</div>
        </div>
            @endif


</div>
</body>
</html>
