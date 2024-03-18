@extends('layouts.app')

@section('content')

@livewire('edit-asset-livewire', ['id' => $id])

@endsection
