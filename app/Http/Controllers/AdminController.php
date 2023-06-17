<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\News;
use App\Models\Admin;
use App\Models\Menu;
use App\Models\MenuCategories;
use App\Models\Pages;
use App\Models\About;
use App\Models\Social;
use App\Models\Home;
use App\Models\Logo;
use App\Models\Banner;
use App\Models\Ads;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function login(){
        $category=Category::get();
        if(session()->has('user_id')){
            return redirect()->route('dashboard');
        }else{
        return view('admin.login')->with(compact('category'));
        }
    }

    
public function loginAuth(Request $data){
   $email=$data->email;
   $password=$data->password;

   $chk=Admin::where('email',$email)->exists();
   if($chk){
    $admin=Admin::where('email',$email)->first();
   if(Hash::check($password,$admin->password)){
     session()->put('user_id',$admin->id);
     return redirect()->route('dashboard')->with('success','login successfully.');
   }else{
    return redirect()->route('login')->with('error','Incorrect Password.');
   }

   }else{
    return redirect()->route('login')->with('error','This Email not registered.');
   }

}

public function dashboard(){
    if(session()->has('user_id')){
    return view('admin.dashboard');
    }else{
        return redirect()->route('login')->with('error','Login first.'); 
    }
   }   

   public function logout(){
    session()->flush();
    return redirect()->route('login');
   }


   public function category_list(){
    $category=Category::get();
    if(session()->has('user_id')){
        return view('admin.categories')->with(compact('category'));
    
    }else{
        return redirect()->route('login')->with('error','Login first.'); 
    }
   } 


   public function AddCategory(){
    $category=Category::insert(
        [
            'title'=>'ABC'
        ]
    );
    return redirect('/');
}

public function category_add(Request $data){
    $title=$data->title;
   
 
    $chk=Category::where('title',$title)->exists();
    if($chk){
        return redirect()->route('category-list')->with('error','category name already exist.');
    }else{
        $category=Category::insert(
            [
                'title'=>$title
            ]
        );
        return redirect()->route('category-list')->with('success','category added successfully.');
    }
}


public function update_category(Request $data){
     
    $id=$data->category_id;
    $title=$data->title;
 

 $category=Category::where('id',$id)->update(['title'=>$title]);
   return redirect()->route('category-list')->with('success','category updated successfully.');
    
}


public function update_subcategory(Request $data){
     
    $id=$data->id;
    $title=$data->title;
 

 $subcategory=Subcategory::where('id',$id)->update(['title'=>$title]);
   return redirect()->route('subcategory-list')->with('success','Subcategory updated successfully.');
    
}

public function delete_subcategory(Request $data){

    $id=$data->id;
    

       $del=Subcategory::where('id',$id)->delete();
       return redirect()->back()
       ->with('success','Sub category deleted');
}

public function delete_category(Request $data){

     $id=$data->id;
     $del=Category::where('id',$id)->delete();
     $delSub=Subcategory::where('category_id',$id)->delete();
}

public function subcategory_list(){
    

    $subcategory=Subcategory::get();
    $category_list=Category::get();
   
    $categorydata=array();
    foreach($subcategory as $ct){
       
        $category=Category::where('id',$ct->category_id)->first();
       

        $categorydata[]=[
            'id'=>$ct->id,
            'category_name'=>$category->title,
            'subcategory_name'=>$ct->title
        ];
       

        
        

    }

    if(session()->has('user_id')){
        return view('admin.subcategories')->with(compact(['categorydata','category_list']));
    
    }else{
        return redirect()->route('login')->with('error','Login first.'); 
    }
   
}


public function subcategory_add(Request $data){
    $category_id=$data->category_id;
    $title=$data->title;
   
 
    $chk=Subcategory::where('title',$title)->exists();
    if($chk){
        return redirect()->route('subcategory-list')->with('error','Subcategory name already exist.');
    }else{
        $subcategory=Subcategory::insert(
            [
                'category_id'=>$category_id,
                'title'=>$title
            ]
        );
        return redirect()->route('subcategory-list')->with('success','Subcategory added successfully.');
    }
}



