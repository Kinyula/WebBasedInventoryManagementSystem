@extends('layouts.app')

@section('content')

    @if (auth()->user()->college_name == 'College of Health and Allied Science ( CHAS )')

    @livewire('view-replies-to-college-livewire')

    @endif

    @if (auth()->user()->college_name == 'College of Natural Mathematical Science ( CNMS ) ')

    @livewire('view-replies-to-college-livewire')

    @endif

    @if (auth()->user()->college_name == 'College of Education ( CoED )')

    @livewire('view-replies-to-college-livewire')

    @endif

    @if (auth()->user()->college_name == 'College of Humanities and Social Science ( CHSS )')

    @livewire('view-replies-to-college-livewire')

    @endif

    @if (auth()->user()->college_name == 'College of Business and Economics ( CoBE )')

    @livewire('view-replies-to-college-livewire')

    @endif

    @if (auth()->user()->college_name == 'College of Earth Sciences and Engineering ( CoESE )')

    @livewire('view-replies-to-college-livewire')

    @endif

    @if (auth()->user()->college_name == 'College of Informatics and Virtual Education ( CIVE )')


        @livewire('view-replies-to-college-livewire')
        

    @endif

@endsection
