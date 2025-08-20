<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){


        $products= Product::all();
        $users=User::all();
        return view('products.index',["products"=>$products, "users"=>$users]);
    }
    //
    public function create(){
        return view('products.create');
    }
    public function store(Request $request){
    //    dd($request);
    $data= $request->validate([
        'product_name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'description' => 'nullable|string',
        // "review"=>"required|numeric"
    ]);

    $newProduct= Product::create($data);

 return redirect(route('product.index'));
    }
}
