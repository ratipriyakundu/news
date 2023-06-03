<x-header/>
 
<x-side_menu/>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="card card-primary col-md-10 offset-md-1">
      
              <div class="card-header"   style="margin-top:10px">
                <h3 class="card-title">Edit News </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('update-news')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                 
                    <div class="row">
                    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">News Title</label>
                    <input type="text" class="form-control" id="" name="title" placeholder="News Title" value="{{$news['title']}}" required >
                  </div>
                 



                    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">News Date</label>
                    <input type="date" class="form-control" id="" name="news_date" value="{{$news['news_date']}}" required >
                  </div>
</div>
<div class="row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">News Details </label>
                   <textarea name="description" id="myeditorinstance" class="form-control">{{$news['description']}}</textarea>
                  </div>

                 
               </div>


               <div class="row">
                
                  <div class="form-group col-md-12">
                  <hr>
                    <label for="exampleInputEmail1">News Categories </label>
                    <div class="row offset-1">
                      <?php
                     
                      $categorydata=explode(',',$news['category']);
                     
                      ?>
                    @foreach($category as $cat)
                    <div class="col-md-3">
                   <input type="checkbox" <?php if(in_array($cat->id,$categorydata)){?> checked <?php }?>  name="category[]" class="categorydata" value="{{$cat->id}}" onclick="GetSubCateories()"> {{$cat->title}}
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
  <option value="<?php echo $a;?>" <?php if($news['breaking_news']==$a){?> selected <?php } ?>><?php echo $a;?> Minutes</option>
  <?php }?>
  <option value="60" <?php if($news['breaking_news']==60){?> selected <?php } ?>>1 Hours</option>
  <option value="180" <?php if($news['breaking_news']==180){?> selected <?php } ?>>3 Hours</option>
  <option value="360" <?php if($news['breaking_news']==360){?> selected <?php } ?>>6 Hours</option>
  <option value="720" <?php if($news['breaking_news']==720){?> selected <?php } ?>>12 Hours</option>
  <option value="1440" <?php if($news['breaking_news']==1440){?> selected <?php } ?>>24 Hours</option>
</select>
</div>

<div class="form-group col-md-2">
<label for="exampleInputEmail1">Latest News </label>
<select name="latest_news" class="form-control">
  <option value="0" <?php if($news['latest_news']==0){?> selected <?php } ?>>No</option>
  <option value="1" <?php if($news['latest_news']==1){?> selected <?php } ?>>Yes</option>
  </select>
  </div>

  <div class="form-group col-md-2">
<label for="exampleInputEmail1">Popular News </label>
<select name="popular_news" class="form-control">
  <option value="0" <?php if($news['popular']==0){?> selected <?php } ?>>No</option>
  <option value="1" <?php if($news['popular']==1){?> selected <?php } ?>>Yes</option>
  </select>
  </div>

</div>
<div class="row">
                  <div class="form-group col-md-6">
                    <hr>
                    <label for="exampleInputEmail1">Upload Image</label>
                    <div class="row offset-1">
                      <input type="file" name="image">
                      <input type="hidden" name="old_image" value="{{$news['image']}}" >
                      <input type="hidden" name="news_id" value="{{$news['id']}}" required>
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
          
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
      </form>
    </div>
</div>



  

  <x-footer/>

  <script>
$( document ).ready(function() {
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
});

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