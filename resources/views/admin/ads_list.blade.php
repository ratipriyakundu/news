<x-header />
<x-side_menu />
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="card card-primary col-md-10 offset-md-1">

        <div class="card-header" style="margin-top:10px">
            <h3 class="card-title">Add New ADS</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{ route('add-ads') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">ADS Type</label>
                        <select name="ads_type" class="form-control" required onchange="AdsType(this.value)">

                            <option value="custom" selected>Custom</option>
                            <option value="google">Google</option>

                        </select>
                    </div>

                    <div class="form-group col-md-12" id="Custom">
                        <label for="exampleInputEmail1">Upload Ads Banner</label>
                        <br>
                        <input type="file" name="image">
                        <br>
                        <p></p>
                        <label for="exampleInputEmail1">URL</label>
                        <br>
                        <input type="text" name="url" class="form-control">
                    </div>

                </div>

                <div class="form-group col-md-12" id="Google" style="display:none;">
                    <label for="exampleInputEmail1">Google Script</label>
                    <br>
                    <textarea name="google_script" class="form-control"></textarea>


                </div>

                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Specific Location</label>
                    <select onchange="specific_ad(this.value)" name="position" class="form-control" required>
                        <option value="all">All</option>
                        <option value="category">Specific Category</option>
                    </select>
                </div>

                <div class="form-group col-md-6 d-none" id="ad_location_option">
                  <label for="exampleInputAdLocation">Select Category</label>
                  <select name="category_id" class="form-control">
                      @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                      @endforeach
                  </select>
                </div>

                <div class="col-md-12" style="text-align:right;padding-bottom: 12px">

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </div>

        </form>
    </div>


    <div class="card-body">


        <div class="panel-body widget-shadow">


            <div class="table-responsive">

                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ADS Type</th>
                            <th>Image</th>
                            <th>Url</th>
                            <th>Google Script</th>
                            <th>Position</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ads as $list)
                            <tr>
                                <th scope="row">{{ $list->id }}</th>
                                <td>{{ $list->ads_type }}</td>
                                <td><img src="uploads/ads/{{ $list->image }}" class="img-thumbnail"
                                        style="height:100px;width:100px;"></td>
                                <td>{{ $list->url }}</td>
                                <td>{{ $list->google_script }}</td>
                                <td>{{ $list->position }}</td>
                                <td>

                                    <i class="fa fa-edit"
                                        onclick="DoEdit('{{ $list->id }}','{{ $list->ads_type }}','{{ $list->image }}','{{ $list->url }}','{{ $list->google_script }}','{{ $list->position }}')"></i>
                                        <a href="{{route('delete-ad')}}?id={{Crypt::encrypt($list->id)}}" class="fa fa-trash text-danger"></a>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>



<div class="modal" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form method="post" action="{{ route('update-ads') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Ads</h5>
                    <a href=""><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button></a>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <input type="hidden" name="ads_id" id="ads_id">
                        <label for="recipient-name" class="form-control-label">Ads Type:</label>
                        <select name="ads_type" id="ads_type" class="form-control" required
                            onchange="AdsTypeEdit(this.value)">

                            <option value="custom" selected>Custom</option>
                            <option value="google">Google</option>

                        </select>
                    </div>


                    <div class="form-group col-md-12" id="Custom_e">
                        <label for="exampleInputEmail1">Upload Ads Banner</label>
                        <br>
                        <img id="Banner" class="img-thumbnail" style="height: 232px; width: 100%;">
                        <input type="file" name="image">
                        <input type="hidden" name="old_image" id="old_image">
                        <br>
                        <p></p>
                        <label for="exampleInputEmail1">URL</label>
                        <br>
                        <input type="text" name="url" id="url" class="form-control">
                    </div>

                </div>

                <div class="form-group col-md-12" id="Google_e" style="display:none;">
                    <label for="exampleInputEmail1">Google Script</label>
                    <br>
                    <textarea name="google_script" id="google_script" class="form-control"></textarea>


                </div>


                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Position</label>
                    <select name="position" id="position_e" class="form-control" required>
                        <option value="left">Left</option>
                        <option value="right">Right</option>
                        <option value="center">Center</option>
                        <option value="top">Top</option>
                        <option value="bottom">Bottom</option>
                    </select>
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
    </form>
</div>
</div>


<x-footer />

<script>
    function AdsType(ads_type) {

        if (ads_type == 'custom') {
            $('#Custom').css('display', 'block');
            $('#Google').css('display', 'none');

        }

        if (ads_type == 'google') {
            $('#Custom').css('display', 'none');
            $('#Google').css('display', 'block');

        }


    }


    function AdsTypeEdit(ads_type) {

        if (ads_type == 'custom') {
            $('#Custom_e').css('display', 'block');
            $('#Google_e').css('display', 'none');

        }

        if (ads_type == 'google') {
            $('#Custom_e').css('display', 'none');
            $('#Google_e').css('display', 'block');

        }


    }


    function DoEdit(id, ads_type, image, url, google_script, position) {
        if (ads_type == 'custom') {
            $('#Custom_e').css('display', 'block');
            $('#Google_e').css('display', 'none');

        }

        if (ads_type == 'google') {
            $('#Custom_e').css('display', 'none');
            $('#Google_e').css('display', 'block');

        }
        $('#ads_id').val(id);
        $('#ads_type').val(ads_type);
        $('#old_image').val(image);
        $('#url').val(url);
        $('#position_e').val(position);
        document.getElementById('Banner').src = "uploads/ads/" + image;
        $('#google_script').val(google_script);
        $('#EditModal').modal('show');

    }

    function specific_ad(ad_location) {
      if(ad_location == 'all') {
        $('#ad_location_option').addClass('d-none');
      }
      if(ad_location == 'category') {
        $('#ad_location_option').removeClass('d-none');
      }
    }
</script>
