@extends('layouts.app')

@section('content')
@if (auth()->user()->role_id == 0)

@livewire('view-items-livewire')

@elseif (auth()->user()->role_id == 1)

@livewire('view-college-allocations-livewire')

@elseif (auth()->user()->role_id == 2)

@livewire('view-college-allocations-livewire')

@else

nothing

@endif


@endsection
