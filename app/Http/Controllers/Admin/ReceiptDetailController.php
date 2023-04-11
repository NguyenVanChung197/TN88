<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReceiptDetail;
use App\Models\Receipt;
use App\Models\Supplier;

use App\Models\Product;



class ReceiptDetailController extends Controller
{
    public function testt(Request $request)
    {
        // dd($request->all());
        $receiptDetail = new ReceiptDetail();
        $receiptDetail->product_id = $request->input('product_id');
        $receiptDetail->receipt_id = $request->input('receipt_id');
        $receiptDetail->qty = $request->input('qty');
        $receiptDetail->import_price = $request->input('import_price');
        // dd($receiptDetail['product_id']);
        foreach($receiptDetail['product_id'] as $key => $value) {
            $product = Product::findOrfail($receiptDetail['product_id'][$key]);
            $product->update([
                'qty' => $product->qty + $receiptDetail['qty'][$key],
                'price'=> $receiptDetail['import_price'][$key] * 20/100,
            ]);
            $receiptDetail->create([
                'product_id' => $receiptDetail['product_id'][$key],
                'receipt_id' => $receiptDetail['receipt_id'],
                'qty' => $receiptDetail['qty'][$key],
                'import_price' => $receiptDetail['import_price'][$key],
                'total' => $receiptDetail['qty'][$key] * $receiptDetail['import_price'][$key]
            ]);


           
            
        // }
        }


        $receipts = Receipt::search($request->all())->paginate(6);
        $suppliers = Supplier::get();
        return redirect()->to('admin/view-receipt/'.$receiptDetail['receipt_id']);
    }
}
