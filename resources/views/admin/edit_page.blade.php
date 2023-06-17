<x-header/>
 
<x-side_menu/>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
  <div class="card card-primary col-md-10 offset-md-1">
      
              <div class="card-header" style="margin-top:10px">
                <h3 class="card-title">Edit >> {{$page->title}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('update-page')}}" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="page_id" value="{{request()->get('id')}}">
                 <div class="card-body">
                 
                    <div class="row">
                    <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Name" value="<?php echo $page->title;?>" required="">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Content</label>
                   <textarea name="content" id="myeditorinstance"><?php echo $page->content;?></textarea>
                  </div>

</div>

<button style="margin-left:91%;" type="submit" class="btn btn-primary">Update</button>
                 
</form>
</div>
            
            
            




</div>
  

  <x-footer/>

 