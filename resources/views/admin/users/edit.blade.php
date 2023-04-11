@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Tên người dùng</label>
                        <input type="text" name="name" class="form-control"  placeholder="Nhập tên người dùng">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" class="form-control"  placeholder="Nhập username">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Mật khẩu Người dùng</label>
                        <input type="text" name="password" class="form-control"  placeholder="Nhập password">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email Người dùng</label>
                        <input type="text" name="email" class="form-control"  placeholder="Nhập email người dùng">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" name="address"  class="form-control"  placeholder="Nhập địa chỉ người dùng">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone_number">Số điện thoại</label>
                        <input type="text" name="phone_number"  class="form-control"  placeholder="Nhập SĐT người dùng">
                    </div>
                </div>
                
                <div class="form-group">
                <label>Quyền</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="role_id" checked=""
                        {{ $user->role_id == 1 ? ' checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Nhân viên kho</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="2" type="radio" id="no_active" name="role_id"
                        {{ $user->role_id == 2 ? ' checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">Nhân viên bán hàng</label>
                </div>
                </div>
                
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật Người Dùng</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
