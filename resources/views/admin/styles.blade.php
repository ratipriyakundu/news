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
                        $header_text_color = '#666';
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
            <form action="{{route('add-nav-menu-style')}}" method="POST">
                @csrf 
                @php
                    if( \App\Models\Style::where('property','menu_background_color')->exists()) {
                        $menu_background_color = \App\Models\Style::where('property','menu_background_color')
                        ->first();
                        $menu_background_color = $menu_background_color->value;
                    }else {
                        $menu_background_color = '#1b67e9';
                    }
                    if( \App\Models\Style::where('property','menu_text_color')->exists()) {
                        $menu_text_color = \App\Models\Style::where('property','menu_text_color')
                        ->first();
                        $menu_text_color = $menu_text_color->value;
                    }else {
                        $menu_text_color = '#FFFFFF';
                    }
                    if( \App\Models\Style::where('property','menu_item_hover_color')->exists()) {
                        $menu_item_hover_color = \App\Models\Style::where('property','menu_item_hover_color')
                        ->first();
                        $menu_item_hover_color = $menu_item_hover_color->value;
                    }else {
                        $menu_item_hover_color = '#f70404';
                    }
                @endphp
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Menu Background Color</label>
                        <input type="color" class="form-control" name="menu_background_color" value="{{$menu_background_color}}">
                    </div>
                    <div class="col-md-4">
                        <label for="">Menu Text Color</label>
                        <input type="color" class="form-control" name="menu_text_color" value="{{$menu_text_color}}">
                    </div>
                    <div class="col-md-4">
                        <label for="">Menu Item Hover Color</label>
                        <input type="color" class="form-control" name="menu_item_hover_color" value="{{$menu_item_hover_color}}">
                    </div>
                </div>
                <div class="row mt-4">
                    <button class="btn btn-success m-2" type="submit" name="nav_menu_style_save">Save</button>
                    <button class="btn btn-danger m-2" type="submit" name="nav_menu_style_reset">Reset</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card card-primary col-md-10 offset-md-1">
        <div class="card-header" style="margin-top:10px">
            <h3 class="card-title">Footer Customization</h3>
        </div>
        <div class="card-body">
            <form action="{{route('add-footer-style')}}" method="POST">
                @csrf 
                @php
                    if( \App\Models\Style::where('property','footer_background_color')->exists()) {
                        $footer_background_color = \App\Models\Style::where('property','footer_background_color')
                        ->first();
                        $footer_background_color = $footer_background_color->value;
                    }else {
                        $footer_background_color = '#000000';
                    }
                    if( \App\Models\Style::where('property','footer_text_color')->exists()) {
                        $footer_text_color = \App\Models\Style::where('property','footer_text_color')
                        ->first();
                        $footer_text_color = $footer_text_color->value;
                    }else {
                        $footer_text_color = '#ffffff';
                    }
                @endphp
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Footer Background Color</label>
                        <input type="color" class="form-control" name="footer_background_color" value="{{$footer_background_color}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Footer Text Color</label>
                        <input type="color" class="form-control" name="footer_text_color" value="{{$footer_text_color}}">
                    </div>
                </div>
                <div class="row mt-4">
                    <button class="btn btn-success m-2" type="submit" name="footer_style_save">Save</button>
                    <button class="btn btn-danger m-2" type="submit" name="footer_style_reset">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div> 
<x-footer/>