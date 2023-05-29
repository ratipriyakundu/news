<x-header/>
 
<x-side_menu/>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="card card-primary col-md-10 offset-md-1">
      
              <div class="card-header" style="margin-top:10px">
                <h3 class="card-title">Add Subadmin User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('add-subadmin')}}" enctype="multipart/form-data">
                @csrf
                 <div class="card-body">
                 
                    <div class="row">
                    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
                  </div>

</div>
<div class="row">
  
<div class="form-group col-md-12">
  
<label for="exampleInputEmail1">Permissions</label>

  <div class="row">
    
  <?php
  $permissions= DB::table('permissions')->get();
  foreach($permissions as $perm){?>
  <div class="col-md-3">
  <input type="checkbox" name="permission[]" value="<?php echo $perm->permission;?>"> <label for="exampleInputEmail1"><?php  echo $perm->permission;?></label>
  </div>
    
  <?php } ?>
  </div>
</div>
</div>
<div class="row">
                    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Name" required="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="Password" required="">
                  </div>
</div>


</div>
<div class="col-md-12" style="text-align:right;padding-bottom: 12px">
                 
             <button type="submit" class="btn btn-primary">Submit</button>      
</div>

</div>
                 
</form>

            
            
            <div class="card-body">
    
	
      <div class="panel-body widget-shadow">
	 

      	<div class="table-responsive">

        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Mobile</th>
              <th>Permission</th>
			  <th>Action</th>
              
            </tr>
          </thead>
          <tbody>
          @foreach($admin as $list)
		   <?php
       if($list->id!=1){?>
            <tr>
              <th scope="row">{{$list->id}}</th>
              <td>{{$list->name}}</td>
              <td>{{$list->email}}</td>
              <td>{{$list->mobile}}</td>
              <td>
                <?php
                $permis=explode(',',$list->permission);
                foreach($permis as $p){?>
<button class="btn btn-default btn-sm"><?php echo $p;?></button>
                <?php }?>
              
  </td>
<td>
<a href="{{route('edit-subadmin')}}?id={{$list->id}}"><i class="fa fa-edit"></i></a> 
    <!--<i class="fa fa-edit" onclick="DoEdit('{{$list->id}}','{{$list->name}}','{{$list->email}}','{{$list->mobile}}','{{$list->password}}','<?php echo base64_encode($list->permission);?>')"></i>-->                   
      <i onclick="DoRemove('{{$list->id}}')" class="fa fa-trash"></i> 
</td>
</tr>
<?php }?>
        @endforeach
            
          </tbody>
        </table>
      </div>
      </div>
    </div>
    </div>

</div>     



<div class="modal" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form method="post" action="{{route('update-subadmin')}}">
	@csrf
      <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Subadmin</h5>
          <a href=""><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></a>
        </div>
        <div class="modal-body">
         
            <div class="form-group">
              <input type="hidden" name="user_id" id="user_id">
              <label for="recipient-name" class="form-control-label">Name:</label>
              <input type="text" class="form-control" name="name" id="name_e" required>
            </div>
            

            <div class="form-group">
             
              <label for="recipient-name" class="form-control-label">Email:</label>
              <input type="email" class="form-control" name="email" id="email_e" required>
            </div>

            <div class="form-group">
             
             <label for="recipient-name" class="form-control-label">Mobile:</label>
             <input type="text" class="form-control" name="mobile" id="mobile_e" required>
           </div>

           <div class="form-group">
             
             <label for="recipient-name" class="form-control-label">Password:</label>
             <input type="hidden" class="form-control" name="old_password" id="old_password" required>
             <input type="text" class="form-control" name="password" id="password_e" >
           </div>
           <div class="form-group">
           <label for="recipient-name" class="form-control-label">Permission:</label>
           <div class="row">
    
    <?php
    $permissions= DB::table('permissions')->get();
    foreach($permissions as $perm){?>
    <div class="col-md-6">
    <input type="checkbox" name="permission[]" value="<?php echo $perm->permission;?>"> <label for="exampleInputEmail1"><?php  echo $perm->permission;?></label>
    </div>
      
    <?php } ?>
    </div>
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
  function DoEdit(id,name,email,mobile,password,permission){
    $('#user_id').val(id);
    $('#name_e').val(name);
    $('#email_e').val(email);
    $('#mobile_e').val(mobile);
    $('#old_password').val(password);
    var perm=atob(permission);
    const array = perm.split(',');
    console.log(array);
   $('#EditModal').modal('show');

  }

  function DoRemove(id){
    var response=confirm("Are you sure want to delete this user?");
    if(response){
      $.post("{{route('delete-subadmin')}}",{id:id,'_token':'{{csrf_token()}}'},function(result){
          window.location.reload();    
              
          });
    }
  }
</script>