@extends('main')

@section('content')
<div class="container" style="margin-top:100px; margin-bottom: 300px">
    <div class="row">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Đơn hàng</h4>
                </div>
                
                <div class="card-body">
                <form method="GET" action="{{ route('order')}}">
                    <div class="panel-search p-t-10 p-b-15" style="margin: 20px; width: 200px;">
                        <div class="bor8 dis-flex p-l-15">
                        <input name="search" id="search_input" class="mtext-107 cl2 plh2 p-r-15" type="date" placeholder="Nhập từ khóa" style="padding: 5px; border-radius: 15px" />
                            <button style=" border-radius: 15px;padding: 5px 55px; margin-left: 60px" class="btn-primary size-113 flex-c-m fs-16 cl2 hov-cl1 tran-04" type="submit" >
                                Tìm kiếm
                            </button>
                        </div>
    </div>
</form>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center">STT</th>
                                <th style="text-align: center">Ngày đặt hàng</th>
                                <th style="text-align: center">Tổng tiền</th>
                                <th style="text-align: center">Tình trạng</th>
                                <th style="text-align: center">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $key => $item)
                                <tr>
                                    <td style="text-align: center">{{ (isset($data['page'])) ? ((($data['page'] - 1) * 5) + ($key + 1)) : ($key + 1) }}</td>
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
                                    </td style="text-align: center">
                                    <td style="text-align: center">
                                        <a href="{{ url('view-order/'.$item->id) }}"class="btn btn-primary">Chi tiết</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer clearfix">
        {!! $orders->links('vendor.pagination.bootstrap-5') !!}
    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


