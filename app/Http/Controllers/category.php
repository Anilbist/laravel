<?php

namespace App\Http\Controllers;
use App\Models\prod_cat;
use Illuminate\Http\Request;

class category extends Controller
{
	public function index()
	{
		$categories = prod_cat::all();

		return view('/categories/index', ['categories' => $categories]);
	}

    public function create(){
    	return view('/categories/create');
    }

    public function store(Request $req)
    {
    	// $request->validate([
     //        'cat' => 'required|string|max:255|unique:cat_name',]);
    	
    	$prodCat = new prod_cat;
    	$prodCat->cat_name = $req->cat;
    	$prodCat->save();
    	// return view('/categories/create');
    	return redirect('/cat')->with('message','Category added successfully');
    }

    public function edit($id)
    {
    	$category = prod_cat::find($id);

    	return view('/categories/edit', ['category' => $category]);
    }

    public function update(Request $req,$id)
    {
    	// return $req->input();
    	$prodCat = prod_cat::find($id);
    	$prodCat->cat_name = $req->cat;
    	$prodCat->save();
   
    	return redirect('/cat')->with('message','category updated');
    }

    public function delete($id)
    {
    	$prodCat = prod_cat::find($id);
    	$prodCat->delete(); 

    	return redirect()->back()->with('message','Category Deleted');
    }

    public function detail($id)
    {
    	$category = prod_cat::find($id);
        // dd($category);
    	return view('/categories/detail',['category' => $category]);
    }
}
