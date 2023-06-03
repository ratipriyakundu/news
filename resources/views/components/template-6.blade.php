@php
    $categories = \App\Models\Category::get();
@endphp
@php
    $template_6_category_exists = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_6_category'
        ]
    )->exists();
    if($template_6_category_exists) {
        $template_6_category = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'template_6_category'
        ]
    )->first();
        $template_6_category_id = $template_6_category->value;
        $template_6_category_data = \App\Models\Category::where('id',$template_6_category_id)->first();
        $template_6_category_name = $template_6_category_data->title;
        $template_6_category_query = \App\Models\News::whereRaw('FIND_IN_SET("'.$template_6_category->value.'",category)');
    }else {
        $template_6_category_data = \App\Models\Category::first();
        $template_6_category_id = $template_6_category_data->id;
        $template_6_category_name = $template_6_category_data->title;
        $template_6_category_query = \App\Models\News::whereRaw('FIND_IN_SET("'.$template_6_category_id.'",category)');
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
            <span class="d-inline">{{$template_6_category_name}}</span>
        </p>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="card br-0" style="width: 100%;">
                <div class="card-body">
                    <div class="owl-carousel-6 owl-carousel owl-theme">
                        @php
                          $template_6_news_lists = $template_6_category_query
                          ->orderBy('id','DESC')->take(10)->get();
                        @endphp
                        @foreach($template_6_news_lists as $template_6_news_list)
                          <div class="item">
                              <a class="card br-0 text-decoration-none" href="news-details?news_id={{$template_6_news_list->id}}" style="width: 100%;">
                                <img src="uploads/news/{{$template_6_news_list->image}}" class="card-img-top" style="height:200px;object-fit:cover:width:100%;">
                                <div class="card-body">
                                  <h5 class="card-title h6 fw-bold" style="height: 40px;">
                                    {{\Str::limit($template_6_news_list->title,50)}}
                                  </h5>
                                </div>
                              </a>
                          </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
          @php
            $template_6_ad_code_exists = \App\Models\Attribute::where(
              [
                'template_id' => $id,
                'name' => 'template_6_ad_code'
              ]
            )->exists();
          @endphp
          @if($template_6_ad_code_exists)
            @php
              $template_6_ad_code = \App\Models\Attribute::where(
                [
                  'template_id' => $id,
                  'name' => 'template_6_ad_code'
                ]
              )->first();
            @endphp
            <div>
              {!! html_entity_decode($template_6_ad_code->value) !!}
            </div>
          @else 
            <div class="BorderColorChangeElement" style="margin: 0 auto;text-align:center;overflow:hidden;border-radius:0px;-webkit-box-shadow: 16px 17px 18px -7px rgba(18,1,18,0.61);-moz-box-shadow: 16px 17px 18px -7px rgba(18,1,18,0.61);box-shadow: 16px 17px 18px -7px rgba(18,1,18,0.61);background:#009688;border:10px solid #000000;padding:8px;width:100%;height:100%;">
                <div class="imgAnim296"  style="display: inline-block;position:relative;vertical-align: middle;padding:8px">
                    <img src="https://1.bp.blogspot.com/-zXwrowTem0M/Xj3xuRee9SI/AAAAAAAABqQ/JKCg_K_ObTY26HhXI1JGcPtR5NLErWE8wCLcBGAsYHQ/s1600/sea-4810958_1280.jpg" style="max-width:100%;width:60px"/>
                </div>
                <div  style="display:inline-block;text-shadow:#030303 4px 4px 4px;position:relative;vertical-align: middle;padding:8px;font-size:45px;color:#ffffff;font-weight:normal">Title Here</div>
                <div  style="display:inline-block;text-shadow:#030303 4px 4px 4px;position:relative;vertical-align: middle;padding:8px;font-size:14px;color:#ffffff;font-weight:normal">Display Description of your ad here</div>
                <div class="btnAnim296"  style="display:inline-block;position:relative;vertical-align: middle;padding:8px" >
                    <a target="_blank" href=""><input type="button" value="Visit Now" style="margin:0px;background:#000000;padding:8px;border:3px solid red;color:#ffffff;border-radius:0px;cursor:pointer" /></a>
                </div>
            </div>
          @endif
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
              <select name="template_6_category" class="form-control my-3">
                <option value="">-- Select Preference --</option>
                @foreach($categories as $category)
                  <option {{($template_6_category_id == $category->id) ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
              </select>
              <ul class="nav nav-tabs" id="myTab6{{$id}}" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab-6" data-bs-toggle="tab" data-bs-target="#home-6-{{$id}}" type="button" role="tab" aria-controls="home-6" aria-selected="true">
                      Custom Ad Code
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab-6" data-bs-toggle="tab" data-bs-target="#profile-6-{{$id}}" type="button" role="tab" aria-controls="profile-6" aria-selected="false">
                      Default Ad Code
                    </button>
                  </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home-6-{{$id}}" role="tabpanel" aria-labelledby="home-tab-6">
                      <div class="my-5">
                          <label class="mb-3" for="inputGroupFile01">Insert Ad Code</label>
                          <textarea name="template_6_ad_code" class="form-control" cols="30" rows="10"></textarea>
                      </div>
                  </div>
                  <div class="tab-pane fade" id="profile-6-{{$id}}" role="tabpanel" aria-labelledby="profile-tab-6">
                    <div class="my-5">
                        <img src="img/template/template2.png" width="100%">
                    </div>
                  </div>
              </div>
              <button type="submit" name="template-6-edit-btn" class="custom-button button-red">Save</button>
          </form>
      </div>
    </div>
  </div>
</div>
{{-- End Edit Modal --}}