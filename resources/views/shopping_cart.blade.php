@extends('layouts.app')

@section('title') edit User @stop

@section('content')
    <div class="container mt-5">
        <div>
            <i class="fas fa-shopping-cart"></i> Shopping cart
        </div>
        <div class="dropdown-divider"></div>
        <div class="row">
            <div class="col-sm-8">
                <table class="table table-hover table-borderless">
                    <tr class="text-white bg-secondary">
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Amount</th>
                    </tr>
                    @if(Session::has('cart'))
                        @foreach(Session::get('cart')->posts as $item)
                        <tr>
                            <td>{{$item['post']['item_name']}}</td>
                            <td>{{$item['post']['price']}}</td>
                            <td>
                            <a href="{{route('decrease.cart',['id'=>$item['post']['id']])}}" class="btn btn-outline-info btn-sm"><i class="fas fa-minus-circle"></i></a>
                            <span class="btn btn-outline-info rounded-circle">{{$item['qty']}}</span>
                            <a href="{{route('increase.cart',['id'=>$item['post']['id']])}}" class="btn btn-outline-info btn-sm"><i class="fas fa-plus-circle"></i></a>
                            </td>
                            <td>{{$item['amount']}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" class="text-right">Total Qty</td>
                            <td>{{Session::get('cart')->totalQty}}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right">Total Amount</td>
                            <td>{{Session::get('cart')->totalAmount}}</td>
                        </tr>
                        @else
                        <tr>
                        <td colspan="4">
                            <div class="alert alert-danger">
                                Empty item cart
                            </div>
                        </td>
                    </tr>
                        @endif
                </table>
                <a href="{{route('/')}}"><i class="fas fa-shopping-basket"></i> Continued Shopping</a>
            </div>
            <div class="col-sm-4">
                    @if(Auth::User())
                @if((Session::has('cart')) &&(Auth::User()->hasAnyRole(['Member'])))
                    <p class="text-center">
                        The Field with star is all required to fill.
                    </p>
                    <form method="post" action="{{route('checkout')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="phone"> Phone *</label>
                            <input type="tel" name="phone" id="phone" class="form-control @if($errors->has('phone')) is-invalid @endif">
                            @if($errors->has('phone'))<span class="invalid-feedback">{{$errors->first('phone')}}</span> @endif
                        </div>
                        <div class="form-group">
                            <label for="address"> Address *</label>
                            <textarea type="text" name="address" id="address" class="form-control @if($errors->has('address')) is-invalid @endif"></textarea>
                            @if($errors->has('address'))<span class="invalid-feedback">{{$errors->first('address')}}</span> @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-lg"> Checkout</button>
                        </div>
                    </form>
                    @else
                    <p class="text-success">
                        " Dear Customer,please contact to Web site adminstrator for your ordering confirm."
                        <br>
                        <a href="tel:09697847543"><i class="fas fa-phone"></i> Call Now</a>
                    </p>
                    @endif
                        @endif
            </div>
        </div>
    </div>
   @endsection
