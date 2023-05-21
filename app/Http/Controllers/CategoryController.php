<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function home(){
        $category=Category::get();
        return view('home')->with(compact('category'));
    }

    public function AddCategory(){
        $category=Category::insert(
            [
                'title'=>'ABC'
            ]
        );
        return redirect('/');
    }


    public function DeleteCategory(Request $category_id){
        $id=$category_id->id;
        Category::where('id',$id)->delete();
        return redirect('/');
    }

    public function EditCategory(Request $category_id){
        $id=$category_id->id;
        Category::where('id',$id)->update(
            [
                'title'=>'ABC Edit'
            ]
        );
        return redirect('/');
    }

        

   
   
}
