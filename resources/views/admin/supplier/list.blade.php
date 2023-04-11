@extends('admin.main')

@section('content')
<form method="GET" action="{{ route('aaa')}}">
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
            <th>Tên nhà cung cấp </th>
            
            <th>Số điện thoại</th>
            <th>Địa chỉ </th>
            <th>Tình trạng</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($suppliers as $key => $supplier)
            <tr>
                <td>
                    <div class="">{{ (isset($data['page'])) ? ((($data['page'] - 1) * 4) + ($key + 1)) : ($key + 1) }}</div>

                </td>
                <td>{{ $supplier->name }}</td>
                <td>{{ $supplier->phone_number }}</td>
                <td>{{ $supplier->address }}</td>
                
                <td>{!! \App\Helpers\Helper::active($supplier->active) !!}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/suppliers/edit/{{ $supplier->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $supplier->id }}, '/admin/suppliers/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection


