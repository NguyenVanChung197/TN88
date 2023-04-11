<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request) {
        $data = $request->all();
        $orders = Order::where('user_id', Auth::id())->search($data)->paginate(5);
        return view('order.index', [
            'title' => 'Danh Sách Đơn Hàng',
            'orders' => $orders,
            'data' => $data
        ]);
    }

    public function a($id) {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('order.a', [
            'title' => 'Chi tiết đơn hàng',
            'orders' => $orders
        ]);
    }
}
