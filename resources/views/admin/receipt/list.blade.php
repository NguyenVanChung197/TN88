@extends('admin.main')

@section('content')

<form action="{{url('admin/receipts/add')}}" method="POST">
{{ csrf_field() }}
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div class="form-group" style="margin-left: 20px">
                    <label>Nhà cung cấp</label>
                    <select class="form-control" name="supplier_id" style="width: 50%">
                        <option value="0"> Nhà cung cấp </option>
                        @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success text-white" style="margin: 20px 20px">Tạo phiếu nhập kho</button>
        </div>
</form>

<form method="GET" action="{{ route('receipt')}}">
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
                                <th style="text-align: center">Người tạo</th>
                                <th style="text-align: center">Nhà cung cấp</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($receipts as $index => $receipt)
                                <tr>
                                <td style="text-align: center">
                                    <div class="">{{ (isset($data['page'])) ? ((($data['page'] - 1) * 4) + ($index + 1)) : ($index + 1) }}</div>
                                    </td>
                                    <td style="text-align: center">{{ date('d-m-Y', strtotime($receipt->created_at)) }}</td>

                                    
                                    <td style="text-align: center">
                                        {{ $receipt->user->name}}
                                    </td>
                                    <td style="text-align: center">
                                    {{ $receipt->supplier->name ?? 'None' }}
                                    </td>
                                    <td style="text-align: center">
                                    <a href="{{ url('admin/view-receipt/'.$receipt->id) }}"class="btn btn-primary">Xem chi tiết</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer clearfix">
                        {!! $receipts->links() !!}
                    </div>
@endsection


