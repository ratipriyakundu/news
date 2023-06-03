@php
    $categories = \App\Models\Category::get();
@endphp
@php
    $template_7_left_category_exists = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_7_left_category'
        ]
    )->exists();
    if($template_7_left_category_exists) {
        $template_7_left_category = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_7_left_category'
        ]
    )->first();
        $template_7_left_category_id = $template_7_left_category->value;
        $template_7_left_category_data = \App\Models\Category::where('id',$template_7_left_category_id)->first();
        $template_7_left_category_name = $template_7_left_category_data->title;
        $template_7_left_category_query = \App\Models\News::whereRaw('FIND_IN_SET("'.$template_7_left_category->value.'",category)');
    }else {
        $template_7_left_category_data = \App\Models\Category::first();
        $template_7_left_category_name = $template_7_left_category_data->title;
        $template_7_left_category_id = $template_7_left_category_data->id;
        $template_7_left_category_query = \App\Models\News::whereRaw('FIND_IN_SET("'.$template_7_left_category_id.'",category)');
    }
@endphp
@php
    $template_7_right_category_exists = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_7_right_category'
        ]
    )->exists();
    if($template_7_right_category_exists) {
        $template_7_right_category = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_7_right_category'
        ]
    )->first();
        $template_7_right_category_id = $template_7_right_category->value;
        $template_7_right_category_data = \App\Models\Category::where('id',$template_7_right_category_id)->first();
        $template_7_right_category_name = $template_7_right_category_data->title;
        $template_7_right_category_query = \App\Models\News::whereRaw('FIND_IN_SET("'.$template_7_right_category->value.'",category)');
    }else {
        $template_7_right_category_data = \App\Models\Category::first();
        $template_7_right_category_name = $template_7_right_category_data->title;
        $template_7_right_category_id = $template_7_right_category_data->id;
        $template_7_right_category_query = \App\Models\News::whereRaw('FIND_IN_SET("'.$template_7_right_category_id.'",category)');
    }
@endphp
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-9">
            <div class="d-flex justify-content-between py-3">
                <div>
                    <p class="h5 fw-bold mb-4">
                        <span class="red-bullet"></span>
                        <span class="d-inline">{{$template_7_left_category_name}}</span>
                    </p>
                </div>
                <div>
                    <a href="{{route('news-categories')}}?category_id={{$template_7_left_category_id}}" class="h5 fw-bold mb-4 text-danger">
                        <span class="d-inline">
                            और पढ़ें
                            <i class="bi bi-caret-right-fill"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div style="position:relative;">
                        <img src="img/placeholder.webp" style="width:100%;height:270px;object-fit:cover;opacity:0.5;">
                        <p class="fw-bold h5 text-light" style="position:absolute;bottom:0px;padding:10px;">
                            लोरेम इप्सम प्रिंटिंग और टाइपसेटिंग उद्योग का केवल डमी टेक्स्ट है...
                        </p>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <img src="img/placeholder.webp" style="width:100%;height:100px;object-fit:cover;">
                        </div>
                        <div class="col-md-7">
                            <p class="fw-bold h5">
                                लोरेम इप्सम प्रिंटिंग और टाइपसेटिंग उद्योग का केवल डमी टेक्स्ट है...
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <img src="img/placeholder.webp" style="width:100%;height:100px;object-fit:cover;">
                        </div>
                        <div class="col-md-7">
                            <p class="fw-bold h5">
                                लोरेम इप्सम प्रिंटिंग और टाइपसेटिंग उद्योग का केवल डमी टेक्स्ट है...
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <img src="img/placeholder.webp" style="width:100%;height:100px;object-fit:cover;">
                        </div>
                        <div class="col-md-7">
                            <p class="fw-bold h5">
                                लोरेम इप्सम प्रिंटिंग और टाइपसेटिंग उद्योग का केवल डमी टेक्स्ट है...
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <img src="img/placeholder.webp" style="width:100%;height:100px;object-fit:cover;">
                        </div>
                        <div class="col-md-7">
                            <p class="fw-bold h5">
                                लोरेम इप्सम प्रिंटिंग और टाइपसेटिंग उद्योग का केवल डमी टेक्स्ट है...
                            </p>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-flex justify-content-between py-3">
                <div>
                    <p class="h5 fw-bold mb-4">
                        <span class="red-bullet"></span>
                        <span class="d-inline">{{$template_7_right_category_name}}</span>
                    </p>
                </div>
                <div>
                    <a href="{{route('news-categories')}}?category_id={{$template_7_right_category_id}}" class="h5 fw-bold mb-4 text-danger text-decoration-none">
                        <span class="d-inline">
                            और पढ़ें
                            <i class="bi bi-caret-right-fill"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div style="position:relative;">
                <img src="img/placeholder.webp" style="width:100%;height:200px;object-fit:cover;opacity:0.5;">
                <p class="fw-bold h5 text-light" style="position:absolute;bottom:0px;padding:10px;">
                    लोरेम इप्सम प्रिंटिंग और टाइपसेटिंग उद्योग का केवल डमी टेक्स्ट है...
                </p>
            </div>
            <hr>
            <div class="row mt-3">
                <div class="col-md-5">
                    <img src="img/placeholder.webp" style="width:100%;height:70px;object-fit:cover;">
                </div>
                <div class="col-md-7">
                    <p>
                        लोरेम इप्सम प्रिंटिंग और टाइपसेटिंग उद्योग का केवल डमी टेक्स्ट है...
                    </p>
                </div>
            </div>
            <hr>
            <div class="row mt-3">
                <div class="col-md-5">
                    <img src="img/placeholder.webp" style="width:100%;height:70px;object-fit:cover;">
                </div>
                <div class="col-md-7">
                    <p>
                        लोरेम इप्सम प्रिंटिंग और टाइपसेटिंग उद्योग का केवल डमी टेक्स्ट है...
                    </p>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>