<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Services\Supplier\SupplierService;

class SupplierController extends Controller
{
    protected $supplier;

    public function __construct(SupplierService $supplier)
    {
        $this->supplier = $supplier;
    }

    public function create()
    {
        return view('admin.supplier.add', [
           'title' => 'Thêm supplier mới'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]); 

        $this->supplier->insert($request);

        return redirect()->back();
    }

    public function index(Request $request)
    {
        $data = $request->all();
        return view('admin.supplier.list', [
            'title' => 'Danh Sách supplier Mới Nhất',
            'suppliers' => Supplier::where('active', 1)->search($data)->paginate(10)
        ]);
    }

    public function show(Supplier $supplier)
    {
        return view('admin.supplier.edit', [
            'title' => 'Chỉnh Sửa banner',
            'supplier' => $supplier
        ]);
    }

    public function update(Request $request, Supplier $supplier)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $result = $this->supplier->update($request, $supplier);
        if ($result) {
            return redirect('/admin/suppliers/list');
        }

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->supplier->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công banner'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }
}
