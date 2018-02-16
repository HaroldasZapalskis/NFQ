@extends('layouts.ordersLayout')

@section('content')
@if(count($orders) > 0)
<form action="/orders" method="get">
    <input class="form-control" style="width: 150px; float: left" type="text" name="search" placeholder="{{ app('request')->input('search') }}"/>
    <button class="btn btn-primary" style="float: left"type="submit">Search</button>
</form>

<table class="table" style="word-wrap: break-word;">
    <thead>
        <tr>
            <th> #</th>
            <th>First name <a href="/orders?sort=first_name&value=asc&search={{app('request')->input('search')}}"><span class="glyphicon glyphicon-menu-up"></span></a><a href="/orders?sort=first_name&value=desc&search={{app('request')->input('search')}}"><span class="glyphicon glyphicon-menu-down"></span></a></th>
            <th>Last name <a href="/orders?sort=last_name&value=asc&search={{app('request')->input('search')}}"><span class="glyphicon glyphicon-menu-up"></span></a><a href="/orders?sort=last_name&value=desc&search={{app('request')->input('search')}}"><span class="glyphicon glyphicon-menu-down"></span></a></th>
            <th>Email <a href="/orders?sort=email&value=asc&search={{app('request')->input('search')}}"><span class="glyphicon glyphicon-menu-up"></span></a><a href="/orders?sort=email&value=desc&search={{app('request')->input('search')}}"><span class="glyphicon glyphicon-menu-down"></span></a></th>
            <th>Address <a href="/orders?sort=address&value=asc&search={{app('request')->input('search')}}"><span class="glyphicon glyphicon-menu-up"></span></a><a href="/orders?sort=address&value=desc&search={{app('request')->input('search')}}"><span class="glyphicon glyphicon-menu-down"></span></a></th>
            <th>Order date <a href="/orders?sort=created_at&value=asc&search={{app('request')->input('search')}}"><span class="glyphicon glyphicon-menu-up"></span></a><a href="/orders?sort=created_at&value=desc&search={{app('request')->input('search')}}"><span class="glyphicon glyphicon-menu-down"></span></a></th>
            <th>Book bought</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $key=>$order)
            <tr>
                <td style="max-width:50px; min-width:50px;">{{++$key}}</td>
                <td style="max-width:150px; min-width:150px;">{{$order->first_name}}</td>
                <td style="max-width:150px; min-width:150px;">{{$order->last_name}}</td>
                <td style="max-width:230px; min-width:230px;">{{$order->email}}</td>
                <td style="max-width:360px; min-width:360px;">{{$order->address}}</td>
                <td style="max-width:150px; min-width:150px;">{{$order->created_at}}</td>
                <td style="max-width:150px; min-width:150px;">{{ \App\Product::where(['id' => $order->product_id])->first()->book_name }}</td>
            </tr>
        @endforeach  
    </tbody>
</table>
<div style="text-align: center">
    {!! $orders->appends(\Request::except('page'))->render() !!}
</div>
@else
    <p>There is no orders</p>
@endif

<div class="container" style="text-align: center; padding-top: 55px; max-width: 600px;">
    <h3> Admin panel </h3>
    @include('includes.addProduct')
    @include('includes.chooseProduct')
</div>
@endsection