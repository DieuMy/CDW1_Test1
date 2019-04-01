<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Worldskills Travel</title>
    <!-- Fonts -->
        <script type="text/javascript" rel="stylesheet" src="{{asset('/css/jquery-3.2.1.min.js')}}"></script>
    
    <script type="text/javascript" rel="stylesheet" src="{{asset('/sweetalert.min.js')}}"></script>
        <link rel="stylesheet" href="<?php echo url('/css/bootstrap.css')?>"/>
        <link rel="stylesheet" href="<?php echo url('/css/bootstrap.min.css')?>"/>
        <link href="<?php echo url('/css/style.css')?>" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="wrapper">
    <header>
        <nav class="navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="{{url('/')}}" class="navbar-brand">Worldskills Travel</a>
                </div>
                <div class="collapse navbar-collapse" id="main-navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Welcome message</a></li>
                        <li><a href="#">Flights</a></li>
                        <li><a href="{{route('login')}}">Log In</a></li>
                        <li><a href="{{route('create')}}">Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-push-3">
                    <h2>Join as a Wordskills Travel Member</h2>
                    <p>
                    @if ($errors->any)
                        
                        @foreach ($errors->all() as $error )
                        <p style="color:red">{{ $error}}</p>
                        @endforeach

                    @endif
                    @if(session()->has('success'))
                    <p style="color:green">{{session('success')}}</p>
                    @endif
                </p>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form role="form" action="{{route('create-user')}}" method="post" id="register">
                             {{csrf_field()}}
                                <div class="form-group">
                                    <label class="control-label">Email Address:</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address"><div id="error"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Password:</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Name:</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter your name">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Phone Number:</label>
                                    <input type="tel" name="tel" id="tel" class="form-control" placeholder="Enter your phone number">
                                </div>
                                <div class="text-right">
                                    <button type="submit" id="btn-register" class="btn btn-primary">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="container">
            <p class="text-center">
                Copyright &copy; 2017 | All Right Reserved
            </p>
        </div>
    </footer>
</div>
<!--scripts-->
<script type="text/javascript" src="assets/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>