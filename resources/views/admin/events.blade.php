@extends('adminlte::page')

@section('title', 'Список событий')

@section('content_header')
    <h2>Список событий</h2>
    @include('messages')
@stop

@section('content')
    @foreach ($events as $event)
        <div class="col-md-8 mb-4">
            <x-adminlte-input name="title" label="Заголовок события" value="{{ $event->title }}" fgroup-class="col-md-8"
                              disabled="true"></x-adminlte-input>
            <a href="{{ route('events.show', $event) }}" class="btn btn-primary inline ml-2">Подробнее</a>
        </div>
    @endforeach
@stop
