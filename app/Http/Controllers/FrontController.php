<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\Menu;
use App\Models\MenuCategories;
use App\Models\Pages;
use App\Models\Page;
use App\Models\Admin;
use App\Models\Subcategory;
date_default_timezone_set("Asia/Kolkata");

class FrontController extends Controller
{
    public function home(){
        $category=Category::get();
        $menucategory=Menu::get();
      //var_dump($Menucategory);
        $news=News::get();
        $page = Page::get();
        if(session()->has('user_id')) {
          $admin = Admin::where('id',session('user_id'))->first();
          if(in_array('Manage Home Page',explode(',',$admin->permission))) {
            $hasPermission= true;
          }else {
            $hasPermission= false;
          }
        }else {
          $hasPermission= false;
        }
        return view('home')
        ->with(compact(['category','news','menucategory','page','hasPermission']));
    }


    public function news_categories(Request $data){
        $category_id=$data->category_id;
        if($data->has('subcategory_id')) {
          $subcategory_id = $data->subcategory_id;
          $news=News::whereRaw('FIND_IN_SET('.$subcategory_id.',subcategory)')
          ->orderBy('id','DESC')->get();
          $category_name = Subcategory::where('id',$subcategory_id)->first();
        }else {
          $news=News::whereRaw('FIND_IN_SET('.$category_id.',category)')
          ->orderBy('id','DESC')->get();
          $category_name = Category::where('id',$category_id)->first();
        }
        
        $category=Category::get();
        $menucategory=Menu::get();
        $sub_categories = Subcategory::where('id',$category_name->category_id)->get();
       
        return view('news_categories')
        ->with(compact(['news','category','menucategory','category_name']));
       
      }


   
  public function news_details(Request $data){
    $news_id=$data->news_id;
    
    $category=Category::get();
    $news=News::where('id',$news_id)->first();
    if(strpos($news->category,',')) {
        $news_category = explode(',',$news->category);
        $news_category = $news_category[0];
    }else {
        $news_category = $news->category;
    }

    $category_info=Category::where('id',$news_category)->first();
    $menucategory=Menu::get();
    return view('news_details')->with(compact(['news','category','category_info','menucategory']));
   
  }

    

   

        

   
   
}
