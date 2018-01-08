@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Welcome to blackend</h2>
    </div>
    <div class="panel-body">
        <p>A laravel powered with angularJS and backpack custom admin. </p>
        {@if(isset($images)&&count($images)>0)
            <ul>
                @foreach($images as $image)
                    <img src="{{url(''.$image->name)}}" height="100px"/>
                @endforeach
            </ul>
        @endif}
    </div>
</div>

<form action="/image-upload" method="POST" class="dropzone" id="my-awesome-dropzone">
    {{csrf_field()}}

   </form>

@endsection

@section('styles')
<link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
@endsection

@section('scripts')
<script src="{{ asset('js/dropzone.js') }}"></script>
@endsection