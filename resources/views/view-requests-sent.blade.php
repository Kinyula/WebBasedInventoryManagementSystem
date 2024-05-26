@extends('layouts.app')

@section('content')


    @if (auth()->user()->college_name == 'College of Natural Mathematical Science ( CNMS ) ')
        @livewire('view-requests-livewire')
    @endif

    @if (auth()->user()->college_name == 'College of Health and Allied Science ( CHAS )')

    @livewire('view-requests-livewire')

    @endif

    @if (auth()->user()->college_name == 'College of Education ( CoED )')

    @livewire('view-requests-livewire')

    @endif

    @if (auth()->user()->college_name == 'College of Humanities and Social Science ( CHSS )')

    @livewire('view-requests-livewire')

    @endif

    @if (auth()->user()->college_name == 'College of Business and Economics ( CoBE )')

    @livewire('view-requests-livewire')

    @endif

    @if (auth()->user()->college_name == 'College of Earth Sciences and Engineering ( CoESE )')

    @livewire('view-requests-livewire')

    @endif


    @if (auth()->user()->college_name == 'College of Informatics and Virtual Education ( CIVE )')

    @livewire('view-requests-livewire')

    @endif


    @if (auth()->user()->college_name == 'Not set')

    @livewire('view-requests-livewire')

    @endif

    @endsection
