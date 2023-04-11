@extends('admin.main')

@section('content')
<form method="GET" action="{{ route('test1')}}">
                    <div class="dis-none panel-search w-full p-t-10 p-b-15" style="margin: 20px;">
                        <div class="bor8 dis-flex p-l-15">
                        <input name="search" id="search_input" class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" placeholder="Nhập từ khóa" style="padding: 5px; border-radius: 15px" />
                            <button style=" border-radius: 15px;padding: 5px;" class="btn-primary size-113 flex-c-m fs-16 cl2 hov-cl1 tran-04" type="submit" >
                                Tìm kiếm
                            </button>
                        </div>
    </div>
</form>
    <table class="table">
        <thead>
        <tr>
            <th  style="text-align: center">STT</th>
            <th  style="text-align: center">Tên Người dùng</th>
            <th  style="text-align: center">Tên đăng nhập</th>
            <th  style="text-align: center">Email</th>
            <th  style="text-align: center">Số điện thoại</th>
            <th  style="text-align: center">Địa chỉ</th>
            <th  style="text-align: center">Quyền</th>
            <th  style="text-align: center">Hành động</th>
            <!-- <th style="width: 100px">&nbsp;</th> -->
        </tr>
        </thead>
        <tbody>
            @foreach($users as $key => $user)
            <tr>
                <td style="text-align: center">{{ (isset($data['page'])) ? ((($data['page'] - 1) * 10) + ($key + 1)) : ($key + 1) }}</td>
                <td style="text-align: center">{{ $user->name }}</td>
                <td style="text-align: center">{{ $user->username }}</td>
                <td style="text-align: center">{{ $user->email }}</td>
                <td style="text-align: center">{{ $user->phone_number }}</td>
                <td style="text-align: center">{{ $user->address }}</td>
                <td style="text-align: center">
                    @if($user->role_id == 3)
                    Khách hàng
                    @elseif ($user->role_id == 2)
                    Nhân viên bán Hàng
                    @elseif ($user->role_id == 1)
                    Nhân viên kho
                    @else
                    Admin
                    @endif
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/users/edit/{{ $user->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $user->id }}, '/admin/users/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $users->links() !!}

    <div class="card-footer clearfix">

    </div>
@endsection


