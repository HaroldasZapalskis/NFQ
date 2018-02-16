@extends('layouts.productLayout')

@section('content')

    @if($product != null)
    <h2 style="text-align: center; padding-bottom: 15px">We are selling</h2>
        <div class="well" style="word-wrap: break-word;">
            <h3 style="text-align: center;">{{$product->book_name}}</h3>
            <img style="width: 100%"src="/storage/images/{{$product->image}}">
            <h5>Writen by {{$product->author}}</h5>
            <h5>Release year {{$product->year}}</h5>
            <h5>Pages number {{$product->pages_number}}</h5>
            <h4>Price: {{$product->price}} &#0128</h4>
        </div>

        <h2 style="text-align: center; padding-bottom: 15px">Order now!</h2>
        <div class="well">
            {!!Form::open(['action' => 'PagesController@addOrder', 'method' => 'POST']) !!}
                <div class="form-grpup" style="padding-bottom:15px">
                    {{Form::label('first_name', 'First name')}}
                    {{Form::text('first_name', '', ['class' => 'form-control','placeholder' => 'First name'])}}
                </div>
                <div class="form-grpup" style="padding-bottom:15px">
                        {{Form::label('last_name', 'Last name')}}
                        {{Form::text('last_name', '', ['class' => 'form-control','placeholder' => 'Last name'])}}
                    </div>
                <div class="form-grpup" style="padding-bottom:15px">
                    {{Form::label('email', 'Email')}}
                    {{Form::text('email', '', ['class' => 'form-control','placeholder' => 'Email'])}}
                </div>
                <div class="form-grpup" style="padding-bottom:10px">
                    {{Form::label('address', 'Shipping Address')}}
                    {{Form::textarea('address', '', ['class' => 'form-control','placeholder' => 'Shipping Address', 'rows' => '4'])}}
                </div>
                {{Form::hidden('product_id', $product->id) }}
                {{Form::submit('Order', ['class'=>'btn btn-primary'])}}
            {!!Form::close()!!}
        </div>
    @else
        <p>There is nothing to buy, come back later :)</p>
    @endif

@endsection