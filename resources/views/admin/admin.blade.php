@extends('adminlte::page')
<head>
    <link rel="stylesheet" href="/app.css">
</head>
@section('title', 'Панель администратора')

@section('content_header')
    <h2>Панель администратора</h2>
    @include('messages')
@stop

@section('content')
    <div class = "btn-margin">
        <a href="{{ route('users.create') }}" class="btn btn-primary btn-lg">Регистрация пользователя</a>
    </div>
    <div  class = "btn-margin">
        <a href="{{ route('admin.users') }}" class="btn btn-primary btn-lg">Список пользователей</a>
    </div>
    <div  class = "btn-margin">
        <a href="{{ route('admin.events') }}" class="btn btn-secondary btn-lg">Список событий</a>
    </div>
    <div  class = "btn-margin">
        <a href="{{ route('events.create') }}" class="btn btn-secondary btn-lg">Создать событие</a>
    </div>
@stop
