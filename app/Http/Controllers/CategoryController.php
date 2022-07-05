<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',

            'status' => 'required',
        ]);
        $category = new Category();
        $category->name=$request->name;
        $category->status=$request->status;
        $category->save();
        return redirect()->route('category.index')->with('message', 'Added Succesfully!');
    }

    public function index(){
        $categories = Category::paginate(10);
        return view('category.index',compact('categories'));
    }

    public function edit($id){
        $category = Category::find($id);
        return view('category.edit',compact('category'));


    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',

            'status' => 'required',
        ]);
        $category = new Category();
        $category->name=$request->name;
        $category->status=$request->status;
        $category->save();

        return redirect()->route('category.index')->with('message', 'Update Succesfully!');
    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index')->with('message', 'Delete Succesfully!');


    }

}
