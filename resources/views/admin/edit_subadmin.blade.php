<x-header/>
 
<x-side_menu/>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="card card-primary col-md-10 offset-md-1">
      
              <div class="card-header" style="margin-top:10px">
                <h3 class="card-title">Edit Subadmin User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('update-subadmin')}}" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="user_id" value="{{request()->get('id')}}">
                 <div class="card-body">
                 
                    <div class="row">
                    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $user->name;?>" required="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $user->email;?>" required="">
                  </div>

</div>
<div class="row">
  
<div class="form-group col-md-12">
  
<label for="exampleInputEmail1">Permissions</label>

  <div class="row">
    
  <?php
  $user_permissions=explode(',',$user->permission);
  $permissions= DB::table('permissions')->get();
  foreach($permissions as $perm){?>
  <div class="col-md-3">
  <input type="checkbox" name="permission[]" <?php if(in_array($perm->permission,$user_permissions)){?> checked<?php }?> value="<?php echo $perm->permission;?>"> <label for="exampleInputEmail1"><?php  echo $perm->permission;?></label>
  </div>
    
  <?php } ?>
  </div>
</div>
</div>
<div class="row">
                    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Name" value="<?php echo $user->mobile;?>" required="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="Password" >
                    <input type="hidden" class="form-control" id="old_password" name="old_password" placeholder="Password" value="<?php echo $user->password;?>">
                  </div>
</div>


</div>
<div class="col-md-12" style="text-align:right;padding-bottom: 12px">
                 
             <button type="submit" class="btn btn-primary">Update</button>      
</div>

</div>
                 
</form>
</div>
            
            
            




</div>
  

  <x-footer/>

 