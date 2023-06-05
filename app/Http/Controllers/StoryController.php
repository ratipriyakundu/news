<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;

class StoryController extends Controller
{
    public function stories(Request $request) {
        return view('stories');
    }

    public function story(Request $request) {
        return view('story');
    }
}
