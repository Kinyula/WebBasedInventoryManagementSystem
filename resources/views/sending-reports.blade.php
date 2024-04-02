@extends('layouts.app')

@section('content')

@if (auth()->user()->college_name == 'College of Natural Mathematical Science ( CNMS )')

@livewire('sending-reports-livewire')

@endif

@if (auth()->user()->college_name == '')

@endif

@endsection
