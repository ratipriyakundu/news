<x-header/>
 
<x-side_menu/>
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <div class="panel-body widget-shadow p-5">
                    <form action="{{route('edit-story-store')}}" method="POST">
                        @csrf 
                        <input type="hidden" name="story_id" value="{{$story->id}}">
                        <label for="TitleInput">Title</label>
                        <input id="TitleInput" value="{{$story->title}}" type="text" name="title" class="form-control" required>
                        <label for="">Category</label>
                        <select name="category_id" class="form-control" required>
                            <option value="">-- Select --</option>
                            @foreach($categories as $category)
                                <option {{($category->id == $story->category) ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <div class="panel-body widget-shadow p-5">
                    <div class="text-center">
                        <h4>Slides</h4>
                    </div>
                    <div class="row mt-3">
                        @foreach($slides as $slide)
                            <div class="col-md-3">
                                <div class="slide-wrapper">
                                    <img src="{{$slide->image}}" style="width: 100%; height:300px;object-fit:cover;">
                                    <div class="slide-title">
                                        {{$slide->title}}
                                    </div>
                                </div>
                                <div class="text-center my-2">
                                    <a href="#" data-toggle="modal" data-target="#editSlide{{$slide->id}}" class="text-decoration-none text-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#deleteSlide{{$slide->id}}" class="text-decoration-none text-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                            {{-- Edit Slider Modal Start --}}
                            <div class="modal fade" id="editSlide{{$slide->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Edit Slide</h5>
                                    </div>
                                    <form action="{{route('edit-store-slide')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="{{$slide->id}}">
                                            <label>Title</label>
                                            <input value="{{$slide->title}}" type="text" name="title" class="form-control" required>
                                            <label>Upload New Slide</label>
                                            <input type="file" name="slide" class="form-control">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            {{-- End Edit Modal --}}
                            {{-- Delete Slider Modal Start --}}
                            <div class="modal fade" id="deleteSlide{{$slide->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Delete Slide</h5>
                                    </div>
                                    <form action="{{route('delete-slide')}}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="{{$slide->id}}">
                                            <div class="text-center">
                                                <h5>{{$slide->title}}</h5>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            {{-- End Delete Modal --}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<x-footer/>