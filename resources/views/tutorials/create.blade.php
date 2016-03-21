@extends('layouts.app')
@section('content')
    @include('dashboard.sidenav')
    <div id="main-content">
        <div class="wrapper">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="login-box">
                @include('partials.flash')
                    <div class="login-box-body">
                        <div class="text-center spacer text-capitalize">
                            <h1>Upload tutorial</h1>
                        </div>
                        <form action="/tutorials" method="post">
                            {!! csrf_field() !!}
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="video title" name="title" required>
                                <span class="fa fa-film form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="url" class="form-control" placeholder="youtube embed url" name="url" required>
                                <span class="fa fa-link form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <select class="form-control" name="category">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" name="channel">{{$category->title}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group has-feedback">
                                <textarea class="form-control" rows="3" placeholder="describe your video here" name="description"></textarea>
                                <span class="fa fa-info form-control-feedback"></span>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                                    Upload
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection