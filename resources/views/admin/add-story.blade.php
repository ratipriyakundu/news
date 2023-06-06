<x-header/>
 
<x-side_menu/>
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <div class="panel-body widget-shadow p-5">
                    <form action="{{route('add-story-store')}}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <label for="TitleInput">Title</label>
                        <input id="TitleInput" type="text" name="title" class="form-control" required>
                        <label for="CategoryInput">Category</label>
                        <select class="form-control" name="category" id="CategoryInput" required>
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary mt-3">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>     
<script>
<x-footer/>