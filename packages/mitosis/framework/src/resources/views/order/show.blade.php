@extends('appshell::layouts.default')

@section('title')
    {{ __('Viewing order :no', ['no' => $order->number]) }}
@stop

@section('content')

    @include('mitosis::order.show._cards')

    @include('mitosis::order.show._addresses')

    @include('mitosis::order.show._items')

    @include('mitosis::order.show._actions')

@stop
