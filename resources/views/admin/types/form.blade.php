@extends('admin.master')
@section('title')
    Tạo loại phòng
@endsection
@section('custom_css')
    <style>
        .button_outer {
            background: #00c6d7;
            text-align: center;
            height: 43px;
            width: 150px;
            border-radius: 4px;
            display: inline-block;
            transition: .2s;
            position: relative;
            overflow: hidden;
        }

        .button_outer:hover {
            background-color: #17a2b8;
        }

        .btn_upload {
            width: 100%;
            padding: 9px;
            color: #fff;
            font-size: 15px;
            text-align: center;
            position: relative;
            display: inline-block;
            overflow: hidden;
            z-index: 3;
            white-space: nowrap;
        }

        .btn_upload input {
            position: absolute;
            width: 100%;
            left: 0;
            top: 0;
            height: 100%;
            cursor: pointer;
        }

        #image-preview {
            height: 150px;
            width: 150px;
            object-fit: cover;
        }
    </style>
@endsection
@section('content')
    <div class="row main-card mb-3 card">
        <div class="container">
            <div class="card-body mb-2"><h2 class="mb-3">
                    @if($data)
                        Cập nhật loại phòng
                    @else
                        Thêm loại phòng
                    @endif
                </h2>
                @if(session('status'))
                    <div class="alert alert-success mb-1 mt-1">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="" method="POST" enctype="multipart/form-data">
                    @if($data)
                        @method('PUT')
                    @endif
                    @csrf
                    <div class="position-relative row form-group">
                        <label for="exampleEmail" class="col-sm-2 col-form-label">Tên</label>
                        <div class="col-sm-4">
                            <input name="name" value="{{$data ? $data->name : ''}}" type="text" class="form-control"
                                   placeholder="Tên">
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="position-relative row form-group">
                        <label for="exampleFile" class="col-sm-2 col-form-label">Ảnh</label>
                        <div class="col-sm-10">
                            <div class="button_outer">
                                <div class="btn_upload">
                                    <input style="opacity: 0" type="file" name="imageChooser" class="custom-file-input">
                                    <input name="image" type="hidden" value="{{$data ? $data->image : ''}}">
                                    Chọn ảnh
                                </div>
                            </div>
                            <div class="uploaded_file_view my-2" id="uploaded_view">
                            </div>
                            <img src="{{$data ? $data->image : ''}}" {{$data && $data->image ? '' : 'hidden'}} id="image-preview" alt=""/>
                            @error('image')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="position-relative row form-check">
                        <div class="col-sm-10 offset-sm-2 p-0">
                            <button class="btn btn-primary">Gửi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
    <script>
        const cloudName = 'dn3bmj5ex';
        const unsignedUploadPreset = 'm9kz74zz';

        var img = document.querySelector('[name="imageChooser"]');
        let thumbnails = [];

        img.onchange = function () {
            var file = this.files[0];
            var url = `https://api.cloudinary.com/v1_1/${cloudName}/upload`;
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var responseDataJson = JSON.parse(this.responseText);
                    console.log(responseDataJson.url);
                    var imageUrl = document.querySelector('input[name="image"]');
                    imageUrl.value = responseDataJson.url;
                    let imagePreview = document.getElementById('image-preview');
                    imagePreview.src = responseDataJson.url;
                    imagePreview.hidden = false;
                }
            }
            xhr.open('POST', url, true);
            var fd = new FormData();
            fd.append('upload_preset', unsignedUploadPreset);
            fd.append('tags', 'browser_upload');
            fd.append('file', file);
            xhr.send(fd);
        }
    </script>
@endsection
