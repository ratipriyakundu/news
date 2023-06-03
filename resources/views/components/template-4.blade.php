@php
    $categories = \App\Models\Category::get();
@endphp
@php
    $template_4_left_category_exists = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_4_left_category'
        ]
    )->exists();
    if($template_4_left_category_exists) {
        $template_4_left_category = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_4_left_category'
        ]
    )->first();
        $template_4_left_category_id = $template_4_left_category->value;
        $template_4_left_category_data = \App\Models\Category::where('id',$template_4_left_category_id)->first();
        $template_4_left_category_name = $template_4_left_category_data->title;
        $template_4_left_category_query = \App\Models\News::whereRaw('FIND_IN_SET("'.$template_4_left_category->value.'",category)');
    }else {
        $template_4_left_category_id = 0;
        $template_4_left_category_name = 'बड़ी ख़बरें';
        $template_4_left_category_query = \App\Models\News::where('breaking_news','!=',NULL);
    }
@endphp
@php
    $template_4_right_category_exists = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_4_right_category'
        ]
    )->exists();
    if($template_4_right_category_exists) {
        $template_4_right_category = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_4_right_category'
        ]
    )->first();
        $template_4_right_category_id = $template_4_right_category->value;
        $template_4_right_category_data = \App\Models\Category::where('id',$template_4_right_category_id)->first();
        $template_4_right_category_name = $template_4_right_category_data->title;
        $template_4_right_category_query = \App\Models\News::whereRaw('FIND_IN_SET("'.$template_4_right_category->value.'",category)');
    }else {
        $template_4_right_category_id = 0;
        $template_4_right_category_name = 'लाइव अपडेट';
        $template_4_right_category_query = \App\Models\News::orderBy('added_at','DESC')
        ->take(10)->get();
    }
@endphp
<style>
    .live-update-wrapper {
        overflow-y: scroll;
        max-height: 240px;
        height: 240px;
    }
    .live-update-wrapper::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 3px transparent;
        border-radius: 10px;
        background-color: transparent;
    }

    .live-update-wrapper::-webkit-scrollbar
    {
        width: 6px;
        background-color: transparent;
    }

    .live-update-wrapper::-webkit-scrollbar-thumb
    {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 3px transparent;
        background-color: #D62929;
    }

</style>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-3">
            <p class="h5 fw-bold mb-4">
                <span class="red-bullet"></span>
                <span class="d-inline">{{$template_4_left_category_name}}</span>
            </p>
            @php
                $template_4_left_news_lists = $template_4_left_category_query
                ->orderBy('id','DESC')->take(4)->get();
            @endphp
            @foreach($template_4_left_news_lists as $template_4_left_news_list)
                <a class="text-decoration-none" href="news-details?news_id={{$template_4_left_news_list->id}}">
                    {{\Str::limit($template_4_left_news_list->title,81)}}
                </a>
                <hr>
            @endforeach
        </div>
        <div class="col-md-6">
            <div class="row">
                @php
                    $template_4_center_news_lists = $template_4_left_category_query
                    ->orderBy('id','DESC')->skip(4)->take(3)->get();
                @endphp
                @foreach($template_4_center_news_lists as $template_4_center_news_list)
                    <a class="col-md-4 text-decoration-none" href="news-details?news_id={{$template_4_center_news_list->id}}">
                        <div class="card br-0" style="width: 100%;">
                            <img src="uploads/news/{{$template_4_center_news_list->image}}" class="card-img-top" style="min-height:100px;object-fit:cover:width:100%;">
                            <div class="card-body">
                            <h5 class="card-title h5 fw-bold" style="min-height: 120px;">
                                {{\Str::limit($template_4_center_news_list->title,81)}}
                            </h5>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="col-md-3">
            <p class="h5 fw-bold mb-4">
                <span class="red-bullet"></span>
                <span class="d-inline">{{$template_4_right_category_name}}</span>
            </p>
            <div class="live-update-wrapper">
                @foreach($template_4_right_category_query as $template_4_right_news_list)
                    <p class="fw-bold">
                        <span class="red-bullet" style="width: 10px; height:10px;"></span>
                        <span class="d-inline">{{\Carbon\Carbon::parse($template_4_right_news_list->added_at)->format('g:i A')}}</span>
                    </p>
                    <div class="p-3" style="border-left:1px solid red;margin-left:5px;">
                        {{\Str::limit($template_4_right_news_list->title,68)}}
                    </div>
                @endforeach
            </div>
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
                <select name="template_4_left_category" class="form-control my-3">
                    <option value="">-- Select Preference --</option>
                    <option value="0">Breaking News(Recommended)</option>
                    @foreach($categories as $category)
                        <option {{($template_4_left_category_id == $category->id) ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                <label for="">Right Section Category</label>
                <select name="template_4_right_category" class="form-control my-3">
                    <option value="">-- Select Preference --</option>
                    <option value="0">Latest Updates(Recommended)</option>
                    @foreach($categories as $category)
                        <option {{($template_4_right_category_id == $category->id) ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                <button type="submit" name="template-4-edit-btn" class="custom-button button-red">Save</button>
            </form>
        </div>
      </div>
    </div>
</div>
{{-- End Edit Modal --}}