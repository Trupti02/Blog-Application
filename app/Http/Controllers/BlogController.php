<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Category;
class BlogController extends Controller
{
    public function store(Request $request){

        $this->validate($request, [
            'tittle' => 'required',
            'dis' => 'required',
            'status' => 'required',
            'category_id' => 'required',
            'image' => 'nullable',


        ]);
        $form = new Blog();
        $form->tittle=$request->tittle;
        $form->dis=$request->dis;
        $form->status=$request->status;
        $form->category_id=$request->category_id;
        if($request->hasFile('image'));
        {
            $file = $request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/',$filename);
            $form->image = $filename;
        }


        $form->save();
        return redirect()->route('blog.index')->with('message', 'Added Succesfully!');


    }
    public function create(){
        $categories = Category::all();
        return view('blog.create',compact('categories'));
    }



    public function index(){
        $forms = Blog::with('category')->latest()->paginate(10);
        return view('blog.index',compact('forms'));
    }

    public function edit($id){
        $categories = Category::all();

        $form = Blog::with('category')->find($id);
        return view('blog.simple',compact('form','categories'));


    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'tittle' => 'required',
            'dis' => 'required',
            'status' => 'required',
            'category_id' => 'required',
        ]);
        $form = Blog::find($id);
        $form->tittle=$request->tittle;
        $form->dis=$request->dis;
        $form->status=$request->status;
        $form->category_id=$request->category_id;

        $form->save();

        return redirect()->route('blog.index')->with('message', 'Update Succesfully!');



    }
    public function delete($id){
        $form = Blog::find($id);
        $form->delete();
        return redirect()->route('blog.index')->with('message', 'Delete Succesfully!');


    }
    public function show(Request $request,$id){
        $categories = Category::all();
        $blogs = Blog::with('category')->find($id);
        return view('blog.show',compact('blogs','categories'));


    }



}
