<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
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

    public function deleteTemplate(Request $request) {
        $id = $request->id;
        Page::where('id',$id)->delete();
        return redirect()->back()
        ->with('success','Deleted');
    }

    public function moveUpTemplate(Request $request) {
        $id = $request->template_id;
        $template = Page::where('id',$id)->first();
        $template_order = $template->section_order;
        $prevTemplateExists = Page::where('section_order','<',$template_order)->exists();
        if($prevTemplateExists) {
            $prevTemplate = Page::where('section_order','<',$template_order)->orderBy('id','DESC')->first();
            $prev_template_id = $prevTemplate->id;
            $updated_template_order = $prevTemplate->section_order;
            Page::where('id',$id)->update(
                [
                    'section_order' => $updated_template_order
                ]
            );
            Page::where('id',$prev_template_id)->update(
                [
                    'section_order' => $template_order
                ]
            );
        }
        return redirect()->back()
        ->with('success','Template moved');
    }

    public function moveDownTemplate(Request $request) {
        $id = $request->template_id;
        $template = Page::where('id',$id)->first();
        $template_order = $template->section_order;
        $nextTemplateExists = Page::where('section_order','>',$template_order)->exists();
        if($nextTemplateExists) {
            $nextTemplate = Page::where('section_order','>',$template_order)->orderBy('id','ASC')->first();
            $next_template_id = $nextTemplate->id;
            $updated_template_order = $nextTemplate->section_order;
            Page::where('id',$id)->update(
                [
                    'section_order' => $updated_template_order
                ]
            );
            Page::where('id',$next_template_id)->update(
                [
                    'section_order' => $template_order
                ]
            );
        }
        return redirect()->back()
        ->with('success','Template moved');
    }
=======

class PageController extends Controller
{
    //
>>>>>>> 2a4fc60453b403165973040213c2c634ec5ad5db
}
