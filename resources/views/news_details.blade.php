<x-front_header :category="$category" :hasPermission="$hasPermission"/>
@php
	$news_desc = str_replace('&nbsp;', ' ', $news->description);
    $news_desc = html_entity_decode($news_desc, ENT_QUOTES | ENT_COMPAT , 'UTF-8');
    $news_desc = html_entity_decode($news_desc, ENT_HTML5, 'UTF-8');
    $news_desc = html_entity_decode($news_desc);
    $news_desc = htmlspecialchars_decode($news_desc);
    $news_desc = strip_tags($news_desc);
@endphp
<title>{{Str::limit($news->title,60)}}</title>
<meta name="description" content="{{Str::limit($news_desc,100)}}" /> 
<meta property="og:title" content="{{Str::limit($news->title,30)}}" />
<meta property="og:url" content="{{url()->full()}}" /> 
<meta property="og:description" content="{{Str::limit($news_desc,60)}}" /> 
<meta property="og:image" content="{{env('APP_URL')}}public/uploads/news/{{$news->image}}" />
<link rel="shortcut icon" href="{{env('APP_URL')}}public/uploads/logo/3289IMG-2023.png" type="image/x-icon" />
<style> 
	* {
		font-family: 'Times New Roman', Times, serif;
	}
	strong {
		font-weight: 600;
		margin-bottom: 20px;
	}
	p {
		line-height: 1.5;
	}
	@media only screen and (max-width:668px) {
		.social-share-btn-group {
			flex: 36% !important;
		}
		.mobile-auth-bio-btn-group {
			flex: 41% !important;
		}
	}
</style>
<div class="px-5 container-fluid">
	<?php

