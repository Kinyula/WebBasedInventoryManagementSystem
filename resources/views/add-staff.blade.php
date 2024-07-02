@extends('layouts.app')

@section('content')

@if (auth()->user()->role_id === '3')

@livewire('staff-management-livewire')

@else
ERROR | 404
@endif


@endsection
