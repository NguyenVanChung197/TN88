@extends('admin.main')

@section('content')
<div class="container" style="margin-top:40px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
               
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Order Date</th>
                                <th>Total price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $item)
                                <tr>
                                    <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                    <td>{{$item->total}}</td>
                                    <td>
                                        {{$item->status == '0' ? 'Chờ duyệt' : 'Đã xác nhận'}}
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/view-order/'.$item->id) }}"class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


