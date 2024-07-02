@extends('layouts.app')

@section('content')

@livewire('edit-consumable-items-livewire', ['id' => $id])

@endsection