public function post_news(){
    $category=Category::get();
    if(session()->has('user_id')){
        return view('admin.post_news')->with(compact(['category']));
        
    
    }else{
        return redirect()->route('login')->with('error','Login first.'); 
    }
   } 

   

public function GetSubcategoryByCategory(Request $data){
   
    $category_ids=$data->category_ids;
    foreach($category_ids as $ct){
        $subcategory=SubCategory::where("category_id",$ct)->get();
        $subcategorydata=array();
        foreach($subcategory as $sub){
            
            $subcategorydata[]=[
                'id'=>$sub['id'],
                'title'=>$sub['title']
                
            ];
        }

        return view('checkbox',compact('subcategorydata'))->render();
        
    }
}


public function news_list(){
    $news=News::get();
    if(session()->has('user_id')){
        return view('admin.news_list')->with(compact(['news']));
        
    
    }else{
        return redirect()->route('login')->with('error','Login first.'); 
    }
   } 

public function add_news(Request $data){

    $added_by=session()->get('user_id');
   
    $title=$data->title;
    
    $description=$data->description;
    $news_date=date('Y-m-d',strtotime($data->news_date));
    
    
    
    
    if($data->has('category')) {
        @$category=implode(',',$data->category);
    }else {
        @$category=NULL;
    }
    if($data->has('subcategory')) {
        @$subcategory=implode(',',$data->subcategory);
    }else {
        @$subcategory=NULL;
    }
    $latest_news=$data->latest_news;
    $breaking_news=$data->breaking_news;
    $popular=$data->popular_news;
    if(is_uploaded_file($_FILES['image']['tmp_name'])){
        $image=rand(0,9999).$_FILES['image']['name'];
        @move_uploaded_file($_FILES['image']['tmp_name'],'uploads/news/'.$image);
    }else{
        $image="";
    }
 
    $chk=News::where('title',$title)->exists();
    if($chk){
        return redirect()->route('post-news')->with('error','Title name already exist.');
    }else{
        $Newsdata=News::insert(
            [
                'title'=>$title,
                'description'=>$description,
                'news_date'=>$news_date,
                'category'=>$category,
                'subcategory'=>$subcategory,
                'image'=>$image,
                'latest_news'=>$latest_news,
                'breaking_news'=>$breaking_news,
                'popular'=>$popular,
                'added_by'=>$added_by

                

            ]
        );
        return redirect()->route('post-news')->with('success','News added successfully.');
    }
}



public function edit_news(Request $value){

     $id=$value->id;
    $category=Category::get();
    $news=News::where('id',$id)->first();
     return view('admin.edit_news',compact(['category','news']))->render();
   }


   public function update_news(Request $data){

    $news_id=$data->news_id;
    $title=$data->title;
   
    $description=$data->description;
    $news_date=date('Y-m-d',strtotime($data->news_date));
    
    if($data->has('category')) {
        @$category=implode(',',$data->category);
    }else {
        @$category=NULL;
    }
    if($data->has('subcategory')) {
        @$subcategory=implode(',',$data->subcategory);
    }else {
        @$subcategory=NULL;
    }
    $latest_news=$data->latest_news;
    $breaking_news=$data->breaking_news;
    $popular=$data->popular_news;
    if(is_uploaded_file($_FILES['image']['tmp_name']))
			{
  				$image=rand(0,9999).$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],'uploads/news/'.$image);
				if(is_file('uploads/news/'.$_REQUEST['old_image'])){ unlink('uploads/news/'.$_REQUEST['old_image']);}
				 }else{
					$image=$_REQUEST['old_image'];
		   	}
 
    
        $Newsdata=News::where('id',$news_id)->update(
            [
                'title'=>$title,
                'description'=>$description,
                'news_date'=>$news_date,
                'category'=>$category,
                'subcategory'=>$subcategory,
                'image'=>$image,
                'latest_news'=>$latest_news,
                'breaking_news'=>$breaking_news,
                'popular'=>$popular,
                'added_at' => Carbon::now('Asia/Kolkata')

                

            ]
        );
        return redirect()->route('news-list')->with('success','News Updated successfully.');
    }


    public function delete_news(Request $data){
        $id=$data->id;
        $news=News::where('id',$id)->delete();
    }

    public function ChangeLatestStatus(Request $data){
        $id=$data->id;
        $status=$data->status;

        if($status==1){ $st=0;}
        if($status==0){ $st=1;}

        $Newsdata=News::where('id',$news_id)->update(
            [
                'latest_news'=>$st
            ]
        );
       
    }



    

    public function ChangePopular(Request $data){
        $id=$data->id;
        $status=$data->status;

        if($status==1){ $st=0;}
        if($status==0){ $st=1;}

        $Newsdata=News::where('id',$news_id)->update(
            [
                'popular'=>$st
            ]
        );
       
    }

    public function menu_list(){
        $menu=Menu::get();
        if(session()->has('user_id')){
            return view('admin.menu_list')->with(compact('menu'));
        
        }else{
            return redirect()->route('login')->with('error','Login first.'); 
        }
       } 

       
       public function menu_category(Request $value){

        $id=$value->id;
        $menu_id=array($value->id);
        $menu_title=array($value->title);
       
       $Menucategory=Menucategories::where('menu_id',$id)->get();
        
        return view('admin.menu_category')->with(compact(['Menucategory','menu_title','menu_id']));
      }


