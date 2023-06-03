@php
    $categories = \App\Models\Category::get();
@endphp
@php
    $template_5_category_exists = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_5_category'
        ]
    )->exists();
    if($template_5_category_exists) {
        $template_5_category = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_5_category'
        ]
    )->first();
        $template_5_category_id = $template_5_category->value;
        $template_5_category_data = \App\Models\Category::where('id',$template_5_category_id)->first();
        $template_5_category_name = $template_5_category_data->title;
        $template_5_category_query = \App\Models\News::whereRaw('FIND_IN_SET("'.$template_5_category->value.'",category)');
    }else {
        $template_5_category_data = \App\Models\Category::first();
        $template_5_category_id = $template_5_category_data->id;
        $template_5_category_name = $template_5_category_data->title;
        $template_5_category_query = \App\Models\News::whereRaw('FIND_IN_SET("'.$template_5_category_id.'",category)');
    }
@endphp
<style>
    .red-colured-background {
        background-color: #e1261d;
    }
    .red-colured-background .red-bullet {
        background-color: white;
    }
    .template-5-center-news {
        position: relative;
        border-right: 1px solid rgba(248,249,250,0.5);
        border-left: 1px solid rgba(248,249,250,0.5);
    }
    .template-5-center-news-heading {
        position: absolute;
        bottom: 30px;
        left: 30px;
        padding: 10px;
    }
</style>
<div class="container-fluid mt-4 red-colured-background">
    <div class="d-flex justify-content-between py-3 text-light">
        <div>
            <p class="h5 fw-bold mb-4">
                <span class="red-bullet"></span>
                <span class="d-inline">{{$template_5_category_name}}</span>
            </p>
        </div>
        <div>
            <a href="{{route('news-categories')}}?category_id={{$template_5_category_id}}" class="h5 fw-bold mb-4 text-decoration-none">
                <span class="d-inline">
                    और पढ़ें
                    <i class="bi bi-caret-right-fill"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="row">
        @if($template_5_category_query->count() > 5)
            <div class="col-md-3 pe-3">
                @php
                    $template_5_1st_news = $template_5_category_query->orderBy('id','DESC')
                    ->take(1)->first();
                @endphp
                <a class="text-decoration-none" href="news-details?news_id={{$template_5_1st_news->id}}">
                    <div>
                        <img src="uploads/news/{{$template_5_1st_news->image}}" style="width: 100%;border:1px solid white; height:150px;object-fit:cover;">
                    </div>
                    <p class="fw-bold my-2 text-light">
                        {{\Str::limit($template_5_1st_news->title,68)}}
                    </p>
                </a>
                <hr class="text-light">
                @php
                    $template_5_2nd_news = $template_5_category_query->orderBy('id','DESC')
                    ->skip(1)->take(1)->first();
                @endphp
                <a class="text-decoration-none" href="news-details?news_id={{$template_5_2nd_news->id}}">
                    <div>
                        <img src="uploads/news/{{$template_5_2nd_news->image}}" style="width: 100%;border:1px solid white; height:150px;object-fit:cover;">
                    </div>
                    <p class="fw-bold my-2 text-light">
                        {{\Str::limit($template_5_2nd_news->title,68)}}
                    </p>
                </a>
            </div>
            @php
                $template_5_3rd_news = $template_5_category_query->orderBy('id','DESC')
                ->skip(2)->take(1)->first();
            @endphp
            <div class="col-md-6">
                <a class="p-4 d-block template-5-center-news text-decoration-none" href="news-details?news_id={{$template_5_3rd_news->id}}">
                    <img src="uploads/news/{{$template_5_3rd_news->image}}" style="width: 100%;border:1px solid white; height:350px;object-fit:cover;">
                    <p class="fw-bold h5 text-light template-5-center-news-heading">
                        {{\Str::limit($template_5_3rd_news->title,68)}}
                    </p>
                </a>
            </div>
            <div class="col-md-3 pe-3">
                @php
                    $template_5_4th_news = $template_5_category_query->orderBy('id','DESC')
                    ->skip(3)->take(1)->first();
                @endphp
                <a class="text-decoration-none" href="news-details?news_id={{$template_5_4th_news->id}}">
                    <div>
                        <img src="uploads/news/{{$template_5_4th_news->image}}" style="width: 100%;border:1px solid white; height:150px;object-fit:cover;">
                    </div>
                    <p class="fw-bold my-2 text-light">
                        {{\Str::limit($template_5_4th_news->title,68)}}
                    </p>
                </a>
                <hr class="text-light">
                @php
                    $template_5_5th_news = $template_5_category_query->orderBy('id','DESC')
                    ->skip(4)->take(1)->first();
                @endphp
                <a class="text-decoration-none" href="news-details?news_id={{$template_5_5th_news->id}}">
                    <div>
                        <img src="uploads/news/{{$template_5_5th_news->image}}" style="width: 100%;border:1px solid white; height:150px;object-fit:cover;">
                    </div>
                    <p class="fw-bold my-2 text-light">
                        {{\Str::limit($template_5_5th_news->title,68)}}
                    </p>
                </a>
            </div>
        @else 
            <div class="text-center text-light mb-5">
                <p>Please add more than 5 news to use this template</p>
            </div>
        @endif
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
                <label for="">Section Category</label>
                <select name="template_5_category" class="form-control my-3">
                    <option value="">-- Select Preference --</option>
                    @foreach($categories as $category)
                        <option {{($template_5_category_id == $category->id) ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                <button type="submit" name="template-5-edit-btn" class="custom-button button-red">Save</button>
            </form>
        </div>
      </div>
    </div>
</div>
{{-- End Edit Modal --}}