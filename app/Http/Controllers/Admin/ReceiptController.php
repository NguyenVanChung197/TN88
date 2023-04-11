<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Receipt;
use App\Models\Product;
use App\Http\Controllers\Controller;


class ReceiptController extends Controller
{
public function index(Request $request)
    {
        $receipts = Receipt::search($request->all())->paginate(6);
        $suppliers = Supplier::get();
        return view('admin.receipt.list', [
           'title' => 'Danh sách phiếu nhập kho',
           'receipts' => $receipts,
           'suppliers' => $suppliers,
        ]);
    }

    public function add(Request $request)
    {
        $products = Product::get();
        
        $data = $request->all();
        Receipt::create($data);
        $receipts = Receipt::get();
        return view('admin.receipt.add', [
            'title' => 'Thêm phiếu nhập kho',
            'products' => $products,
            'receipts' => $receipts,
         ]);
    }

    public function view($id) {
        $receipts = Receipt::where('id', $id)->first();
        return view('admin.receipt.view', [
            'title' => 'Chi tiết Phiếu nhập',
            'receipts' => $receipts
        ]);
    }
}
