@extends('frontEnd.master')

@section('title')
Cart
@endsection

@section('mainContent')

<!-- banner -->
<div class="page-head">
    <div class="container">
        <h3>Shopping Cart</h3>
    </div>
</div>
<!-- //banner -->
<!-- check out -->
<div class="checkout">
    <div class="container">
        <h3>My Shopping Cart</h3>     
        <?php
//        $Content = Cart::content();
//        echo '<pre>';
//        print_r($Content);
        ?>
        <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>Remove</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Product Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                @foreach(Cart::content() as $cartContent)
                <tr class="rem1">
                    <td class="invert-closeb">
                        <div class="rem">
                            <a href="{{ url('/deleteFromCart/'.$cartContent->rowId) }}"><div class="close1"></div></a>
                        </div>
                        <script>$(document).ready(function (c) {
                                $('.close1').on('click', function (c) {
                                    $('.rem1').fadeOut('slow', function (c) {
                                        $('.rem1').remove();
                                    });
                                });
                            });
                        </script>
                    </td>
                    <td class="invert-image"><a href="single.html"><img src="{{ asset($cartContent->options->image) }}" alt=" " class="img-responsive" /></a></td>
                    <td class="">
                        {!! Form::open(['url' => '/cart/update/', 'method' => 'post']) !!}

                        <input type="number" name="productQuantity" value="{{ $cartContent->qty }}" style="height: 35px;">
                        <input type="hidden" name="productId" value="{{ $cartContent->rowId }}">
                        <button type="submit" class="btn btn-info" style="height: 35px;">Update</button>
                        {!! Form::close() !!}    
                    </td>
                    <td class="invert">{{ $cartContent->name }}</td>
                    <td class="invert">‎৳{{ $cartContent->price*$cartContent->qty }}</td>
                </tr>
                @endforeach

            </table>
        </div>
        <div class="checkout-left">	

            <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                <a href="{{ url('/') }}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
                <a href="{{ url('/checkout') }}">Checkout &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
            </div>
            <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
                <h4>Shopping basket</h4>
                <ul>
                    @foreach(Cart::content() as $cartContent)
                    <li>{{ $cartContent->name }}<i>-</i> <span>৳{{ $cartContent->price*$cartContent->qty }}</span></li>
                    @endforeach

                    <li>Total <i>-</i> <span>৳{{Cart::subtotal()}}</span></li>
                    <li>Total inc. tax(3%)  <i>-</i> <span>৳{{Cart::total()}}</span></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>	
<!-- //check out -->
<!-- //product-nav -->

@endsection 