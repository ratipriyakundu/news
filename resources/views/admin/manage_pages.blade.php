<x-header/>
 
<x-side_menu/>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="card card-primary col-md-12">
      
             
              <!-- /.card-header -->
              <!-- form start -->
              
            </div>
            
            
            <div class="card-body">
    <button onclick="DoAdd()" style="float: right;" class="btn btn-primary">Add New</button>
	
      <div class="panel-body widget-shadow">
	 

      	<div class="table-responsive">
        <p></p>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Page Name</th>
              <th>Content</th>
			         <th>Action</th>
              
            </tr>
          </thead>
          <tbody>
            <?php
            $i=1;?>
          @foreach($pages as $list)
		  
            <tr>
              <th scope="row">{{$i}}</th>
              <td>{{$list->title}}</td>
              <td>{{$list->content}}</td>
			  <td>
        <i onclick="DoEdit('{{$list->id}}','{{$list->title}}','<?php echo base64_encode($list->content);?>')" class="fa fa-edit"></i>
                        
       <a class="" onclick="return confirm('Are you sure?')" href="{{route('delete-page')}}?id={{$list->id}}"><i class="fa fa-trash"></i></a>
</td>
</tr>
<?php $i++;?>
        @endforeach
            
          </tbody>
        </table>
      </div>
      </div>
    </div>


</div>     
<div class="modal" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form method="post" method="post" action="{{route('update-page')}}" >
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Page</h5>
          <a href=""><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></a>
        </div>
        <div class="modal-body">
         
            <div class="form-group">
              <input type="hidden" name="page_id" id="page_id">
              <label for="recipient-name" class="form-control-label">Page Title:</label>
              <input type="text" class="form-control" name="title" id="title_e" required>
            </div>
            <div class="form-group col-md-12">
            <label for="recipient-name" class="form-control-label">Page Content:</label>
              
             <textarea class="form-control" name="content" id="content_e" required></textarea>
            </div>
         
        </div>
        <div class="modal-footer">
          
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
      </form>
    </div>
</div>


<div class="modal" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form method="post" action="{{route('add-page')}}">
	@csrf
      <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Page</h5>
          <a href=""><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></a>
        </div>
        <div class="modal-body">
         
            <div class="form-group">
             
              <label for="recipient-name" class="form-control-label">Page Title:</label>
              <input type="text" class="form-control" name="title" id="title" required>
            </div>
            

            <div class="form-group col-md-12">
            <label for="recipient-name" class="form-control-label">Page Content:</label>
              
             <textarea class="form-control" name="content" id="description" required></textarea>
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
  function DoEdit(id,title,content){
    $('page_id').val(id);
    $('#title_e').val(title);
    $('#content_e').html(atob(content));
   $('#EditModal').modal('show');

  }

  function DoAdd(id){
   $('#AddModal').modal('show');
  }
</script>