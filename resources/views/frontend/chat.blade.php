@extends('layouts.main')

@section('head')
<link rel="stylesheet" href="/css/select.css" />
@endsection

@section('content')
<div id="app">
    <app></app>
</div>


@endsection
@section('bottom')
<script src="{{ mix('js/vue.js') }}"></script>
@endsection
