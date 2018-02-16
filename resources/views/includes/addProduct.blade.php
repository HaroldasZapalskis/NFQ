<div class="well">
    <h4>Add book to sell</h4>
    {!!Form::open(['action' => 'PagesController@addProduct', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'style' =>  'text-align: left; padding-bottom: 30px']) !!}
        <div class="form-grpup" style="padding-bottom:15px">
            {{Form::label('name', 'Book name')}}
            {{Form::text('name', '', ['class' => 'form-control','placeholder' => 'Book name'])}}
        </div>
        <div class="form-grpup" style="padding-bottom:15px">
                {{Form::label('author', 'Author')}}
                {{Form::text('author', '', ['class' => 'form-control','placeholder' => 'Author'])}}
            </div>
        <div class="form-grpup" style="padding-bottom:15px">
            {{Form::label('pages_number', 'Pages number')}}
            {{Form::text('pages_number', '', ['class' => 'form-control','placeholder' => 'Pages number'])}}
        </div>
        <div class="form-grpup" style="padding-bottom:10px">
            {{Form::label('year', 'Year')}}
            {{Form::text('year', '', ['class' => 'form-control','placeholder' => 'Year'])}}
        </div>
        <div class="form-grpup" style="padding-bottom:10px">
            {{Form::label('price', 'Price')}}
            {!!Form::number('price',null,['class' => 'form-control','placeholder' => 'Price', 'step'=>'any']) !!}
        </div>
        {{Form::file('image')}}

        {{Form::submit('Add', ['class'=>'btn btn-primary pull-right'])}}
    {!!Form::close()!!}
</div>