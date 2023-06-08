@php
    $categories = \App\Models\Category::get();
@endphp
@php
    $template_8_left_category_exists = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_8_left_category'
        ]
    )->exists();
    if($template_8_left_category_exists) {
        $template_8_left_category = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_8_left_category'
        ]
    )->first();
        $template_8_left_category_id = $template_8_left_category->value;
        $template_8_left_category_data = \App\Models\Category::where('id',$template_8_left_category_id)->first();
        $template_8_left_category_name = $template_8_left_category_data->title;
        $template_8_left_category_query = \App\Models\News::whereRaw('FIND_IN_SET("'.$template_8_left_category->value.'",category)');
    }else {
        $template_8_left_category_data = \App\Models\Category::first();
        $template_8_left_category_name = $template_8_left_category_data->title;
        $template_8_left_category_id = $template_8_left_category_data->id;
        $template_8_left_category_query = \App\Models\News::whereRaw('FIND_IN_SET("'.$template_8_left_category_id.'",category)');
    }
@endphp
@php
    $template_8_right_category_exists = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_8_right_category'
        ]
    )->exists();
    if($template_8_right_category_exists) {
        $template_8_right_category = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_8_right_category'
        ]
    )->first();
        $template_8_right_category_id = $template_8_right_category->value;
        $template_8_right_category_data = \App\Models\Category::where('id',$template_8_right_category_id)->first();
        $template_8_right_category_name = $template_8_right_category_data->title;
        $template_8_right_category_query = \App\Models\News::whereRaw('FIND_IN_SET("'.$template_8_right_category->value.'",category)');
    }else {
        $template_8_right_category_data = \App\Models\Category::first();
        $template_8_right_category_name = $template_8_right_category_data->title;
        $template_8_right_category_id = $template_8_right_category_data->id;
        $template_8_right_category_query = \App\Models\News::whereRaw('FIND_IN_SET("'.$template_8_right_category_id.'",category)');
    }
@endphp
<style>
    .red-colured-background {
        background-color: #e1261d;
    }
    .red-colured-background .red-bullet {
        background-color: white;
    }
</style>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-9 red-colured-background">
            <div class="d-flex justify-content-between py-3 text-light">
                <div>
                    <p class="h5 fw-bold mb-4">
                        <span class="red-bullet"></span>
                        <span class="d-inline">{{$template_8_left_category_name}}</span>
                    </p>
                </div>
                <div>
                    <a href="{{route('news-categories')}}?category_id={{$template_8_left_category_id}}" class="h5 fw-bold mb-4">
                        <span class="d-inline">
                            और पढ़ें
                            <i class="bi bi-caret-right-fill"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    @php
                        $template_8_left_large_news = $template_8_left_category_query
                        ->orderBy('id','DESC')
                        ->take(1)
                        ->first();
                    @endphp
                    <a href="news-details?news_id={{$template_8_left_large_news->id}}">
                        <img src="uploads/news/{{$template_8_left_large_news->image}}" style="width:100%; height:430px;object-fit:cover;">
                        <div style="background-color: red;padding:15px;margin-top:-5px;">
                            <p class="text-light fw-bold h4">
                                {{\Str::limit($template_8_left_large_news->title,110)}}
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    @php
                        $template_8_center_news_lists = $template_8_left_category_query
                        ->orderBy('id','DESC')
                        ->skip(1)
                        ->take(2)
                        ->get();
                    @endphp
                    @foreach($template_8_center_news_lists as $template_8_center_news_list)
                        <a href="news-details?news_id={{$template_8_center_news_list->id}}">
                            <img class="my-2" src="uploads/news/{{$template_8_center_news_list->image}}" style="width:100%; height:170px;object-fit:cover;">
                            <p class="text-light fw-bold h5 mt-3">
                                {{\Str::limit($template_8_center_news_list->title,68)}}
                            </p>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="row my-3">
                @php
                    $template_8_left_small_news_lists = $template_8_left_category_query
                    ->orderBy('id','DESC')
                    ->skip(3)
                    ->take(2)
                    ->get();
                @endphp
                @foreach($template_8_left_small_news_lists as $template_8_left_small_news_list)
                    <a href="news-details?news_id={{$template_8_left_small_news_list->id}}" class="col-md-6">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="uploads/news/{{$template_8_left_small_news_list->image}}" style="width:100%; height:100px;object-fit:cover;">
                            </div>
                            <div class="col-md-7">
                                <p class="text-light fw-bold h5">
                                    {{\Str::limit($template_8_left_small_news_list->title,86)}}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="col-md-3">
            <div class="d-flex justify-content-between py-3">
                <div>
                    <p class="h5 fw-bold mb-4">
                        <span class="red-bullet"></span>
                        <span class="d-inline">{{$template_8_right_category_name}}</span>
                    </p>
                </div>
                <div>
                    <a href="{{route('news-categories')}}?category_id={{$template_8_right_category_id}}" class="h5 fw-bold mb-4 text-danger">
                        <span class="d-inline">
                            और पढ़ें
                            <i class="bi bi-caret-right-fill"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div style="position:relative;">
                @php
                    $template_8_right_large_news = $template_8_right_category_query
                    ->orderBy('id','DESC')
                    ->take(1)
                    ->first();
                @endphp
                <a href="news-details?news_id={{$template_8_right_large_news->id}}">
                    <img src="uploads/news/{{$template_8_right_large_news->image}}" style="width:100%;height:200px;object-fit:cover;">
                    <p class="fw-bold h5 text-light" style="position:absolute;bottom:0px;padding:10px;background-color:rgba(0,0,0,0.5);">
                        {{\Str::limit($template_8_right_large_news->title,68)}}
                    </p>
                </a>
            </div>
            <hr>
            @php
                $template_8_right_small_news_lists = $template_8_right_category_query
                ->orderBy('id','DESC')
                ->skip(1)
                ->take(4)
                ->get();
            @endphp
            @foreach($template_8_right_small_news_lists as $template_8_right_small_news_list)
                <a href="news-details?news_id={{$template_8_right_small_news_list->id}}" class="row mt-3">
                    <div class="col-md-5">
                        <img src="uploads/news/{{$template_8_right_small_news_list->image}}" style="width:100%;height:70px;object-fit:cover;">
                    </div>
                    <div class="col-md-7">
                        <p>
                            {{\Str::limit($template_8_right_small_news_list->title,68)}}
                        </p>
                    </div>
                </a>
                <hr>
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
                <select name="template_8_left_category" class="form-control my-3">
                    <option value="">-- Select Preference --</option>
                    @foreach($categories as $category)
                        <option {{($template_8_left_category_id == $category->id) ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                <label for="">Right Section Category</label>
                <select name="template_8_right_category" class="form-control my-3">
                    <option value="">-- Select Preference --</option>
                    @foreach($categories as $category)
                        <option {{($template_8_right_category_id == $category->id) ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                <button type="submit" name="template-8-edit-btn" class="custom-button button-red">Save</button>
            </form>
        </div>
      </div>
    </div>
</div>
{{-- End Edit Modal --}}