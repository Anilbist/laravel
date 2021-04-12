<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\prod_cat;
use App\Models\prod_image;
use App\Models\cat_detail;
use App\Models\product;

class productController extends Controller
{
    public function add()
    {
        $category = prod_cat::all();
      return view('/product/add',['category' => $category]);
       // dd($view);

    }

    public function store(Request $request)
    {
    	$product = new product ;
        $product->p_name = $request->prod_name;
        $product->p_des = $request->prod_des;
        $product->p_price= $request->prod_price;
        $product->save();

        // $prodImage = new prod_image;
        // $images = [];
        // $id=[];
        // // dd($request->file('prod_image'));
        // if($request->hasfile('prod_image'))
        // {
        //     foreach ($request->file('prod_image') as $image) 
        //     {   
        //         $imageName = time().rand(1,100).'.'.$image->extension();
        //         $image->move(public_path('images'),$imageName);
        //          $id[] = $product->id;
        //         $images[]=$imageName;
        //         $prodImage->p_id = $id;
        // $prodImage->p_image = $images;
        // $prodImage->save();
        //     }
        // }
    
        
        
    
        $catDetail = new cat_detail;
        $catDetail->pro_id =$product->id;
        $catDetail->cat_id =$request->product_category;
        $catDetail->save();
       return redirect('/prod')->with('message','Product added successfully');
    }

    public function index()
    {
    	$products =product::with('image')->get();
        return view('/product/index',['products'=>$products]);
    }

    public function edit($id)
    {
    	$category = prod_cat::all();
        $editProd = product::find($id);
        // dd($editProd);

        return view('/product/edit',['editProd' => $editProd,'category' => $category]);

    }

    public function update(Request $request,$id)
    {
        $product = product::find($id);
        $product->p_name = $request->prod_name;
        $product->p_des = $request->prod_des;
        $product->p_price= $request->prod_price;
        $product->save();

        $prodImage = new prod_image;
        $image = $request->file('prod_image');
        $imageName = time().'.'.$image->extension();
        $request->prod_image->move(public_path('images'),$imageName);
        $prodImage->p_id = $product->id;
        $prodImage->p_image = $imageName;
        $prodImage->save();

        $catDetail = new cat_detail;
        $catDetail->pro_id =$product->id;
        $catDetail->cat_id =$request->product_category;
        $catDetail->save();

        return redirect('/prod')->with('message','Product updated successfully');
    }

    public function delete($id)
    {
    	$product = product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product Deleted');
    }

}