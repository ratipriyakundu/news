<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reel;

class ReelController extends Controller
{
    public function reels() {
        $reels = Reel::get();
        return view('reels',compact('reels'));
    }

    public function allReel() {
        if(session()->has('user_id')) {
            $reels = Reel::get();
            return view('admin.all-reel')
            ->with(compact('reels'));
        }else {
            return redirect()->route('admin')
            ->with('error','Login First');
        }
    }

    public function addReel(){
        if(session()->has('user_id')) {
            return view('admin.add-reel');
        }else {
            return redirect()->route('admin')
            ->with('error','Login First');
        }
    }

    public function addReelStore(Request $request){
        if(session()->has('user_id')) {
            $videoFile = $request->file('video');
            $fileName = time().$videoFile->getClientOriginalName();
            $video = $videoFile->move('reel',$fileName);
            Reel::insert(
                [
                    'video' => $video
                ]
            );
            return redirect()->route('all-reel')
            ->with('success','Reel added');
        }else {
            return redirect()->route('admin')
            ->with('error','Login First');
        }
    }


    public function deleteReel(Request $request){
        $id = \Crypt::decrypt($request->id);
        Reel::where('id',$id)->delete();
        return redirect()->back()
        ->with('success','Reel Deleted');
    }
}
