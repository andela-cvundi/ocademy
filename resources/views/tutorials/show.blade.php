@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <h2>{{ $tutorial->title }}</h2>
        <iframe width="100%" height="500" src="http://www.youtube.com/embed/{{ $tutorial->url }}" allowfullscreen></iframe>
    </div>


    <div class="col-md-9">
        <div id="tutorial-description" class="well">
            <p>{{ $tutorial->description }}</p>
        </div>
    </div>
</div>
@endsection