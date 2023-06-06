<x-header/>
 
<x-side_menu/>
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <div class="panel-body widget-shadow p-5">
                    <form action="{{route('add-slide-store')}}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <input type="hidden" name="story_id" value="{{Crypt::decrypt(request()->get('id'))}}">
                        <label for="TitleInput">Title</label>
                        <input id="TitleInput" type="text" name="title" class="form-control" required>
                        <label for="CategoryInput">Image</label>
                        <input type="file" class="form-control" name="image" required>
                        <button class="btn btn-primary mt-3">Add</button>
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
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-4">
                        <form action="{{route('publish-story')}}" method="POST">
                            @csrf 
                            <input type="hidden" name="story_id" value="{{Crypt::decrypt(request()->get('id'))}}">
                            <button type="submit" class="btn btn-primary">Publish Story</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<x-footer/>