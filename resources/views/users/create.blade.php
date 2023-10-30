@extends('adminlte::page')

@section('title', 'Создание пользователя')

@section('content_header')
    <h2>Создание пользователя</h2>
@stop

@section('content')
    @include('messages')
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="alert alert-default-info col-md-8">
            <x-adminlte-input name="first_name" label="Имя" type="text" placeholder="Имя пользователя"
                              fgroup-class="col-md-8" value="{{ old('first_name') }}"
                              disable-feedback required></x-adminlte-input>
            <x-adminlte-input name="last_name" label="Фамилия" type="text" placeholder="Фамилия пользователя"
                              fgroup-class="col-md-8" value="{{ old('last_name') }}"
                              disable-feedback required></x-adminlte-input>
            <x-adminlte-input name="password" label="Пароль" type="password" placeholder="Пароль"
                              fgroup-class="col-md-8" disable-feedback required></x-adminlte-input>
            <x-adminlte-input name="email" label="Почта" type="text" placeholder="pochta@mail.ru"
                              fgroup-class="col-md-8" value="{{ old('email') }}"
                              disable-feedback required></x-adminlte-input>
            <x-adminlte-input name="date_of_birth" label="Дата рождения" type="text" placeholder="Дата рождения"
                              fgroup-class="col-md-8" value="{{ old('date_of_birth') }}"
                              disable-feedback></x-adminlte-input>
        </div>
        <x-adminlte-button type="submit" label="Зарегистровать пользователя" theme="primary"></x-adminlte-button>
    </form>
@stop
