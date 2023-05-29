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
        <div class="card">
            <div class="card-body p-3">
                <form action="{{route('add-templaate')}}" method="POST">
                    @csrf 
                    <select name="type" class="form-control mb-3" required>
                        <option value="">-- Select Type --</option>
                        <option value="Ad">Image Banner Ad</option>
                        <option value="Ad">Code Banner Ad</option>
                        <option value="Section">Section</option>
                    </select>
                    <textarea class="form-control mb-3" name="code" placeholder="Insert template code..." id="" cols="30" rows="10" required></textarea>
                    <button type="submit" class="btn btn-primary">Add Template</button>
                </form>
            </div>
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