<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Style;

class StyleController extends Controller
{
    public function styles() {
        if(session()->has('user_id')){
            return view('admin.styles');
        }else{
            return redirect()->route('admin')
            ->with('error','Login first');
        }
    }

    public function addHeaderStyle(Request $request) {
        if($request->has('header_style_save')) {
            if($request->has('header_primary_color')) {
                $header_primary_color = $request->header_primary_color;
                Style::updateOrCreate(
                    [
                        'property' => 'header_primary_color'
                    ],
                    [
                        'property' => 'header_primary_color',
                        'value' => $header_primary_color
                    ]
                );
            }
            if($request->has('header_primary_text_color')) {
                $header_primary_text_color = $request->header_primary_text_color;
                Style::updateOrCreate(
                    [
                        'property' => 'header_primary_text_color'
                    ],
                    [
                        'property' => 'header_primary_text_color',
                        'value' => $header_primary_text_color
                    ]
                );
            }
            if($request->has('header_text_color')) {
                $header_text_color = $request->header_text_color;
                Style::updateOrCreate(
                    [
                        'property' => 'header_text_color'
                    ],
                    [
                        'property' => 'header_text_color',
                        'value' => $header_text_color
                    ]
                );
            }
            return redirect()->route('styles')
            ->with('success','Style Added');
        }
        if($request->has('header_style_reset')) {
            Style::where('property','header_primary_color')
            ->orWhere('property','header_primary_text_color')
            ->orWhere('property','header_text_color')
            ->delete();
            return redirect()->route('styles')
            ->with('success','Style Reset');
        }
    }
}
