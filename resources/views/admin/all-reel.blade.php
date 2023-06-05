@php
    $reels = \App\Models\Reel::paginate(10);
@endphp
<x-header/>
 
<x-side_menu/>
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="card-body">
            <div class="panel-body widget-shadow">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Reel</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reels as $reel)
                                <tr>
                                    <td>{{$reel->id}}</td>
                                    <td>
                                        <video style="width:200px;" src="{{$reel->video}}" controls></video>
                                    </td>
                                    <td>
                                        <i class="fa fa-edit"></i>
                                        <a href="{{route('delete-reel')}}?id={{Crypt::encrypt($reel->id)}}" class="text-decoration-none text-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{$reels->links()}}
            </div>
        </div>
        {{-- <div class="modal" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
        </div> --}}
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
    $.post("{{route('delete-category')}}",{id:id,'_token':'{{csrf_token()}}'},function(result){
      
      window.location.reload();
    });
  }
</script>