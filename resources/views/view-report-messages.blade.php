@extends('layouts.app')

@section('content')

    @if (auth()->user()->college_name == 'College of Health and Allied Science ( CHAS )')

    @livewire('view-replies-livewire')

    @endif

    @if (auth()->user()->college_name == 'College of Natural Mathematical Science ( CNMS ) ')

        @livewire('view-replies-livewire')

    @endif

@endsection
