@extends('main')

@section('content')
<div class="container" style="margin-top:100px ; margin-bottom: 100px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Chi tiết đơn hàng</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" style=" margin-left: 5px">Họ tên</label>
                            <div class="border p-2">{{$orders->name}}</div>
                            <label for="" style="margin-top: 10px; margin-left: 5px">Email</label>
                            <div class="border p-2">{{$orders->email}}</div>
                            <label for="" style="margin-top: 10px; margin-left: 5px">SDT</label>
                            <div class="border p-2">{{$orders->phone_number}}</div>
                            <label for="" style="margin-top: 10px; margin-left: 5px">Địa chỉ</label>
                            <div class="border p-2">{{$orders->address}}</div>
                        </div>
                        <div class="col-md-6">
                        <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align:center">Tên sản phẩm</th>
                                <th style="text-align:center">Giá</th>
                                <th style="text-align:center">Số lượng</th>
                                <th style="text-align:center">Ảnh</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders->orderDetails as $item)
                                <tr>
                                    <td style="text-align:center">{{ $item->products->name}}</td>
                                    <td style="text-align:center">{{ number_format($item->price)}}</td>
                                    <td style="text-align:center">{{ $item->qty}}</td>
                                    <td style="text-align:center"><img src="{{ $item->products->thumb}}" width="50px" alt=""></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h4>
                        Tổng tiền : {{ number_format($orders->total) }}
                    </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


