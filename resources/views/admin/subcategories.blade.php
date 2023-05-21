<x-header/>
 
<x-side_menu/>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="card card-primary col-md-12">
      
              <div class="card-header">
                <h3 class="card-title">Add New Sub-Subategory</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('add-subcategory')}}">
                @csrf
                <div class="card-body col-md-12">
                  <div class="row">

                  <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Choose Category</label>
                <select name="category_id" class="form-control select2" required style="width:100%!important;">
                     
                      @foreach($category_list as $cat)
                      <option value="{{$cat->id}}">{{$cat->title}}</option>
                      @endforeach
</select>
</div>

                
                  <div class="form-group col-md-4">
                    
                    <label for="exampleInputEmail1">SubCategory Name</label>
                    <input type="text" class="form-control" id="" name="title" placeholder="Subcategory Title" required>
                  </div>
                 <div class="col-md-2">
                  <button type="submit" class="btn btn-primary" style="float:right; margin-top: 30px;margin-right:49%;">Submit</button>
</div>
                </div>
                <!-- /.card-body -->
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
              <th>Category Name</th>
              <th>Subcategory Name</th>
			  <th>Action</th>
              
            </tr>
          </thead>
          <tbody>
          @foreach($categorydata as $subcat)
          @php
             $id=$subcat['id'];
		         $title=$subcat['subcategory_name'];
             @endphp
            <tr>

              <th scope="row">{{$subcat['id']}}</th>
              <td>{{$subcat['category_name']}}</td>
              <td>{{$subcat['subcategory_name']}}</td>
			  <td>
        <i onclick="DoEdit('{{$id}}','{{$title}}')" class="fa fa-edit"></i>
                        

        <a class="" onclick="return confirm('Are you sure?')" href="delete-subcategory?id={{$id}}"><i class="fa fa-trash"></i></a>
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
    <form method="post" action="{{route('update-subcategory')}}" >
      @csrf
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
         <a href=""> <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
		  </a>
        </div>
        <div class="modal-body">
         
            <div class="form-group">
              <input type="hidden" name="id" id="id">
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
    $('#id').val(id);
    $('#category_title').val(title);
   $('#EditModal').modal('show');

  }

  function DoRemove(id){
    alert(id);
  }
</script>