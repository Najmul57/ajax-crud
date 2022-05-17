<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products()
    {
        $products = product::latest()->paginate(5);
        return view('products',compact('products'));
    }

    // add product
    public function addProduct(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:products',
                'price' => 'required'
            ],
            [
                'name.required' => 'Name is Required',
                'name.unique' => 'Product Already Exists',
                'price.required' => 'Price is Required'
            ]
        );

       $product = new product();
       $product->name = $request->name;
       $product->price = $request->price;
        $product->save();
        return response()->json([
            'status'=>'success',
        ]);
    }

    // update product
    public function updateProduct(Request $request)
    {
        $request->validate(
            [
                'up_name' => 'required|unique:products,name,'.$request->up_id,
                'up_price' => 'required'
            ],
            [
                'up_name.required' => 'Name is Required',
                'up_name.unique' => 'Product Already Exists',
                'up_price.required' => 'Price is Required'
            ]
        );

        product::where('id',$request->up_id)->update([
            'name'=>$request->up_name,
            'price'=>$request->up_price,
        ]);

        return response()->json([
            'status'=>'success',
        ]);
    }

        public function deleteProduct(Request $request)
        {
            product::find($request->product_id)->delete();
            return response()->json([
                'status'=>'success',
            ]);
        }
}
