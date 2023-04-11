<?php


namespace App\Http\Services\Supplier;


use App\Models\Supplier;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SupplierService
{
    public function insert($request)
    {
        try {
            // dd($request->input());
            // $request->except('_token');
            Supplier::create($request->input());
            Session::flash('success', 'Thêm Banner mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Banner LỖI');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function get()
    {
        return Supplier::orderByDesc('id')->paginate(4);
    }

    public function update($request, $supplier)
    {
        try {
            $supplier->fill($request->input());
            $supplier->save();
            Session::flash('success', 'Cập nhật banner thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật banner Lỗi');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function destroy($request)
    {
        $supplier = Supplier::where('id', $request->input('id'))->first();
        if ($supplier) {
            $supplier->delete();
            return true;
        }

        return false;
    }

    public function show()
    {
        return Supplier::where('active', 1)->orderByDesc('sort_by')->get();
    }
}
