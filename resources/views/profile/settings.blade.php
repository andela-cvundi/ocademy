@extends('layouts.app')

@section('content')
<h1>Edit Profile</h1>
<hr>
<div class="row">
    <!-- left column -->
    <div class="col-md-3">
        <div class="text-center">
            <img src="{{ $user->getAvatar() }}" class="avatar img-circle" alt="avatar" height="125" width="125">
            @if(Auth::user()->id == $user->id)
            <form name="avatar" role="form" method="POST" action="{{ url('/profile/updatePic') }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <h6>Change avatar</h6>
                <input type="file" class="form-control" name="avatar" id="avatar" accept="image/*">
                <br>
                <button type="submit" class="btn profile-button form-group button-center" name="upload">Upload</button>
            </form>
            @endif
        </div>

    </div>
    <!-- edit form column -->
    <div class="col-md-9 personal-info">
    @include('errors.formerrors')
    @include('partials.flash')

        <h3>Personal info</h3>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('profile/settings') }}">
            {!! csrf_field() !!}
            <div class="form-group">
                <label class="col-lg-3 control-label">Full name:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" value = "{{ $user->name }}" name="name">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Username:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" value="{{ $user->username }}" name="username">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-8">
                    <input name="email" class="form-control" type="text" value="{{ $user->email }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Personal info:</label>
                <div class="col-lg-8">
                <textarea name="info" class="form-control" cols="30" rows="10">{{ $user->info }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                    <input type="submit" class="btn btn-primary" value="Save Changes">
                    <span></span>
                    <input type="reset" class="btn btn-default" value="Cancel">
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<hr>
@endsection