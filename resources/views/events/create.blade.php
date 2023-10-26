@extends('adminlte::page')

@section('title', 'Создание события')

@section('content_header')
    <h2>Создание события</h2>
@stop

@section('content')
    @include('messages')
    <form action="{{ route('events.store') }}" method="post">
        @csrf
        <div class="row">
            <x-adminlte-input id="title" name="title" label="Заголовок" type="text"
                              placeholder="Заголовок вашего события"
                              fgroup-class="col-md-8" disable-feedback required></x-adminlte-input>
        </div>
        <div class="row">
            <x-adminlte-textarea id="text" name="text" label="Описание" type="text"
                                 placeholder="Описание вашего события"
                                 rows=5 fgroup-class="col-md-8" disable-feedback required></x-adminlte-textarea>
        </div>
        <x-adminlte-button type="submit" label="Создать событие" theme="primary"></x-adminlte-button>
    </form>
@stop
