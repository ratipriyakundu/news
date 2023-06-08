@php
    $categories = \App\Models\Category::get();
@endphp
@php
    $template_12_category_exists = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_12_category'
        ]
    )->exists();
    if($template_12_category_exists) {
        $template_12_category = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_12_category'
        ]
    )->first();
        $template_12_category_id = $template_12_category->value;
        $template_12_category_data = \App\Models\Category::where('id',$template_12_category_id)->first();
        $template_12_category_name = $template_12_category_data->title;
        $template_12_category_query = \App\Models\News::whereRaw('FIND_IN_SET("'.$template_12_category->value.'",category)');
    }else {
        $template_12_category_data = \App\Models\Category::first();
        $template_12_category_id = $template_12_category_data->id;
        $template_12_category_name = $template_12_category_data->title;
        $template_12_category_query = \App\Models\News::whereRaw('FIND_IN_SET("'.$template_12_category_id.'",category)');
    }
@endphp
<div class="container-fluid mt-3">
    <div class="d-flex justify-content-between p-3">
        <div>
            <p class="h6 fw-bold mb-4">
                <span class="red-bullet"></span>
                <span class="d-inline">{{$template_12_category_name}}</span>
            </p>
        </div>
        <div>
            <a href="{{route('news-categories')}}?category_id={{$template_12_category_id}}" class="h6 fw-bold mb-4 text-danger">
                <span class="d-inline">
                    और पढ़ें
                    <i class="bi bi-caret-right-fill"></i>
                </span>
            </a>
        </div>
    </div>
    <div class="row">
        @php
            $template_12_news_lists = $template_12_category_query
            ->orderBy('id','DESC')->take(6)->get();
        @endphp
        @foreach($template_12_news_lists as $template_12_news_list)
            <div class="col-md-4">
                <a href="news-details?news_id={{$template_12_news_list->id}}">
                    <img src="uploads/news/{{$template_12_news_list->image}}" style="width:100%;height:250px;object-fit:cover;">
                    <p class="mt-3 fw-bold h5">
                        {{\Str::limit($template_12_news_list->title,68)}}
                    </p>
                </a>
            </div>
        @endforeach
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
                <select name="template_12_category" class="form-control my-3">
                  <option value="">-- Select Preference --</option>
                  @foreach($categories as $category)
                    <option {{($template_12_category_id == $category->id) ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                  @endforeach
                </select>
                <button type="submit" name="template-12-edit-btn" class="custom-button button-red">Save</button>
            </form>
        </div>
      </div>
    </div>
</div>
{{-- End Edit Modal --}}