<div class="well">
    {!!Form::open(['action'=> ['PagesController@updateProducts'], 'method' => 'POST'])!!}
        <div class="form-grpup" style="padding-bottom:15px">
            {{Form::label('author', 'Choose a product to sell')}}
        </div>
        <div class="form-grpup" style="padding-bottom:15px">
            {!! Form::Label('product', 'Product:') !!}
            {!! Form::select('products', $products, null) !!}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Confirm', ['class'=>'btn btn-primary'])}}
    {!!Form::close()!!}
</div>