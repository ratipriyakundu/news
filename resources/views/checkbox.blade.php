@foreach($subcategorydata as $subcat)
    <div class="col-md-3">
                   <input type="checkbox" name="subcategory[]" class="subcategorydata" value="{{$subcat['id']}}"> {{$subcat['title']}}
</div>

@endforeach

