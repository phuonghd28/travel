@extends('admin.master')
@section('title')
    Tạo tin tức
@endsection
@section('custom_css')
    <style>
        .button_outer {
            background: #00c6d7;
            text-align: center;
            height: 40px;
            width: 140px;
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

        .uploaded_file_view {
            transition: .2s;
            display: none;
        }

        .uploaded_file_view.show {
            display: block;
        !important;
        }

        .btn_choose_images {
            width: 100%;
            height: 100%;
            border: none;
            background: none;
            padding: 9px;
            color: #fff;
            font-size: 15px;
        }

        .img-products {
            height: 140px;
            width: 140px;
            object-fit: cover;
            margin-right: 10px;
            margin-bottom: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="row main-card mb-3 card">
        <div class="container">
            <div class="card-body mb-2"><h2 class="mb-2">
                    @if($data)
                        Cập nhập tin tức
                    @else
                        Thêm mới tin tức
                    @endif
                </h2>
                @if(session('status'))
                    <div class="alert alert-success mb-1 mt-1">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="" method="POST">
                    @if($data)
                        @method('PUT')
                    @endif
                    @csrf
                    <div class="position-relative row form-group">
                        <label class="col-sm-1 col-form-label">Tiêu đề</label>
                        <div class="col-sm-5">
                            <input name="title" value="{{$data ? $data->title : ''}}" type="text"
                                   class="form-control form-control" placeholder="Nhập tiêu đề">
                            @error('title')
                            <div class="mt-1 mb-1 ml-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <label class="col-sm-1 px-1 col-form-label">Danh mục</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="category_id">
                                <option selected disabled hidden>Danh mục</option>
                                @foreach($type as $item)
                                    <option
                                        {{$data && $data->type_id === $item->id ? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('type_id')
                            <div class="mt-1 mb-1 ml-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="position-relative row form-group">
                        <label class="col-sm-1 col-form-label">Tác giả</label>
                        <div class="col-sm-3">
                            <input name="author" value="{{$data ? $data->author : ''}}" type="text"
                                   class="form-control form-control" placeholder="Nhập tên tác giả">
                            @error('author')
                            <div class="mt-1 mb-1 ml-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="position-relative row form-group">
                        <label class="col-sm-2 col-form-label">Nội dung bài viết</label>
                        <div class="col-sm-12">
                            <textarea id="content" name="content" type="text" class="form-control"
                                      placeholder="Nhập nội dung"
                                      rows="3">{{$data ? $data->content : ''}}</textarea>
                            @error('content')
                            <div class="mt-1 mb-1 ml-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="position-relative row form-group">
                        <label for="exampleFile" class="col-sm-2 col-form-label">Ảnh</label>
                        <div class="col-sm-10">
                            <div class="button_outer">
                                <div class="btn_upload">
                                    <input style="opacity: 0" type="file" name="imageChooser" class="custom-file-input">
                                    <input name="images" type="hidden" value="{{$data ? $data->images : ''}}">
                                    Chọn ảnh
                                </div>
                            </div>
                            <div class="uploaded_file_view my-2" id="uploaded_view">
                            </div>
                            <img src="{{$data ? $data->images : ''}}"
                                 {{$data && $data->images ? '' : 'hidden'}} id="image-preview" alt=""/>
                            @error('images')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="position-relative row form-group">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-11 d-flex justify-content-end">
                            <button class="btn btn-primary">Gửi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
    <script src="{{url('https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('content');
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
                    var imageUrl = document.querySelector('input[name="images"]');
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
