<x-front_header :category="$category" :hasPermission="$hasPermission" :breakingNewsList="$breakingNewsList"/>
    <div class="container-fluid my-4">
        @foreach($homeTemplates as $homeTemplate)
          <div class="template-wrapper">
            @php
              $id = $homeTemplate->id;
              $templateId = $homeTemplate->section_code;
              $template = 'template-'.$templateId;
            @endphp
            <x-dynamic-component :component="$template" :templateId="$templateId" :id="$id"/>
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
        {{-- Section Modal --}}
        <div class="modal fade" id="sectionModal" tabindex="-1" aria-labelledby="sectionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
              <div class="modal-content">
                <div class="modal-body overflow-auto">
                  <div class="row p-3 row-cols-3">
                    <div class="col">
                      <div class="template-col my-2 pt-4">
                        <div class="text-center">
                          <p class="text-secondary">Template 1</p>
                          <p class="text-muted small">Image Banner Ad</p>
                          <img class="align-middle" src="img/template/template1.png" width="100%">
                        </div>
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
                        <div class="text-center">
                          <p class="text-secondary">Template 2</p>
                          <p class="text-muted small">Code Banner Ad</p>
                          <img class="align-middle" src="img/template/template2.png" width="100%">
                        </div>
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
                        <div class="text-center">
                          <p class="text-secondary">Template 3</p>
                          <p class="text-muted small">Latest + Popular</p>
                          <p class="small text-danger">{{($news->count() > 8)? "" : "*Add More Than 8 News To Activate this Template"}}</p>
                          <img class="align-middle" src="img/template/template3.png" width="100%">
                        </div>
                        <form class="template-insert-form" action="{{route('insert-template')}}" method="POST">
                          @csrf 
                          <input type="hidden" name="page_name" value="home">
                          <input type="hidden" name="section_code" value="3">
                          <div class="text-center">
                            <button {{($news->count() > 8)? "" : "disabled"}} type="submit" class="custom-button button-red button-rounded" title="Insert Template">
                              <i class="bi bi-plus" style="font-size:20px; font-weight:700;"></i>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="col">
                      <div class="template-col my-2 pt-4">
                        <div class="text-center mb-3">
                          <p class="text-secondary">Template 4</p>
                          <p class="text-muted small">Breaking News + Live Update</p>
                          <p class="small text-danger">{{($news->count() > 1 && $category->count() > 1)? "" : "*Add at least 1 News and 1 Category To Activate this Template"}}</p>
                          <img class="align-middle" src="img/template/template4.png" width="100%">
                        </div>                        <form class="template-insert-form" action="{{route('insert-template')}}" method="POST">
                          @csrf 
                          <input type="hidden" name="page_name" value="home">
                          <input type="hidden" name="section_code" value="4">
                          <div class="text-center">
                            <button {{($news->count() > 1 && $category->count() > 1)? "" : "disabled"}} type="submit" class="custom-button button-red button-rounded" title="Insert Template">
                              <i class="bi bi-plus" style="font-size:20px; font-weight:700;"></i>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="col">
                      <div class="template-col my-2 pt-4">
                        <div class="text-center mb-3">
                          <p class="text-secondary">Template 5</p>
                          <p class="text-muted small">Category wise News</p>
                          <p class="small text-danger">{{($news->count() > 1 && $category->count() > 1)? "" : "*Add at least 1 News and 1 Category To Activate this Template"}}</p>
                          <img class="align-middle" src="img/template/template5.png" width="100%">
                        </div>  
                        <form class="template-insert-form" action="{{route('insert-template')}}" method="POST">
                          @csrf 
                          <input type="hidden" name="page_name" value="home">
                          <input type="hidden" name="section_code" value="5">
                          <div class="text-center">
                            <button {{($news->count() > 1 && $category->count() > 1)? "" : "disabled"}} type="submit" class="custom-button button-red button-rounded" title="Insert Template">
                              <i class="bi bi-plus" style="font-size:20px; font-weight:700;"></i>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="col">
                      <div class="template-col my-2 pt-4">
                        <div class="text-center mb-3">
                          <p class="text-secondary">Template 6</p>
                          <p class="text-muted small">Category wise News + Ad</p>
                          <p class="small text-danger">{{($news->count() > 1 && $category->count() > 1)? "" : "*Add at least 1 News and 1 Category To Activate this Template"}}</p>
                          <img class="align-middle" src="img/template/template6.png" width="100%">
                        </div>
                        <form class="template-insert-form" action="{{route('insert-template')}}" method="POST">
                          @csrf 
                          <input type="hidden" name="page_name" value="home">
                          <input type="hidden" name="section_code" value="6">
                          <div class="text-center">
                            <button {{($news->count() > 1 && $category->count() > 1)? "" : "disabled"}} type="submit" class="custom-button button-red button-rounded" title="Insert Template">
                              <i class="bi bi-plus" style="font-size:20px; font-weight:700;"></i>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="col">
                      <div class="template-col my-2 pt-4">
                        <div class="text-center mb-3">
                          <p class="text-secondary">Template 7</p>
                          <p class="text-muted small">2 Category wise News</p>
                          <p class="small text-danger">{{($news->count() > 1 && $category->count() > 1)? "" : "*Add at least 1 News and 1 Category To Activate this Template"}}</p>
                          <img class="align-middle" src="img/template/template7.png" width="100%">
                        </div>
                        <form class="template-insert-form" action="{{route('insert-template')}}" method="POST">
                          @csrf 
                          <input type="hidden" name="page_name" value="home">
                          <input type="hidden" name="section_code" value="7">
                          <div class="text-center">
                            <button {{($news->count() > 1 && $category->count() > 1)? "" : "disabled"}} type="submit" class="custom-button button-red button-rounded" title="Insert Template">
                              <i class="bi bi-plus" style="font-size:20px; font-weight:700;"></i>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="col">
                      <div class="template-col my-2 pt-4">
                        <div class="text-center mb-3">
                          <p class="text-secondary">Template 8</p>
                          <p class="text-muted small">2 Category wise News</p>
                          <img class="align-middle" src="img/template/template8.png" width="100%">
                        </div>
                        <form class="template-insert-form" action="{{route('insert-template')}}" method="POST">
                          @csrf 
                          <input type="hidden" name="page_name" value="home">
                          <input type="hidden" name="section_code" value="8">
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
                        <div class="text-center mb-3">
                          <p class="text-secondary">Template 9</p>
                          <p class="text-muted small">Category wise News + Ad</p>
                          <img class="align-middle" src="img/template/template9.png" width="100%">
                        </div>
                        <form class="template-insert-form" action="{{route('insert-template')}}" method="POST">
                          @csrf 
                          <input type="hidden" name="page_name" value="home">
                          <input type="hidden" name="section_code" value="9">
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
                        <div class="text-center mb-3">
                          <p class="text-secondary">Template 10</p>
                          <p class="text-muted small">2 Category wise News</p>
                          <img class="align-middle" src="img/template/template10.png" width="100%">
                        </div>
                        <form class="template-insert-form" action="{{route('insert-template')}}" method="POST">
                          @csrf 
                          <input type="hidden" name="page_name" value="home">
                          <input type="hidden" name="section_code" value="10">
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
                        <div class="text-center mb-3">
                          <p class="text-secondary">Template 11</p>
                          <p class="text-muted small">Category wise News + Ad</p>
                          <img class="align-middle" src="img/template/template11.png" width="100%">
                        </div>
                        <form class="template-insert-form" action="{{route('insert-template')}}" method="POST">
                          @csrf 
                          <input type="hidden" name="page_name" value="home">
                          <input type="hidden" name="section_code" value="11">
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
                        <div class="text-center mb-3">
                          <p class="text-secondary">Template 12</p>
                          <p class="text-muted small">Category wise News</p>
                          <img class="align-middle" src="img/template/template12.png" width="100%">
                        </div>
                        <form class="template-insert-form" action="{{route('insert-template')}}" method="POST">
                          @csrf 
                          <input type="hidden" name="page_name" value="home">
                          <input type="hidden" name="section_code" value="12">
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