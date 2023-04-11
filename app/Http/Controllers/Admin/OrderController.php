<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function index(Request $request) {
        $data = $request->all();
        $orders = Order::search($data)->paginate(5);
        return view('admin.order.index', [
            'title' => 'Danh Sách Đơn Hàng',
            'orders' => $orders,
            'data' => $data
        ]);
    }

    public function view($id) {
        $orders = Order::where('id', $id)->first();
        return view('admin.order.view', [
            'title' => 'Chi tiết Đơn Hàng',
            'orders' => $orders
        ]);
    }

    public function updateOrder(Request $request, $id) {
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('admin/orders')->with('status', 'Thay đổi trạng thái thành công');
    }

}
