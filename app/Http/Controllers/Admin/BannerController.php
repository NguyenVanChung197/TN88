<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Services\Banner\BannerService;

class BannerController extends Controller
{
    protected $banner;

    public function __construct(BannerService $banner)
    {
        $this->banner = $banner;
    }

    public function create()
    {
        return view('admin.banner.add', [
           'title' => 'Thêm banner mới'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'thumb' => 'required',
            'url'   => 'required'
        ]);

        $this->banner->insert($request);

        return redirect()->back();
    }

    public function index(Request $request)
    {
        $data = $request->all();
        return view('admin.banner.list', [
            'title' => 'Danh Sách banner Mới Nhất',
            'banners' => Banner::where('active', 1)->search($data)->paginate(10)
        ]);
    }

    public function show(Banner $banner)
    {
        return view('admin.Banner.edit', [
            'title' => 'Chỉnh Sửa banner',
            'banner' => $banner
        ]);
    }

    public function update(Request $request, Banner $banner)
    {
        $this->validate($request, [
            'name' => 'required',
            'thumb' => 'required',
            'url'   => 'required'
        ]);

        $result = $this->banner->update($request, $banner);
        if ($result) {
            return redirect('/admin/banners/list');
        }

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->banner->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công banner'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }
}
