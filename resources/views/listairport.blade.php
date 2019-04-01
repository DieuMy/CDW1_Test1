<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flights - Worldskills Travel</title>
    <!-- Fonts -->
    <script type="text/javascript" rel="stylesheet" src="{{asset('/css/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" rel="stylesheet" src="{{asset('/js/index_btn_search.js')}}"></script>
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
                        <li>
                            <!-- @if(Session::get('login') == TRUE)
                                <a href="{{route('logout')}}">Logout</a>
                            @else
                                <a href="{{route('login')}}">Login</a>
                            @endif -->
                            <a href="{{route('login')}}">Login</a>
                        </li>
                        <li><a href="{{route('create')}}">Register</a></li>
                        <li><a href="<?php echo url('listorg') ?>">Danh sách hãng bay</a></li>
                        <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">AAA<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('logout')}}">Logout</a></li>
                            </ul>
                        </li> -->   
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <section>
                <h2>Sân Bay của các Tình/Thành Phố</h2>
                @foreach ($a as $aa) 
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form role="form" action="{{route('listflight')}}" id="search">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <h3><?php echo $aa->city->city_name?></h3>
                                        <div>@if($aa->city_id == $aa->city->city_id)
                                                <h2>{{$aa->airport_name}}
                                            @endif</div>                       
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                 @endforeach       
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

</body>
</html>