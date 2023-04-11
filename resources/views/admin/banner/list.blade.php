@extends('admin.main')

@section('content')
<form method="GET" action="{{ route('test')}}">
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
            <th style="width: 50px">STT</th>
            <th>Tiêu Đề</th>
            <th>Đường dẫn</th>
            <th>Ảnh</th>
            <th>Trang Thái</th>
            <th>Cập Nhật</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($banners as $key => $banner)
            <tr>
                <td>
                    <div class="">{{ (isset($data['page'])) ? ((($data['page'] - 1) * 4) + ($key + 1)) : ($key + 1) }}</div>

                </td>
                <td>{{ $banner->name }}</td>
                <td>{{ $banner->url }}</td>
                <td><a href="{{ $banner->thumb }}" target="_blank">
                        <img src="{{ $banner->thumb }}" height="40px">
                    </a>
                </td>
                <td>{!! \App\Helpers\Helper::active($banner->active) !!}</td>
                <td>{{ $banner->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/banners/edit/{{ $banner->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $banner->id }}, '/admin/banners/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $banners->links() !!}
@endsection


