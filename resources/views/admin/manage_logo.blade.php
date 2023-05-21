<x-header/>
 
<x-side_menu/>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="card card-primary col-md-10 offset-md-1">
      
              <div class="card-header"   style="margin-top:10px">
                <h3 class="card-title">Edit Logo </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <?php
            $logo= DB::table('logo')->where('id',1)->first();
            ?>
              <form method="post" action="{{route('update-logo')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                 
                    <div class="row">
                    <div class="form-group col-md-6">
                 
                    <img src="uploads/logo/<?php echo $logo->logo;?>" class="img-thumbnail">
                    
                  <div class="form-group col-md-6">
                   <input type="file" name="image">
                   <input type="hidden" name="old_image" value="{{$logo->logo}}">
                    
                  </div>
</div>

<div class="row">
                    
</div>
<div class="row">
                  

                 
               </div>


               
</div>

<div class="col-md-12" style="text-align:right;">
                 
             <button type="submit" class="btn btn-primary">Save Changes</button>      
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