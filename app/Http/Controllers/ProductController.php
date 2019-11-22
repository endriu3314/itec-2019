<?php

namespace App\Http\Controllers;

use App\Handlers\ErrorHandler;
use App\Product;
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
    public function create(Request $request){
        $product = new Product();

        $request->validate([
            'user_id' => 'required',
            'name' => 'required|string',
            'details' => 'required|string',
            'stock' => 'required|integer',
            'price' => 'required|integer'
        ]);

        try {
            $product->user_id = $request->user_id;
            $product->name = $request->name;
            $product->details = $request->details;
            $product->img_url = $request->img_url;
            $product->stock = $request->img_url;
            $product->price = $request->price;
            $product->save();
            $result = $product;
        } catch (Exception $e) {
            $result = ErrorHandler::getErrorResponse('103');
        }

        return $result;
    }
}
