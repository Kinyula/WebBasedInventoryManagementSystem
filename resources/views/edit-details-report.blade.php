@extends('layouts.app')

@section('content')

@livewire('edit-details-report-livewire', ['id' => $id])

@endsection
