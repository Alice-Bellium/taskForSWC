@extends('adminlte::page')

@section('title', 'События')

@section('content_header')
    <h2>События</h2>
    @include('messages')
@stop

@section('content')
    <div>
        <a href="{{ route('events.create') }}" class="btn btn-secondary btn-lg">Cоздать новое событие</a>
    </div>
@stop
