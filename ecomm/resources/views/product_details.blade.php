@extends('masters.master')
@section('content')
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" >OnlineShopping</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
    <li><a href="{{ route('welcome')}}"><span class="glyphicon glyphicon-user"></span>Home</a></li>
    </ul>
    
 </div>  
 </nav>
<div class="container">
        <div class="row">
            @foreach($product_details as $products)
                <div class="col-xs-18 col-sm-6 col-md-4">
                    <div class="thumbnail">
                        
                        <div class="caption">
                        <td><img src="/img/phone.jpg" alt="pizza house"></td>
                            <h4>{{ $products->name }}</h4>
                            <p>{{ $products->description}}</p>
                            <p><strong>Price: </strong> {{ $products->price }}</p>
                            <p class="btn-holder"><a href="{{route('add-cart',[$products->id])}}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection


