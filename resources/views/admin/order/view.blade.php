@extends('admin.main')

@section('content')
<div class="container" style="margin-top:50px ; margin-bottom: 50px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" style="margin-top:10px">Họ tên</label>
                            <div class="border p-2">{{$orders->name}}</div>
                            <label for="" style="margin-top:10px">Email</label>
                            <div class="border p-2">{{$orders->email}}</div>
                            <label for="" style="margin-top:10px">SDT</label>
                            <div class="border p-2">{{$orders->phone_number}}</div>
                            <label for="" style="margin-top:10px">Địa chỉ</label>
                            <div class="border p-2">{{$orders->address}}</div>
                        </div>
                        <div class="col-md-6">
                        <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center">Tên sản phẩm</th>
                                <th style="text-align: center">Giá</th>
                                <th style="text-align: center">Số lượng</th>
                                <th style="text-align: center">Ảnh</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders->orderDetails as $item)
                                <tr>
                                    <td style="text-align: center">{{ $item->products->name}}</td>
                                    <td style="text-align: center">{{ number_format($item->price)}}</td>
                                    <td style="text-align: center">{{ $item->qty}}</td>
                                    <td style="text-align: center"><img src="{{ $item->products->thumb}}" width="50px" alt=""></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h4 class="px-2">
                        Tổng tiền : {{ number_format($orders->total) }}
                    </h4>
                    <div class="mt-5 px-2">
                        <label for="">Tình trạng đơn hàng</label>
                    <form action="{{ url('admin/update-order/'.$orders->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                        <select class="form-select" name="order_status" style="padding:5px">
                            <option selected>Mở</option>
                            <option {{ $orders->status == '0' ? 'selected' : '' }} value="0">Chưa duyệt</option>
                            <option {{ $orders->status == '1' ? 'selected' : '' }} value="1">Đã duyệt</option>
                            <option {{ $orders->status == '2' ? 'selected' : '' }} value="2">Đang giao hàng</option>
                            <option {{ $orders->status == '3' ? 'selected' : '' }} value="3">Đã giao hàng</option>
                        </select>
                        <button type="submit" class="btn-primary" style="padding: 3px 20px; border-radius: 10px; margin-left: 20px">Cập nhật</button>
                        </form>
                        
                    </div>
                    
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


