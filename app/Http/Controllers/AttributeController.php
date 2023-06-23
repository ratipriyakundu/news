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
        if($request->has('template-3-edit-btn')) {
            if($request->has('template_3_left_category') && $request->template_3_left_category != '') {
                $left_name = 'template_3_left_category';
                $left_value = $request->template_3_left_category;
                if($left_value != 0) {
                    Attribute::updateOrCreate(
                        [
                            'template_id' => $template_id,
                            'name' => $left_name
                        ],
                        [
                            'template_id' => $template_id,
                            'name' => $left_name,
                            'value' => $left_value
                        ]
                    );
                }
                if($left_value == 0) {
                    Attribute::where(
                        [
                            'template_id' => $template_id,
                            'name' => $left_name,
                        ]
                    )->delete();
                }
            }
            if($request->has('template_3_right_category') && $request->template_3_right_category != '') {
                $right_name = 'template_3_right_category';
                $right_value = $request->template_3_right_category;
                if($right_value != 0) {
                    Attribute::updateOrCreate(
                        [
                            'template_id' => $template_id,
                            'name' => $right_name
                        ],
                        [
                            'template_id' => $template_id,
                            'name' => $right_name,
                            'value' => $right_value
                        ]
                    );
                }
                if($right_value == 0) {
                    Attribute::where(
                        [
                            'template_id' => $template_id,
                            'name' => $right_name,
                        ]
                    )->delete();
                }
            }
        }
        if($request->has('template-4-edit-btn')) {
            if($request->has('template_4_left_category') && $request->template_4_left_category != '') {
                $left_name = 'template_4_left_category';
                $left_value = $request->template_4_left_category;
                if($left_value != 0) {
                    Attribute::updateOrCreate(
                        [
                            'template_id' => $template_id,
                            'name' => $left_name
                        ],
                        [
                            'template_id' => $template_id,
                            'name' => $left_name,
                            'value' => $left_value
                        ]
                    );
                }
                if($left_value == 0) {
                    Attribute::where(
                        [
                            'template_id' => $template_id,
                            'name' => $left_name,
                        ]
                    )->delete();
                }
            }
            if($request->has('template_4_right_category') && $request->template_4_right_category != '') {
                $right_name = 'template_4_right_category';
                $right_value = $request->template_4_right_category;
                if($right_value != 0) {
                    Attribute::updateOrCreate(
                        [
                            'template_id' => $template_id,
                            'name' => $right_name
                        ],
                        [
                            'template_id' => $template_id,
                            'name' => $right_name,
                            'value' => $right_value
                        ]
                    );
                }
                if($right_value == 0) {
                    Attribute::where(
                        [
                            'template_id' => $template_id,
                            'name' => $right_name,
                        ]
                    )->delete();
                }
            }
        }
        if($request->has('template-5-edit-btn')) {
            if($request->has('template_5_category') && $request->template_5_category != '') {
                $name = 'template_5_category';
                $value = $request->template_5_category;
                if($value != 0) {
                    Attribute::updateOrCreate(
                        [
                            'template_id' => $template_id,
                            'name' => $name
                        ],
                        [
                            'template_id' => $template_id,
                            'name' => $name,
                            'value' => $value
                        ]
                    );
                }
                if($value == 0) {
                    Attribute::where(
                        [
                            'template_id' => $template_id,
                            'name' => $name,
                        ]
                    )->delete();
                }
            }
        }
        if($request->has('template-6-edit-btn')) {
            if($request->has('template_6_category') && $request->template_6_category != '') {
                $category_name = 'template_6_category';
                $category_value = $request->template_6_category;
                if($category_value != 0) {
                    Attribute::updateOrCreate(
                        [
                            'template_id' => $template_id,
                            'name' => $category_name
                        ],
                        [
                            'template_id' => $template_id,
                            'name' => $category_name,
                            'value' => $category_value
                        ]
                    );
                }
                if($category_value == 0) {
                    Attribute::where(
                        [
                            'template_id' => $template_id,
                            'name' => $category_name,
                        ]
                    )->delete();
                }
            }
            if($request->has('template_6_ad_code') && $request->template_6_ad_code != '') {
                $code_name = 'template_6_ad_code';
                $code_value = $request->template_6_ad_code;
                Attribute::updateOrCreate(
                    [
                        'template_id' => $template_id,
                        'name' => $code_value,
                    ],
                    [
                        'template_id' => $template_id,
                        'name' => $code_name,
                        'value' => $code_value
                    ]
                );
            }else {
                $code_name = 'template_6_ad_code';
                $code_value = '1';
                Attribute::where(
                    [
                        'template_id' => $template_id,
                        'name' => $code_name,
                    ]
                )->delete();
            }
        }
        if($request->has('template-7-edit-btn')) {
            if($request->has('template_7_left_category') && $request->template_7_left_category != '') {
                $left_name = 'template_7_left_category';
                $left_value = $request->template_7_left_category;
                if($left_value != 0) {
                    Attribute::updateOrCreate(
                        [
                            'template_id' => $template_id,
                            'name' => $left_name
                        ],
                        [
                            'template_id' => $template_id,
                            'name' => $left_name,
                            'value' => $left_value
                        ]
                    );
                }
                if($left_value == 0) {
                    Attribute::where(
                        [
                            'template_id' => $template_id,
                            'name' => $left_name,
                        ]
                    )->delete();
                }
            }
            if($request->has('template_7_right_category') && $request->template_7_right_category != '') {
                $right_name = 'template_7_right_category';
                $right_value = $request->template_7_right_category;
                if($right_value != 0) {
                    Attribute::updateOrCreate(
                        [
                            'template_id' => $template_id,
                            'name' => $right_name
                        ],
                        [
                            'template_id' => $template_id,
                            'name' => $right_name,
                            'value' => $right_value
                        ]
                    );
                }
                if($right_value == 0) {
                    Attribute::where(
                        [
                            'template_id' => $template_id,
                            'name' => $right_name,
                        ]
                    )->delete();
                }
            }
        }
        if($request->has('template-8-edit-btn')) {
            if($request->has('template_8_left_category') && $request->template_8_left_category != '') {
                $left_name = 'template_8_left_category';
                $left_value = $request->template_8_left_category;
                if($left_value != 0) {
                    Attribute::updateOrCreate(
                        [
                            'template_id' => $template_id,
                            'name' => $left_name
                        ],
                        [
                            'template_id' => $template_id,
                            'name' => $left_name,
                            'value' => $left_value
                        ]
                    );
                }
                if($left_value == 0) {
                    Attribute::where(
                        [
                            'template_id' => $template_id,
                            'name' => $left_name,
                        ]
                    )->delete();
                }
            }
            if($request->has('template_8_right_category') && $request->template_8_right_category != '') {
                $right_name = 'template_8_right_category';
                $right_value = $request->template_8_right_category;
                if($right_value != 0) {
                    Attribute::updateOrCreate(
                        [
                            'template_id' => $template_id,
                            'name' => $right_name
                        ],
                        [
                            'template_id' => $template_id,
                            'name' => $right_name,
                            'value' => $right_value
                        ]
                    );
                }
                if($right_value == 0) {
                    Attribute::where(
                        [
                            'template_id' => $template_id,
                            'name' => $right_name,
                        ]
                    )->delete();
                }
            }
        }
        if($request->has('template-9-edit-btn')) {
            if($request->has('template_9_category') && $request->template_9_category != '') {
                $category_name = 'template_9_category';
                $category_value = $request->template_9_category;
                if($category_value != 0) {
                    Attribute::updateOrCreate(
                        [
                            'template_id' => $template_id,
                            'name' => $category_name
                        ],
                        [
                            'template_id' => $template_id,
                            'name' => $category_name,
                            'value' => $category_value
                        ]
                    );
                }
                if($category_value == 0) {
                    Attribute::where(
                        [
                            'template_id' => $template_id,
                            'name' => $category_name,
                        ]
                    )->delete();
                }
            }
            if($request->has('template_9_ad_code') && $request->template_9_ad_code != '') {
                $code_name = 'template_9_ad_code';
                $code_value = $request->template_9_ad_code;
                Attribute::updateOrCreate(
                    [
                        'template_id' => $template_id,
                        'name' => $code_value,
                    ],
                    [
                        'template_id' => $template_id,
                        'name' => $code_name,
                        'value' => $code_value
                    ]
                );
            }else {
                $code_name = 'template_9_ad_code';
                $code_value = '1';
                Attribute::where(
                    [
                        'template_id' => $template_id,
                        'name' => $code_name,
                    ]
                )->delete();
            }
        }
        if($request->has('template-10-edit-btn')) {
            if($request->has('template_10_left_category') && $request->template_10_left_category != '') {
                $left_name = 'template_10_left_category';
                $left_value = $request->template_10_left_category;
                if($left_value != 0) {
                    Attribute::updateOrCreate(
                        [
                            'template_id' => $template_id,
                            'name' => $left_name
                        ],
                        [
                            'template_id' => $template_id,
                            'name' => $left_name,
                            'value' => $left_value
                        ]
                    );
                }
                if($left_value == 0) {
                    Attribute::where(
                        [
                            'template_id' => $template_id,
                            'name' => $left_name,
                        ]
                    )->delete();
                }
            }
            if($request->has('template_10_right_category') && $request->template_10_right_category != '') {
                $right_name = 'template_10_right_category';
                $right_value = $request->template_10_right_category;
                if($right_value != 0) {
                    Attribute::updateOrCreate(
                        [
                            'template_id' => $template_id,
                            'name' => $right_name
                        ],
                        [
                            'template_id' => $template_id,
                            'name' => $right_name,
                            'value' => $right_value
                        ]
                    );
                }
                if($right_value == 0) {
                    Attribute::where(
                        [
                            'template_id' => $template_id,
                            'name' => $right_name,
                        ]
                    )->delete();
                }
            }
        }
        if($request->has('template-11-edit-btn')) {
            if($request->has('template_11_category') && $request->template_11_category != '') {
                $category_name = 'template_11_category';
                $category_value = $request->template_11_category;
                if($category_value != 0) {
                    Attribute::updateOrCreate(
                        [
                            'template_id' => $template_id,
                            'name' => $category_name
                        ],
                        [
                            'template_id' => $template_id,
                            'name' => $category_name,
                            'value' => $category_value
                        ]
                    );
                }
                if($category_value == 0) {
                    Attribute::where(
                        [
                            'template_id' => $template_id,
                            'name' => $category_name,
                        ]
                    )->delete();
                }
            }
            if($request->has('template_11_ad_code') && $request->template_11_ad_code != '') {
                $code_name = 'template_11_ad_code';
                $code_value = $request->template_11_ad_code;
                Attribute::updateOrCreate(
                    [
                        'template_id' => $template_id,
                        'name' => $code_value,
                    ],
                    [
                        'template_id' => $template_id,
                        'name' => $code_name,
                        'value' => $code_value
                    ]
                );
            }else {
                $code_name = 'template_11_ad_code';
                $code_value = '1';
                Attribute::where(
                    [
                        'template_id' => $template_id,
                        'name' => $code_name,
                    ]
                )->delete();
            }
        }
        if($request->has('template-12-edit-btn')) {
            if($request->has('template_12_category') && $request->template_12_category != '') {
                $category_name = 'template_12_category';
                $category_value = $request->template_12_category;
                if($category_value != 0) {
                    Attribute::updateOrCreate(
                        [
                            'template_id' => $template_id,
                            'name' => $category_name
                        ],
                        [
                            'template_id' => $template_id,
                            'name' => $category_name,
                            'value' => $category_value
                        ]
                    );
                }
                if($category_value == 0) {
                    Attribute::where(
                        [
                            'template_id' => $template_id,
                            'name' => $category_name,
                        ]
                    )->delete();
                }
            }
        }
        if($request->has('template-13-edit-btn')) {
            if($request->has('template_13_category') && $request->template_13_category != '') {
                $category_name = 'template_13_category';
                $category_value = $request->template_13_category;
                if($category_value != 0) {
                    Attribute::updateOrCreate(
                        [
                            'template_id' => $template_id,
                            'name' => $category_name
                        ],
                        [
                            'template_id' => $template_id,
                            'name' => $category_name,
                            'value' => $category_value
                        ]
                    );
                }
                if($category_value == 0) {
                    Attribute::where(
                        [
                            'template_id' => $template_id,
                            'name' => $category_name,
                        ]
                    )->delete();
                }
            }
        }
        if($request->has('template-3-style-save')) {
            $template_3_background_color = $request->template_3_background_color;
            $template_3_heading_color = $request->template_3_heading_color;
            $template_3_title_color = $request->template_3_title_color;
            $template_3_text_color = $request->template_3_text_color;
            Attribute::updateOrCreate(
                [
                    'template_id' => $template_id,
                    'name' => 'template_3_background_color'
                ],
                [
                    'template_id' => $template_id,
                    'name' => 'template_3_background_color',
                    'value' => $template_3_background_color
                ]
            );
            Attribute::updateOrCreate(
                [
                    'template_id' => $template_id,
                    'name' => 'template_3_heading_color'
                ],
                [
                    'template_id' => $template_id,
                    'name' => 'template_3_heading_color',
                    'value' => $template_3_heading_color
                ]
            );
            Attribute::updateOrCreate(
                [
                    'template_id' => $template_id,
                    'name' => 'template_3_title_color'
                ],
                [
                    'template_id' => $template_id,
                    'name' => 'template_3_title_color',
                    'value' => $template_3_title_color
                ]
            );
            Attribute::updateOrCreate(
                [
                    'template_id' => $template_id,
                    'name' => 'template_3_text_color'
                ],
                [
                    'template_id' => $template_id,
                    'name' => 'template_3_text_color',
                    'value' => $template_3_text_color
                ]
            );
        }
        if($request->has('template-3-style-reset')) {
            Attribute::where(
                [
                    'template_id' => $template_id,
                    'name' => 'template_3_background_color'
                ]
            )->delete();
            Attribute::where(
                [
                    'template_id' => $template_id,
                    'name' => 'template_3_heading_color'
                ]
            )->delete();
            Attribute::where(
                [
                    'template_id' => $template_id,
                    'name' => 'template_3_title_color'
                ]
            )->delete();
            Attribute::where(
                [
                    'template_id' => $template_id,
                    'name' => 'template_3_text_color'
                ]
            )->delete();
        }
        return redirect()->route('home')
        ->with('success','Template Updated');
    }
}
