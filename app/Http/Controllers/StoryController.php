<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\Category;
use App\Models\Slide;
use App\Models\Menu;
use App\Models\News;
use App\Models\Page;
use App\Models\Template;
use App\Models\Admin;

class StoryController extends Controller
{
    public function stories(Request $request) {
        $stories = Story::where('status',1)->orderBy('id','DESC')->get();
        $category=Category::get();
        $menucategory=Menu::get();
      //var_dump($Menucategory);
        $news=News::get();
        $page = Page::get();
        $templates = Template::get();
        $homeTemplates = Page::where('page_name','home')
        ->orderBy('section_order','ASC')
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
        return view('stories')
        ->with(compact(['stories','category','news','menucategory','page','hasPermission','breakingNewsList','templates','homeTemplates']));
    }

    public function story(Request $request) {
        $slides = Slide::where('story_id',2)
        ->orderBy('id','DESC')
        ->get();
        return view('story')
        ->with(compact('slides'));
    }

    public function allStory() {
        if(session()->has('user_id')) {
            $allStory = Story::paginate(10);
            $categories = Category::get();
            $stories = [];
            foreach ($allStory as $story) {
                $slide = Slide::where('story_id',$story->id)->count();
                $category = Category::where('id',$story->category)->first();
                $stories[] = [
                    'id' => $story->id,
                    'title' => $story->title,
                    'category_id' => $story->category,
                    'category_name' => $category->title,
                    'slide' => $slide
                ];
            }
            return view('admin.all-story')
            ->with(compact('stories'));
        }else {
            return redirect()->route('admin')
            ->with('error','Login First');
        }
    }

    public function addStory(){
        if(session()->has('user_id')) {
            $categories = Category::get();
            return view('admin.add-story',compact('categories'));
        }else {
            return redirect()->route('admin')
            ->with('error','Login First');
        }
    }

    public function addStoryStore(Request $request) {
        $title = $request->title;
        $category = $request->category;
        Story::updateOrCreate(
            [
                'title' => $title,
                'category' => $category
            ],
            [
                'title' => $title,
                'category' => $category
            ]
        );
        return redirect()->route('all-story')
        ->with('success','Story added');
    }

    public function deleteStory(Request $request){
        $id = \Crypt::decrypt($request->id);
        Story::where('id',$id)->delete();
        return redirect()->back()
        ->with('success','Story Deleted');
    }
    
    public function publishStory(Request $request) {
        $story_id = $request->story_id;
        $slide_count = Slide::where('story_id',$story_id)->count();
        if($slide_count > 0) {
            Story::where('id',$story_id)->update(
                [
                    'status' => 1
                ]
            );
            return redirect()->back()
            ->with('success','Story published');
        }else {
            return redirect()->back()
            ->with('error','Add at least one slide to publish story');
        }
    }
}
