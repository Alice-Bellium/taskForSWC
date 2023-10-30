@extends('adminlte::page')

@section('title', 'Список событий')

@section('content_header')
    <h2>Список событий</h2>
    @include('messages')
@stop

@section('content')
    @foreach ($events as $event)
        <div class="alert alert-default-info col-md-8">
            <x-adminlte-input name="title" label="Заголовок" value="{{ $event->title }}" fgroup-class="col-md-8"
                              disabled="true"></x-adminlte-input>
            <a href="{{ route('events.show', $event) }}" class="btn btn-primary inline">Подробнее</a>
        </div>
    @endforeach
@stop
