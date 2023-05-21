<x-front_header :category="$category"/>
<div class="px-5 container-fluid">
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
				<div class="col-md-6 d-flex flex-row-reverse">
				<button type="button" class="btn btn-outline-danger text-align-left" disabled style="">FeedBack</button>
			    </div>	
				</div>
				<!-- breadcrumb end -->
                <h2 style="font-size: 25px;">{{$news->title}}</h2>
                <img src="uploads/news/{{$news->image}}" class="img-fluid" alt="..." style="width:100%;">
                <div class="p-3">{!! html_entity_decode($news->description) !!}</div>
				@php
					$timeDiff = ((\Carbon\Carbon::now('Asia/Kolkata')->diffInMinutes(\Carbon\Carbon::parse($news->added_at))) - ($news->breaking_news));
				@endphp
				
			</div>
			<div class="col-md-4">
				<?php
					$advertisedata = DB::table('advertisements')->inRandomOrder()->limit(1)->get();
					foreach($advertisedata as $ads){
                   		if($ads->ads_type=='google'){?>
							<p><?php echo $ads->google_script;?></p><?php 
						}else{?>
							<img src="uploads/ads/<?php echo $ads->image;?>" class="img-fluid" alt="..."><?php 
						} 
					}
				?>
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
				<?php
					$advertisedata = DB::table('advertisements')->inRandomOrder()->limit(1)->get();
					foreach($advertisedata as $ads){
                   		if($ads->ads_type=='google'){?>
							<p><?php echo $ads->google_script;?></p><?php 
						}else{?>
							<img src="uploads/ads/<?php echo $ads->image;?>" class="img-fluid" alt="..."><?php 
						} 
					}
				?>
			</div>
		</div>
	</section>
</div>
<x-front_footer :menucategory="$menucategory"/>
    