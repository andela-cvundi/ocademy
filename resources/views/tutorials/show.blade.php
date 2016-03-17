@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <h2>{{ $tutorial->title }}</h2>
        <iframe width="100%" height="500" src="http://www.youtube.com/embed/{{ $tutorial->url }}" allowfullscreen></iframe>
    </div>


    <div class="row">
        <div class="col-md-9">
        <div id="tutorial-description" class="well">
            <p>{{ $tutorial->description }}</p>
        </div>
    </div>
    <div class="col-md-3">
    @if (Auth::check())
    <a href="{{ url('tutorials/'.$tutorial->id.'/edit') }}" class="btn btn-info">Edit</a>
    <form action="{{ url('tutorials/'.$tutorial->id) }}" method="POST">
        {{ method_field('DELETE') }}
        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-danger">Delete</a>
    </form>
    @endif
    </div>
    </div>

</div>
@endsection