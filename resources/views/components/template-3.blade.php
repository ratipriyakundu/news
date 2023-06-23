@php
    $template_3_background_color_exists = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_3_background_color'
        ]
    )->exists();
    if($template_3_background_color_exists) {
        $template_3_background_color = \App\Models\Attribute::where(
            [
                'template_id' => $id,
                'name' => 'template_3_background_color'
            ]
        )->first();
        $template_3_background_color = $template_3_background_color->value;
    }else {
        $template_3_background_color = '#FFFFFF';
    }
    $template_3_heading_color_exists = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_3_heading_color'
        ]
    )->exists();
    if($template_3_heading_color_exists) {
        $template_3_heading_color = \App\Models\Attribute::where(
            [
                'template_id' => $id,
                'name' => 'template_3_heading_color'
            ]
        )->first();
        $template_3_heading_color = $template_3_heading_color->value;
    }else {
        $template_3_heading_color = '#000000';
    }
    $template_3_title_color_exists = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_3_title_color'
        ]
    )->exists();
    if($template_3_title_color_exists) {
        $template_3_title_color = \App\Models\Attribute::where(
            [
                'template_id' => $id,
                'name' => 'template_3_title_color'
            ]
        )->first();
        $template_3_title_color = $template_3_title_color->value;
    }else {
        $template_3_title_color = '#000000';
    }
    $template_3_text_color_exists = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_3_text_color'
        ]
    )->exists();
    if($template_3_text_color_exists) {
        $template_3_text_color = \App\Models\Attribute::where(
            [
                'template_id' => $id,
                'name' => 'template_3_text_color'
            ]
        )->first();
        $template_3_text_color = $template_3_text_color->value;
    }else {
        $template_3_text_color = '#ffffff';
    }
@endphp
@php
    $categories = \App\Models\Category::get();
@endphp
@php
    $template_3_left_category_exists = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_3_left_category'
        ]
    )->exists();
    if($template_3_left_category_exists) {
        $template_3_left_category = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_3_left_category'
        ]
    )->first();
        $template_3_left_category_id = $template_3_left_category->value;
        $template_3_left_category_query = \App\Models\News::whereRaw('FIND_IN_SET("'.$template_3_left_category->value.'",category)');
    }else {
        $template_3_left_category_id = 0;
        $template_3_left_category_query = \App\Models\News::where('latest_news','1');
    }
@endphp
@php
    $template_3_right_category_exists = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_3_right_category'
        ]
    )->exists();
    if($template_3_right_category_exists) {
        $template_3_right_category = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_3_right_category'
        ]
    )->first();
        $template_3_right_category_id = $template_3_right_category->value;
        $template_3_right_category_query = \App\Models\News::whereRaw('FIND_IN_SET("'.$template_3_right_category->value.'",category)');
    }else {
        $template_3_right_category_id = 0;
        $template_3_right_category_query = \App\Models\News::where('popular','1');
    }
@endphp
<style>
    .section-3-carousal {
        padding: 10px;
    }
    .section-3-carousal .item {
        border-radius: 10px;
        border: 1px solid white;
        height: 250px;
        width: 100%;
        object-fit: cover;
        position: relative;
    }
    .section-3-carousal .slider-heading {
        position: absolute;
        bottom: 0px;
        padding: 10px;
    }
    .owl-dots {
        display: none;
    }
