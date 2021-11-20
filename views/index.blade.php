@extends('template')

@section('content')

<div class="card mb-3">
    <div class="card-body">
        <h3 class="text-center">config:{{config("group_system_sample.name")}}</h3>
        <h3 class="text-center">{{$sample->word}}</h3>
    </div>
</div>

@endsection
