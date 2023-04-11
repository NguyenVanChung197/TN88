<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;
use App\Models\Product;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index($id = '', $slug = '')
    {
        $product = $this->productService->show($id);
        $productsMore = $this->productService->more($id);
        $products = Product::find($id);
        $replies = $products->rates()->replies()->get();
        $rates = $products->rates()->comments()->get();

        return view('products.content', [
            'title' => $product->name,
            'product' => $product,
            'products' => $productsMore,
            'rates' => $rates,
            'replies' => $replies
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
        return view('cart');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "product_id" => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->thumb
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Thêm sản phẩm vào giỏ hàng thành công');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            $product = Product::find($cart[$request->id]["product_id"]);

            session()->put('cart', $cart);
            session()->flash('success', 'Cập nhật giỏ hàng thành công');
            return $product->qty;
        }

        }
        
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Xóa sản phẩm trong giỏ hàng thành công');
        }
    }

    // public function searchProduct($request) {
    //     $txtProduct = $request['query'];
    //     $products = Product::where('name', 'LIKE', '%'.$txtProduct.'%')->get();

    //     return view('products.search', compact('products'));
    // }
}
