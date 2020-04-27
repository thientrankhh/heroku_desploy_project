<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;

class ShopController extends Controller
{
    public function index(){

        $products = Product::paginate(6)->withPath('products');

        return view('user.products', [ 'products' => $products ]);
    }

    public function cart(){

    }

    public function addToCart($id){
        $product = Product::find($id);
        
        \Cart::add(array(
            'id' => $product->id,
            'name' => $product->product_name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        return redirect()->back();
    }

    public function removeFromCart($id){
        \Cart::remove($id);
        
        return redirect()->back();
    }
}
