<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="token" id="token" value="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@stack('title')</title>

    <link rel="icon" href="{{ asset('img/kteach-logo.png') }}" type="image/x-icon" />

    <link rel="stylesheet" href="bower_components/intl-tel-input/build/css/intlTelInput.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/3.0.0/sweetalert2.min.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- custom plugins -->
    @stack('css')

    <!-- Custom -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body .navbar-brand {
            font-family: 'Lato';
            color: #000;
        }
        .iti-flag {
          background-image: url("bower_components/intl-tel-input/build/img/flags.png");
        }
        .intl-tel-input {
          display: block !important;
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SMS Team Central</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            @if (!Auth::guest())
                <li role="presentation"><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('user::send') }}">Send</a></li> 
                <li role="presentation"  class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Team <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('user::team') }}">List</a></li> 
                        <li><a href="{{ route('user::addTeam') }}">Add</a></li> 
                    </ul>
                  </li>
                <li role="presentation"><a href="{{ route('user::phonebook') }}">Phone Book</a></li>
                @if (Auth::user()->isAdmin())
                <li role="presentation"><a href="{{ route('user::admin') }}">Admin</a></li>
                @endif
               <!--  <li role="presentation"><a href="#"></a></li> -->
            @endif
          </ul>
          <ul class="nav navbar-nav navbar-right">
              @if (Auth::guest())
                  <li role="presentation" ><a href="{{ url('/login') }}">Login</a></li>
                  <li role="presentation" ><a href="{{ url('/register') }}">Register</a></li>
              @else
                  <li role="presentation"  class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('user::profile') }}">Profile</a></li> 
                        <li><a href="{{ route('user::settings') }}">Settings</a></li> 
                        <li><a href="{{ route('user::help') }}">Help</a></li> 
                        <li role="separator" class="divider"></li> 
                        <li class="logout" ><a href="{{ url('/logout') }}" >Logout</a></li>
                    </ul>
                  </li>
              @endif 
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <div class="container" id="content">
        @yield('content')  
    </div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.21/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.js"></script>
    <script src="https://cdn.jsdelivr.net/sweetalert2/3.0.0/sweetalert2.min.js"></script>
    <script src="bower_components/intl-tel-input/build/js/intlTelInput.js"></script>
    <script src="bower_components/intl-tel-input/build/js/utils.js"></script>
    <script>
      $("#phone").intlTelInput({
          preferredCountries: ['ph','us']
      });
    </script>
    @stack('script')
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
