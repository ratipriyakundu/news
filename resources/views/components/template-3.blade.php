<style>
    .section-3-carousal {
        padding: 10px;
    }
    .section-3-carousal .item {
        border-radius: 10px;
        border: 1px solid white;
        height: 250px;
        width: 100%;
        object-fit: cover;
        position: relative;
    }
    .section-3-carousal .slider-heading {
        position: absolute;
        bottom: 0px;
        padding: 10px;
    }
    .owl-dots {
        display: none;
    }
</style>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-4 p-2">
            @php
                $latestLargest = \App\Models\News::where('latest_news','1')
                ->orderBy('id','DESC')->first();
            @endphp
            <a class="text-decoration-none" href="news-details?news_id={{$latestLargest->id}}">
                <p class="h3 fw-bold">
                    {{\Str::limit($latestLargest->title,60)}}
                </p>
                <img src="uploads/news/{{$latestLargest->image}}" style="width:100%; height: 270px; object-fit:cover;">
                <p class="mt-2">
                    {!! \Str::limit(html_entity_decode($latestLargest->description),236) !!}
                </p>
            </a>
            @php
                $latestLarger = \App\Models\News::where('latest_news','1')
                ->orderBy('id','DESC')->skip(1)->first();
            @endphp
            <a class="text-decoration-none" href="news-details?news_id={{$latestLarger->id}}">
                <p class="h4 fw-bold mt-4">
                    {{\Str::limit($latestLarger->title,68)}}
                </p>
                <div class="row">
                    <div class="col-md-4">
                        <img src="uploads/news/{{$latestLarger->image}}" style="width:100%;height:80px; object-fit:cover;">
                    </div>
                    <div class="col-md-8">
                        {!! \Str::limit(html_entity_decode($latestLargest->description),136) !!}
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 py-4">
            @php
                $latests = \App\Models\News::where('latest_news','1')
                ->orderBy('id','DESC')->skip(2)->take(6)->get();
            @endphp
            @foreach($latests as $latest)
                <a class="text-decoration-none" href="news-details?news_id={{$latest->id}}">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <img src="uploads/news/{{$latest->image}}" style="width:100%;height:80px; object-fit:cover;">
                        </div>
                        <div class="col-md-8 fw-bold" style="font-size: 18px;">
                            {!! \Str::limit(html_entity_decode($latestLargest->description),81) !!}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="col-md-4 py-4">
            <p class="fw-bold h4">लोकप्रिय</p>
            @php
                $popularSlide = \App\Models\News::where('popular','1')
                ->orderBy('id','DESC')->take(6)->get();
            @endphp
            <div class="owl-carousel-3 owl-carousel owl-theme section-3-carousal">
                @foreach($popularSlide as $popularItem)
                    <a class="text-decoration-none" href="news-details?news_id={{$popularItem->id}}">
                        <div class="item" style="background-image: url('uploads/news/{{$popularItem->image}}');background-position:center center; background-repeat:no-repeat;bacground-size:auto;background-color:rgba(0, 0, 0, 0.5);">
                            <div class="fw-bold slider-heading text-light" style="font-size: 18px;">
                                {!! \Str::limit(html_entity_decode($popularItem->description),48) !!}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            @php
                $populars = \App\Models\News::where('popular','1')
                ->orderBy('id','DESC')->skip(6)->take(3)->get();
            @endphp
            @foreach($populars as $popular)
                <a class="text-decoration-none" href="news-details?news_id={{$popular->id}}">
                    <div class="row my-3">
                        
                            <div class="col-md-4">
                                <img src="uploads/news/{{$popular->image}}" style="width:100%;height:80px; object-fit:cover;">
                            </div>
                            <div class="col-md-8 fw-bold" style="font-size: 18px;">
                                {{\Str::limit($latestLarger->title,81)}}
                            </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>