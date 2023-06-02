<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribute;

class AttributeController extends Controller
{
    public function editTemplate(Request $request) {
        $template_id = $request->id;
        if($request->has('template-1-edit-btn')) {
            if($request->has('banner')) {
                $name = 'custom_banner';
                $imageFile = $request->file('banner');
                $imageName = time().$imageFile->getClientOriginalName();
                $value = $imageFile->move('img/ad',$imageName);
                Attribute::updateOrCreate(
                    [
                        'template_id' => $template_id
                    ],
                    [
                        'template_id' => $template_id,
                        'name' => $name,
                        'value' => $value
                    ]
                );
            }else {
                $name = 'default_banner';
                $value = 'img/ad/image-banner.webp';
                Attribute::updateOrCreate(
                    [
                        'template_id' => $template_id
                    ],
                    [
                        'template_id' => $template_id,
                        'name' => $name,
                        'value' => $value
                    ]
                );
            }
        }
        if($request->has('template-2-edit-btn')) {
            if($request->has('ad_code') && $request->ad_code != '') {
                $name = 'custom_ad_code';
                $value = $request->ad_code;
                Attribute::updateOrCreate(
                    [
                        'template_id' => $template_id
                    ],
                    [
                        'template_id' => $template_id,
                        'name' => $name,
                        'value' => $value
                    ]
                );
            }else {
                $name = 'default_ad_code';
                $value = '1';
                Attribute::updateOrCreate(
                    [
                        'template_id' => $template_id
                    ],
                    [
                        'template_id' => $template_id,
                        'name' => $name,
                        'value' => $value
                    ]
                );
            }
        }
        return redirect()->route('home')
        ->with('success','Template Updated');
    }
}
