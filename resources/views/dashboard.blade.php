@extends('layouts.app')

@section('content')
@if (auth()->user()->role_id == 0)

@livewire('view-items-livewire')

@elseif (auth()->user()->role_id == 1 && auth()->user()->post === 'Principal' && auth()->user()->college_name === 'College of Health and Allied Science ( CHAS )')

@livewire('chas-home-livewire')

@elseif (auth()->user()->role_id == 1 && auth()->user()->post === 'Principal' && auth()->user()->college_name === 'College of Natural Mathematical Science ( CNMS ) ')

@livewire('cnms-home-livewire')

@elseif (auth()->user()->role_id == 2)

{{-- @livewire('view-college-allocations-livewire') --}}
@livewire('chas-home-livewire')

@elseif (auth()->user()->role_id == 3)

@livewire('super-admin-home-livewire')

@else

nothing

@endif


@endsection
