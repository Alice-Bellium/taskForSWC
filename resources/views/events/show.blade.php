@extends('adminlte::page')

@section('title', 'События')

@section('content_header')
    <h2>Просмотр события</h2>
    @include('messages')
@stop

@section('content')
    <div class="alert alert-default-info col-md-8">
        <x-adminlte-input name="title" label="Заголовок" value="{{ $event->title }}" fgroup-class="col-md-8"
                          disabled="true"></x-adminlte-input>
        <x-adminlte-textarea name="text" label="Описание" type="text" placeholder="Описание" rows=5
                             fgroup-class="col-md-8" disable-feedback
                             disabled="true">{{ $event->text }}</x-adminlte-textarea>
        <a style="text-decoration: none;" href="{{ route('events.edit', $event) }}" class="btn btn-primary">Изменить
            событие</a>
    </div>
@stop
