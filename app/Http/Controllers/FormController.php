<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function store(Request $request){

        $this->validate($request, [
            'tittle' => 'required',
            'dis' => 'required',
        ]);
        $form = new Form();
        $form->tittle=$request->tittle;
        $form->dis=$request->dis;
        $form->save();
        return redirect()->route('table')->with('message', 'Added Succesfully!');


    }

    public function index(){
        $form = Form::all();
        return view('table',compact('form'));
    }

    public function edit($id){
        $form = Form::find($id);
        return view('edit',compact('form'));


    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'tittle' => 'required',
            'dis' => 'required',
        ]);
        $form = Form::find($id);
        $form->tittle=$request->tittle;
        $form->dis=$request->dis;
        $form->save();
        return redirect()->route('table')->with('message', 'Update Succesfully!');



    }
    public function delete($id){
        $form = Form::find($id);
        $form->delete();
        return redirect()->route('table')->with('message', 'Delete Succesfully!');


    }



}
