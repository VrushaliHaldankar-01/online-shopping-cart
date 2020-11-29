@extends('masters.master')
@section('content')
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">OnlineShopping</a>
    </div>
 
    <ul class="nav navbar-nav navbar-right">
    @if (Route::has('login'))
            @auth
            <li><a href="{{ route('home')}}"><span class="glyphicon glyphicon-user"></span>Home</a></li>
           
                
             @else
                     <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                  @if (Route::has('register'))
                      <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                   @endif
            @endauth
      
    </ul>
  
  </div>
  @endif
</nav>

    

<div class="content">
    <img src="/img/images.png" alt="online store" class="center">
       
             <p class="msg">{{session('msg')}}</p>
             <a href="{{route('pro_details')}}">Shop Now</a>

</div>
@endsection