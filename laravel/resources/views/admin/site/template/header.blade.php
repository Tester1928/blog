@extends('layouts.admin.index')
@section('content')
    <div class="container">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Profile</strong>
                </div>
                <form method="POST" action="{{ route('admin.profile.edit',$user->id) }}"
                      enctype="multipart/form-data"
                      class="form-horizontal">
                    @csrf @method('patch')
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="name" class=" form-control-label">Name</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="name" id="name" class="form-control" value="{{old('name')?:$user->name}}">
                                @error('name')<small class="help-block form-text text-danger">{{$message}}</small>@enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email" class=" form-control-label">Email</label></div>
                            <div class="col-12 col-md-9">
                                <input type="email" id="email" name="email" class="form-control" value="{{old('email')?:$user->email}}">
                                @error('email')<small class="help-block form-text text-danger">{{$message}}</small>@enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">Password</label></div>
                            <div class="col-12 col-md-9">
                                <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                                @error('password')<small class="help-block form-text text-danger">{{$message}}</small>@enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="avatar" class=" form-control-label">Avatar</label></div>
                            <div class="col-12 col-md-9">
                                {{App\Html\Admin::imageHtml($user->image,"avatar")}}
                            </div>
                        </div>
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Save
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

