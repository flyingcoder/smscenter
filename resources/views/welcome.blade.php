<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> DumDum </title>

    
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    
    <link href="{{ asset('css/grayscale.css')}}" rel="stylesheet">
 
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-play-circle"></i>  <span class="light">DumDum</span>
                </a>
            </div>

            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">

                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#register"><span class="fa fa-sign-in" ></span>  Login</a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>
        <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-8 col-md-offset-2">
                        <br><br><br><br><br><br>
                        <img class="responsive" src="{{asset('img/dumdum_logo.png')}}" style="margin-top:-15px">
                        <br><h2>A Childhood Immunization Reminder Recall System</h2>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="container aboutcontent-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>About DUMDUM</h2>
                <p> DUMDUM is a solution solely designed for reminding parents <br> the immunization schedules of their child.</p>
                
            </div>
        </div>
    </section>
    
        <!-- Register Section -->
    <section id="register" class="container registercontent-section text-center">
        <div id="wrap">
        <div class="container container-space">
        <div class="row">
            <div class="col-lg-12" align="center">
                <h1>User Access</h1>
                
            </div>
        </div>
            
        <div class="row">
            <div id="login" class="col-md-4 col-md-offset-1">
            <form action="{{ url('login') }}" role="form" method="post">
            {!! csrf_field() !!}
            <h2>Login</h2>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                </div>
                <div class="form-group">
                    <div class="col-xxs-6" align="right">
                        <input type="hidden" name="action" value="login">
                        <input style="font-family:Century Gothic"type="submit" value="Login" class="btn btn-default btn-lg">
                    </div>
                </div>
                </form>
                </div>

        </div>
    </div>

    </section>

    <footer>
        <div class="copyrightcontainer text-center">
            <p> Created by Team IRRS | Copyright &copy; 2016 </p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/sweetalert2/3.0.0/sweetalert2.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('js/grayscale.js') }}"></script>
        <!-- jQuery -->
    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    @stack('js')

</body>

</html>