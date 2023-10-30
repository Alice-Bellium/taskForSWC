@extends('adminlte::page')
<head>
    <link rel="stylesheet" href="/app.css">
</head>

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
        <x-adminlte-input name="title" label="Создатель" fgroup-class="col-md-8"
                          value="{{ $event->creatorUser->first_name }} {{ $event->creatorUser->last_name }}"
                          disabled="true"></x-adminlte-input>
        <p class="label-show">Участники</p>
        {{--        todo может быть много пользователей, нужна пагинация --}}
        @if($participants->isEmpty())
            <p class="label-show">Здесь никого нет</p>
        @else
            @foreach($participants as $participant)
                <x-adminlte-input name="participant" fgroup-class="col-md-8"
                                  value="{{ $participant->first_name }} {{ $participant->last_name }}"
                                  disabled="true"></x-adminlte-input>
            @endforeach
        @endif

        @if($isCreator)
            <a href="{{ route('events.edit', $event) }}"
               class="btn btn-primary inline link-text-decoration">Изменить событие</a>
        @else
            @if($isParticipant)
                <form action="{{ route('events.left', $event) }}" method="post">
                    @csrf
                    <x-adminlte-button type="submit" label="Покинуть событие" theme="danger"></x-adminlte-button>
                </form>
            @else
                <form action="{{ route('events.join', $event) }}" method="post">
                    @csrf
                    <x-adminlte-button type="submit" label="Присоединиться к событию"
                                       theme="primary"></x-adminlte-button>
                </form>
            @endif
        @endif
    </div>
@stop
