@extends('layouts.app')

@section('content')
<div class="clear"></div>
<div class="course-content content">
    <div class="container">
        <div class="row">
            <div class="categoryFilter">
                <ul>
                    <li>
                    <a href="{{ url('tutorials') }}" data-filter="*" class="{{ url()->current() == Request::is('tutorials') ? ' current': '' }}">All</a></li>
                    @foreach ($categories as $category)
                    <li><a href="{{ url('category/'.$category->id) }}" data-filter=".course1" class="{{ url()->current() == Request::is('category/'.$category->id) ? ' current': '' }}">{{ $category->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        @if (Request::is('tutorials'))
        <h2>All Courses</h2>
        @endif

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
@endsection