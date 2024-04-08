@extends('layouts.app')

@section('content')

@if (auth()->user()->college_name == 'College of Humanities and Social Science ( CHSS )')

@livewire('view-chss-report-livewire')

@else

@endif



@endsection
