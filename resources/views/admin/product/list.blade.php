@extends('admin.main')

@section('content')
<form method="GET" action="{{ route('test2')}}">
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
            <th style="text-align: center">STT</th>
            <th style="text-align: center">Tên Sản Phẩm</th>
            <th style="text-align: center">Danh Mục</th>
            <th style="text-align: center">Giá</th>
            <th style="text-align: center">Số lượng</th>
            <th style="text-align: center">Ảnh</th>
            <th style="text-align: center">Tình trạng</th>
            <th style="text-align: center">Cập nhật</th>
            <th style="text-align: center">Hành động</th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $key => $product)
            <tr>
                <td style="text-align: center">
                <div class="">{{ (isset($data['page'])) ? ((($data['page'] - 1) * 4) + ($key + 1)) : ($key + 1) }}</div>

                </td>
                <td style="text-align: center">{{ $product->name }}</td>
                <td style="text-align: center">{{ $product->category->name }}</td>
                <td style="text-align: center">{{ number_format($product->price) }}</td>
                <td style="text-align: center">{{ $product->qty }}</td>
                <td style="text-align: center"><img src="{{ $product->thumb }}" style="width:50px; height:50px"/></td>
                <td style="text-align: center">{!! \App\Helpers\Helper::active($product->active) !!}</td>
                <td style="text-align: center">{{ $product->updated_at }}</td>
                <td style="text-align: center">
                    <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{ $product->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $product->id }}, '/admin/products/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $products->links() !!}
    </div>
@endsection


