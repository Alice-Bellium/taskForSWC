@extends('adminlte::page')

@section('title', 'Изменить событие')

@section('content_header')
    <h2>Изменить событие</h2>
    @include('messages')
@stop

@section('content')
        <form action="{{ route('events.update', $event) }}" method="post">
            @csrf
            @method('put')
            <div class="row">
                <x-adminlte-input id="title" name="title" label="Заголовок" value="{{ $event->title }}" type="text"
                                  placeholder="Заголовок вашего события"
                                  fgroup-class="col-md-8" disable-feedback required></x-adminlte-input>
            </div>
            <div class="row">
                <x-adminlte-textarea id="text" name="text" label="Описание" type="text"
                                     placeholder="Описание вашего события"
                                     rows=5 fgroup-class="col-md-8"
                                     disable-feedback required>{{ $event->text }}</x-adminlte-textarea>
            </div>
                <x-adminlte-button type="submit" label="Сохранить" theme="primary"></x-adminlte-button>
        </form>
        <form action="{{ route('events.destroy', $event) }}" method="post" style="margin-top: 10px">
            @csrf
            @method('delete')
                <x-adminlte-button type="submit" label="Удалить событие" theme="danger"></x-adminlte-button>
        </form>
@stop
