<x-header/>
 
<x-side_menu/>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="card card-primary col-md-12">
      
              <div class="card-header">
                <h3 class="card-title">Add New Category <i class="fa fa-arrow-right"></i> {{$menu_title[0]}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('add-menucategory')}}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="hidden" class="form-control" id="" name="menu_id" value="{{$menu_id[0]}}" placeholder="Category Title" required style="width:40%">
                    <input type="hidden" class="form-control" id="" name="menu_title" value="{{$menu_title[0]}}" placeholder="Category Title" required style="width:40%">
                    
                   <select name="category_id" class="form-control" required style="width:40%">>
                    <option value="">Select</option>
                    <?php
                    $categories = DB::table('categories')->get();
               			?>
			                  @foreach($categories as $cat)
                      <option value="{{$cat->id}}">{{$cat->title}}</option>
                        @endforeach
                   </select> 
                  
                  </div>
                 
                  <button type="submit" class="btn btn-primary" style="float:right; margin-top: -53px;margin-right:49%;">Submit</button>
                  
                </div>
                <!-- /.card-body -->

                
              </form>
            </div>
            
            
            <div class="card-body">
    
	<h4>{{$menu_title[0]}} <i class="fa fa-arrow-right"></i> Category List</h4>
      <div class="panel-body widget-shadow">
	 

      	<div class="table-responsive">

        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Category Name</th>
			  <th>Action</th>
              
            </tr>
          </thead>
          <tbody>
            @php
            $i=1;
            @endphp
          @foreach($Menucategory as $cat)
		  
            <tr>
              <th scope="row">{{$i}}</th>
              <td>{{$cat->title}}</td>
			  <td>
       
                        
       <a class="" onclick="DoRemove('{{$cat->id}}')"><i class="fa fa-trash"></i></a>
</td>
</tr>
@php
$i++;
@endphp
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
    
    $.post("{{route('delete-menucategory')}}",{id:id,'_token':'{{csrf_token()}}'},function(result){
      
      window.location.reload();
    });
  }
</script>