<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\Menu;
use App\Models\MenuCategories;
use App\Models\Pages;
use App\Models\Page;
use App\Models\About;
use App\Models\Admin;
use App\Models\Subcategory;
use App\Models\Template;
use Illuminate\Support\Facades\DB;
date_default_timezone_set("Asia/Kolkata");

class FrontController extends Controller
{
    public function home(){
        $category=Category::get();
        $menucategory=Menu::get();
      //var_dump($Menucategory);
        $news=News::get();
        $page = Page::get();
        $templates = Template::get();
        $homeTemplates = Page::where('page_name','home')
        ->orderByRaw('CONVERT(section_order, SIGNED) asc')
        ->get();
        $breakingNewsList = News::where('breaking_news','!=',NULL)->get();
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
        if( \App\Models\Style::where('property','header_primary_color')->exists()) {
          $header_primary_color = \App\Models\Style::where('property','header_primary_color')
          ->first();
          $header_primary_color = $header_primary_color->value;
        }else {
          $header_primary_color = '#e1261d';
        }
        if( \App\Models\Style::where('property','header_primary_text_color')->exists()) {
          $header_primary_text_color = \App\Models\Style::where('property','header_primary_text_color')
          ->first();
          $header_primary_text_color = $header_primary_text_color->value;
        }else {
          $header_primary_text_color = '#FFFFFF';
        }
        if( \App\Models\Style::where('property','header_text_color')->exists()) {
          $header_text_color = \App\Models\Style::where('property','header_text_color')
          ->first();
          $header_text_color = $header_text_color->value;
        }else {
          $header_text_color = '#001d42';
        }
        return view('home')
        ->with(compact(['category','news','menucategory','page','hasPermission','breakingNewsList','templates','homeTemplates','header_primary_color','header_primary_text_color','header_text_color']));
    }


    public function news_categories(Request $data){
        $category_id=$data->category_id;
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
        ->with(compact(['news','category','menucategory','category_name','hasPermission']));
       
      }


   
  public function news_details(Request $data){
    $news_id=$data->news_id;
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
    return view('news_details')
    ->with(compact(['news','category','category_info','menucategory','hasPermission']));
   
  }

  public function pageDetails(Request $request) {
    $category=Category::get();
    $menucategory=Menu::get();
      //var_dump($Menucategory);
        $news=News::get();
        $page = Page::get();
        $templates = Template::get();
        $homeTemplates = Page::where('page_name','home')
        ->orderByRaw('CONVERT(section_order, SIGNED) asc')
        ->get();
        $breakingNewsList = News::where('breaking_news','!=',NULL)->get();
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
        $page_details = DB::table('pages')->where('id',$request->page_id)->first();
    return view('page-details')
    ->with(compact(['category','news','menucategory','page','hasPermission','breakingNewsList','templates','homeTemplates','page_details']));
  }

    


  public function about_us(Request $request) {
    $category=Category::get();
    $menucategory=Menu::get();
      //var_dump($Menucategory);
       
        
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





        $about = DB::table('about_us')->get();
    return view('about_us')->with(compact(['category','menucategory','hasPermission','about']));
  }  
  
  
  public function contact_us(Request $request) {
    $category=Category::get();
    $menucategory=Menu::get();
      //var_dump($Menucategory);
       
        
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





        $contact = DB::table('contact_us')->first();
    return view('contact_us')->with(compact(['category','menucategory','hasPermission','contact']));
  }  
   
   
}
