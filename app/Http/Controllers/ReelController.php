<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reel;

class ReelController extends Controller
{
    public function reels() {
        return view('reels');
    }
}
