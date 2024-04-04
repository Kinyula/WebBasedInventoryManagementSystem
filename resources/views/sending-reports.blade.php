@extends('layouts.app')

@section('content')

@if (auth()->user()->college_name == 'College of Natural Mathematical Science ( CNMS ) ')

@livewire('sending-reports-livewire')

@endif

@if (auth()->user()->college_name == 'College of Health and Allied Science ( CHAS )')

@livewire('chas-reports-sent-livewire')

@endif

@if (auth()->user()->college_name == 'Not set')

@livewire('report-informations-livewire')

@endif

@endsection

