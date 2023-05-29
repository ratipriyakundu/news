<x-front_header :category="$category" :breakingNewsList="$breakingNewsList"/>
    <div class="container-fluid my-4">
        @foreach($homeTemplates as $homeTemplate)
        {!! html_entity_decode($homeTemplate->section_code) !!}
        @endforeach
    </div>
    @if($hasPermission)
        <div class="text-center m-5 p-5">
            <button data-bs-toggle="modal" data-bs-target="#sectionModal" class="custom-button button-red">
                Add Section
            </button>
        </div>
        {{-- Template Testing Area --}}
        <div class="container d-none">
            <div class="banner-ad-wrapper">
                <img src="img/ad/image-banner.webp" width="100%" height="auto">
            </div>
        </div>
        {{-- End Template Testing Area --}}
        {{-- Section Modal --}}
        <div class="modal fade" id="sectionModal" tabindex="-1" aria-labelledby="sectionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
              <div class="modal-content">
                <div class="modal-header d-flex">
                  <input class="form-control" placeholder="Search template" type="text">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body overflow-auto">
                  <div class="row p-3 row-cols-3">
                    @foreach($templates as $template)
                        <div class="col">
                            <div class="template-col my-2 pt-4">
                                {!! html_entity_decode($template->code) !!}
                                <form class="template-insert-form" action="{{route('insert-template')}}" method="POST">
                                    @csrf 
                                    <input type="hidden" name="page_name" value="home">
                                    <input type="hidden" name="section_code" value="{{$template->code}}">
                                    <div class="text-center">
                                        <button type="submit" class="custom-button button-red button-rounded" title="Insert Template">
                                            <i class="bi bi-plus" style="font-size:20px; font-weight:700;"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="custom-button button-red" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        {{-- Section Modal End --}}
    @endif
<x-front_footer :menucategory="$menucategory"/>