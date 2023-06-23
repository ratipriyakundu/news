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

    public function addNavMenuStyle(Request $request) {
        if($request->has('nav_menu_style_save')) {
            if($request->has('menu_background_color')) {
                $menu_background_color = $request->menu_background_color;
                Style::updateOrCreate(
                    [
                        'property' => 'menu_background_color'
                    ],
                    [
                        'property' => 'menu_background_color',
                        'value' => $menu_background_color
                    ]
                );
            }
            if($request->has('menu_text_color')) {
                $menu_text_color = $request->menu_text_color;
                Style::updateOrCreate(
                    [
                        'property' => 'menu_text_color'
                    ],
                    [
                        'property' => 'menu_text_color',
                        'value' => $menu_text_color
                    ]
                );
            }
            if($request->has('menu_item_hover_color')) {
                $menu_item_hover_color = $request->menu_item_hover_color;
                Style::updateOrCreate(
                    [
                        'property' => 'menu_item_hover_color'
                    ],
                    [
                        'property' => 'menu_item_hover_color',
                        'value' => $menu_item_hover_color
                    ]
                );
            }
            return redirect()->route('styles')
            ->with('success','Style Added');
        }
        if($request->has('nav_menu_style_reset')) {
            Style::where('property','menu_background_color')
            ->orWhere('property','menu_text_color')
            ->orWhere('property','menu_item_hover_color')
            ->delete();
            return redirect()->route('styles')
            ->with('success','Style Reset');
        }
    }

    public function addFooterStyle(Request $request) {
        if($request->has('footer_style_save')) {
            if($request->has('footer_background_color')) {
                $footer_background_color = $request->footer_background_color;
                Style::updateOrCreate(
                    [
                        'property' => 'footer_background_color'
                    ],
                    [
                        'property' => 'footer_background_color',
                        'value' => $footer_background_color
                    ]
                );
            }
            if($request->has('footer_text_color')) {
                $footer_text_color = $request->footer_text_color;
                Style::updateOrCreate(
                    [
                        'property' => 'footer_text_color'
                    ],
                    [
                        'property' => 'footer_text_color',
                        'value' => $footer_text_color
                    ]
                );
            }
            return redirect()->route('styles')
            ->with('success','Style Added');
        }
        if($request->has('footer_style_reset')) {
            Style::where('property','footer_background_color')
            ->orWhere('property','footer_text_color')
            ->delete();
            return redirect()->route('styles')
            ->with('success','Style Reset');
        }
    }
}