$query =  DB::table('admins');
$query->where('id', $news->added_by);
$rows = $query->first();
?>
	<section>
		<div class="mt-5 row">
			<div class="col-md-8">
				<!-- breadcrumb -->
				<div class="row ">
				<div class="col-md-6">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/">Home</a></li>
				    <li class="breadcrumb-item active"><a href="#">{{$category_info->title}}</a></li>
				  </ol>
				</nav>
				
				</div>
				</div>
				<!-- breadcrumb end -->
                <h2 style="font-size: 25px; margin: 20px auto; font-weight:700;">{{$news->title}}</h2>
				@php
					$specific_ad_exists = DB::table('advertisements')
					->where(
						[
							'position' => 'category',
							'position_id' => $news->category
						]
					)->exists();
					if($specific_ad_exists) {
						$advertisedata = DB::table('advertisements')
						->where(
							[
								'position' => 'category',
								'position_id' => $news->category
							]
						)->inRandomOrder()
						->limit(1)->get();
					}else {
						$advertisedata = DB::table('advertisements')
						->where(
							[
								'position' => 'all'
							]
						)->inRandomOrder()
						->limit(1)->get();
					}
				@endphp
				@foreach($advertisedata as $ads)
					@if($ads->ads_type=='google')
						{!! html_entity_decode($ads->google_script) !!}
					@else 
					<a href="{{$ads->url}}" target="_blank">
						<img src="uploads/ads/{{$ads->image}}" class="img-fluid" width="100%">
					</a>
					@endif
				@endforeach
                <img src="uploads/news/{{$news->image}}" class="img-fluid my-3" alt="..." style="width:100%; height:400px; object-fit:cover; border-radius:12px;">
				<hr style="margin: 3px 0px !important;">
				<div class="row">
					<div class="col" style="flex:0 0 0% !important;">
						<img src="uploads/logo/3289IMG-2023.png" style="width:40px;">
					</div>
					@php
						\Carbon\Carbon::setLocale('hi');
						$writter = DB::table('admins')
						->where('id',$news->added_by)
						->select('name')
						->first();
						$writter = $writter->name;
					@endphp
					<div class="col mobile-auth-bio-btn-group">
						<h4 class="h6 p-0 m-0 fw-bold">{{$writter}}</h4>
						<p class="text-secondary">{{\Carbon\Carbon::parse($news->added_at)->translatedFormat('d F Y, a h:i')}}</p>
					</div>
					<div class="col"></div>
					<div class="col pt-2 social-share-btn-group">
						@if((new \Jenssegers\Agent\Agent())->isDesktop())
							<a href="https://web.whatsapp.com/send?text={{$news->title}} {{url()->full()}}" target="_blank">
								<img src="uploads/logo/whatsapp.png" style="width:35px;">
							</a>
						@endif
						@if((new \Jenssegers\Agent\Agent())->isMobile())
							<a href="whatsapp://send?text={{$news->title}} {{url()->full()}}" target="_blank">
								<img src="uploads/logo/whatsapp.png" style="width:35px;">
							</a>
						@endif
						<a href="https://www.facebook.com/sharer/sharer.php?u={{url()->full()}}" target="_blank" rel="noopener">
							<img src="uploads/logo/facebook.png" style="width:35px;">
						</a>
						<a href="https://twitter.com/intent/tweet?url={{url()->full()}}&text={{$news->title}}" target="_blank" rel="noopener">
							<img src="uploads/logo/twitter.png" style="width:35px;">
						</a>
					</div>
				</div>
				<hr style="margin: 3px 0px !important;">
				@php
					$specific_ad_exists = DB::table('advertisements')
					->where(
						[
							'position' => 'category',
							'position_id' => $news->category
						]
					)->exists();
					if($specific_ad_exists) {
						$advertisedata = DB::table('advertisements')
						->where(
							[
								'position' => 'category',
								'position_id' => $news->category
							]
						)->inRandomOrder()
						->limit(1)->get();
					}else {
						$advertisedata = DB::table('advertisements')
						->where(
							[
								'position' => 'all'
							]
						)->inRandomOrder()
						->limit(1)->get();
					}
				@endphp
				@foreach($advertisedata as $ads)
					@if($ads->ads_type=='google')
						{!! html_entity_decode($ads->google_script) !!}
					@else 
						<a href="{{$ads->url}}" target="_blank">
							<img src="uploads/ads/{{$ads->image}}" class="img-fluid" width="100%">
						</a>
					@endif
				@endforeach
                <div id="newsSection">{!! html_entity_decode($news->description) !!}
				{{-- <p style="text-align:right;">Posted by {{$rows->name}}  <img style="height: 30px; width: 30px;" src="uploads/share.png"></p>
				<li class="whatAppicon"> 
					<a data-activity="whatsapp_share" class="whatsappshare" href="https://web.whatsapp.com:/send?text=%E0%A4%AE%E0%A5%8B%E0%A4%A6%E0%A5%80+%E0%A4%B8%E0%A4%B0%E0%A4%A8%E0%A5%87%E0%A4%AE+%E0%A4%AE%E0%A4%BE%E0%A4%AE%E0%A4%B2%E0%A5%87+%E0%A4%AE%E0%A5%87%E0%A4%82+%E0%A4%B0%E0%A4%BE%E0%A4%B9%E0%A5%81%E0%A4%B2+%E0%A4%97%E0%A4%BE%E0%A4%82%E0%A4%A7%E0%A5%80+%E0%A4%95%E0%A5%8B+%E0%A4%86%E0%A4%96%E0%A4%BF%E0%A4%B0%E0%A5%80+%E0%A4%B8%E0%A4%AE%E0%A4%A8%2C+4+%E0%A4%9C%E0%A5%81%E0%A4%B2%E0%A4%BE%E0%A4%88+%E0%A4%95%E0%A5%8B+%E0%A4%B0%E0%A4%BE%E0%A4%82%E0%A4%9A%E0%A5%80+%E0%A4%95%E0%A5%8B%E0%A4%B0%E0%A5%8D%E0%A4%9F+%E0%A4%AE%E0%A5%87%E0%A4%82+%E0%A4%AA%E0%A5%87%E0%A4%B6+%E0%A4%B9%E0%A5%8B%E0%A4%A8%E0%A5%87+%E0%A4%95%E0%A5%87+%E0%A4%86%E0%A4%A6%E0%A5%87%E0%A4%B6 via @aajtak https://intdy.in/nssp43%0D%0A%0D%0ADownload the Aaj Tak app now to read our latest stories%0D%0Ahttps://aajtak.link/X9zu" onclick="ga('send', 'event', { eventCategory: 'Social Sharing Data', eventAction: 'Whatsapp click', eventLabel: 'Article Page'});" data-action="share/whatsapp/share" target="_blank" aria-label="#"> 
						<svg version="1.1" width="23" height="23" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 65.665 60.404" style="enable-background:new 0 0 65.665 60.404;" xml:space="preserve"> <g> <g transform="translate(-1.000000, 0.000000)"> <path d="M35.16,4.636c-13.556,0-24.583,11.027-24.583,24.583c0,4.288,1.122,8.502,3.247,12.208L9.786,53.54c-0.097,0.29-0.026,0.61,0.183,0.833c0.159,0.171,0.381,0.263,0.607,0.263c0.071,0,0.142-0.009,0.212-0.028l13.223-3.479c3.434,1.75,7.282,2.673,11.148,2.673c13.556,0,24.583-11.027,24.583-24.583S48.716,4.636,35.16,4.636L35.16,4.636z M50.5,40.381l-1.465,1.466c-1.85,1.851-3.914,2.789-6.133,2.789c-0.001,0,0,0-0.001,0c-2.992,0-6.217-1.708-9.586-5.077l-8.494-8.494c-2.657-2.657-4.29-5.237-4.852-7.672c-0.683-2.956,0.179-5.663,2.564-8.047l1.465-1.466c0.942-0.942,2.467-1.174,3.648-0.549c2.218,1.174,4.517,5.021,4.772,5.455c0.46,0.806,0.601,1.639,0.402,2.354c-0.152,0.546-0.493,0.991-0.991,1.292c-0.673,0.563-1.462,1.265-1.601,1.444c-0.847,1.249-0.75,2.208,0.341,3.3l6.635,6.635c1.1,1.101,2.042,1.191,3.311,0.332c0.167-0.131,0.869-0.92,1.432-1.593c0.421-0.696,1.11-1.077,1.948-1.077c0.549,0,1.133,0.167,1.689,0.483c0.443,0.261,4.291,2.56,5.464,4.777C51.691,37.946,51.471,39.411,50.5,40.381L50.5,40.381z"></path> </g> </g> </svg> 
					</a> 
				</li> --}}
		
				</div>
				
				@php
					$specific_ad_exists = DB::table('advertisements')
					->where(
						[
							'position' => 'category',
							'position_id' => $news->category
						]
					)->exists();
					if($specific_ad_exists) {
						$advertisedata = DB::table('advertisements')
						->where(
							[
								'position' => 'category',
								'position_id' => $news->category
							]
						)->inRandomOrder()
						->limit(1)->get();
					}else {
						$advertisedata = DB::table('advertisements')
						->where(
							[
								'position' => 'all'
							]
						)->inRandomOrder()
						->limit(1)->get();
					}
				@endphp
				@foreach($advertisedata as $ads)
					@if($ads->ads_type=='google')
						{!! html_entity_decode($ads->google_script) !!}
					@else 
						<a href="{{$ads->url}}" target="_blank">
							<img src="uploads/ads/{{$ads->image}}" class="img-fluid" width="100%">
						</a>
					@endif
				@endforeach
				@php
					$timeDiff = ((\Carbon\Carbon::now('Asia/Kolkata')->diffInMinutes(\Carbon\Carbon::parse($news->added_at))) - ($news->breaking_news));
				@endphp
				
			</div>
			<div class="col-md-4">
				@php
					$specific_ad_exists = DB::table('advertisements')
					->where(
						[
							'position' => 'category',
							'position_id' => $news->category
						]
					)->exists();
					if($specific_ad_exists) {
						$advertisedata = DB::table('advertisements')
						->where(
							[
								'position' => 'category',
								'position_id' => $news->category
							]
						)->inRandomOrder()
						->limit(1)->get();
					}else {
						$advertisedata = DB::table('advertisements')
						->where(
							[
								'position' => 'all'
							]
						)->inRandomOrder()
						->limit(1)->get();
					}
				@endphp
				@foreach($advertisedata as $ads)
					@if($ads->ads_type=='google')
						{!! html_entity_decode($ads->google_script) !!}
					@else 
						<a href="{{$ads->url}}" target="_blank">
							<img src="uploads/ads/{{$ads->image}}" class="img-fluid" width="100%">
						</a>
					@endif
				@endforeach
				
				<h3 class="mt-3 mb-2">लेटेस्ट</h3>
				<!-- 1 -->
				<?php
					$today=date('Y-m-d');
					$latest_news = DB::table('news')->where('latest_news','=',1)->where('id','!=',$news->id)->orderBy('news_date','DESC')->limit(6)->get();
					foreach($latest_news as $ln){?>
						<div class="card mb-2 mt-3" style=" border: none;">
			  				<div class="row g-0">
								<div class="col-md-4">
									<a href="news-details?news_id=<?php echo $ln->id;?>">
									<img src="uploads/news/<?php echo $ln->image;?>" class="img-fluid rounded-start" alt="..." style=" width: 100%;">
									</a>
								</div>
								<div class="col-md-8">
									<div class="card-body" style=" padding-top: 0px;">
										<a href="news-details?news_id=<?php echo $ln->id;?>">
											<h6 class="card-title"><?php echo $ln->title;?></h6>
										</a>
									</div>
								</div>
			  				</div>
						</div>
						<hr class="m-0"><?php 
					}
				?>
				<!-- 1 end -->
				<!-- 2 -->
				<!-- 4 end -->
				<!-- 5 -->
				<!-- 5 end -->
				<!-- 6 -->
				<!-- 6 end -->
				@php
					$specific_ad_exists = DB::table('advertisements')
					->where(
						[
							'position' => 'category',
							'position_id' => $news->category
						]
					)->exists();
					if($specific_ad_exists) {
						$advertisedata = DB::table('advertisements')
						->where(
							[
								'position' => 'category',
								'position_id' => $news->category
							]
						)->inRandomOrder()
						->limit(1)->get();
					}else {
						$advertisedata = DB::table('advertisements')
						->where(
							[
								'position' => 'all'
							]
						)->inRandomOrder()
						->limit(1)->get();
					}
				@endphp
				@foreach($advertisedata as $ads)
					@if($ads->ads_type=='google')
						{!! html_entity_decode($ads->google_script) !!}
					@else 
						<a href="{{$ads->url}}" target="_blank">
							<img src="uploads/ads/{{$ads->image}}" class="img-fluid" width="100%">
						</a>
					@endif
				@endforeach
			</div>
		</div>
	</section>
</div>
<x-front_footer :menucategory="$menucategory"/>
    