@extends('adminlte::page')

@section('title', 'Список пользователей')

@section('content_header')
    <h2>Список пользователей</h2>
    @include('messages')
@stop

@section('content')
    @if($users->isEmpty())
        <p class="label-show">Здесь никого нет </p>
    @else
        @foreach ($users as $user)
            <div class="col-md-8 mb-4">
                <x-adminlte-input name="user" fgroup-class="col-md-8"
                                  value="{{ $user->first_name }} {{ $user->last_name }}"
                                  disabled="true"></x-adminlte-input>
                <a href="{{ route('users.show', $user) }}" class="btn btn-primary inline ml-2">Подробнее</a>
            </div>
        @endforeach
    @endif
@stop
