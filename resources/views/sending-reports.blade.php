@extends('layouts.app')

@section('content')

@if (auth()->user()->college_name == 'College of Natural Mathematical Science ( CNMS ) ')
@livewire('sending-reports-livewire')
@endif

@if (auth()->user()->college_name == 'College of Health and Allied Science ( CHAS )')

@livewire('sending-reports-livewire')

@endif

@if (auth()->user()->college_name == 'College of Education ( CoED )')

@livewire('sending-reports-livewire')

@endif

@if (auth()->user()->college_name == 'College of Humanities and Social Science ( CHSS )')

@livewire('sending-reports-livewire')

@endif

@if (auth()->user()->college_name == 'College of Business and Economics ( CoBE )')

@livewire('sending-reports-livewire')

@endif

@if (auth()->user()->college_name == 'College of Earth Sciences and Engineering ( CoESE )')

@livewire('sending-reports-livewire')

@endif


@if (auth()->user()->college_name == 'College of Informatics and Virtual Education ( CIVE )')

@livewire('sending-reports-livewire')

@endif

@if (auth()->user()->college_name == 'Not set')

@livewire('report-informations-livewire')

@endif

@endsection

