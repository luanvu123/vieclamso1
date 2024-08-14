<!-- resources/views/type_partners/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Type Partner Details</h1>
    <p>ID: {{ $typePartner->id }}</p>
    <p>Name: {{ $typePartner->name }}</p>
</div>
@endsection
