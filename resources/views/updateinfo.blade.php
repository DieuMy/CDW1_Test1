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
                            @if(Session::get('login') == TRUE)
                                <a href="{{route('logout')}}">Logout</a>
                            @else
                                <a href="{{route('login')}}">Login</a>
                            @endif
                        </li>
                        <li><a href="{{route('create')}}">Register</a></li>
                         
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
           <form action="{{route('edit')}}" method="POST" role="form">
           {{csrf_field()}}
               <legend>Thay đổi thông tin</legend>
           
                <input type="hidden" name="userid" value="{{$user['user_id']}}">
               <div class="form-group">
                   <label for="">Name</label>
                   <input type="text" id="name" value="{{$user['user_name']}}" name="name" class="form-control" id="" placeholder="Input username">
               </div>
               <div class="form-group">
                   <label for="">Password</label>
                   <input type="password" id="password" name="password" class="form-control" placeholder="Input password">
               </div>
           
               <div class="form-group">
                   <label for="">Telephone</label>
                   <input type="text" value="{{$user['user_phone']}}" id="tel" name="tel" class="form-control" placeholder="Input telephone">
               </div>
<!-- 
               <div class="form-group">
                   <label for="">Gender</label>
                    <select id="gender" name="gender">
                        <option value="male">Male</option>
                        <option value="female">FeMale</option>
                    </select>
               </div> -->
               

               <!-- <div class="form-group">
                   <label for="">Birthdate</label>
                   <input type="date" id="birth" name="birth" class="form-control" id="" placeholder="Input field">
               </div> -->
           
                <!-- <div class="form-group">
                   <label for="">Địa chỉ</label>
                   <input type="text" id="address" name="address" class="form-control" id="" placeholder="Input field">
               </div> -->
               <button type="submit" class="btn btn-primary">Submit</button>
           </form>
        </div>
    </main>
    </div>

</body>
</html>