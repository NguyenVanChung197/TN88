@extends('admin.main')

@section('content')
<div class="container" style="margin-top:50px ; margin-bottom: 50px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        <table class="table table-striped table-bordered" style="margin-left: 245px;">
                        <thead>
                            <tr>
                                <th style="text-align: center">STT</th>
                                <th style="text-align: center">Sản phẩm</th>
                                <th style="text-align: center">Giá</th>
                                <th style="text-align: center">Số lượng</th>
                                <th style="text-align: center">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($receipts->receiptDetails as $key => $item)                            
                               <tr>
                                    <td style="text-align: center">{{$key + 1}}</td>
                                    <td style="text-align: center">{{ $item->products->name}}</td>
                                    <td style="text-align: center">{{ number_format($item->import_price)}}</td>
                                    <td style="text-align: center">{{ $item->qty}}</td>
                                    <td style="text-align: center">{{ number_format($item->total)}}</td>
                                </tr>                 
                            @endforeach
                        </tbody>
                        </table>
                        <div style="transform: translateX(620px);">Tổng tiền : {{number_format($receipts->total_receipt)}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


