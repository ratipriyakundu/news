<x-header/>
 
<x-side_menu/>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="card card-primary col-md-12">
      
              <div class="card-header">
                <h3 class="card-title">Add New </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('add-about')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="" name="title" placeholder="Title" required style="width:40%">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Upload Image</label>
                    <input type="file"  id="image" name="image">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Content</label>
                    <textarea name="content" id="myeditorinstance"></textarea>
                  </div>


                  <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary" style="float:right; margin-right:49%;">Submit</button>
</div>
                  
                  
                </div>
                <!-- /.card-body -->
                
              </form>
            </div>
            
            
            <div class="card-body">
    
	
      <div class="panel-body widget-shadow">
	 

      	<div class="table-responsive">

        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Image</th>
              <th>Title</th>
              <th>Content</th>
			  <th>Action</th>
              
            </tr>
          </thead>
          <tbody>
          @foreach($about_list as $list)
		  
            <tr>
              <th scope="row">{{$list->id}}</th>
              <td><img src="uploads/about/{{$list->image}}" class="img-thumbnail" style="width:100px;"></td>
              <td>{{$list->title}}</td>
              <td>{!! html_entity_decode($list->content) !!}</td>
			  <td>
        
                        
       <a class="" onclick="DoRemove('{{$list->id}}')"><i class="fa fa-trash"></i></a>
</td>
</tr>
        @endforeach
            
          </tbody>
        </table>
      </div>
      </div>
    </div>

<div class="modal" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form method="post" action="{{route('update-category')}}">
	@csrf
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
          <a href=""><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></a>
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
</div>     
<script>





  

  <x-footer/>

  <script>
  function DoEdit(id,title){
    $('#category_id').val(id);
    $('#category_title').val(title);
   $('#EditModal').modal('show');

  }

  function DoRemove(id){
    $.post("{{route('delete-about')}}",{id:id,'_token':'{{csrf_token()}}'},function(result){
      
      window.location.reload();
    });
  }
</script>