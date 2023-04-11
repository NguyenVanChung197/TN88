@extends('admin.main')

@section('content')
<div class="container" style="margin-top:40px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <form method="GET" action="{{ route('searchorder')}}">
                    <div class="dis-none panel-search w-full p-t-10 p-b-15" style="margin: 20px;">
                        <div class="bor8 dis-flex p-l-15">
                        <input name="search" id="search_input" class="mtext-107 cl2 size-114 plh2 p-r-15" type="date" placeholder="Nhập từ khóa" style="padding: 5px; border-radius: 15px" />
                            <button style=" border-radius: 15px;padding: 5px;" class="btn-primary size-113 flex-c-m fs-16 cl2 hov-cl1 tran-04" type="submit" >
                                Tìm kiếm
                            </button>
                        </div>
    </div>
</form>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center">STT</th>
                                <th style="text-align: center">Ngày tạo</th>
                                <th style="text-align: center">Tổng tiền</th>
                                <th style="text-align: center">Tình trạng</th>
                                <th style="text-align: center">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $index => $item)
                                <tr>
                                <td style="text-align: center">
                                    <div class="">{{ (isset($data['page'])) ? ((($data['page'] - 1) * 4) + ($index + 1)) : ($index + 1) }}</div>
                                    </td>
                                    <td style="text-align: center">{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                    <td style="text-align: center">{{number_format($item->total)}}</td>
                                    <td style="text-align: center">
                                            @if ($item->status == '0')
                                            Chờ duyệt
                                            @elseif ($item->status == '1')
                                            Đã duyệt
                                            @elseif ($item->status == '2')
                                            Đang giao hàng
                                            @elseif ($item->status == '3')
                                            Hoàn thành
                                            @endif
                                    </td>
                                    <td style="text-align: center">
                                        <a href="{{ url('admin/view-order/'.$item->id) }}"class="btn btn-primary">Xem chi tiết</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
        {{ $orders->links() }}

            </div>
        </div>
    </div>
    
</div>

@endsection


