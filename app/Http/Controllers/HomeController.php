<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Banner\BannerService;
use App\Http\Services\Category\CategoryService;
use App\Http\Services\Product\ProductService;

class HomeController extends Controller
{
    protected $banner;
    protected $category;
    protected $product;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BannerService $banner, CategoryService $category,
    ProductService $product)
    {
        $this->middleware('auth');
        $this->banner = $banner;
        $this->category = $category;
        $this->product = $product;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'title' => 'Shop Nước Hoa ABC',
            'banners' => $this->banner->show(),
            'categories' => $this->category->show(),
            'products' => $this->product->get()
        ]);
    }
}
