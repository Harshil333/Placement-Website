<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    //
    public function index(){
        $categories=Category::all();
        return view('categories.index')->with('categories',$categories);
    }

    public function new(){
        return view('categories.new');
    }

    public function create(Request $request){
        $this->validate($request,[
            'name' => 'required|string|unique:categories',
        ]);
        
        $category = new Category;
        $category->name = $request->input('name');
        $category->save();

        return redirect()->back()->with('success','Category has been created!');
    }

    public function show($id){
        $category = Category::find($id);
        $jobs = $category->jobs;
        return view('categories.show')->with(['category'=>$category,'jobs'=>$jobs]);
    }
}
