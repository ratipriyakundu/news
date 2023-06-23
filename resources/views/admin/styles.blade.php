<x-header/>
 
<x-side_menu/>
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="card card-primary col-md-10 offset-md-1">
        <div class="card-header" style="margin-top:10px">
            <h3 class="card-title">Header Customization</h3>
        </div>
        <div class="card-body">
            <form action="{{route('add-header-style')}}" method="POST">
                @csrf 
                @php
                    if( \App\Models\Style::where('property','header_primary_color')->exists()) {
                        $header_primary_color = \App\Models\Style::where('property','header_primary_color')
                        ->first();
                        $header_primary_color = $header_primary_color->value;
                    }else {
                        $header_primary_color = '#e1261d';
                    }
                    if( \App\Models\Style::where('property','header_primary_text_color')->exists()) {
                        $header_primary_text_color = \App\Models\Style::where('property','header_primary_text_color')
                        ->first();
                        $header_primary_text_color = $header_primary_text_color->value;
                    }else {
                        $header_primary_text_color = '#FFFFFF';
                    }
                    if( \App\Models\Style::where('property','header_text_color')->exists()) {
                        $header_text_color = \App\Models\Style::where('property','header_text_color')
                        ->first();
                        $header_text_color = $header_text_color->value;
                    }else {
                        $header_text_color = '#001d42';
                    }
                @endphp
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Header Primary Color</label>
                        <input type="color" class="form-control" name="header_primary_color" value="{{$header_primary_color}}">
                    </div>
                    <div class="col-md-4">
                        <label for="">Header Primary Text Color</label>
                        <input type="color" class="form-control" name="header_primary_text_color" value="{{$header_primary_text_color}}">
                    </div>
                    <div class="col-md-4">
                        <label for="">Header Text Color</label>
                        <input type="color" class="form-control" name="header_text_color" value="{{$header_text_color}}">
                    </div>
                </div>
                <div class="row mt-4">
                    <button class="btn btn-success m-2" type="submit" name="header_style_save">Save</button>
                    <button class="btn btn-danger m-2" type="submit" name="header_style_reset">Reset</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card card-primary col-md-10 offset-md-1">
        <div class="card-header" style="margin-top:10px">
            <h3 class="card-title">Nav Menu Customization</h3>
        </div>
        <div class="card-body">
        </div>
    </div>
</div>
</div> 
<x-footer/>