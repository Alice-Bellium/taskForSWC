@extends('adminlte::page')
<head>
    <link rel="stylesheet" href="/app.css">
</head>
@section('title', 'Изменить данные пользователя')

@section('content_header')
    <h2>Изменить данные пользователя</h2>
    @include('messages')
@stop

@section('content')
    <form action="{{ route('users.update', $user) }}" method="post">
        @csrf
        @method('put')
        <div class="col-md-8">
            <x-adminlte-input name="first_name" label="Имя" type="text" placeholder="Имя пользователя"
                              fgroup-class="col-md-8" value="{{ old('first_name', $user->first_name) }}"
                              disable-feedback required></x-adminlte-input>
            <x-adminlte-input name="last_name" label="Фамилия" type="text" placeholder="Фамилия пользователя"
                              fgroup-class="col-md-8" value="{{ old('last_name', $user->last_name) }}"
                              disable-feedback required></x-adminlte-input>
            <x-adminlte-input name="password" label="Пароль" type="password" placeholder="Пароль"
                              fgroup-class="col-md-8" value="{{ $user->password }}"
                              disable-feedback required></x-adminlte-input>
            <x-adminlte-input name="email" label="Почта" type="text" placeholder="petka@mail.ru"
                              fgroup-class="col-md-8" value="{{ old('email', $user->email) }}"
                              disable-feedback required></x-adminlte-input>
            <x-adminlte-input name="date_of_birth" label="Дата рождения" type="text" placeholder="Дата рождения"
                              fgroup-class="col-md-8"
                              value="{{ $user->date_of_birth ? old('date_of_birth_name', $user->date_of_birth->format('d.m.Y')) : '' }}"
                              disable-feedback></x-adminlte-input>
        </div>
        <x-adminlte-button class="ml-3" type="submit" label="Сохранить" theme="primary"></x-adminlte-button>
    </form>
    <form action="{{ route('users.destroy', $user) }}" method="post" class="form-margin">
        @csrf
        @method('delete')
        <x-adminlte-button class="ml-3" type="submit" label="Удалить пользователя" theme="danger"></x-adminlte-button>
    </form>
@stop
