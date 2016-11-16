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
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{ asset('css/grayscale.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/blog-home.css')}}" rel="stylesheet">
    <link href="{{asset('css/index.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/header.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
    

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-custom2 navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="">
                    <span class="light">DumDum</span>
                </a>
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

    <footer>
        <div class="copyrightcontainer text-center">
            <p> Created by Team IRRS | Copyright &copy; 2016 </p>
        </div>
    </footer>
    <!-- Plugin JavaScript -->
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
    <!-- /.container -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/sweetalert2/3.0.0/sweetalert2.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('js/grayscale.js') }}"></script>

    @stack('js')

</body>

</html>