public function menu_category_add(Request $data){
      $menu_id=$data->menu_id;
        $category_id=$data->category_id;
        
        $category = Category::where('id', $category_id)->first();
        $category_title=$category->title;
 
    $chk=Menucategories::where(['title'=>$category_title,'menu_id'=>$menu_id])->exists();
    if($chk){
        return redirect()->route('menu-category?id='.$menu_id.'&title='.$category_title)->with('error','category name already exist.');
    }else{
        $category=Menucategories::insert(
            [
                'menu_id'=>$menu_id,
                'category_id'=>$category_id,
                'title'=>$category_title
            ]
        );
        return redirect()->route('menu-list')->with('success','category added successfully.');
    }
      }


      public function manage_pages(){

        $pages=Pages::orderBy('id','DESC')->get();
        
        return view('admin.manage_pages')->with(compact('pages'));
      }


    public function add_page(Request $data){

        $title=$data->title;
        $content=$data->content;
       
        $chk=Pages::where('title',$title)->exists();
        if($chk){
            return redirect()->route('manage-pages')->with('error','Page Title  already exist.');
        }else{
            $pageData=Pages::insert(
                [
                    'title'=>$title,
                    'content'=>$content,
                                     
    
                ]
            );
            return redirect()->route('manage-pages')->with('success','Page created successfully.');
        }
    }


    public function update_page(Request $data){

        
        $page_id=$data->page_id;
        $title=$data->title;
        $content=$data->content;
       
           
            $pagedata=Pages::where('id',$page_id)->update(
                [
                    'title'=>$title,
                    'content'=>$content
                   
    
                ]
            );
            return redirect()->route('manage-pages')->with('success','Content Updated successfully.');
    }

    public function delete_page(Request $data){
        $id=$data->id;
       
        $del=Pages::where('id',$id)->delete();
        return redirect()->route('manage-pages')->with('success','Deleted successfully.');
}

      public function social_links(){

        $social=Social::get();
        
        return view('admin.social_link')->with(compact('social'));
      }


      public function update_social(Request $data){

        $social_id=$data->social_id;
        $social_name=$data->social_name;
        $url=$data->url;
       
           
            $socialdata=Social::where('id',$social_id)->update(
                [
                    'social_name'=>$social_name,
                    'url'=>$url
                   
    
                ]
            );
            return redirect()->route('social-links')->with('success','Social Details Updated successfully.');
        }

 public function manage_home(){

    $pages=Pages::get();
    
    return view('admin.manage_home')->with(compact('pages'));
  }

  public function home_template(Request $data){

    $section=$data->section;
   
    
    return view('admin.home_template')->with(compact('section'));
  }
 
  
public function update_home_section(Request $data){
 $page_id=$data->page_id;
 $section=$data->section;
 $position=$data->position;
 $category=$data->category;

 $Newsdata=Home::where('id',$page_id)->update(
    [
        'section'=>$section,
        'position'=>$position,
        'category'=>$category

        

    ]
);


    
    
    return redirect('home-template?section='.$section);
 
}

