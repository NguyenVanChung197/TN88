<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Banner\BannerService;
use App\Http\Services\Category\CategoryService;
use App\Http\Services\Product\ProductService;

class MainController extends Controller
{
    protected $banner;
    protected $category;
    protected $product;

    public function __construct(BannerService $banner, CategoryService $category,
        ProductService $product)
    {
        $this->banner = $banner;
        $this->category = $category;
        $this->product = $product;
    }

    public function index()
    {
        return view('home', [
            'title' => 'Shop Nước Hoa ABC',
            'banners' => $this->banner->show(),
            'categories' => $this->category->show(),
            'products' => $this->product->get()
        ]);
    }

    public function loadProduct(Request $request)
    {
        $page = $request->input('page', 0);
        $result = $this->product->get($page);
        if (count($result) != 0) {
            $html = view('products.list', ['products' => $result ])->render();

            return response()->json([ 'html' => $html ]);
        }

        return response()->json(['html' => '' ]);
    }
}
