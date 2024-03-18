@extends('layouts.app')

@section('content')

@livewire('update-asset-status-livewire', ['id' => $id])

@endsection
