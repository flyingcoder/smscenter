<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> DumDum </title>
    
    <!-- Bootstrap Core CSS -->

    <link href="{{ asset('css/grayscale.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link href="{{asset('css/blog-home.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/6.1.1/sweetalert2.css">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-custom2 navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                @if(Auth::guest())
                <a class="navbar-brand page-scroll" href="">
                    <span class="light">DumDum</span>
                </a>
                @else
                <a class="navbar-brand page-scroll" href="{{url('home')}}">
                    <span class="light">DumDum</span>
                </a>
                @endif
            </div>
            <ul class="nav navbar-nav navbar-right">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ url('registration') }}"> Registration </a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ url('messages') }}"> Messages </a>
                    </li>
                    <!-- <li>
                        <a class="page-scroll" href="{{ url('profiles') }}"> Profiles </a>
                    </li> -->
                    <li>
                        <a class="page-scroll" href="{{ url('reports') }}"> Reports </a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ url('logout') }}"><span class="fa fa-sign-in" ></span> Logout </a>
                    </li>
                </ul>   
          </ul>
          </nav>
        </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->

    </div>

@yield('content')

    <!-- /.container -->
    <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/sweetalert2/6.1.1/sweetalert2.js"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('js/grayscale.js') }}"></script>

    @stack('js')

</body>

</html>


