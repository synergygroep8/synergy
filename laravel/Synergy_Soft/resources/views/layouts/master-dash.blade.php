<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::to('src/css/main.css')}}">
</head>
<body>
@include('includes.header')
@include('includes.message-block')
<div class="col-md-3">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab">
                <h4 class="panel-title">
                    <a class="btn-block" href="{{route('dashboard')}}">
                        Home
                    </a>
                </h4>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a class="collapsed btn-block" role="button" data-toggle="collapse" data-parent="#accordion" href="#accountmenu" aria-expanded="false" aria-controls="accountmenu">
                        {{Auth::user()->username}}
                    </a>
                </h4>
            </div>
            <div id="accountmenu" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <ul class="remove-bullet">
                        <li><a href="{{route('logout')}}">Logout</a></li>
                        <li><a href="#">Settings</a></li>
                    </ul>
                </div>
            </div>
        </div>
        @if (Auth::user()->department == 1)
            @include ('includes.menus.finance')
        @elseif (Auth::user()->department == 0)
            @include ('includes.menus.admin')
        @elseif (Auth::user()->department == 2)
            @include ('includes.menus.sales')
        @endif
    </div>
</div>

<div class="col-md-6">

    <h1>Welcome {{Auth::user()->username}}</h1>
    @yield('mainbar')
</div>
<div class="col-md-3">
    <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
    @yield('right-sidebar')
    </div>
</div>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>