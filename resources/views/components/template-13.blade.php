@php
    $categories = \App\Models\Category::get();
@endphp
@php
    $template_13_category_exists = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_13_category'
        ]
    )->exists();
    if($template_13_category_exists) {
        $template_13_category = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_13_category'
        ]
    )->first();
        $template_13_category_id = $template_13_category->value;
        $template_13_category_data = \App\Models\Category::where('id',$template_13_category_id)->first();
        $template_13_category_name = 'वेब स्टोरिज़ ('.$template_13_category_data->title.')';
        $template_13_category_query = \App\Models\Story::where('category',$template_13_category_id)
        ->where('status',1)
        ->orderBy('id','DESC')
        ->take(10)->get();
    }else {
        $template_13_category_id = 0;
        $template_13_category_name = 'वेब स्टोरिज़ ';
        $template_13_category_query = \App\Models\Story::where('status',1)
        ->orderBy('id','DESC')
        ->take(10)->get();
    }
@endphp
<style>
    .BorderColorChangeElement {
        animation: BorderColorChange 1s ease-out 0s infinite alternate none running;
    }
    @keyframes BorderColorChange{
          0%  { border: 10px solid #ffc0cb;}
          100%  { border: 10px solid #ff69b4;}
    }
    @keyframes rotateAnim {
        0% { transform: rotate(deg);}
        100% { transform:rotate(360deg);}
    }
    @keyframes scaler {
      0% {
        transform: scale(1);
      }
      100% {    transform: scale(1.5);
      }
    }
    .imgAnim296 {
      animation: rotateAnim 10s linear 0s infinite forwards running;
    }
    .btnAnim296 {
      animation: scaler 1s linear 0s infinite alternate none running;
    }
    .btnAnim296:hover{
      animation-play-state: paused;
    }
</style>
<div class="container-fluid mt-3">
    <div>
        <p class="h5 fw-bold mb-4">
            <span class="red-bullet"></span>
            <span class="d-inline">{{$template_13_category_name}}</span>
        </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card br-0" style="width: 100%;">
                <div class="card-body">
                    <div class="owl-carousel-6 owl-carousel owl-theme">
                        @php
                          $web_story_lists = $template_13_category_query;
                        @endphp
                        @foreach($web_story_lists as $web_story_list)
                            @php
                                $slide = \App\Models\Slide::where('story_id',$web_story_list->id)->first();
                            @endphp
                          <div class="item">
                              <a class="slide-wrapper text-decoration-none" href="{{route('story')}}?id={{Crypt::encrypt($web_story_list->id)}}" style="width: 100%;">
                                <img src="{{$slide->image}}" style="width: 100%; height:400px;object-fit:cover;">
                                <div class="slide-title">
                                    {{\Str::limit($web_story_list->title,50)}}
                                </div>
                              </a>
                          </div>
                        @endforeach
                    </div>
                </div>
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
              <label for="">Section Category</label>
              <select name="template_13_category" class="form-control my-3">
                <option value="0">-- All --</option>
                @foreach($categories as $category)
                  <option {{($template_13_category_id == $category->id) ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
              </select>
              <button type="submit" name="template-13-edit-btn" class="custom-button button-red">Save</button>
          </form>
      </div>
    </div>
  </div>
</div>
{{-- End Edit Modal --}}