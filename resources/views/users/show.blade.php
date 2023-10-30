@extends('adminlte::page')

@section('title', 'Информация о пользователе')

@section('content_header')
    <h2>Информация о пользователе</h2>
    @include('messages')
@stop

@section('content')
    <div class="alert alert-default-info col-md-8">
        <x-adminlte-input name="id" label="Номер" fgroup-class="col-md-8"
                          value="{{ $user->id }}" disabled="true"></x-adminlte-input>
        <x-adminlte-input name="first_name" label="Имя" fgroup-class="col-md-8"
                          value="{{ $user->first_name }}" disabled="true"></x-adminlte-input>
        <x-adminlte-input name="last_name" label="Фамилия" fgroup-class="col-md-8"
                          value="{{ $user->last_name }}" disabled="true"></x-adminlte-input>
        <x-adminlte-input name="email" label="Почта" fgroup-class="col-md-8"
                          value="{{ $user->email }}" disabled="true"></x-adminlte-input>
        <x-adminlte-input name="date_of_birth" label="Дата рождения" placeholder="Формат даты 01.01.2023"
                          fgroup-class="col-md-8"
                          value="{{ $user->date_of_birth ? $user->date_of_birth->format('d.m.Y') : '' }}"
                          disabled="true"></x-adminlte-input>
        <x-adminlte-input name="created_at" label="Дата регистрации" fgroup-class="col-md-8"
                          value="{{ $user->created_at->format('d.m.Y H:m:s') }}"
                          disabled="true"></x-adminlte-input>
        <x-adminlte-input name="updated_at" label="Дата последнего изменения" fgroup-class="col-md-8"
                          value="{{ $user->updated_at->format('d.m.Y H:m:s') }}"
                          disabled="true"></x-adminlte-input>
        <a href="{{ route('users.edit', $user) }}" class="btn btn-primary inline">Изменить</a>
    </div>
@stop
