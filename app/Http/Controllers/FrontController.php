<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\Menu;
use App\Models\MenuCategories;
use App\Models\Pages;
date_default_timezone_set("Asia/Kolkata");

class FrontController extends Controller
{
    public function home(){
        $category=Category::get();
        $menucategory=Menu::get();
      //var_dump($Menucategory);
        $news=News::get();
        return view('home')->with(compact(['category','news','menucategory']));
    }


    public function news_categories(Request $data){
        $category_id=$data->category_id;
        
        $category=Category::get();
        $news=News::whereRaw('FIND_IN_SET('.$category_id.',category)')->orderBy('id','DESC')->get();
        $menucategory=Menu::get();
       
        return view('news_categories')->with(compact(['news','category','menucategory']));
       
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
