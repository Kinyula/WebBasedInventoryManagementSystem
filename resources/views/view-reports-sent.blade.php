@extends('layouts.app')

@section('content')


    @if (auth()->user()->college_name == 'College of Natural Mathematical Science ( CNMS ) ')
        @livewire('view-reports-sent-livewire')
    @endif

    @if (auth()->user()->college_name == 'College of Health and Allied Science ( CHAS )')

        @livewire('view-chas-reports-sent-livewire')

    @endif

    @if (auth()->user()->college_name == 'Not set')

@livewire('messaging-report-files-livewire')

@livewire('view-replies-livewire')

@livewire('replies-livewire')



@endif

@endsection
