@extends('main')
  
@section('content')
<form class="bg0 p-t-130 p-b-85" method="post">
<table id="cart" class="table table-hover table-condensed" style="margin-top:100px; width: 70%; margin-left: 12%; margin-right: 15%">
    <thead>
        <tr">
            <th style="text-align: center">Sản phẩm</th>
            
            <th style="text-align: center">Giá</th>
            <th style="text-align: center">Số lượng</th>
            <th style="text-align: center" class="text-center">Tổng tiền</th>
            <th style="text-align: center"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)

                @php $total += $details['price'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9" style="margin-top:30px">
                                <h4 class="nomargin" style="font-family: 'Roboto', sans-serif;">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price" style="font-family: 'Roboto', sans-serif; margin-top:30px"><div style="font-family: 'Roboto', sans-serif; margin-top:30px">
                    {{ number_format($details['price']) }}
                    </div></td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" style="margin-top:20px" />
                    </td>
                    <td data-th="Subtotal" class="text-center" style="font-family: 'Roboto', sans-serif;">
                    <div style="font-family: 'Roboto', sans-serif; margin-top:30px">
                    {{ number_format($details['price'] * $details['quantity']) }}
                </div>
                </td>
                    
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm remove-from-cart" style="margin-top:25px"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right" style="font-family: 'Roboto', sans-serif;"><h3><strong>Tổng tiền {{ number_format($total) }}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/') }}" class="btn btn-warning">Tiếp tục mua hàng </a>
                @if (Auth::user())
                <button class="btn btn-success text-white"><a href="{{ url('checkout') }}" style="color:white">Đặt hàng</a></button>
                @else 
                <button class="btn btn-success text-white"><a href="{{ url('login') }}" style="color:white">Đăng nhập để tiếp tục</a></button>
                @endif
            </td>
        </tr>
    </tfoot>
</table>

</form>
@endsection
  
@section('scripts')
<script type="text/javascript">
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
                // console.log(response);
                var a = ele.parents("tr").find(".quantity").val();
                if(a > response) {
                    alert("Số lượng sản phẩm không đủ");
                }
               else {
                window.location.reload();
               }
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                    
                }
            });
        }
    });
  
</script>
@endsection