</style>
<div class="container-fluid mt-3" style="background-color:{{$template_3_background_color}};">
    <div class="row">
        <div class="col-md-4 p-2">
            @php
                $latestLargest = $template_3_left_category_query
                ->orderBy('id','DESC')
                ->first();
            @endphp
            <a class="text-decoration-none" href="news-details?news_id={{$latestLargest->id}}">
                <p class="h3 fw-bold" style="color:{{$template_3_title_color}};">
                    {{\Str::limit($latestLargest->title,60)}}
                </p>
                <img src="uploads/news/{{$latestLargest->image}}" style="width:100%; height: 270px; object-fit:cover;">
                {{-- <p class="mt-2">
                    {!! \Str::limit(html_entity_decode($latestLargest->description),236) !!}
                </p> --}}
            </a>
            @php
                $latestLarger = $template_3_left_category_query
                ->orderBy('id','DESC')->skip(1)->first();
            @endphp
            <a class="text-decoration-none" href="news-details?news_id={{$latestLarger->id}}">
                <p class="h4 fw-bold mt-4" style="color:{{$template_3_title_color}};">
                    {{\Str::limit($latestLarger->title,68)}}
                </p>
                <div class="row">
                    <div class="col-md-4">
                        <img src="uploads/news/{{$latestLarger->image}}" style="width:100%;height:80px; object-fit:cover;">
                    </div>
                    <div class="col-md-8" style="color:{{$template_3_title_color}};">
                        {{ \Str::limit($latestLarger->title,136) }}
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 py-4">
            @php
                $latests = $template_3_left_category_query
                ->orderBy('id','DESC')->skip(2)->take(6)->get();
            @endphp
            @foreach($latests as $latest)
                <a class="text-decoration-none" href="news-details?news_id={{$latest->id}}">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <img src="uploads/news/{{$latest->image}}" style="width:100%;height:80px; object-fit:cover;">
                        </div>
                        <div class="col-md-8 fw-bold" style="font-size: 18px; color:{{$template_3_title_color}};">
                            {{ \Str::limit($latest->title,81) }}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="col-md-4 py-4">
            <p class="fw-bold h4" style="color:{{$template_3_heading_color}};">लोकप्रिय</p>
            @php
                $popularSlide = $template_3_right_category_query
                ->orderBy('id','DESC')->take(6)->get();
            @endphp
            <div class="owl-carousel-3 owl-carousel owl-theme section-3-carousal">
                @foreach($popularSlide as $popularItem)
                    <a class="text-decoration-none" href="news-details?news_id={{$popularItem->id}}">
                        <div class="item" style="background-image: url('uploads/news/{{$popularItem->image}}');background-position:center center; background-repeat:no-repeat;bacground-size:auto;background-color:rgba(0, 0, 0, 0.5);">
                            <div class="fw-bold slider-heading" style="font-size: 18px; color:{{$template_3_text_color}};">
                                {{ \Str::limit($popularItem->title,48) }}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            @php
                $populars = $template_3_right_category_query
                ->orderBy('id','DESC')->skip(6)->take(3)->get();
            @endphp
            @foreach($populars as $popular)
                <a class="text-decoration-none" href="news-details?news_id={{$popular->id}}">
                    <div class="row my-3">
                        
                            <div class="col-md-4">
                                <img src="uploads/news/{{$popular->image}}" style="width:100%;height:80px; object-fit:cover;">
                            </div>
                            <div class="col-md-8 fw-bold" style="font-size: 18px; color:{{$template_3_title_color}};">
                                {{\Str::limit($latestLarger->title,81)}}
                            </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
{{-- Edit Modal --}}
<div class="modal fade" id="editModal{{$id}}" tabindex="-1" aria-labelledby="editModal{{$id}}Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body text-center p-5">
            <form action="{{route('edit-template')}}" method="POST">
                @csrf
                <input type="hidden" value="{{$id}}" name="id">
                <label for="">Left Section Category</label>
                <select name="template_3_left_category" class="form-control my-3">
                    <option value="">-- Select Preference --</option>
                    <option value="0">Latest News(Recommended)</option>
                    @foreach($categories as $category)
                        <option {{($template_3_left_category_id == $category->id) ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                <label for="">Right Section Category</label>
                <select name="template_3_right_category" class="form-control my-3">
                    <option value="">-- Select Preference --</option>
                    <option value="0">Popular News(Recommended)</option>
                    @foreach($categories as $category)
                        <option {{($template_3_right_category_id == $category->id) ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                <button type="submit" name="template-3-edit-btn" class="custom-button button-red">Save</button>
            </form>
        </div>
      </div>
    </div>
</div>
{{-- End Edit Modal --}}
{{-- Customize Modal --}}
<div class="modal fade" id="customizeModal{{$id}}" tabindex="-1" aria-labelledby="customizeModal{{$id}}Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body text-center p-5">
            <form action="{{route('edit-template')}}" method="POST">
                @csrf
                <input type="hidden" value="{{$id}}" name="id">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Background Color</label>
                        <input type="color" class="form-control mb-3 mt-2" name="template_3_background_color" value="{{$template_3_background_color}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Heading Color</label>
                        <input type="color" class="form-control mb-3 mt-2" name="template_3_heading_color" value="{{$template_3_heading_color}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Title Color</label>
                        <input type="color" class="form-control mb-3 mt-2" name="template_3_title_color" value="{{$template_3_title_color}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Text Color</label>
                        <input type="color" class="form-control mb-3 mt-2" name="template_3_text_color" value="{{$template_3_text_color}}">
                    </div>
                </div>
                <button type="submit" name="template-3-style-save" class="custom-button button-red">Save</button>
                <button type="submit" name="template-3-style-reset" class="custom-button">Reset</button>
            </form>
        </div>
      </div>
    </div>
</div>
{{-- End Customize Modal --}}