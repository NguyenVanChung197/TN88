@extends('admin.main')

@section('content')

<form action="{{url('admin/receipt-detail/testt')}}" method="POST">
@csrf
    <div class="card-body">
        <div class="row">
        <table class="table" id="table">
            <thead>
                <tr>
                    <th style="text-align: center">Tên Sản Phẩm</th>
                    <th style="text-align: center">Số lượng</th>
                    <th style="text-align: center">Giá nhập</th>
                </tr>
            </thead>
            <tbody id="tablebody">
                <tr>
                    <td style="text-align: center">
                        <select class="form-control" name="product_id[]">
                            <option value="0"> Chọn sản phẩm </option>
                            @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td style="text-align: center">
                        <input type="number" name="qty[]" min="1" max="1000" class="@error('message') is-invalid @enderror" />
                        @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                    <td style="text-align: center">
                        <input type="text" name="import_price[]" class="@error('message') is-invalid @enderror" />
                        @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                    @foreach($receipts as $receipt)
                    <input type="hidden" name="receipt_id" value="{{$receipt->id}}" />
                    @endforeach
                </tr>
            </tbody>
        </table>
    <button type="submmit">Lưu</button>
    <button type="button" onclick="myFunction()">Thêm</button>
</form>
<script>
    function myFunction() {
    var table = document.getElementById("tablebody");
    var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);

    cell1.innerHTML = `<select class="form-control" name="product_id[]">
                            <option value="0"> Chọn sản phẩm </option>
                            @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>`;
    cell2.style.textAlign = 'center';
    cell3.style.textAlign = 'center';
    cell2.innerHTML = ` <input type="number" name="qty[]" min="1" max="1000" />`;
    cell3.innerHTML = `<input type="text" name="import_price[]" />`;

    }


</script>
@endsection




