@extends('gatehouse.main_layout')

@section('content')

    <h2>Odbieranie kluczy</h2>
    {{--<form action="/gatehouse/give_key_handler" method="POST">--}}
    {{--{{csrf_field()}}--}}
    {{--<input type="text" id="cos"> Wpisz coś <br>--}}
    {{--<input type="submit" value="Wydaj!">--}}
    {{--</form>--}}

    {{Form::open(['route'=>'gatehouse.return_key', 'method'=>'POST'])}}

    {{Form::label('employee_id', 'ID pracownika:')}}
    {{Form::text('employee_id')}}<br>

    {{Form::label('key_id', 'ID klucza:')}}
    {{Form::text('key_id')}}<br>

    {{Form::submit('Zwróć')}}

    {{Form::close()}}
@endsection