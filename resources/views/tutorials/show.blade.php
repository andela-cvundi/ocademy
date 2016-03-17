@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <h2>{{ $tutorial->title }}</h2>
        <iframe width="100%" height="500" src="http://www.youtube.com/embed/{{ $tutorial->url }}" allowfullscreen></iframe>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <i id="like" class="fa fa-heart" tutorial-id="{{ $tutorial->id }}"></i><span id="count"> {{ $tutorial->likeCount }}</span>
    </div>


    <div class="row">
        <div class="col-md-9">
            <div id="tutorial-description" class="well">
                <p>{{ $tutorial->description }}</p>
            </div>
        </div>
        <div class="col-md-3">
        @if (Auth::check())
            @if (Auth::user()->id == $tutorial->user->id)
                <a href="{{ url('tutorials/'.$tutorial->id.'/edit') }}" class="btn btn-info">Edit</a>
                <form action="{{ url('tutorials/'.$tutorial->id) }}" method="POST">
                    {{ method_field('DELETE') }}
                    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-danger">Delete</a>
                </form>
            @endif
        @endif
        </div>
    </div>
    <div class="comments-section col-md-9 pull-left">
        <div class="well">
        @if (Auth::check())
            <h4>Leave a Comment:</h4>
            <div id="feedback">
                <div class="alert alert-danger alert-dismissible" role="alert" style="display: none;">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  Error. No comment provided or error processing request. Please try again.
                </div>
            </div>
            <!--<form role="form">-->
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <textarea class="form-control" rows="3" id="comment" name="comment" data-id="{{ $tutorial->id }}"></textarea>
                </div>
                <button class="btn btn-primary" id="createComment" tutorial-id="{{ $tutorial->id }}">Submit</button>
           <!-- </form> -->
        @else
            <h4>Login to comment</h4>
        @endif
        </div>

        <hr>
        <div class="tab-pane active" id="all-comments">
            @if ($comments->count() > 0)

                <ul class="media-list">
                @foreach ($comments as $comment)
                        <li class="media">
                            <a class="media-left" href="#">
                                <img class="media-object img-circle img-thumbnail" src="{{ $comment->user->avatar }}" alt="{{ $comment->user->name }}" style="width:100px;">
                            </a>
                            <div class="media-body">
                                <div class="well">
                                    <h4 class="media-heading">{{ $comment->user->name }}</h4>
                                    <h6 class="pull-right">{{ $comment->created_at->diffForHumans() }}</h6>
                                    <p class="media-comment">{{ $comment->comment }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
            @else
                <div class="well well-lg">There are no comments on this video</div>
            @endif

        </div>

        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>
    </div>
</div>
@endsection