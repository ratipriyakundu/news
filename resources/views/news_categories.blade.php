<x-front_header :category="$category" :hasPermission="$hasPermission"/>
<div class="px-5 container-fluid">
<section>
<div class="row">
  <div class="col-md-9">
				<div class="mt-5 row">
					<div class="col-md-6">
						<h3>{{$category_name->title}}</h3>
					</div>
					<hr>
				</div>
				<!-- 1 -->
			<?php 
			$today=date('Y-m-d');
			$i=1;
			
			?>
			@foreach($news as $nw)
			<?php 
			if($i % 2==1){?>
			<a href="{{route('news-details')}}?news_id={{$nw->id}}">
			<div class="card mb-3" style=" border: none;">
			  <div class="row g-0">
			    <div class="col-md-3 mt-2">
			        <a href="news-details?news_id=<?php echo $nw->id;?>">
			      <img src="uploads/news/{{$nw->image}}" class="img-fluid rounded-start" alt="..." style=" width: 100%;">
			      </a>
			    </div>
			    <div class="col-md-9">
			      <div class="card-body" style=" padding-top: 0px;">
			          <a href="news-details?news_id=<?php echo $nw->id;?>">
			        <h5 class="card-title">{{$nw->title}}</h5>
			        </a>
			         <p class="card-text"><small class="text-body-secondary"><?php echo date('d F Y',strtotime($nw->news_date));?></small></p>
			        
			       
			      </div>
			    </div>
			  </div>
			</div>
			</a>
			<?php } else{?>
				<a href="{{route('news-details')}}?news_id={{$nw->id}}">
           <div class="p-3 card" style=" border: none; background: #ddd;">
			  <div class="row g-0">
			    <div class="col-md-3">
			        <a href="news-details?news_id=<?php echo $nw->id;?>">
			      <img src="uploads/news/{{$nw->image}}" class="img-fluid rounded-start" alt="..." style=" width: 100%; height: 140px; margin-top: 9px;">
			      </a>
			    </div>
			    <div class="col-md-9">
			      <div class="card-body" style=" padding-top: 0px; margin-top: 8px;">
			          <a href="news-details?news_id=<?php echo $nw->id;?>">
			        <h5 class="card-title">{{$nw->title}}</h5>
			        </a>
			         <p class="card-text"><small class="text-body-secondary"><?php echo date('d F Y',strtotime($nw->news_date));?></small></p>
			        
			       
			      </div>
			    </div>
			  </div>
			</div>
			</a>
<?php   $i++;
			}
?>
			@endforeach()
			
           
			
			
		
           
			
			</div>





			<div class="col-md-3" style=" padding-left: 10px;">
				<!-- a -->
				<?php
				$advertisedata = DB::table('advertisements')->inRandomOrder()->limit(1)->get();
				foreach($advertisedata as $ads){?>
				<div class="mt-5 row">
					<?php
					if($ads->ads_type=='google'){?>
					<p><?php echo $ads->google_script;?></p>
					<?php }else{?>
				      <img src="uploads/ads/<?php echo $ads->image;?>" class="img-fluid" alt="...">
				<?php }?>
				</div>
			<?php }?>
				<!-- a end -->
				<h4 class="mt-5 mb-3">Latest News</h4>
				<!-- b -->
				
				@php
				$i=1;
				@endphp
				@foreach($news as $latst_news)
                 @php 
				 if($latst_news->popular==1)
				 {
				 
				 if($i==1){$class="card mb-2";}else{ $class="card mb-2 mt-3";}@endphp
				<div class="{{$class}}" style=" border: none;">
			  <div class="row g-0">
			    <div class="col-md-4">
			        <a href="news-details?news_id=<?php echo $latst_news->id;?>">
			      <img src="uploads/news/{{$latst_news->image}}" class="img-fluid rounded-start" alt="..." style=" width: 100%;">
			      </a>
			    </div>
			    <div class="col-md-8">
			      <div class="card-body" style=" padding-top: 0px;">
			          <a href="news-details?news_id=<?php echo $latst_news->id;?>">
			        <h6 class="card-title">{{$latst_news->title}} {{$i}}</h6>
			        </a>
			        
			       
			      </div>
			    </div>
			  </div>
			  </div>
			  <hr class="m-0">
			  @php $i++; 
				 } 
			  @endphp
			  @endforeach()
			
			
			
				
				
				
			<!-- f end -->

<?php
				$advertisedata = DB::table('advertisements')->inRandomOrder()->limit(2)->get();
				foreach($advertisedata as $ads){?>
				<div class="mt-5 row">
					<?php
					if($ads->ads_type=='google'){?>
					<p><?php echo $ads->google_script;?></p>
					<?php }else{?>
				      <img src="uploads/ads/<?php echo $ads->image;?>" class="img-fluid" alt="...">
				<?php }?>
				</div>
			<?php }?>


			
</div>
</section>
	
	
</div>
<x-front_footer :menucategory="$menucategory"/>
