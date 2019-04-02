<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flights - Worldskills Travel</title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <script type="text/javascript" rel="stylesheet" src="{{asset('/css/jquery-3.2.1.min.js')}}"></script>
        <link rel="stylesheet" href="<?php echo url('/css/bootstrap.css')?>"/>
        <link rel="stylesheet" href="<?php echo url('/css/bootstrap.min.css')?>"/>
        <link href="<?php echo url('/css/style.css')?>" rel="stylesheet" type="text/css"/>
        <!-- Latest compiled and minified CSS & JS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <script src="//code.jquery.com/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
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
                        <li><a href="index.html">Flights</a></li>
                        <li><a href="login.html">Log In</a></li>
                        <li><a href="register.html">Register</a></li>
                        <li><a href="<?php echo url('listorg') ?>">Danh sách hãng bay</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <section>
            @foreach($city as $c)
                @if($c->city_id == $q->from)
                    <h2>{{$c->city_name}} - {{$c->airport->airport_name}}
                @endif
            @endforeach
            <i class="glyphicon glyphicon-arrow-right"></i>
            @foreach($city as $c)
            @if($c->city_id == $q->to)
                {{$c->city_name}} - {{$c->airport->airport_name}} </h2>
                @endif
            @endforeach
                <article>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4><strong>{{$q->org->name}}</strong></h4>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label class="control-label">From:</label>
                                            <div><big class="time">{{date('h:i',strtotime($q->time_start))}}</big></div>
                                            <div><span class="place">@foreach($city as $c)
                                                @if($c->city_id == $q->from)
                                                    {{$c->city_name}}
                                                @endif
                                            @endforeach</span></div>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="control-label">To:</label>
                                            <div><big class="time">{{date('h:i',strtotime($q->time_end))}}</big></div>
                                            <div><span class="place">@foreach($city as $c)
                                                @if($c->city_id == $q->to)
                                                    {{$c->city_name}}
                                                @endif
                                            @endforeach</span></div>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="control-label">Duration:</label>
                                            <div><big class="time">{{date('h:i',strtotime( $q->time_end) - strtotime( $q->time_start))}}</big></div>
                                            <div><strong class="text-danger"></strong></div>
                                        </div>
                                        <div class="col-sm-3 text-right">
                                            <h3 class="price text-danger"><strong>{{$price}}</strong></h3>
                                            <div>
                                                <a href="flight-book.html" class="btn btn-primary">Choose</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </section>
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