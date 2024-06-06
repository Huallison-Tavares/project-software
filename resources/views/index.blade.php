@extends('layouts.layout-home')
@section('title', 'Inicial')

@section('content')

    <main>
        {{ auth()->user() }}
        <a href="/login">login</a>
    </main>

    
@endsection