<x-front_header :category="$category"/>
    @if($hasPermission)
        <div class="text-center m-5 p-5">
            <button class="custom-button button-red">Add Section</button>
        </div>
    @endif
<x-front_footer :menucategory="$menucategory"/>