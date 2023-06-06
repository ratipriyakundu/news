<x-front_header :category="$category" :hasPermission="$hasPermission" :breakingNewsList="$breakingNewsList"/>
    <div class="container-fluid my-4">
        <div class="container">
            <div class="row">
                @foreach($stories as $story)
                @php
                    $slide = \App\Models\Slide::where('story_id',$story->id)->first();
                @endphp
                    <div class="col-md-3">
                        <a href="{{route('story')}}?id={{Crypt::encrypt($story->id)}}" class="slide-wrapper text-decoration-none">
                            <img src="{{$slide->image}}" style="width: 100%; height:400px;object-fit:cover;">
                            <div class="slide-title">
                                {{$slide->title}}
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
<x-front_footer :menucategory="$menucategory"/>