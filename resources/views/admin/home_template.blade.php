<x-header/>
 <style>
  .card-body{
    margin-left:5px;
  }
  </style>
<x-side_menu/>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      
<div class="col-md-12">
<div class="container">
  <div class="row my-6">
  
    <div class="col">
    <h4>HOME PAGE MANAGEMENT >> SECTION <?php echo $section;?>
      
        
       <p></p>
      
        
        <div class="container-fluid">
        
          
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
            
            <tr>
            <th>Position</th>
            <th>Category</th>
            <th>Action</th>
</tr>
</thead>

<?php
          $Query = DB::table('home_templates')->where('page_name','home')->where('section',$section)->orderBy('id','ASC')->get();
          foreach($Query as $row ){
            $category = DB::table('categories')->where('id',$row->category)->first();
        
          ?>
          <tr>
            <td>{{$row->position}}</td>
            <td>{{$category->title}}</td>
            <td><i onclick="DoEdit('<?php echo $row->id;?>','<?php echo $row->position;?>','<?php echo $row->category;?>')" class="fa fa-edit"></i></td>
        </tr>
        <?php }?>
        </table>
</div>
            
          </div>
        




</div>
  
</div>
</div>

<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form method="post" action="{{route('update-home-section')}}">  
  @csrf
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Template</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          <div class="form-group">
            <input type="hidden" name="page_id" id="page_id">
            <input type="hidden" name="section" id="section" value="<?php echo $section;?>">
            <label for="recipient-name" class="col-form-label">Position:</label>
           <select name="position" id="position" class="form-control" required>
            <option value="">----choose----</option>
            <option value="left">Left</option>
            <option value="middle">Middle</option>
            <option value="right">Right</option>
          </select>
          </div>

          
          <div class="form-group">
            <label for="message-text" class="col-form-label">Category:</label>
            <select name="category" id="category" class="form-control" required>
            <option value="">----choose----</option>
            <<?php
            $categories = DB::table('categories')->get();
            foreach($categories as $cat){?>
                   <option value="<?php echo $cat->id;?>"><?php echo $cat->title;?></option>
            <?php } ?>
          </select>
          </div>
        
      </div>
      <div class="modal-footer">
       
        <button type="sumbit" class="btn btn-primary">Save Changes</button>
      </div>
    </div>
  </div>
</div>
            </form>
</div>
  <x-footer/>
<script>
  function DoEdit(id,position,category){
    $('#page_id').val(id);
    $('#position').val(position);
    $('#category').val(category);
    $('#EditModal').modal('show');
  }
  </script>
  