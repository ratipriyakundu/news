<x-header/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
              <th>Social Name</th>
              <th>Social Url</th>
			  <th>Action</th>
              
            </tr>
          </thead>
          <tbody>
          @foreach($social as $list)
		  
            <tr>
              <th scope="row">{{$list->id}}</th>
              <td><i class="fa-brands fa-{{$list->social_name}}"></i></td>
			  <td> {{$list->url}}</td>
        <td><i onclick="DoEdit({{$list->id}},'{{$list->social_name}}','{{$list->url}}')" class="fa fa-edit"></a>
</tr>
        @endforeach
            
          </tbody>
        </table>
      </div>
      </div>
    </div>


</div>     
<div class="modal" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form method="post" action="{{route('update-social')}}">
    @csrf
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Social</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         
            <div class="form-group">
              <input type="hidden" name="social_id" id="social_id">
              <label for="recipient-name" class="form-control-label">Social Name:</label>
              <input type="text" class="form-control" name="social_name" id="social_name" required>
            </div>

            <div class="form-group">
            <label for="recipient-name" class="form-control-label">Social Url:</label>
            <input type="text" class="form-control" name="url" id="url" required>
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


  function DoEdit(id,social_name,url){
    $('#social_id').val(id);
    $('#social_name').val(social_name);
    $('#url').val(url);
   $('#EditModal').modal('show');

  }

  $('.close').click(function(){
    window.location.reload();
  });
</script>