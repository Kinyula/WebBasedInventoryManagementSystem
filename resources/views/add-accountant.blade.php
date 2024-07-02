@extends('layouts.app')

@section('content')

@if (auth()->user()->college_name == 'College of Health and Allied Science ( CHAS )')

@livewire('add-accountants-livewire')


@elseif (auth()->user()->college_name == 'College of Natural Mathematical Science ( CNMS ) ')

@livewire('add-accountants-livewire')

@else
ERROR | 404
@endif


@endsection
