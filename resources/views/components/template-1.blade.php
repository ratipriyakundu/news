@php
    $custom_banner_exists = \App\Models\Attribute::where(
        [
            'template_id' => $id,
            'name' => 'custom_banner'
        ]
    )->exists();
    if($custom_banner_exists) {
        $custom_banner = \App\Models\Attribute::where(
            [
                'template_id' => $id,
                'name' => 'custom_banner'
            ]
        )->first();
        $banner_image = $custom_banner->value;
    }else {
        $banner_image = 'img/ad/image-banner.webp';
    }
@endphp
<div class="container mt-4">
    <div class="banner-ad-wrapper">
        <img src="{{$banner_image}}" width="100%" height="auto">
    </div>
</div>
{{-- Edit Modal --}}
<div class="modal fade" id="editModal{{$id}}" tabindex="-1" aria-labelledby="editModal{{$id}}Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body text-center p-5">
            <form action="{{route('edit-template')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$id}}" name="id">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                        Custom Banner
                      </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                        Default Banner
                      </button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="my-5">
                            <label class="mb-3" for="inputGroupFile01">Upload Ad Banner</label>
                            <input type="file" name="banner" class="form-control" id="inputGroupFile01">
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="my-5">
                            <img src="img/ad/image-banner.webp" width="100%">
                        </div>
                    </div>
                </div>
                <button type="submit" name="template-1-edit-btn" class="custom-button button-red">Save</button>
            </form>
        </div>
      </div>
    </div>
</div>
{{-- End Edit Modal --}}