public function manage_logo(){

    $pages=Pages::get();
    
    return view('admin.manage_logo');
  }

  public function update_logo(Request $data){

    

    if(is_uploaded_file($_FILES['image']['tmp_name']))
			{
  				$image=rand(0,9999).$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],'uploads/logo/'.$image);
				if(is_file('uploads/logo/'.$_REQUEST['old_image'])){ unlink('uploads/logo/'.$_REQUEST['old_image']);}
				 }else{
					$image=$_REQUEST['old_image'];
		   	}
 
    
        $Logodata=Logo::where('id',1)->update(
            [
                
                'logo'=>$image
                

            ]
        );
        return redirect()->route('manage-logo')->with('success','Logo Changed successfully.');
    }

    public function manage_header_banner(){

        
        
        return view('admin.manage_header_banner');
      }


      public function update_header_banner(Request $data){

    

        if(is_uploaded_file($_FILES['image']['tmp_name']))
                {
                      $image=rand(0,9999).$_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'],'uploads/header/'.$image);
                    if(is_file('uploads/header/'.$_REQUEST['old_image'])){ unlink('uploads/header/'.$_REQUEST['old_image']);}
                     }else{
                        $image=$_REQUEST['old_image'];
                   }
     
        
            $bannerdata=Banner::where('id',1)->update(
                [
                    
                    'image'=>$image
                    
    
                ]
            );
            return redirect()->route('manage-header-banner')->with('success','LoBannergo Changed successfully.');
        }
   
        
        public function subadmin_list(){
            $admin=Admin::get();
            if(session()->has('user_id')){
                return view('admin.subadmin_list')->with(compact('admin'));
            
            }else{
                return redirect()->route('login')->with('error','Login first.'); 
            }
           } 


     public function add_subadmin(Request $data){
            $menu_id=$data->menu_id;
              $email=$data->email;
              $name=$data->name;
              $mobile=$data->mobile;
              $pass=$data->password;
              $permission=implode(',',$data->permission);
              $password=Hash::make($pass);
       
          $chk=Admin::where(['email'=>$email,'mobile'=>$mobile])->exists();
          if($chk){
              return redirect()->route('subadmin-list')->with('error','Email OR Mobile  already exist.');
          }else{
              $subadmin=Admin::insert(
                  [
                      'name'=>$name,
                      'email'=>$email,
                      'mobile'=>$mobile,
                      'permission'=>$permission,
                      'password'=>$password,
                  ]
              );
              return redirect()->route('subadmin-list')->with('success','Subadmin created successfully.');
          }
            }

            public function update_subadmin(Request $data){
               
            $id=$data->user_id;
             $name=$data->name;
             $email=$data->email;
             $mobile=$data->mobile;
             $permission=implode(',',$data->permission);

            
             if($data->password==''){
                $password=$data->old_password;
             }else{
                $password=Hash::make($data->password);
             }
             

                
             
                
                    $subadmin=Admin::where('id',$id)->update(
                        [
                            
                            'name'=>$name,
                            'email'=>$email,
                            'mobile'=>$mobile,
                            'permission'=>$permission,
                            'password'=>$password
                            
            
                        ]
                    );

                   
                    return redirect()->route('subadmin-list')->with('success','Subadmin User Details  Updated successfully.');
 }

 public function edit_subadmin(Request $data){
    $admin=Admin::get();
    if(session()->has('user_id')){
        $id=$data->id;
        $user=Admin::where('id',$id)->first();
        return view('admin.edit_subadmin')->with(compact('user'));
    
    }else{
        return redirect()->route('login')->with('error','Login first.'); 
    }
 }

public function delete_subadmin(Request $data){
        $id=$data->id;
        $del=Admin::where('id',$id)->delete();
}


