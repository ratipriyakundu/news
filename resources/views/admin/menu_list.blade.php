<x-header/>
 
<x-side_menu/>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="card card-primary col-md-12">
      
             
              <!-- /.card-header -->
              <!-- form start -->
              
            </div>
            
            
            <div class="card-body">
    
	
      <div class="panel-body widget-shadow">
	 

      	<div class="table-responsive">

        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Menu Name</th>
			  <th>Action</th>
              
            </tr>
          </thead>
          <tbody>
          @foreach($menu as $list)
		  
            <tr>
              <th scope="row">{{$list->id}}</th>
              <td>{{$list->title}}</td>
			  <td>
        <a href="{{route('menu-category')}}?id={{$list->id}}&title={{$list->title}}"><button  class="btn btn-success btn-sm"> Manage Category</button></a>
                        
       
</td>
</tr>
        @endforeach
            
          </tbody>
        </table>
      </div>
      </div>
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
  function DoEdit(id,title){
    $('#category_id').val(id);
    $('#category_title').val(title);
   $('#EditModal').modal('show');

  }

  function DoRemove(id){
    alert(id);
  }
</script>