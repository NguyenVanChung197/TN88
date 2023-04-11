@extends('main')
@section('content')
<div class="container-fluid profile" style="margin-top:150px; height: 600px">
    <div class="row justify-content-center">
        <div class="col-md-3 profile-left" style="margin-top:200px">
            <div class="infor" >
                <div class="first-infor">
                 
                    <div class="name" style="margin-bottom: 20px">{{ auth()->user()->name}}</div>
                    <div class="email">{{ auth()->user()->email}}</div>
                    <div class="email">{{ auth()->user()->address}}</div>
                    <div class="email">{{ auth()->user()->phone_number}}</div>

                </div>
                <div class="detail-infor">
                </div>
                <div class="infor-description">
                </div>
            </div>
            <button class="btn btn-submit" style="margin-left: 85px"><a href="{{ route('change-password.index', auth()->user()->id) }}" style="color: white; width: 100%">Đổi MK</a></button>
        </div>
        <div class="col-md-7 profile-right">
            <div class="title-profile">
                <p class="title-main">Thông tin cá nhân</p>
            </div>
            <div class="form-profile">
                <form action="{{ route('profiles.update', [auth()->id()]) }}" method="POST" class="form-profile" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="col-md-4 col-form-label text-md-left p-0 title-label mb-20">Họ và tên</label>
                                </div>
                                <div class="col-md-12">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror name-input" name="name"
                                        value="{{Auth::user()->name}}" autocomplete="name" placeholder="">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="address"
                                        class="col-md-4 col-form-label text-md-left p-0 title-label mb-20">Địa chỉ</label>
                                </div>
                                <div class="col-md-12">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{Auth::user()->address}}" autocomplete="address"
                                        placeholder="Nhập địa chỉ...">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <input id="uploadInput" class="upload-avatar hidden" type="file" name="avatar" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-left p-0 title-label mb-20">Email</label>
                                </div>
                                <div class="col-md-12">
                                    <input id="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{Auth::user()->email}}" autocomplete="email" placeholder="Nhập email...">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="phone_number"
                                        class="col-md-4 col-form-label text-md-left p-0 title-label mb-20">Số điện thoại</label>
                                </div>
                                <div class="col-md-12">
                                    <input id="phone_number" type="text"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone_number"
                                        value="{{ Auth::user()->phone_number}}" autocomplete="phone_number" placeholder="Nhập SDT...">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-submit btn-update">
                            Cập nhật
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection