@extends('main')
  
@section('content')

<table id="cart" class="table table-hover table-condensed" style="margin-top:150px; width: 70%; margin-left: 12%; margin-right: 15%">
    <thead>
        <tr">
            <th style="width:50%">Sản phẩm</th>
            <th style="width:10%">Giá</th>
            <th style="width:8%">Số lượng</th>
            <th style="width:22%" class="text-center">Tổng tiền</th>
            <th style="width:10%"></th>
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
            <td colspan="5" class="text-right" style="font-family: 'Roboto', sans-serif;" ><h3><strong>Tổng tiền {{ number_format($total) }}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/') }}" class="btn btn-warning" style="font-family: 'Roboto', sans-serif;" ><i class="fa fa-angle-left"></i> Tiếp tục mua</a>
                <button class="btn btn-success text-white" style="font-family: 'Roboto', sans-serif;" ><a href="{{ url('checkout') }}" style="color:white">Đặt hàng</a></button>
            </td>
        </tr>
    </tfoot>
</table>

<div style="margin-top:150px; width: 70%; margin-left: 12%; margin-right: 15%">
    <h4 style="font-family: 'Roboto', sans-serif;" >Thông tin đặt hàng</h4>
    <form method="POST" action="{{ url('place-order')}}">
        {{ csrf_field() }}
        <input type="text" class="form-control" name="name" placeholder="Name" value="" style="margin-top: 20px" value="{{Auth::user()->name}}" />
        <input type="text" class="form-control" name="email" placeholder="Email" style="margin-top: 20px" value="{{Auth::user()->email}}" />
        <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" style="margin-top: 20px" value="{{Auth::user()->phone_number}}" />
        <input type="text" class="form-control" name="address" placeholder="Address" style="margin-top: 20px" value="{{Auth::user()->address}}" />
        <input type="text" class="form-control" name="message" placeholder="Message" style="margin-top: 20px" />
        <input type="hidden" class="form-control" name="total" />
        <button type="submit" style="margin-top: 20px" class="btn btn-success" style="font-family: 'Roboto', sans-serif;" >Đặt hàng</button>
    </form>
</div>



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
               window.location.reload();
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