@extends('gatehouse.main_layout')

@section('content')
    {{Form::open(['route'=>'gatehouse.new_employee', 'method'=>'POST'])}}

    {{Form::label('first_name', 'Imie:')}}
    {{Form::text('first_name')}}<br>

    {{Form::label('last_name', 'Nazwisko:')}}
    {{Form::text('last_name')}}<br>

    {{Form::label('address', 'Adres:')}}
    {{Form::text('address')}}<br>

    {{Form::label('phone_number', 'Numer telefonu:')}}
    {{Form::text('phone_number')}}<br>

    {{Form::label('user_id', 'ID użytkownika:')}}
    {{Form::text('user_id')}}<br>

    {{Form::submit('Zapisz')}}
    {{Form::close()}}
@endsection