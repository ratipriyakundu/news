<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function insertTemplate(Request $request) {
        $page_name = $request->page_name;
        $section_code = $request->section_code;
        $sectionExists = Page::where('page_name',$page_name)->exists();
        if($sectionExists) {
            $section = Page::where('page_name',$page_name)
            ->select('id','section_order')
            ->orderBy('id','DESC')
            ->first();
            $section_order = $section->section_order + 1;
        }else {
            $section_order = 0;
        }
        $new_section = Page::updateOrCreate(
            [
                'page_name' => $page_name,
                'section_order' => $section_order,
            ],
            [
                'page_name' => $page_name,
                'section_order' => $section_order,
                'section_code' => $section_code
            ]
        );
        return redirect()->back()
        ->with('success','Template inserted');
    }
}
