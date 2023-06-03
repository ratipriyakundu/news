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
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-4 p-2">
            @php
                $latestLargest = $template_3_left_category_query
                ->orderBy('id','DESC')
                ->first();
            @endphp
            <a class="text-decoration-none" href="news-details?news_id={{$latestLargest->id}}">
                <p class="h3 fw-bold">
                    {{\Str::limit($latestLargest->title,60)}}
                </p>
                <img src="uploads/news/{{$latestLargest->image}}" style="width:100%; height: 270px; object-fit:cover;">
                <p class="mt-2">
                    {!! \Str::limit(html_entity_decode($latestLargest->description),236) !!}
                </p>
            </a>
            @php
                $latestLarger = $template_3_left_category_query
                ->orderBy('id','DESC')->skip(1)->first();
            @endphp
            <a class="text-decoration-none" href="news-details?news_id={{$latestLarger->id}}">
                <p class="h4 fw-bold mt-4">
                    {{\Str::limit($latestLarger->title,68)}}
                </p>
                <div class="row">
                    <div class="col-md-4">
                        <img src="uploads/news/{{$latestLarger->image}}" style="width:100%;height:80px; object-fit:cover;">
                    </div>
                    <div class="col-md-8">
                        {!! \Str::limit(html_entity_decode($latestLargest->description),136) !!}
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
                        <div class="col-md-8 fw-bold" style="font-size: 18px;">
                            {!! \Str::limit(html_entity_decode($latestLargest->description),81) !!}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="col-md-4 py-4">
            <p class="fw-bold h4">लोकप्रिय</p>
            @php
                $popularSlide = $template_3_right_category_query
                ->orderBy('id','DESC')->take(6)->get();
            @endphp
            <div class="owl-carousel-3 owl-carousel owl-theme section-3-carousal">
                @foreach($popularSlide as $popularItem)
                    <a class="text-decoration-none" href="news-details?news_id={{$popularItem->id}}">
                        <div class="item" style="background-image: url('uploads/news/{{$popularItem->image}}');background-position:center center; background-repeat:no-repeat;bacground-size:auto;background-color:rgba(0, 0, 0, 0.5);">
                            <div class="fw-bold slider-heading text-light" style="font-size: 18px;">
                                {!! \Str::limit(html_entity_decode($popularItem->description),48) !!}
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
                            <div class="col-md-8 fw-bold" style="font-size: 18px;">
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