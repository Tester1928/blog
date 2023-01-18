@extends('layouts.admin.index')
@section('content')
    <div class="container">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Profile</strong>
                </div>
                <div class="card-body card-block">
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="name" class=" form-control-label">Name</label></div>
                            <div class="col-12 col-md-9"><input type="name" id="text-input" class="form-control" value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email" class=" form-control-label">Email</label></div>
                            <div class="col-12 col-md-9"><input type="email" id="emailt" name="email" class="form-control"
                                                                value="{{$user->email}}"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">Password</label></div>
                            <div class="col-12 col-md-9"><input type="password" id="password-input" name="password-input"
                                                                placeholder="Password" class="form-control"><small
                                    class="help-block form-text">Please enter a complex password</small></div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input" class="form-control-file">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
