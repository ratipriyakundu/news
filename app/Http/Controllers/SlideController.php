<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;

class SlideController extends Controller
{
    public function addSlide(Request $request){
        if(session()->has('user_id')) {
            $slides = Slide::where('story_id',\Crypt::decrypt($request->id))->get();
            return view('admin.add-slide',compact('slides'));
        }else {
            return redirect()->route('admin')
            ->with('error','Login First');
        }
    }

    public function addSlideStore(Request $request) {
        $story_id = $request->story_id;
        $title = $request->title;
        $imageFile = $request->file('image');
        $fileName = time().$imageFile->getClientOriginalName();
        $image = $imageFile->move('slide',$fileName);
        Slide::insert(
            [
                'story_id' => $story_id,
                'title' => $title,
                'image' => $image
            ]
        );
        return back()->with('success','Slide Added');
    }
}
