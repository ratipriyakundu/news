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

    public function editStoreSlide(Request $request) {
        $id = $request->id;
        $title = $request->title;
        Slide::where('id',$id)->update(
            [
                'title' => $title
            ]
        );
        if($request->has('slide')) {
            $imageFile = $request->file('slide');
            $fileName = time().$imageFile->getClientOriginalName();
            $image = $imageFile->move('slide',$fileName);
            Slide::where('id',$id)->update(
                [
                    'image' => $image
                ]
            );
        }
        return redirect()->back()
        ->with('success','Slide Updated');
    }

    public function deleteSlide(Request $request) {
        $id = $request->id;
        Slide::where('id',$id)->delete();
        return redirect()->back()
        ->with('success','Slide Deleted');
    }
}