public function manage_ads(){
     $ads=Ads::get();
     $categories = Category::get();
     return view('admin.ads_list')->with(compact(['ads','categories']));
 }


 public function add_ads(Request $data){
    $ads_type=$data->ads_type;
      $url=$data->url;
      $google_script=$data->google_script;
      $position=$data->position;
      if($data->has('category_id')) {
        $category_id = $data->category_id;
      }else {
        $category_id = NULL;
      }

      if(is_uploaded_file($_FILES['image']['tmp_name'])){
        $image=rand(0,9999).$_FILES['image']['name'];
        @move_uploaded_file($_FILES['image']['tmp_name'],'uploads/ads/'.$image);
    }else{
        $image="";
    }
      $ads=Ads::insert(
          [
              'ads_type'=>$ads_type,
              'url'=>$url,
              'google_script'=>$google_script,
              'position'=>$position,
              'image'=>$image,
              'position_id' => $category_id
          ]
      );
      return redirect()->route('manage-ads')->with('success','Advertisement added successfully.');
  }

public function update_ads(Request $data){
             $id=$data->ads_id;
             $ads_type=$data->ads_type;
             $url=$data->url;
             $google_script=$data->google_script;
        $position=$data->position;
             if(is_uploaded_file($_FILES['image']['tmp_name']))
             {
                   $image=rand(0,9999).$_FILES['image']['name'];
                 move_uploaded_file($_FILES['image']['tmp_name'],'uploads/ads/'.$image);
                 if(is_file('uploads/ads/'.$_REQUEST['old_image'])){ unlink('uploads/ads/'.$_REQUEST['old_image']);}
                  }else{
                     $image=$_REQUEST['old_image'];
                }
                $ads=Ads::where('id',$id)->update(
                        [
                            
                            'ads_type'=>$ads_type,
                            'url'=>$url,
                            'google_script'=>$google_script,
                            'position'=>$position,
                            'image'=>$image
                            
            
                        ]
                    );
                    return redirect()->route('manage-ads')->with('success','Ads Details  Updated successfully.');
}

public function deleteAd(Request $request) {
    $id = \Crypt::decrypt($request->id);
    Ads::where('id',$id)->delete();
    return redirect()->back()
    ->with('success','Ad Deleted');
}

public function delete_menu_category(Request $data){
    $id=$data->id;
     $del=MenuCategories::where('id',$id)->delete(); 
    
}

public function homePageBuilder(){
    if(session()->has('user_id')) {
        return view('admin.homePageBuilder');
    }else {
        return redirect('admin')
        ->with('error','Please login first');
    }
}


public function edit_page(Request $data){
    $admin=Admin::get();
    if(session()->has('user_id')){
        $id=$data->id;

        $page = Pages::where('id', $id)->first();
       
        return view('admin.edit_page')->with(compact('page'));
    
    }else{
        return redirect()->route('login')->with('error','Login first.'); 
    }
 }



 public function manage_about_us(Request $value){

    $id=$value->id;
    $menu_id=array($value->id);
    $menu_title=array($value->title);
   
   $about_list=About::get();
    
    return view('admin.manage_about_us')->with(compact(['about_list']));
  }

  public function add_about(Request $data){
    $title=$data->title;
    $content=$data->content;
 
    $chk=About::where('title',$title)->exists();
    if($chk){
        return redirect()->route('manage-about-us')->with('error','Title already exist.');
    }else{

        if(is_uploaded_file($_FILES['image']['tmp_name'])){
            $image=rand(0,9999).$_FILES['image']['name'];
            @move_uploaded_file($_FILES['image']['tmp_name'],'uploads/about/'.$image);
        }else{
            $image="";
        }

        $about=About::insert(
            [
                'title'=>$title,
                'image'=>$image,
                'content'=>$content
            ]
        );
        return redirect()->route('manage-about-us')->with('success','About Us added successfully.');
    }
}

public function delete_about(Request $data){

    $id=$data->id;
    $del=About::where('id',$id)->delete();
    
}

public function manage_contact_us(Request $value){

    return view('admin.contact_us');
  }

  public function update_contact(Request $data){
     
    $id=1;
    $contact_1=$data->contact_1;
    $contact_2=$data->contact_2;
    $address=$data->address;
 

 $contact=Contact::where('id',$id)->update(['contact_1'=>$contact_1,'contact_2'=>$contact_2,'address'=>$address]);
   return redirect()->route('manage-contact-us')->with('success',' updated successfully.');
    
}

}


