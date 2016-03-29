@extends('layouts.app')

@section('content')
<div class="clear"></div>
<div class="course-content content">
    <div class="post-container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <h2>{{ $tutorial->title }}</h2>
                <div class="course-image">
                    <iframe width="100%" height="500" src="http://www.youtube.com/embed/{{ $tutorial->url }}" allowfullscreen style="margin-bottom: 20px;"></iframe>
                </div>

                <i id="like" class="fa fa-heart{{ $tutorial->liked() ? ' liked' : ' unliked'}}" tutorial-id="{{ $tutorial->id }}" style="cursor: pointer;"></i><span id="count"> {{ $tutorial->likeCount }}</span>
                <i class="fa fa-comment"></i><span  id="comment-count"> {{ $tutorial->comments->count() }}</span>
                @if (Auth::user())
                    @if (Auth::user()->id == $tutorial->user_id)
                    <span class="pull-right"><a href="{{ route('tutorials.destroy', ['id' => $tutorial->id]) }}" class="delete-tutorial"><button class="btn btn-danger btn-flat">Delete tut</button></a></span>
                    <span class="pull-right" style="margin-right: 20px"><a href="{{ url('tutorials/'.$tutorial->id.'/edit') }}"><button class="btn btn-primary my-button">Edit tut</button></a></span>
                    @endif
                @endif

                <div class="course-info">
                    <p>{{ $tutorial->description }}</p>
                </div>
                <section id="comments">
                    <h6 class="section-title"><span id="ccount">{{ $tutorial->comments->count() }}</span> Comments</h6>
                    @if ($tutorial->comments->count() == 0)
                        <p class="no-coments-message">No comments for this video</p>
                    @endif
                    <ol class="comments-list">
                    @foreach ($comments as $comment)
                        <li class="comment">
                            <article>
                                <img src="{{ $comment->user->getAvatar() }}" alt="avatar" class="avatar" width="50px" height="50px">
                                <div class="comment-meta">
                                    <h6 class="author">{{ $comment->user->name }}, {{ $comment->created_at->diffForHumans() }}</h6>
                                </div>
                                <!-- end .comment-meta -->
                                <div class="comment-body">
                                    <p>{{ $comment->comment }}</p>
                                </div>
                                <!-- end .comment-body -->
                            </article>
                        </li>
                    @endforeach
                    </ol>
                    <!-- end .comment-body -->
                </section>

                <section id="respond">
                @if (Auth::check())
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <textarea class="form-control" rows="3" id="comment" name="comment" data-id="{{ $tutorial->id }}" required></textarea>
                    </div>
                    <button class="btn btn-primary btn-flat my-button" id="createComment" tutorial-id="{{ $tutorial->id }}">Submit</button>
                @else
                <div class="well">
                    <h4>Login to comment</h4>
                </div>
                @endif
                </section>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection