<?php

namespace App\Http\Controllers;

use App\Handlers\ErrorHandler;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts(Request $request){
        $res = null;

        try {
            $res = Product::where('user_id', $request->id)->get()->toJson();
        } catch (Exception $e) {
            $res = ErrorHandler::getErrorResponse('301');
        }

        return $res;
    }

    public function getAllProducts(Request $request){
        $res = null;

        try {
            $res = Product::all()->toJson();
        } catch (Exception $e) {
            $res = ErrorHandler::getErrorResponse('301');
        }

        return $res;
    }

    public function create(Request $request){
        $product = new Product();
        $categ = new ProductCategory();

        $request->validate([
            'user_id' => 'required',
            'name' => 'required|string',
            'stock' => 'required|integer',
            'price' => 'required|integer'
        ]);

        try {
            $product->user_id = $request->user_id;
            $product->name = $request->name;
            $product->details = $request->details;
            $product->img_url = $request->img_url;
            $product->stock = $request->stock;
            $product->price = $request->price;
            $product->save();

            $categ->subcategory_id = $request->subcategory;
            $categ->product_id = $product->id;
            $categ->save();

            $result = $product;
        } catch (Exception $e) {
            $result = ErrorHandler::getErrorResponse('103');
        }

        return $result;
    }


    public function update(Request $request){
        $result = null;

        $request->validate([
            'pname' => 'required|string',
            'pstock' => 'required|integer',
            'pprice' => 'required|integer',
        ]);

        try {
            $product = Product::find($request->pid);

            $product->name = $request->pname;
            $product->details = $request->pdetails;
            $product->img_url = $request->pimg_url;
            $product->stock = $request->pstock;
            $product->price = $request->pprice;

            $product->save();
            $result = $product;
        } catch (Exception $e) {
            $result = ErrorHandler::getErrorResponse('103');
        }

        return $result;
    }

    public function delete(Request $request){
        $res = null;

        try{
            $prod = Product::find($request->id);
            $prod->delete();
            $res = $prod;
        } catch (Exception $e) {
            $res = ErrorHandler::getErrorResponse('103');
        }

        return $res;
    }

    /**
     * CART
     */
    public function addToCart($id){
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        $cart = session()->get('cart');

        if(!$cart){
            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "img_url" => $product->img_url
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success');
        }

        if (isset($cart[$id])){
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);

            return redirect()->back()->with('success');
        }

        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "img_url" => $product->img_url
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('succes');
    }

    public function updateCart(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function removeCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function cart()
    {
        return view('cart');
    }

    public function index()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }
}
