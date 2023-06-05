<x-header/>
 
<x-side_menu/>
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <div class="panel-body widget-shadow p-5">
                    <form action="{{route('add-reel-store')}}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <label for="videoInput">Upload Reel</label>
                        <input id="videoInput" accept="video/*" type="file" name="video" class="form-control">
                        <button class="btn btn-primary mt-3">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>     
<script>
<x-footer/>