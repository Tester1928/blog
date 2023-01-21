@extends('layouts.admin.index')
@section('content')
    <div class="container">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Profile</strong>
                </div>
                <div class="card-body card-block">
                    <form method="POST" action="{{ route('admin.profile.edit',$user->id) }}" enctype="multipart/form-data"
                          class="form-horizontal">
                        @csrf
                        @method('patch')
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
                            <div class="col col-md-3"><label for="file" class=" form-control-label">File input</label></div>
                            <div class="col-9 col-md-6">
                                <div id="upload-container">
                                    <img id="upload-image" src="https://habrastorage.org/webt/dr/qg/cs/drqgcsoh1mosho2swyk3kk_mtwi.png">
                                    <div>
                                        <input id="file-input" type="file" name="file" multiple>
                                        <label for="file-input">Выберите файл</label>
                                        <span>или перетащите его сюда</span>
                                    </div>
                                </div>

                               {{-- <input type="file" id="file" name="file" class="form-control-file">--}}
                            </div>
                            <div class="col-3 col-md-3">
                                <img class="rounded" src="/laravel/public{{$avatar?:"/images/admin/no-avatar.jpg"}}" alt="avatar" height="200px">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
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

<style>
    #upload-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        width: 300px;
        height: 200px;
        outline: 2px dashed #5d5d5d;
        outline-offset: -12px;
        background-color: #e0f2f7;
        font-family: 'Segoe UI';
        color: #1f3c44;
        font-size: 10px;
    }

    #upload-container img {
        width: 40%;
        margin-bottom: 20px;
        user-select: none;
    }

    #upload-container label {
        font-weight: bold;
    }

    #upload-container label:hover {
        cursor: pointer;
        text-decoration: underline;
    }

    #upload-container div {
        position: relative;
        z-index: 10;
    }

    #upload-container input[type=file] {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        position: absolute;
        z-index: -10;
    }

    #upload-container label.focus {
        outline: 1px solid #0078d7;
        outline: -webkit-focus-ring-color auto 5px;
    }

    #upload-container.dragover {
        background-color: #fafafa;
        outline-offset: -17px;
    }
</style>

<script>
    $(document).ready(function(){
        var dropZone = $('#upload-container');

        $('#file-input').focus(function() {
            $('label').addClass('focus');
        })
            .focusout(function() {
                $('label').removeClass('focus');
            });


        dropZone.on('drag dragstart dragend dragover dragenter dragleave drop', function(){
            return false;
        });

        dropZone.on('dragover dragenter', function() {
            dropZone.addClass('dragover');
        });

        dropZone.on('dragleave', function(e) {
            let dx = e.pageX - dropZone.offset().left;
            let dy = e.pageY - dropZone.offset().top;
            if ((dx < 0) || (dx > dropZone.width()) || (dy < 0) || (dy > dropZone.height())) {
                dropZone.removeClass('dragover');
            }
        });

        dropZone.on('drop', function(e) {
            dropZone.removeClass('dragover');
            let files = e.originalEvent.dataTransfer.files;
            sendFiles(files);
        });

        $('#file-input').change(function() {
            let files = this.files;
            sendFiles(files);
        });


        function sendFiles(files) {
            let maxFileSize = 5242880;
            let Data = new FormData();
            $(files).each(function(index, file) {
                if ((file.size <= maxFileSize) && ((file.type == 'image/png') || (file.type == 'image/jpeg'))) {
                    Data.append('images[]', file);
                }
            });

            $.ajax({
                url: dropZone.attr('action'),
                type: dropZone.attr('method'),
                data: Data,
                contentType: false,
                processData: false,
                success: function(data) {
                    alert ('Файлы были успешно загружены!');
                }
            });
        }
    })
</script>
