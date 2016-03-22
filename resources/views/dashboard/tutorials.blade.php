@extends('layouts.app')
@section('content')
    @include('dashboard.sidenav')
    <div id="main-content">
        <div class="wrapper">
            <div class="col-l9-12">
                <div class="course-content content" style="padding-top: 20px">
                    <div class="container">
                        <div class="row">
                            <h2>
                            @if ($tutorials->count() == 0)
                                Sorry you dont have any tutorials. Upload one
                            @else
                                My tutorials
                            @endif
                                <a href="{{ url('tutorials/create') }}">
                                    <button type="button" class="btn btn-default pull-right my-button">
                                        <i class="fa fa-plus"></i>  Add Tutorial
                                    </button>
                                </a>
                            </h2>
                        </div>
                        <div class="row">
                            @foreach ($tutorials as $tutorial)
                                <div class="col-md-4">
                                    <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                                        <div class="mdl-card__title" style="background: url('http://img.youtube.com/vi/{{ $tutorial->url }}/0.jpg'); background-size: 100%">
                                            <h3 style="margin-top: 100px;">{{ $tutorial->title }}</h3>
                                        </div>
                                        <div class="mdl-card__supporting-text">
                                            {{ $tutorial->description }}
                                        </div>
                                        <div class="mdl-card__actions mdl-card--border">
                                            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="{{ url('tutorials/'.$tutorial->id) }}" data-upgraded=",MaterialButton,MaterialRipple">
                                            Get Started
                                            <span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></a>
                                            <i class="fa fa-heart" style="margin-left: 70px;"></i><span id="count"> {{ $tutorial->likeCount }}</span>
                                            <i class="fa fa-comment"></i><span id="count"> {{ $tutorial->comments->count() }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center">
                            {!! $tutorials->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
