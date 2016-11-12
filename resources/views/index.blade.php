@extends('layouts.main')


@section('content')

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <br>
                    <div class="col-md-8 col-md-offset-2">
                        <br><br><br><br><br><br>
                        <img class="responsive" src="img/dumdum_logo.png" style="margin-top:-15px">
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
    

    <!-- Contact Section -->
    <section id="contact" class="container contactcontent-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Contact Us</h2>
                <p>Feel free to email us to provide some feedback on our templates, give us suggestions for new templates and themes, or to just say hello! <br><br> Thank you! </p>
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="https://twitter.com" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <li>
                        <a href="https://facebook.com" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                    </li>
                    </li>
                </ul>
            </div>
        </div>
    </section>

        <!-- Register Section -->
    <section id="register" class="container registercontent-section text-center">
            
        <div class="row">
            <div id="login" class="col-md-4 col-md-offset-1">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {!! csrf_field() !!}
            <h2>Login</h2>
                <div class="form-group has-feedback">
                    <input name="email" type="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group has-feedback">
                    <input name="password" type="password" value="" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group">
                    <div class="col-xxs-6" align="right">
                        <input type="hidden" name="action" value="login">
                        <input style="font-family:Century Gothic" type="submit" value="Login" class="btn btn-default btn-lg">
                    </div>
                    <div style="clear:both"></div>
                </div>
                </form>
                </div>
                </div>
        </div>
   </div>

</section>

  @endsection
