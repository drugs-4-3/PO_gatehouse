@extends('gatehouse.main_layout')

@section('content')

    {{--<form action="/gatehouse/give_key_handler" method="POST">--}}
        {{--{{csrf_field()}}--}}
        {{--<input type="text" id="cos"> Wpisz coś <br>--}}
        {{--<input type="submit" value="Wydaj!">--}}
    {{--</form>--}}

    {{Form::open(['route'=>'gatehouse.give_key_handler', 'method'=>'POST'])}}

    {{Form::label('employee_id', 'ID pracownika:')}}
    {{Form::text('employee_id')}}<br>

    {{Form::label('key_id', 'ID klucza:')}}
    {{Form::text('key_id')}}<br>

    {{Form::submit('Wydaj')}}

    {{Form::close()}}
@endsection