@extends('masters.master')
@section('content')
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">OnlineShopping</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
    <li><a href="{{ route('welcome')}}"><span class="glyphicon glyphicon-user"></span>Home</a></li>
    </ul>
    
 </div>
 </nav>
    <div class="container">
        <h1 class="text-center">Cart Page</h1>
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub Total</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @php $total = 0; @endphp
                @if(session('cart'))
                    @foreach(session('cart') as $id => $product)
                        @php
                            $sub_total = $product['price']*$product['quantity'];
                            $total += $sub_total;
                        @endphp
                <tr>
                    <td>
                        <span>{{$product['name']}}</span>
                     </td>
                           
                     <td>₹{{$product['price']}}</td>
                     <td><a class="btn btn-light btn-sm my-2 my-sm-0"  href="{{route('decrease',[$id,'quantity','price'])}}"  type="submit"><i class="fa fa-minus"></i>
                            </a>
                            {{$product['quantity']}}
                           <a class="btn btn-light btn-sm my-2 my-sm-0" href="{{route('increase',[$id,'quantity2'])}}" ><i class="fa fa-plus"></i></a>
                            

                    </td>
                          
                     <td>₹{{$sub_total}}</td>
                     <td>
                         <a href="{{route('remove', [$id])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                     </td>
                 </tr>
                    @endforeach
                @endif
                </tbody>
                <tfoot>
                <tr>
                   <td>
                        <a href="{{route('pro_details')}}"
                            class="btn btn-warning"
                            >Continue Shopping</a> 
                    </td>
                    <td colspan="2"></td>
                    <td><strong>Total ₹{{$total}}</strong></td>
                    </br>
                    <td><a class="btn btn-primary"  href="{{route('checkout')}}" >Checkout</a></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
