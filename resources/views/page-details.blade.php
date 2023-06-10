<x-front_header :category="$category" :hasPermission="$hasPermission" :breakingNewsList="$breakingNewsList"/>
   <div class="vh-100">
        <div class="text-center py-5">
            <h2 class="h2 fw-bold">{{$page_details->title}}</h2>
            <hr>
        </div>
        <div class="py-2">
            <p class="p-3">{{$page_details->content}}</p>
        </div>
   </div>
<x-front_footer :menucategory="$menucategory"/>