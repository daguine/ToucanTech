<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="Paul Valdez">

        <title>ToucanTech</title>

        <!-- Bootstrap core CSS -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">

    </head>

    <body>

        <!-- Fixed navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{url('admin')}}">{{ config('app.name', 'ToucanTech') }}</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('admin/user')}}">User List</a></li>
                                <li><a href="{{url('admin/user/create')}}">Create User</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">School <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('admin/school')}}">School List</a></li>
                                <li><a href="{{url('admin/school/create')}}">Create School</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Role <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('admin/role')}}">Role List</a></li>
                                <li><a href="{{url('admin/role/create')}}">Create Role</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('password/'.Auth::user()->id,'edit')}}">Password</a></li>
                                <li><a href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">

            @yield('content')

        </div> <!-- /container -->

        <script src="{{asset('js/jquery-3.2.0.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        @yield('scripts');
    </body>
</html>