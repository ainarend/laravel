@extends('layouts.app')

@section('custom_style')
    <style>
        body {
            background: #c4e3f3;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="content">
        <div class="title m-b-md">
            Laravel
        </div>

        <h1>Hey there,
        @if (Auth::guest())
             guest!
        @else
            {{ Auth::user()->name }}
        @endif
        </h1>
    </div>
</div>
@endsection
