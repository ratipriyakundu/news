<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;

class TemplateController extends Controller
{
    public function templates() {
        if(session()->has('user_id')){
            return view('admin.templates');
        }else{
            return redirect()->route('admin')
            ->with('error','Login first');
        }
    }

    public function addTemplaate(Request $request) {
        $type = $request->type;
        $code = $request->code;
        Template::insert(
            [
                'type' => $type,
                'code' => $code
            ]
        );
        return redirect()->back()
        ->with('success','Template added');
    }
}
