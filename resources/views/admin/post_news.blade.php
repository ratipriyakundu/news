<x-header />

<x-side_menu />
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="card card-primary col-md-10 offset-md-1">

        <div class="card-header" style="margin-top:10px">
            <h3 class="card-title">Add New Post</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{ route('add-news') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">News Title</label>
                        <input type="text" class="form-control" id="" name="title"
                            placeholder="News Title" required>
                    </div>



                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">News Date</label>
                        <input type="date" class="form-control" id="" name="news_date"
                            value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">News Details </label>
                        <textarea name="description" id="file-picker" class="form-control"></textarea>
                    </div>


                </div>


                <div class="row">

                    <div class="form-group col-md-12">
                        <hr>
                        <label for="exampleInputEmail1">News Categories </label>
                        <div class="row offset-1">
                            @foreach ($category as $cat)
                                @php
                                    $subcategories = \App\Models\Subcategory::where('category_id', $cat->id)->get();
                                @endphp
                                <div class="col-md-12">
                                    <input type="checkbox" name="category[]" class="categorydata"
                                        value="{{ $cat->id }}" onclick="GetSubCateories()"> {{ $cat->title }}
                                    @if ($subcategories->count() > 0)
                                        <div class="row" style="border-left: 4px solid blue; padding: 10px;">
                                            @foreach ($subcategories as $subcategory)
                                                <div class="subcategory_div col-md-3">
                                                    <input type="checkbox" name="subcategory[]" class="subcategorydata"
                                                        value="{{ $subcategory->id }}"> {{ $subcategory->title }}
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- <div class="row" id="SubcatData" style="display:none;";>
                    <div class="form-group col-md-12">
                        <hr>
                        <label for="exampleInputEmail1">News Sub-Categories </label>
                        <div class="row offset-1" id="SubCategoryDataList">
                        </div>
                    </div>
                </div> --}}

                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="exampleInputEmail1">Breaking News </label>
                        <select name="breaking_news" class="form-control">
                            <option value="0">No </option>
                            <?php
  for($a=2;$a<=30;$a++){?>
                            <option value="<?php echo $a; ?>"><?php echo $a; ?> Minutes</option>
                            <?php }?>
                            <option value="60">1 Hours</option>
                            <option value="180">3 Hours</option>
                            <option value="360">6 Hours</option>
                            <option value="720">12 Hours</option>
                            <option value="1440">24 Hours</option>
                        </select>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="exampleInputEmail1">Latest News </label>
                        <select name="latest_news" class="form-control">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="exampleInputEmail1">Popular News </label>
                        <select name="popular_news" class="form-control">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>

                </div>


                <div class="row">
                    <div class="form-group col-md-6">
                        <hr>
                        <label for="exampleInputEmail1">Upload Image</label>
                        <div class="row offset-1">
                            <input type="file" name="image" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="text-align:right;">

                    <button type="submit" class="btn btn-primary">Post News</button>
                </div>

            </div>

    </div>

</div>



</div>
<!-- /.card-body -->


</form>
</div>





</div>
<div class="modal" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <input type="hidden" name="category_id" id="category_id">
                        <label for="recipient-name" class="form-control-label">Category Title:</label>
                        <input type="text" class="form-control" name="title" id="category_title" required>
                    </div>


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
    function GetSubCateories() {
        var category_ids = [];
        $('.categorydata:checked').each(function() {
            category_ids.push($(this).val());
        });

        if (category_ids != '') {
            $('#SubcatData').fadeIn();
            $.post("{{ route('GetSubcategoryByCategory') }}", {
                category_ids: category_ids,
                '_token': '{{ csrf_token() }}'
            }, function(result) {

                $('#SubCategoryDataList').html(result);
            });
        } else {
            $('#SubcatData').fadeOut();
        }

    }
</script>
<script>
    
tinymce.init({
  selector: 'textarea#file-picker',
  plugins: 'image code',
  toolbar: 'undo redo | link image | code | styles | bold italic | alignleft aligncenter alignright alignjustify | outdent indent',
  /* enable title field in the Image dialog*/
  image_title: true,
  /* enable automatic uploads of images represented by blob or data URIs*/
  automatic_uploads: true,
  /*
    URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
    images_upload_url: 'postAcceptor.php',
    here we add custom filepicker only to Image dialog
  */
  file_picker_types: 'image',
  /* and here's our custom image picker*/
  file_picker_callback: function (cb, value, meta) {
    var input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');

    /*
      Note: In modern browsers input[type="file"] is functional without
      even adding it to the DOM, but that might not be the case in some older
      or quirky browsers like IE, so you might want to add it to the DOM
      just in case, and visually hide it. And do not forget do remove it
      once you do not need it anymore.
    */

    input.onchange = function () {
      var file = this.files[0];

      var reader = new FileReader();
      reader.onload = function () {
        /*
          Note: Now we need to register the blob in TinyMCEs image blob
          registry. In the next release this part hopefully won't be
          necessary, as we are looking to handle it internally.
        */
        var id = 'blobid' + (new Date()).getTime();
        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        var base64 = reader.result.split(',')[1];
        var blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

        /* call the callback and populate the Title field with the file name */
        cb(blobInfo.blobUri(), { title: file.name });
      };
      reader.readAsDataURL(file);
    };

    input.click();
  },
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});

</script>
