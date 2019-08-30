@if ($errors->any())
    <ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
@endif
{!! Form::open(['url' => 'form','class' => 'form']) !!}

<div class="form-group">
    {!! Form::label('name', 'Your Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'E-mail Address') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::textarea('msg', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

{!! Form::close() !!}

<table class="table table-bordered">
    <tr>
        <th>name</th>
        <th>email</th>
        <th>msg</th>

    </tr>
    @foreach ($result as $product)
        <tr>
            <td>{{$product->name}}</td>
            <td>{{ $product->email}}</td>
            <td>{{ $product->msg}}</td>

        </tr>
    @endforeach
</table>