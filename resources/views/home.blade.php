<x-front_header :category="$category" :hasPermission="$hasPermission" :breakingNewsList="$breakingNewsList"/>
    <div class="container-fluid my-4">
        @foreach($homeTemplates as $homeTemplate)
          <div class="template-wrapper">
            @php
                $template = 'template-'.$homeTemplate->section_code;
            @endphp
            <x-dynamic-component :component="$template"/>
            @if($hasPermission)
              <div class="template-control-area">
                <button class="custom-button button-red button-rounded" title="Move Up">
                  <a class="text-light" href="{{route('move-up-template')}}?template_id={{$homeTemplate->id}}">
                    <i class="bi bi-arrow-up"></i>
                  </a>
                </button>
                <button class="custom-button button-red button-rounded" title="Move Down">
                  <a class="text-light" href="{{route('move-down-template')}}?template_id={{$homeTemplate->id}}">
                    <i class="bi bi-arrow-down"></i>
                  </a>
                </button>
                <button data-bs-toggle="modal" data-bs-target="#editModal{{$homeTemplate->id}}" class="custom-button button-red button-rounded" title="Edit">
                  <i class="bi bi-pen"></i>
                </button>
                <button data-bs-toggle="modal" data-bs-target="#deleteModal{{$homeTemplate->id}}" class="custom-button button-red button-rounded" title="Delete">
                  <i class="bi bi-trash"></i>
                </button>
              </div>
              {{-- Edit Modal --}}
              <div class="modal fade" id="editModal{{$homeTemplate->id}}" tabindex="-1" aria-labelledby="editModal{{$homeTemplate->id}}Label" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body text-center p-5">
                      @if($homeTemplate->type = '')
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              {{-- End Edit Modal --}}
              {{-- Delete Modal --}}
              <div class="modal fade" id="deleteModal{{$homeTemplate->id}}" tabindex="-1" aria-labelledby="deleteModal{{$homeTemplate->id}}Label" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body text-center p-5">
                      <h2 class="text-danger mb-5">Are You Sure?</h2>
                      <form action="{{route('delete-template')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$homeTemplate->id}}">
                        <button type="button" data-bs-dismiss="modal" class="custom-button">No</button>
                        <button type="submit" class="custom-button button-red mx-3">Yes Delete</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              {{-- End Delete Modal --}}
            @endif
          </div>
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
                    <div class="col">
                      <div class="template-col my-2 pt-4">
                        <img class="align-middle" src="img/template/template1.png" width="100%">
                        <form class="template-insert-form" action="{{route('insert-template')}}" method="POST">
                          @csrf 
                          <input type="hidden" name="page_name" value="home">
                          <input type="hidden" name="section_code" value="1">
                          <div class="text-center">
                            <button type="submit" class="custom-button button-red button-rounded" title="Insert Template">
                              <i class="bi bi-plus" style="font-size:20px; font-weight:700;"></i>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="col">
                      <div class="template-col my-2 pt-4">
                        <img class="align-middle" src="img/template/template2.png" width="100%">
                        <form class="template-insert-form" action="{{route('insert-template')}}" method="POST">
                          @csrf 
                          <input type="hidden" name="page_name" value="home">
                          <input type="hidden" name="section_code" value="2">
                          <div class="text-center">
                            <button type="submit" class="custom-button button-red button-rounded" title="Insert Template">
                              <i class="bi bi-plus" style="font-size:20px; font-weight:700;"></i>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="col">
                      <div class="template-col my-2 pt-4">
                        <img class="align-middle" src="img/template/template3.png" width="100%">
                        <form class="template-insert-form" action="{{route('insert-template')}}" method="POST">
                          @csrf 
                          <input type="hidden" name="page_name" value="home">
                          <input type="hidden" name="section_code" value="3">
                          <div class="text-center">
                            <button type="submit" class="custom-button button-red button-rounded" title="Insert Template">
                              <i class="bi bi-plus" style="font-size:20px; font-weight:700;"></i>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="col">
                      <div class="template-col my-2 pt-4">
                        <img class="align-middle" src="img/template/template4.png" width="100%">
                        <form class="template-insert-form" action="{{route('insert-template')}}" method="POST">
                          @csrf 
                          <input type="hidden" name="page_name" value="home">
                          <input type="hidden" name="section_code" value="4">
                          <div class="text-center">
                            <button type="submit" class="custom-button button-red button-rounded" title="Insert Template">
                              <i class="bi bi-plus" style="font-size:20px; font-weight:700;"></i>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="col">
                      <div class="template-col my-2 pt-4">
                        <img class="align-middle" src="img/template/template5.png" width="100%">
                        <form class="template-insert-form" action="{{route('insert-template')}}" method="POST">
                          @csrf 
                          <input type="hidden" name="page_name" value="home">
                          <input type="hidden" name="section_code" value="5">
                          <div class="text-center">
                            <button type="submit" class="custom-button button-red button-rounded" title="Insert Template">
                              <i class="bi bi-plus" style="font-size:20px; font-weight:700;"></i>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="col">
                      <div class="template-col my-2 pt-4">
                        <img class="align-middle" src="img/template/template6.png" width="100%">
                        <form class="template-insert-form" action="{{route('insert-template')}}" method="POST">
                          @csrf 
                          <input type="hidden" name="page_name" value="home">
                          <input type="hidden" name="section_code" value="6">
                          <div class="text-center">
                            <button type="submit" class="custom-button button-red button-rounded" title="Insert Template">
                              <i class="bi bi-plus" style="font-size:20px; font-weight:700;"></i>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
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