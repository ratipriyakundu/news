<x-header/>
 
<x-side_menu/>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="card card-primary col-md-10 offset-md-1">
      
              <div class="card-header"   style="margin-top:10px">
                <h3 class="card-title">Add New Post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('add-news')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                 
                    <div class="row">
                    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">News Title</label>
                    <input type="text" class="form-control" id="" name="title" placeholder="News Title" required >
                  </div>
                 


                    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">News Date</label>
                    <input type="date" class="form-control" id="" name="news_date" value="<?php echo date('Y-m-d');?>" required >
                  </div>
</div>
<div class="row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">News Details </label>
                   <textarea name="description" id="myeditorinstance" class="form-control"></textarea>
                  </div>

                 
               </div>


               <div class="row">
                
                  <div class="form-group col-md-12">
                  <hr>
                    <label for="exampleInputEmail1">News Categories </label>
                    <div class="row offset-1">
                    @foreach($category as $cat)
                    <div class="col-md-3">
                   <input type="checkbox" name="category[]" class="categorydata" value="{{$cat->id}}" onclick="GetSubCateories()"> {{$cat->title}}
</div>
                   @endforeach
</div>
                  </div>
</div>
<div class="row" id="SubcatData" style="display:none;";>
                  <div class="form-group col-md-12">
                  <hr>
                    <label for="exampleInputEmail1">News Sub-Categories </label>
                    <div class="row offset-1" id="SubCategoryDataList">
</div>
</div>
</div>

<div class="row">
<div class="form-group col-md-2">
<label for="exampleInputEmail1">Breaking News </label>
<select name="breaking_news" class="form-control">
<option value="0">No </option>
  <?php
  for($a=2;$a<=30;$a++){?>
  <option value="<?php echo $a;?>"><?php echo $a;?> Minutes</option>
  <?php }?>
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
    <form method="post" >
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



  

  <x-footer/>

  <script>
  function GetSubCateories(){
    var category_ids = [];
          $('.categorydata:checked').each(function() {
              category_ids.push($(this).val());
            });
 
          if(category_ids!=''){
            $('#SubcatData').fadeIn();
            $.post("{{route('GetSubcategoryByCategory')}}",{category_ids:category_ids,'_token':'{{csrf_token()}}'},function(result){
              
              $('#SubCategoryDataList').html(result);
          });
        }else{
          $('#SubcatData').fadeOut();
        }

  }

 
</script>