<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flights - Worldskills Travel</title>
    <!-- Fonts -->
    <script type="text/javascript" rel="stylesheet" src="{{asset('/css/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" rel="stylesheet" src="{{asset('/js/index_btn_search.js')}}"></script>
    <script type="text/javascript" rel="stylesheet" src="{{asset('/js/create_flight.js')}}"></script>
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
                        <li><a href="<?php echo url('listairport') ?>">Danh sách sân bay</a></li>
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
            <section>
                <h3>Create Flight</h3>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form role="form" action="{{route('create-flight')}}" method="post" id="create">
                        {{csrf_field()}}
                            <div class="row">
                                <div class="col-sm-4">
                                    <h4 class="form-heading">1. Flight Destination</h4>
                                    <div class="form-group">
                                   
                                        <label class="control-label">From: </label>
                                        <select class="form-control" name="from" id="from">
                                         @foreach($citys as $a)
                                         <option value="<?php echo $a->city_id ?>"><?php echo $a->city_name?></option>
                                         @endforeach
                                        </select>   
                                    
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">To: </label>
                                        <select class="form-control" name="to" id="to">
                                            @foreach($citys as $a)
                                         <option value="<?php echo $a->city_id ?>"><?php echo $a->city_name?></option>
                                         @endforeach
                                        </select>       
                                    </div>
                                    <!-- Hãng bay -->
                                    <div class="form-group">
                                        <label class="control-label">Org</label>
                                        <select class="form-control" name="org" id="org">
                                            @foreach($orgs as $a)
                                            <option value="<?php echo $a->id ?>"><?php echo $a->name?></option>
                                         @endforeach
                                        </select>       
                                    </div>
                                    
                                </div>
                                <div class="col-sm-4">
                                    <h4 class="form-heading">2. Date of Flight</h4>
                                    <div class="form-group">
                                        <label class="control-label">Departure: </label>
                                        <input type="date" name="departure" id="departure" class="form-control" placeholder="Choose Departure Date">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">End: </label>
                                        <input type="date" name="end" id="end" class="form-control" placeholder="Choose End Date">
                                    </div>
                                  
                                    <div class="form-group">
                                        <label class="control-label">Return: </label>
                                        <input type="date" name="date_return" id="date_return" class="form-control" placeholder="Choose Return Date">
                                    </div>
                                      <div class="form-group">
                                        <div class="form-group">
                                            <div class="radio">
                                                <label><input type="radio" id="one-way" name="flight_type" checked value="one-way" >One Way</label>
                                                <label><input type="radio" id="return" name="flight_type" value="return">Return</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <h4 class="form-heading">3. Create Flights</h4>
                                    <div class="form-group">
                                        <label class="control-label">Total Person: </label>
                                            <input type="text" name="total" id="total" class="form-control">
                                    </div>
                                    <!-- MÃ chuyến bay -->
                                    <div class="form-group">
                                        <label class="control-label">Code Flight</label>
                                        <input type="text" name="code" id="code" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Price</label>
                                        <input type="text" name="price" id="price" class="form-control">
                                    </div>
                                    <br>    
                                    <div class="form-group">
                                        <button type="submit" id="btnCreate" class="btn btn-primary btn-block">Create Flights</button>
                                    </div>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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