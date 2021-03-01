@extends('layouts.app')

@section('content')
    <h1>Your cart<i class="fa fa-cart-arrow-down" aria-hidden="true"></i></h1>
    
    @if( !isset($cart) || $cart->products->isEmpty() )
        <div class="alert alert-warning">
            You cart is empty
        </div> 
    @else
        <h4 class="text-center">Your cart total <strong>{{ $cart->total }}</strong></h4>
        <a class="btn btn-success mb-3" href="{{ route('orders.create') }}">
            Start Order
        </a>
        <div class="row">
            @foreach ($cart->products as $product)
                <div class="col-3">
                    @include('components.product-card')
                </div>
            @endforeach
        </div>
    @endempty
@endsection