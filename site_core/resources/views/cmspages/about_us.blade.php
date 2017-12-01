@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>{{$page->title}}</h2>
    </div>
    <div class="panel-body">
        <p>{!!$page->content!!}</p>
    </div>
</div>
@endsection