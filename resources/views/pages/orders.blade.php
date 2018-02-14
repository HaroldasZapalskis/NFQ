@extends('layouts.ordersLayout')

@section('content')
@if(count($orders) > 0)

<table class="table" style="word-wrap: break-word;">
    <thead>
        <tr>
            <th> #</th>
            <th>First name <a href="/orders?sort=first_name&value=asc"><span class="glyphicon glyphicon-menu-up"></span></a><a href="/orders?sort=first_name&value=desc"><span class="glyphicon glyphicon-menu-down"></span></a></th>
            <th>Last name <a href="/orders?sort=last_name&value=asc"><span class="glyphicon glyphicon-menu-up"></span></a><a href="/orders?sort=last_name&value=desc"><span class="glyphicon glyphicon-menu-down"></span></a></th>
            <th>Email <a href="/orders?sort=email&value=asc"><span class="glyphicon glyphicon-menu-up"></span></a><a href="/orders?sort=email&value=desc"><span class="glyphicon glyphicon-menu-down"></span></a></th>
            <th>Address <a href="/orders?sort=address&value=asc"><span class="glyphicon glyphicon-menu-up"></span></a><a href="/orders?sort=address&value=desc"><span class="glyphicon glyphicon-menu-down"></span></a></th>
            <th>Order date <a href="/orders?sort=created_at&value=asc"><span class="glyphicon glyphicon-menu-up"></span></a><a href="/orders?sort=created_at&value=desc"><span class="glyphicon glyphicon-menu-down"></span></a></th>
            <th>Book bought <a href="/orders?sort=book_id&value=asc"><span class="glyphicon glyphicon-menu-up"></span></a><a href="/orders?sort=book_id&value=desc"><span class="glyphicon glyphicon-menu-down"></span></a></th>
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