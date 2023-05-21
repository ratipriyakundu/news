<x-front_header :category="$category"/>
	
	<?php error_reporting(1);?>
	
	
	<!-- navbar end -->
<div class="container-fluid px-5">
	<section class="grid-style-1 bg-light">
		<div class="row mt-5">
			<!-- first colume -->
			<div class="col-md-3">
				<div class="card border-0">
<?php





$section_one_left = DB::table('home_templates')->where('page_name','home')->where('position','left')->where('section','1')->first();
$news_section1_left=DB::table('news')->whereIn('category',[$section_one_left->category])->orderBy('news_date','DESC')->limit(1)->first();



?>
					<div class="card-body">
						<h5 class="card-title">{{$news_section1_left->title}}</h5>
						<a href="news-details?news_id=<?php echo $news_section1_left->id;?>"><img src="uploads/news/{{$news_section1_left->image}}" class="img-fluid" alt="Post-Image">
						<p class="card-text">{{$news_section1_left->sub_title}} </p></a>
					</div>
				</div>
				
				<div class="card mb-3 border-0">
  				<div class="row ">
					<?php
				  $news_section1_left_category=DB::table('news')->whereIn('category',[$section_one_left->category])->orderBy('news_date','DESC')->skip(1)->take(7)->get();
			     	foreach($news_section1_left_category as $leftct1){?>
				 
				 
				      <div class="mt-4 img-fluid col-md-4 border-0">
			      	<img src="uploads/news/{{$leftct1->image}}" class="" alt="..." style="width: 100%;">
			    	</div>
                
				    <div class="col-md-8" style="padding-left: 0px !important">
				      <div class="card-body">
				        <a href="news-details?news_id=<?php echo $leftct1->id;?>"><h5 class="card-title pt-2">'{{$leftct1->title}}.</h5></a>
				      </div>
				    </div>
				    
 <?php }?>
				    

				    

  				</div>
				</div>
			</div>
			<!-- second colume -->
			<div class="col-md-6">
				<div class="row">
<?php
				$section_one_middle = DB::table('home_templates')->where('page_name','home')->where('position','middle')->where('section','1')->first();
$news_section1_middle=DB::table('news')->whereIn('category',[$section_one_middle->category])->orderBy('news_date','DESC')->limit(1)->first();


?>

					<div class="col-md-8">
						<div class="card text-bg-dark">
				  		<a href="news-details?news_id=<?php echo $news_section1_middle->id;?>">
				  		    <img src="uploads/news/<?php echo @$news_section1_middle->image;?>" class="card-img" alt="...">
				  		    </a>
						</div>


						<div class="card mb-3 border-0">
  						<div class="row ">
	<?php 
 $news_section1_middle_category=DB::table('news')->whereIn('category',[$news_section1_middle->category])->orderBy('news_date','DESC')->skip(1)->take(7)->get();
			     	foreach($news_section1_middle_category as $midct1){?>
						    <div class="mt-4 img-fluid col-md-4 border-0">
						      <img src="uploads/news/{{@$midct1->image}}" class="" alt="..." style="width: 100%;">
						    </div>

						    <div class="col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						       <a href="news-details?news_id=<?php echo $midct1->id;?>">
						            <h5 class="card-title pt-2">{{@$midct1->title}}</h5>
						            </a>
						      </div>
						    </div>
                       <?php } ?>
						    

						    

						  

						   

						   

						   
  						</div>
						</div>
					</div>
					<div class="p-0 col-md-4">
						<?php
					$section_one_right = DB::table('home_templates')->where('page_name','home')->where('position','right')->where('section','1')->first();
$news_section1_right=DB::table('news')->whereIn('category',[$section_one_right->category])->orderBy('news_date','DESC')->limit(7)->get();	
	
foreach($news_section1_right as $sec_right1){?>	
  <a href="news-details?news_id=<?php echo $sec_right1->id?>">
  <p> <?php echo $sec_right1->title?></p><hr> </a>
     
		<?php }?>	
						
						
					</div>
				</div>
			</div>
			<!-- third colume -->
			<div class="col-md-3">
			<?php
			$advertisedata = DB::table('advertisements')->inRandomOrder()->limit(2)->get();
				foreach($advertisedata as $ads){

                   if($ads->ads_type=='google'){?>
				  
					<p><?php echo $ads->google_script;?></p>
					<?php }else{?>
			<img src="uploads/ads/<?php echo $ads->image;?>" class="img-fluid" alt="...">
					
			<?php } }?>

			</div>
			
		</div>
	</section>
</div>
<section>
	<div class="mt-5">
		<div class="container-fluid px-5 mb-5">
			<div class="row">
<?php
			$section_two_left = DB::table('home_templates')->where('page_name','home')->where('position','left')->where('section','2')->first();
$news_section2_left=DB::table('news')->whereIn('category',[$section_two_left->category])->orderBy('news_date','DESC')->limit(7)->get();	
	
?>


				<!-- section 1 -->
				<div class="col-md-3">
					<h5>बड़ी ख़बरें</h5>
					<?php
					foreach($news_section2_left as $sec2_left){	?>
					<a href="news-details?news_id=<?php echo $sec2_left->id;?>"><p><?php echo $sec2_left->title;?></p></a>
					<hr>
					<?php }?>
					
				</div>
				<!-- section 2 -->
				<div class="col-md-6">
					<div class="row">
						<?php
					$section_two_middle = DB::table('home_templates')->where('page_name','home')->where('position','middle')->where('section','2')->first();
$news_section2_middle=DB::table('news')->whereIn('category',[$section_two_middle->category])->orderBy('news_date','DESC')->limit(3)->get();	
foreach($news_section2_middle as $sec2_middle){	?>
						<div class="p-2 col-md-4">
							<div class="card" style=" height: 280px;">
		  					<img src="uploads/news/{{$sec2_middle->image}}" class="card-img-top" alt="..." style=" height: 132px;">
							  <div class="card-body text-bg-dark">
							    <a href="news-details?news_id=<?php echo $sec2_middle->id;?>"><p class="card-text">{{$sec2_middle->title}}</p></a>
							  </div>
							</div>
						</div>
<?php }?>

						

						
					</div>
				</div>
				<!-- section 3 -->
				<div class="col-md-3">
					<h5>लाइव अपडेट</h5>
					<div class="scroll-1">
						<div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">
						<?php 
$section_two_right = DB::table('home_templates')->where('page_name','home')->where('position','right')->where('section','2')->first();
$news_section2_right=DB::table('news')->whereIn('category',[$section_two_right->category])->orderBy('news_date','DESC')->limit(3)->get();	
foreach($news_section2_right as $sec2_right){	?>
					<a href="news-details?news_id=<?php echo $sec2_right->id;?>">
					    	<h4 id="scrollspyHeading<?php echo $sec2_right->id;?>"><?php echo date('h:i A',strtotime($sec2_right->added_at));?></h4>
						  <p><?php echo $sec2_right->title;?></p>
						  <hr>
						  </a>
					<?php  }?>	  
						 
						 
						 
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="text-bg-dark">
	<div class="container-fluid px-5">
		<div class="row">
		<div class="col-md-3">
			<?php 
		$section_three_left = DB::table('home_templates')->where('page_name','home')->where('position','left')->where('section','3')->first();
$news_section3_left=DB::table('news')->whereIn('category',[$section_three_left->category])->orderBy('news_date','DESC')->limit(2)->get();	
    foreach($news_section3_left as $sec3_left){?> 
      	<div class="img-section1 mt-5 col-md-12">
      		<img src="uploads/news/{{$sec3_left->image}}" class="img-fluid" alt="Responsive image">
      		<a href="news-details?news_id=<?php echo $sec3_left->id;?>">
      		    <h6 class="mt-3" style="color:white;">{{$sec3_left->title}}</h6>
      		    </a>
      		<hr>
      	</div>
		<?php }?>
      	
      </div>
<?php 
	  $section_three_middle = DB::table('home_templates')->where('page_name','home')->where('position','middle')->where('section','3')->first();
$news_section3_lmiddle=DB::table('news')->whereIn('category',[$section_three_middle->category])->orderBy('news_date','DESC')->limit(1)->first();	
?>			
<div class="img-section2 col-md-6">
			<a href="news-details?news_id=<?php echo $news_section3_lmiddle->id;?>">
			
				<img src="uploads/news/{{$news_section3_lmiddle->image}}" class="img-fluid" alt="Responsive image">
				</a>
			</div>




			<div class="img-section3 col-md-3">
<?php
			$section_three_right = DB::table('home_templates')->where('page_name','home')->where('position','right')->where('section','3')->first();
$news_section3_right=DB::table('news')->whereIn('category',[$section_three_right->category])->orderBy('news_date','DESC')->limit(3)->get();	
foreach($news_section3_right as $sec3_right){	?>
				<div class="mt-5 col-md-12">
				    <a href="news-details?news_id=<?php echo $sec3_right->id;?>">
      		<img src="uploads/news/{{$sec3_right->image}}" class="img-fluid" alt="Responsive image">
      		
      		<h6 class="mt-3" style="color:white;">{{$sec3_right->title}}</h6>
      		</a>
      		<hr>
      	</div>
<?php }?>

      	
			</div>
		</div>
	</div>
</section>
<!-- section 4 -->
<section>

		<div class="container-fluid px-5">
			<div class="row">
<?php
$section_four_left= DB::table('home_templates')->where('page_name','home')->where('position','left')->where('section','4')->first();
$news_section4_left=DB::table('news')->whereIn('category',[$section_four_left->category])->orderBy('news_date','DESC')->limit(1)->first();	
$categ=DB::table('categories')->where('id',$news_section4_left->category)->first();	
	
	?>			
<div class="col-md-8">
					<h5 class="mt-5">{{$categ->title}}</h5>
					<div class="row">
<?php
$section_four_middle = DB::table('home_templates')->where('page_name','home')->where('position','middle')->where('section','4')->first();
$news_section4_middle=DB::table('news')->whereIn('category',[$section_four_middle->category])->orderBy('news_date','DESC')->limit(3)->get();	
foreach($news_section4_middle as $sec4_middle){	?>

						<div class="mt-4 col-md-6">
						    <a href="news-details?news_id=<?php echo $sec4_middle->id;?>">
							<img src="uploads/news/{{$news_section4_left->image}}" class="img-fluid" alt="Responsive image" style="width: 100%;">
							</a>
							<div class="mt-4 row">
							     <a href="news-details?news_id=<?php echo $sec4_middle->id;?>">
								<div class="img-fluid col-md-4 border-0">
								   
      						<img src="uploads/news/<?php echo $sec4_middle->image;?>" class="" alt="..." style="width: 100%;">
      						
    						</div>
    						</a>
						    <div class="col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						        <a href="news-details?news_id=<?php echo $sec4_middle->id;?>">
						        <h5 class="card-title"><?php echo $sec4_middle->title;?></h5>
						        </a>
						      </div>
						    </div>
							</div>
						</div>

<?php }?>
 
						<div class="col-md-6">
							<div class="card border-0">
  							<div class="row ">
							  

							   

							    

							   

							   

							  

							    
  							</div>
							</div>
						</div>
					</div>
					<!-- section 5 -->

				<?php
$section_five_left= DB::table('home_templates')->where('page_name','home')->where('position','left')->where('section','5')->first();
$news_section5_left=DB::table('news')->whereIn('category',[$section_five_left->category])->orderBy('news_date','DESC')->limit(1)->first();	
$categ5=DB::table('categories')->where('id',$news_section5_left->category)->first();

	
	?>	
					<div class="px-0 mt-5 text-bg-secondary row">
					<a href="news-categories?category_id=<?php echo $categ5->id;?>">
					<h5 class="my-4" style="color:white;"><?php echo $categ5->title;?></h5>
					</a>
					<div class="col-md-8">
						<a href="news-details?news_id=<?php echo $news_section5_left->id;?>">
						<img src="uploads/news/<?php echo $news_section5_left->image;?>" class="img-fluid" alt="Responsive image" style=" height: 92%;width:100%;">
</a>
					</div>
					<div class="col-md-4">
						<?php
				$news_section5_last2=DB::table('news')->whereIn('category',[$section_five_left->category])->orderBy('news_date','DESC')->limit(2)->get();
				foreach($news_section5_last2 as $last2){?>
				<a href="news-details?news_id=<?php echo $last2->id;?>">
						<img src="uploads/news/<?php echo $last2->image;?>" class="rounded mx-auto d-block" alt="..." style="width:100%">
						<h5 class="px-4 my-3" style="color:white;"><?php echo $last2->title;?></h5>
						</a>
						<?php }?>
						
					</div>
					<div class="mb-5 row">
						<div class="col-md-2">
						<?php
							$news_section5_last1=DB::table('news')->whereIn('category',[$section_five_left->category])->orderBy('news_date','DESC')->skip(1)->limit(2)->first();
							?>
			
            <img src="uploads/news/<?php echo $news_section5_last1->image;?>" class="rounded mx-auto d-block" alt="..." style=" width: 130px;">
          </div>
          	<div class="col-md-4">
						<h5 class=""><?php echo $news_section5_last1->title;?></h5>
						</div>
						<?php 
						$news_section5_last2=DB::table('news')->whereIn('category',[$section_five_left->category])->orderBy('news_date','DESC')->skip(2)->limit(1)->first();
						?>
						<div class="col-md-2">
						<img src="uploads/news/<?php echo $news_section5_last2->image?>" class="rounded mx-auto d-block" alt="..." style=" width: 130px;">
					</div>
						<div class="col-md-4">
						<h5 class=""><?php echo $news_section5_last2->title?></h5>	
						</div>
						</div>
				</div>
				<!-- section 6 -->
				<div class="mt-5 row">
	<?php  
			  $section_six_left= DB::table('home_templates')->where('page_name','home')->where('position','left')->where('section','6')->first();
$news_section6_left=DB::table('news')->whereIn('category',[$section_six_left->category])->orderBy('news_date','DESC')->limit(1)->first();

$news_section6_left1=DB::table('news')->whereIn('category',[$section_six_left->category])->orderBy('news_date','DESC')->skip(1)->limit(1)->first();

$news_section6_left_category=DB::table('categories')->where('id',$section_six_left->category)->first();
$section6_left=DB::table('news')->whereIn('category',[$section_six_left->category])->orderBy('news_date','DESC')->limit(4)->get();
?>
					<a href="news-catgories?category_id=<?php echo $news_section6_left_category->id;?>">
					    <h5><?php echo $news_section6_left_category->title;?></h5>
					    </a>
					<div class="row">
						<div class="mt-4 col-md-6">
						    <a href="news-details?news_id=<?php echo $news_section6_left->id?>">
							<img src="uploads/news/<?php echo $news_section6_left->image;?>?size=948:533" class="img-fluid" alt="Responsive image">
							</a>
							<div class="mt-4 row">
								<div class="img-fluid col-md-4 border-0">
								    <a href="news-details?news_id=<?php echo $news_section6_left1->id?>">
      						<img src="uploads/news/<?php echo $news_section6_left1->image;?>?size=100:58" class="" alt="..." style="width: 100%;">
      						</a>
    						</div>
						    <div class="col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						          <a href="news-details?news_id=<?php echo $news_section6_left1->id?>">
						        <h5 class="card-title"><?php echo $news_section6_left1->title;?></h5>
						        </a>
						      </div>
						    </div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card border-0">
  							<div class="row ">
<?php
 $section_six_middle= DB::table('home_templates')->where('page_name','home')->where('position','middle')->where('section','6')->first();
$news_section6_middle=DB::table('news')->whereIn('category',[$section_six_middle->category])->orderBy('news_date','DESC')->limit(6)->get();
							 
foreach($news_section6_middle as $mdl6){?>						  
								<div class="mt-4 img-fluid col-md-4 border-0">
								    <a href="news-details?news_id=<?php echo $mdl6->id?>">
							      <img src="uploads/news/<?php echo $mdl6->image;?>?size=100:58" class="" alt="..." style="width: 100%;">
							      </a>
							    </div>

							    <div class="col-md-8" style="padding-left: 0px !important">
							      <div class="card-body">
							       <a href="news-details?news_id=<?php echo $mdl6->id?>">
							        <h5 class="card-title pt-2"><?php echo $mdl6->title;?></h5>
							        </a>
							      </div>
							    </div>
								
								<?php }?>

							   

							  
							  

							

  							</div>
							</div>
						</div>
					</div>
				</div>
				<!-- section 7 -->
				<div class="row">
		<?php

$section_seven_left= DB::table('home_templates')->where('page_name','home')->where('position','left')->where('section','7')->first();
$news_section7_left_category=DB::table('categories')->where('id',$section_seven_left->category)->first();

$news_section7_left1=DB::table('news')->whereIn('category',[$section_seven_left->category])->orderBy('news_date','DESC')->limit(3)->get();

$news_section7_left2=DB::table('news')->whereIn('category',[$section_seven_left->category])->orderBy('news_date','DESC')->skip(1)->limit(6)->get();
?>
					<h5 class="my-4"><?php echo $news_section7_left_category->title;?></h5>
					<div class="col Boder-section">
						<div class="row">
					<div class="col-md-4">
					<?php
					foreach($news_section7_left1 as $sec7lft1) {?>
				     <a href="news-details?news_id=<?php echo $sec7lft1->id?>">
					<p><?php echo $sec7lft1->title;?></p>
					</a>
					<hr>
					<?php }?>
					
					</div>
					<?php
					foreach($news_section7_left2 as $sec7lft2) {?>
					<div class="col-md-4">
						<img src="uploads/news/<?php echo $sec7lft2->image;?>?size=278:158" class="rounded mx-auto d-block" alt="..." style="width: 95%;">
						<a href="news-details?news_id=<?php echo $sec7lft2->id?>">
							<h5 class="mt-3" style="color:white1;"><?php echo $sec7lft2->title;?></h5>
							</a>
					</div>
					<?php }?>
					
					</div>	
					</div>
				</div>
				<!-- section 8 -->
				
			<?php
$section_eight_left= DB::table('home_templates')->where('page_name','home')->where('position','left')->where('section','8')->first();
$news_section8_left_category=DB::table('categories')->where('id',$section_eight_left->category)->first();

$news_section8_left=DB::table('news')->whereIn('category',[$section_eight_left->category])->orderBy('news_date','DESC')->limit(1)->first();


	?>			
				<div class="mt-5 row" style=" background: #ddd;">
					<h5 class="my-4"><?php echo $news_section8_left_category->title;?></h5>
					<div class="col-md-6">
					    <a href="news-categoris?category_id=<?php echo $news_section8_left_category->id?>">
					<img src="uploads/news/<?php echo $news_section8_left->image;?>?size=465:262" class="img-fluid" alt="Responsive image" style=" margin-top: 20px;">
					</a>
					
					<a href="news-categoris?category_id=<?php echo $news_section8_left_category->id?>">
					<h3 class="mt-3" style="color:white;"><?php echo $news_section8_left->title;?></h3>
					</a>
					</div>
					<div class="col-md-6">
					
					<div class="card mb-3" style=" background: none; border: none;">
  						<div class="row ">
					<?php
$section_eight_middle= DB::table('home_templates')->where('page_name','home')->where('position','middle')->where('section','8')->first();
$news_section8_middle=DB::table('news')->whereIn('category',[$section_eight_middle->category])->orderBy('news_date','DESC')->limit(3)->get();
			

		foreach($news_section8_middle as $middle8row){?>	
						   
						   <div class="mt-4 img-fluid col-md-4 border-0">
						       <a href="news-details?news_id=<?php echo $middle8row->id?>">
						      <img src="uploads/news/<?php echo $middle8row->image;?>?size=100:58" class="" alt="..." style="width: 100%;">
						      </a>
						    </div>

						    <div class="col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						          <a href="news-details?news_id=<?php echo $middle8row->id?>">
						        <h5 class="card-title pt-2"><?php echo $middle8row->title;?>.</h5>
						        </a>
						      </div>
						    </div>
		<?php }?>	
							

						  

						   


						

						 
  						</div>
						</div>	


					</div>
				</div>
				<!-- section 9 -->
				<div class="mt-5 row">
				<?php
		$section_nine_left= DB::table('home_templates')->where('page_name','home')->where('position','left')->where('section','9')->first();
$news_section9_left_category=DB::table('categories')->where('id',$section_nine_left->category)->first();

$news_section9_left=DB::table('news')->whereIn('category',[$section_nine_left->category])->orderBy('news_date','DESC')->get();


	?>			
		
					<h5 class="mb-3"><?php echo $news_section9_left_category->title;?></h5>
					<div class="col-md-6">
						<div class="row">
						<?php
						foreach($news_section9_left as $sec9_left){?>
						<div class="col-md-4">
						    <a href="news-details?news_id=<?php echo $sec9_left->id?>">
							<img src="uploads/news/<?php echo $sec9_left->image;?>?size=227:128" class="rounded mx-auto d-block" alt="..." style=" width: 100%;">
							</a>
						</div>
						<div class="col-md-8">
						    <a href="news-details?news_id=<?php echo $sec9_left->id?>">
							<h5><?php echo $sec9_left->title;?></h5>
							</a>
						</div>
						
						<?php }?>
						
							
							

						
                

						  
					</div>
					
					
					
					</div>
					<div class="col-md-6">
						<h5 class="mb-3">राशिफल</h5>
						<img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/hariscop-sixteen_nine.jpg?size=948:533" class="img-fluid" alt="Responsive image" style=" height: 90%;">
					</div>
					
				</div>
				<!-- section 10 -->
				<div class="row mt-5" style="display:none;">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">उत्तर प्रदेश</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane2" type="button" role="tab" aria-controls="profile-tab-pane2" aria-selected="false">बिहार</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane3" type="button" role="tab" aria-controls="profile-tab-pane3" aria-selected="false">दिल्ली</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane4" type="button" role="tab" aria-controls="profile-tab-pane4" aria-selected="false">उत्तराखंड</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane5" type="button" role="tab" aria-controls="profile-tab-pane5" aria-selected="false">मध्य प्रदेश</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane6" type="button" role="tab" aria-controls="profile-tab-pane6" aria-selected="false">राजस्थान</button>
  </li>
  
  
</ul>
<div class="tab-content" id="myTabContent">
	<!-- home -->
  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
  	<div class="row">
  		
  		<div class="mt-4 col-md-4">
  			<img src="https://akm-img-a-in.tosshub.com/aajtak/resource/img/state_maps/432933.png" class="rounded mx-auto d-block" alt="...">
  		</div>
  		<div class="mt-4 col-md-4">
  			<img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/momos-sixteen_nine.jpg?size=358:203" class="rounded mx-auto d-block" alt="..." style=" width: 100%; height: 80%;">
  		</div>
  		<div class="mt-4 col-md-4">
  			<h4>मोमोज खाते-खाते हुआ कुछ ऐसा कि मच गया हंगामा...जानें पूरा मामला</h4>
  			<p>दुकानदार को पिटने से बचाने गए आरक्षक का अपहरण करने के बाद युवकों ने उसके साथ भी मारपीट की. स्कॉर्पियो में आरक्षक को जबरदस्ती डालकर काफी समय तक पीटा गया. वह किसी तरह युवकों के चंगुल से छूटकर अपने अधिकारियों के पास पहुंचा. पुलिस ने...</p>
  		</div>
  		</div>
  		<div class="row">
  		<div class="col-md-6">
  		<div class="row">
  		 <div class="img-fluid col-md-4 border-0">
						  <img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/nmacc_1_0-sixteen_nine.jpg?size=100:58" class="" alt="..." style="width: 100%;">
						    </div>

						    <div class="mt-1 col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						        <h5 class="card-title pt-2">'वाम' और 'राम' ने हमारे खिलाफ हाथ मिलाया...</h5>
						      </div>
						    </div>
						   <div class="mt-5 img-fluid col-md-4 border-0">
						  <img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/nmacc_1_0-sixteen_nine.jpg?size=100:58" class="" alt="..." style="width: 100%;">
						    </div>

						    <div class="mt-5 col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						        <h5 class="card-title pt-2">'वाम' और 'राम' ने हमारे खिलाफ हाथ मिलाया...</h5>
						      </div>
						    </div>
					</div>	
  		</div>
  		<div class="col-md-6">
  			<div class="row">
  		 <div class="img-fluid col-md-4 border-0">
						  <img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/nmacc_1_0-sixteen_nine.jpg?size=100:58" class="" alt="..." style="width: 100%;">
						    </div>

						    <div class="mt-1 col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						        <h5 class="card-title pt-2">'वाम' और 'राम' ने हमारे खिलाफ हाथ मिलाया...</h5>
						      </div>
						    </div>
						   <div class="mt-5 img-fluid col-md-4 border-0">
						  <img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/nmacc_1_0-sixteen_nine.jpg?size=100:58" class="" alt="..." style="width: 100%;">
						    </div>

						    <div class="mt-5 col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						        <h5 class="card-title pt-2">'वाम' और 'राम' ने हमारे खिलाफ हाथ मिलाया...</h5>
						      </div>
						    </div>
					</div>
  		</div>
  		
  		</div>
  	
</div>
<!-- profie 1 -->
  <div class="tab-pane fade" id="profile-tab-pane2" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
  	
<div class="row">
  		
  		<div class="mt-4 col-md-4">
  			<img src="https://akm-img-a-in.tosshub.com/aajtak/resource/img/state_maps/432933.png" class="rounded mx-auto d-block" alt="...">
  		</div>
  		<div class="mt-4 col-md-4">
  			<img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/momos-sixteen_nine.jpg?size=358:203" class="rounded mx-auto d-block" alt="..." style=" width: 100%; height: 80%;">
  		</div>
  		<div class="mt-4 col-md-4">
  			<h4>मोमोज खाते-खाते हुआ कुछ ऐसा कि मच गया हंगामा...जानें पूरा मामला</h4>
  			<p>दुकानदार को पिटने से बचाने गए आरक्षक का अपहरण करने के बाद युवकों ने उसके साथ भी मारपीट की. स्कॉर्पियो में आरक्षक को जबरदस्ती डालकर काफी समय तक पीटा गया. वह किसी तरह युवकों के चंगुल से छूटकर अपने अधिकारियों के पास पहुंचा. पुलिस ने...</p>
  		</div>
  		</div>
  		<div class="row">
  		<div class="col-md-6">
  		<div class="row">
  		 <div class="img-fluid col-md-4 border-0">
						  <img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/nmacc_1_0-sixteen_nine.jpg?size=100:58" class="" alt="..." style="width: 100%;">
						    </div>

						    <div class="mt-1 col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						        <h5 class="card-title pt-2">'वाम' और 'राम' ने हमारे खिलाफ हाथ मिलाया.. .</h5>
						      </div>
						    </div>
						   <div class="mt-5 img-fluid col-md-4 border-0">
						  <img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/nmacc_1_0-sixteen_nine.jpg?size=100:58" class="" alt="..." style="width: 100%;">
						    </div>

						    <div class="mt-5 col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						        <h5 class="card-title pt-2">'वाम' और 'राम' ने हमारे खिलाफ हाथ मिलाया...</h5>
						      </div>
						    </div>
					</div>	
  		</div>
  		<div class="col-md-6">
  			<div class="row">
  		 <div class="img-fluid col-md-4 border-0">
						  <img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/nmacc_1_0-sixteen_nine.jpg?size=100:58" class="" alt="..." style="width: 100%;">
						    </div>

						    <div class="mt-1 col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						        <h5 class="card-title pt-2">'वाम' और 'राम' ने हमारे खिलाफ हाथ मिलाया...</h5>
						      </div>
						    </div>
						   <div class="mt-5 img-fluid col-md-4 border-0">
						  <img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/nmacc_1_0-sixteen_nine.jpg?size=100:58" class="" alt="..." style="width: 100%;">
						    </div>

						    <div class="mt-5 col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						        <h5 class="card-title pt-2">'वाम' और 'राम' ने हमारे खिलाफ हाथ मिलाया...</h5>
						      </div>
						    </div>
					</div>
  		</div>
  		
  		</div>


  </div>
 <!-- profie 2 -->
  <div class="tab-pane fade" id="profile-tab-pane3" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
  	
<div class="row">
  		
  		<div class="mt-4 col-md-4">
  			<img src="https://akm-img-a-in.tosshub.com/aajtak/resource/img/state_maps/432933.png" class="rounded mx-auto d-block" alt="...">
  		</div>
  		<div class="mt-4 col-md-4">
  			<img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/momos-sixteen_nine.jpg?size=358:203" class="rounded mx-auto d-block" alt="..." style=" width: 100%; height: 80%;">
  		</div>
  		<div class="mt-4 col-md-4">
  			<h4>मोमोज खाते-खाते हुआ कुछ ऐसा कि मच गया हंगामा...जानें पूरा मामला</h4>
  			<p>दुकानदार को पिटने से बचाने गए आरक्षक का अपहरण करने के बाद युवकों ने उसके साथ भी मारपीट की. स्कॉर्पियो में आरक्षक को जबरदस्ती डालकर काफी समय तक पीटा गया. वह किसी तरह युवकों के चंगुल से छूटकर अपने अधिकारियों के पास पहुंचा. पुलिस ने...</p>
  		</div>
  		</div>
  		<div class="row">
  		<div class="col-md-6">
  		<div class="row">
  		 <div class="img-fluid col-md-4 border-0">
						  <img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/nmacc_1_0-sixteen_nine.jpg?size=100:58" class="" alt="..." style="width: 100%;">
						    </div>

						    <div class="mt-1 col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						        <h5 class="card-title pt-2">'वाम' और 'राम' ने हमारे खिलाफ हाथ मिलाया...</h5>
						      </div>
						    </div>
						   <div class="mt-5 img-fluid col-md-4 border-0">
						  <img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/nmacc_1_0-sixteen_nine.jpg?size=100:58" class="" alt="..." style="width: 100%;">
						    </div>

						    <div class="mt-5 col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						        <h5 class="card-title pt-2">'वाम' और 'राम' ने हमारे खिलाफ हाथ मिलाया...</h5>
						      </div>
						    </div>
					</div>	
  		</div>
  		<div class="col-md-6">
  			<div class="row">
  		 <div class="img-fluid col-md-4 border-0">
						  <img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/nmacc_1_0-sixteen_nine.jpg?size=100:58" class="" alt="..." style="width: 100%;">
						    </div>

						    <div class="mt-1 col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						        <h5 class="card-title pt-2">'वाम' और 'राम' ने हमारे खिलाफ हाथ मिलाया...</h5>
						      </div>
						    </div>
						   <div class="mt-5 img-fluid col-md-4 border-0">
						  <img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/nmacc_1_0-sixteen_nine.jpg?size=100:58" class="" alt="..." style="width: 100%;">
						    </div>

						    <div class="mt-5 col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						        <h5 class="card-title pt-2">'वाम' और 'राम' ने हमारे खिलाफ हाथ मिलाया...</h5>
						      </div>
						    </div>
					</div>
  		</div>
  		
  		</div>


  </div>
  <!-- profie 3 -->
  <div class="tab-pane fade" id="profile-tab-pane4" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
  	
<div class="row">
  		
  		<div class="mt-4 col-md-4">
  			<img src="https://akm-img-a-in.tosshub.com/aajtak/resource/img/state_maps/432933.png" class="rounded mx-auto d-block" alt="...">
  		</div>
  		<div class="mt-4 col-md-4">
  			<img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/momos-sixteen_nine.jpg?size=358:203" class="rounded mx-auto d-block" alt="..." style=" width: 100%; height: 80%;">
  		</div>
  		<div class="mt-4 col-md-4">
  			<h4>मोमोज खाते-खाते हुआ कुछ ऐसा कि मच गया हंगामा...जानें पूरा मामला</h4>
  			<p>दुकानदार को पिटने से बचाने गए आरक्षक का अपहरण करने के बाद युवकों ने उसके साथ भी मारपीट की. स्कॉर्पियो में आरक्षक को जबरदस्ती डालकर काफी समय तक पीटा गया. वह किसी तरह युवकों के चंगुल से छूटकर अपने अधिकारियों के पास पहुंचा. पुलिस ने...</p>
  		</div>
  		</div>
  		<div class="row">
  		<div class="col-md-6">
  		<div class="row">
  		 <div class="img-fluid col-md-4 border-0">
						  <img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/nmacc_1_0-sixteen_nine.jpg?size=100:58" class="" alt="..." style="width: 100%;">
						    </div>

						    <div class="mt-1 col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						        <h5 class="card-title pt-2">'वाम' और 'राम' ने हमारे खिलाफ हाथ मिलाया...</h5>
						      </div>
						    </div>
						   <div class="mt-5 img-fluid col-md-4 border-0">
						  <img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/nmacc_1_0-sixteen_nine.jpg?size=100:58" class="" alt="..." style="width: 100%;">
						    </div>

						    <div class="mt-5 col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						        <h5 class="card-title pt-2">'वाम' और 'राम' ने हमारे खिलाफ हाथ मिलाया...</h5>
						      </div>
						    </div>
					</div>	
  		</div>
  		<div class="col-md-6">
  			<div class="row">
  		 <div class="img-fluid col-md-4 border-0">
						  <img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/nmacc_1_0-sixteen_nine.jpg?size=100:58" class="" alt="..." style="width: 100%;">
						    </div>

						    <div class="mt-1 col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						        <h5 class="card-title pt-2">'वाम' और 'राम' ने हमारे खिलाफ हाथ मिलाया...</h5>
						      </div>
						    </div>
						   <div class="mt-5 img-fluid col-md-4 border-0">
						  <img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/nmacc_1_0-sixteen_nine.jpg?size=100:58" class="" alt="..." style="width: 100%;">
						    </div>

						    <div class="mt-5 col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						        <h5 class="card-title pt-2">'वाम' और 'राम' ने हमारे खिलाफ हाथ मिलाया...</h5>
						      </div>
						    </div>
					</div>
  		</div>
  		
  		</div>


  </div>
  <!-- profie 4 -->
  <div class="tab-pane fade" id="profile-tab-pane5" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
  	
<div class="row">
  		
  		<div class="mt-4 col-md-4">
  			<img src="https://akm-img-a-in.tosshub.com/aajtak/resource/img/state_maps/432933.png" class="rounded mx-auto d-block" alt="...">
  		</div>
  		<div class="mt-4 col-md-4">
  			<img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/momos-sixteen_nine.jpg?size=358:203" class="rounded mx-auto d-block" alt="..." style=" width: 100%; height: 80%;">
  		</div>
  		<div class="mt-4 col-md-4">
  			<h4>मोमोज खाते-खाते हुआ कुछ ऐसा कि मच गया हंगामा...जानें पूरा मामला</h4>
  			<p>दुकानदार को पिटने से बचाने गए आरक्षक का अपहरण करने के बाद युवकों ने उसके साथ भी मारपीट की. स्कॉर्पियो में आरक्षक को जबरदस्ती डालकर काफी समय तक पीटा गया. वह किसी तरह युवकों के चंगुल से छूटकर अपने अधिकारियों के पास पहुंचा. पुलिस ने...</p>
  		</div>
  		</div>
  		<div class="row">
  		<div class="col-md-6">
  		<div class="row">
  		 <div class="img-fluid col-md-4 border-0">
						  <img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/nmacc_1_0-sixteen_nine.jpg?size=100:58" class="" alt="..." style="width: 100%;">
						    </div>

						    <div class="mt-1 col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						        <h5 class="card-title pt-2">'वाम' और 'राम' ने हमारे खिलाफ हाथ मिलाया...</h5>
						      </div>
						    </div>
						   <div class="mt-5 img-fluid col-md-4 border-0">
						  <img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/nmacc_1_0-sixteen_nine.jpg?size=100:58" class="" alt="..." style="width: 100%;">
						    </div>

						    <div class="mt-5 col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						        <h5 class="card-title pt-2">'वाम' और 'राम' ने हमारे खिलाफ हाथ मिलाया...</h5>
						      </div>
						    </div>
					</div>	
  		</div>
  		<div class="col-md-6">
  			<div class="row">
  		 <div class="img-fluid col-md-4 border-0">
						  <img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/nmacc_1_0-sixteen_nine.jpg?size=100:58" class="" alt="..." style="width: 100%;">
						    </div>

						    <div class="mt-1 col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						        <h5 class="card-title pt-2">'वाम' और 'राम' ने हमारे खिलाफ हाथ मिलाया...</h5>
						      </div>
						    </div>
						   <div class="mt-5 img-fluid col-md-4 border-0">
						  <img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/nmacc_1_0-sixteen_nine.jpg?size=100:58" class="" alt="..." style="width: 100%;">
						    </div>

						    <div class="mt-5 col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						        <h5 class="card-title pt-2">'वाम' और 'राम' ने हमारे खिलाफ हाथ मिलाया...</h5>
						      </div>
						    </div>
					</div>
  		</div>
  		
  		</div>


  </div>
  <!-- profie 5 -->
  <div class="tab-pane fade" id="profile-tab-pane6" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
  	
<div class="row">
  		
  		<div class="mt-4 col-md-4">
  			<img src="https://akm-img-a-in.tosshub.com/aajtak/resource/img/state_maps/432933.png" class="rounded mx-auto d-block" alt="...">
  		</div>
  		<div class="mt-4 col-md-4">
  			<img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/momos-sixteen_nine.jpg?size=358:203" class="rounded mx-auto d-block" alt="..." style=" width: 100%; height: 80%;">
  		</div>
  		<div class="mt-4 col-md-4">
  			<h4>मोमोज खाते-खाते हुआ कुछ ऐसा कि मच गया हंगामा...जानें पूरा मामला</h4>
  			<p>दुकानदार को पिटने से बचाने गए आरक्षक का अपहरण करने के बाद युवकों ने उसके साथ भी मारपीट की. स्कॉर्पियो में आरक्षक को जबरदस्ती डालकर काफी समय तक पीटा गया. वह किसी तरह युवकों के चंगुल से छूटकर अपने अधिकारियों के पास पहुंचा. पुलिस ने...</p>
  		</div>
  		</div>
  		<div class="row">
  		<div class="col-md-6">
  		<div class="row">
  		 <div class="img-fluid col-md-4 border-0">
						  <img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/nmacc_1_0-sixteen_nine.jpg?size=100:58" class="" alt="..." style="width: 100%;">
						    </div>

						    <div class="mt-1 col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						        <h5 class="card-title pt-2">'वाम' और 'राम' ने हमारे खिलाफ हाथ मिलाया...</h5>
						      </div>
						    </div>
						   <div class="mt-5 img-fluid col-md-4 border-0">
						  <img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/nmacc_1_0-sixteen_nine.jpg?size=100:58" class="" alt="..." style="width: 100%;">
						    </div>

						    <div class="mt-5 col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						        <h5 class="card-title pt-2">'वाम' और 'राम' ने हमारे खिलाफ हाथ मिलाया...</h5>
						      </div>
						    </div>
					</div>	
  		</div>
  		<div class="col-md-6">
  			<div class="row">
  		 <div class="img-fluid col-md-4 border-0">
						  <img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/nmacc_1_0-sixteen_nine.jpg?size=100:58" class="" alt="..." style="width: 100%;">
						    </div>

						    <div class="mt-1 col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						        <h5 class="card-title pt-2">'वाम' और 'राम' ने हमारे खिलाफ हाथ मिलाया...</h5>
						      </div>
						    </div>
						   <div class="mt-5 img-fluid col-md-4 border-0">
						  <img src="https://akm-img-a-in.tosshub.com/aajtak/images/story/202304/nmacc_1_0-sixteen_nine.jpg?size=100:58" class="" alt="..." style="width: 100%;">
						    </div>

						    <div class="mt-5 col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						        <h5 class="card-title pt-2">'वाम' और 'राम' ने हमारे खिलाफ हाथ मिलाया...</h5>
						      </div>
						    </div>
					</div>
  		</div>
  		
  		</div>


        </div>
  <!-- profie end -->
      </div>

					
				</div>
				<!-- section 11 -->
				<div class="row">
				
	<?php
		$section_eleven_left= DB::table('home_templates')->where('page_name','home')->where('position','left')->where('section','11')->first();
$news_section11_left_category=DB::table('categories')->where('id',$section_eleven_left->category)->first();

$news_section11_left1=DB::table('news')->whereIn('category',[$section_eleven_left->category])->orderBy('news_date','DESC')->limit(2)->get();
$news_section11_left2=DB::table('news')->whereIn('category',[$section_eleven_left->category])->orderBy('news_date','DESC')->skip(2)->limit(2)->get();

	?>			
					<h5 class="mt-5 mb-0"><?php echo $news_section11_left_category->title;?></h5>
					<div class="col-md-6">
					<?php foreach($news_section11_left1 as $eleven_left1){?>
						<div class="row">
							<div class="mt-5 col-md-6">
							    <a href="news-details?news_id=<?php echo $eleven_left1->id?>">
								<img src="uploads/news/<?php echo $eleven_left1->image;?>?size=227:128" class="rounded mx-auto d-block" alt="..." style=" width: 100%;">
</a>
							</div>
							<div class="mt-5 col-md-6">
							    <a href="news-details?news_id=<?php echo $eleven_left1->id?>">
								<h5><?php echo $eleven_left1->title;?></h5>
								</a>
							</div>
						</div>
					<?php }?>
					
			<?php foreach($news_section11_left2 as $eleven_left2){?>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
						 <div class="mt-3 img-fluid col-md-4 border-0">
						     <a href="news-details?news_id=<?php echo $eleven_left2->id?>">
						  <img src="uploads/news/<?php echo $eleven_left2->image;?>?size=100:58" class="" alt="..." style="width: 100%;">
						  </a>
						    </div>

						    <div class="mt-3 col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						         <a href="news-details?news_id=<?php echo $eleven_left2->id?>"> 
						         
						        <h5 class="card-title pt-2"><?php echo $eleven_left2->title;?></h5>
						        </a>
						      </div>
						    </div>
						    </div>
						    </div>
					</div>
					<hr>
			<?php }?>

					</div>
					
				</div>
      <!-- section 12 -->
      <div class="mt-5 row" style=" background: #ddd;">
	  <?php
	$section_twelve_left= DB::table('home_templates')->where('page_name','home')->where('position','left')->where('section','12')->first();
$news_section12_left_category=DB::table('categories')->where('id',$section_twelve_left->category)->first();

$news_section12_left1=DB::table('news')->whereIn('category',[$section_twelve_left->category])->orderBy('news_date','DESC')->limit(1)->first();
$news_section12_left2=DB::table('news')->whereIn('category',[$section_twelve_left->category])->orderBy('news_date','DESC')->skip(1)->limit(3)->get();
?>
					<h5 class="mt-4 mb-0"><?php echo $news_section12_left_category->title;?></h5>
					<div class="mt-4 col-md-6">
						<div class="row">
							<div class="col-md-12">
							    <a href="news-details?news_id=<?php echo $news_section12_left1->id?>">
								<img src="uploads/news/<?php echo $news_section12_left1->image;?>?size=465:262" class="rounded mx-auto d-block" alt="..." style=" width: 100%;">
                              </a>
							</div>
							<div class="mt-2 col-md-12">
							    <a href="news-details?news_id=<?php echo $news_section12_left1->id?>">
								<h3><?php echo $news_section12_left1->title;?></h3>
								</a>
							</div>
						</div>
					
				

					</div>
					<div class="mt-1 col-md-6">
					<?php
					foreach($news_section12_left2 as $sec12){?>
						<div class="mt-4 row">
						 <div class="img-fluid col-md-4 border-0">
						     <a href="news-details?news_id=<?php echo $sec12->id?>">
						  <img src="uploads/news/<?php echo $sec12->image;?>?size=100:58" class="" alt="..." style="width: 100%;">
						  </a>
						    </div>

						    <div class="col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						          <a href="news-details?news_id=<?php echo $sec12->id?>">
						        <h5 class="card-title pt-2"><?php echo $sec12->title;?></h5>
						        </a>
						      </div>
						    </div>
						    </div>
						    <hr>
					<?php }?>
						    
						    
						
							
						  
					</div>
				</div>    
      <!-- section 13 -->
      <div class="row">
	  
	  <?php
	$section_thirteen_left= DB::table('home_templates')->where('page_name','home')->where('position','left')->where('section','13')->first();
$news_section13_left_category=DB::table('categories')->where('id',$section_thirteen_left->category)->first();

$news_section13_left1=DB::table('news')->whereIn('category',[$section_thirteen_left->category])->orderBy('news_date','DESC')->limit(3)->get();
$news_section13_left2=DB::table('news')->whereIn('category',[$section_thirteen_left->category])->orderBy('news_date','DESC')->skip(3)->limit(3)->get();
?>
					<h5 class="mt-5 mb-0"><?php echo $news_section13_left_category->title;?></h5>
					<div class="col-md-6">
						
					
					<div class="row">
						<div class="col-md-12">
				<?php
				foreach($news_section13_left1 as $sec13left1){?>
							<div class="mt-3 row">
						 <div class="img-fluid col-md-4 border-0">
						     <a href="news-details?news_id=<?php echo $sec13left1->id?>">
						  <img src="uploads/news/<?php echo $sec13left1->image;?>?size=100:58" class="" alt="..." style="width: 100%;">
						  </a>
						    </div>

						    <div class="col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						          <a href="news-details?news_id=<?php echo $sec13left1->id?>">
						        <h5 class="card-title pt-2"><?php echo $sec13left1->title;?></h5>
						        </a>
						      </div>
						    </div>
						    </div>
				<?php }?>
						    
						    </div>
					</div>
					<hr>

					</div>
					<div class="mt-5 col-md-6">
					<?php
				foreach($news_section13_left2 as $sec13left2){?>
						<div class="row">
						 <div class="img-fluid col-md-4 border-0">
						     <a href="news-details?news_id=<?php echo $sec13left2->id?>">
						  <img src="uploads/news/<?php echo $sec13left2->image;?>?size=100:58" class="" alt="..." style="width: 100%;">
						  </a>
						    </div>

						    <div class="col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						          <a href="news-details?news_id=<?php echo $sec13left2->id?>">
						        <h5 class="card-title pt-2"><?php echo $sec13left2->title;?></h5>
						        </a>
						      </div>
						    </div>
						    </div>
						    <hr>
				<?php }?>
						    
						    
						  
					</div>
				</div>
      <!-- section 14 -->
      <div class="mt-5 row" style=" background: #ddd;">
	   <?php
	$section_fourteen_left= DB::table('home_templates')->where('page_name','home')->where('position','left')->where('section','14')->first();
$news_section14_left_category=DB::table('categories')->where('id',$section_fourteen_left->category)->first();

$news_section14_left1=DB::table('news')->whereIn('category',[$section_fourteen_left->category])->orderBy('news_date','DESC')->limit(1)->first();
$news_section14_left2=DB::table('news')->whereIn('category',[$section_fourteen_left->category])->orderBy('news_date','DESC')->skip(1)->limit(3)->get();
?>
	  
	  
	  <a href="news-categories?category_id=<?php echo $news_section14_left_category->id?>">
					<h5 class="mt-4 mb-0"><?php echo $news_section14_left_category->title;?></h5>
					</a>
					<div class="mt-4 col-md-6">
						<div class="row">
							<div class="col-md-12">
							    <a href="news-details?news_id=<?php echo $news_section14_left1->id?>">
								<img src="uploads/news/<?php echo $news_section14_left1->image;?>?size=465:262" class="rounded mx-auto d-block" alt="..." style=" width: 100%;">
                               </a>
							</div>
							<div class="mt-2 col-md-12">
							    <a href="news-details?news_id=<?php echo $news_section14_left1->id?>">
								<h3><?php echo $news_section14_left1->title;?></h3>
								</a>
							</div>
						</div>
					
				

					</div>
					<div class="mt-1 col-md-6">
				<?php
				foreach($news_section14_left2 as $sec14){?>
						<div class="mt-4 row">
						 <div class="img-fluid col-md-4 border-0">
						     <a href="news-details?news_id=<?php echo $sec14->id?>">
						  <img src="uploads/news/<?php echo $sec14->image;?>?size=100:58" class="" alt="..." style="width: 100%;">
						  </a>
						    </div>

						    <div class="col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						         <a href="news-details?news_id=<?php echo $sec14->id?>"> 
						        <h5 class="card-title pt-2"><?php echo $sec14->title;?></h5>
						        </a>
						      </div>
						    </div>
						    </div>
						    <hr>
				<?php }?>
						   
						    
						
						
						  
					</div>
				</div>    
      <!-- section 15 -->
      <div class="row">
	<?php
	$section_fifteen_left= DB::table('home_templates')->where('page_name','home')->where('position','left')->where('section','15')->first();
$news_section15_left_category=DB::table('categories')->where('id',$section_fifteen_left->category)->first();

$news_section15_left1=DB::table('news')->whereIn('category',[$section_fifteen_left->category])->orderBy('news_date','DESC')->limit(3)->get();
$news_section15_left2=DB::table('news')->whereIn('category',[$section_fifteen_left->category])->orderBy('news_date','DESC')->skip(3)->limit(3)->get();
?>
					<h5 class="mt-5 mb-0"><?php echo $news_section15_left_category->title;?></h5>
					<div class="col-md-6">
				<?php 
				$i=1;
				foreach($news_section15_left1 as $sec15_left){?>
						
						<div class="mt-3 row">
							<div class="img-fluid col-md-4 border-0">
							    <a href="news-details?news_id=<?php echo $sec15_left->id?>">
								<img src="uploads/news/<?php echo $sec15_left->image;?>?size=227:128" class="rounded mx-auto d-block" alt="..." style=" width: 100%;">
                               </a>
							</div>
							<div class="col-md-6">
							    <a href="news-details?news_id=<?php echo $sec15_left->id?>">
								<h5><?php echo $sec15_left->title;?></h5>
								</a>
							</div>
						</div>
				<?php $i++;}?>
					
					
					<hr>

					</div>
					<div class="mt-5 col-md-6">
					<?php
					foreach($news_section15_left2 as $sec15_left2){?>
						<div class="row">
						 <div class="img-fluid col-md-4 border-0">
						     <a href="news-details?news_id=<?php echo $sec15_left2->id?>">
						  <img src="uploads/news/<?php echo $sec15_left2->image;?>?size=100:58" class="" alt="..." style="width: 100%;">
						  </a>
						    </div>

						    <div class="col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						          <a href="news-details?news_id=<?php echo $sec15_left2->id?>">
						        <h5 class="card-title pt-2"><?php echo $sec15_left2->title;?></h5>
						        </a>
						      </div>
						    </div>
						    </div>
						    <hr>
					<?php }?>
						   
						    
						  
					</div>
				</div>
      <!-- section 16 -->
      <div class="row">
	  <?php
	$section_sixteen_left= DB::table('home_templates')->where('page_name','home')->where('position','left')->where('section','16')->first();
$news_section16_left_category=DB::table('categories')->where('id',$section_sixteen_left->category)->first();

$news_section16_left1=DB::table('news')->whereIn('category',[$section_sixteen_left->category])->orderBy('news_date','DESC')->limit(3)->get();
$news_section16_left2=DB::table('news')->whereIn('category',[$section_sixteen_left->category])->orderBy('news_date','DESC')->skip(3)->limit(3)->get();
?>	  
					<h5 class="mt-5 mb-0"><?php echo $news_section16_left_category->title;?></h5>
					<div class="col-md-6">
						
					
					<div class="row">
					
					
						<div class="col-md-12">
						<?php
					foreach($news_section16_left1 as $sec16_left1){?>
							<div class="mt-3 row">
						 <div class="img-fluid col-md-4 border-0">
						     <a href="news-details?news_id=<?php echo $sec16_left1->id?>">
						  <img src="uploads/news/<?php echo $sec16_left1->image;?>?size=100:58" class="" alt="..." style="width: 100%;">
						  </a>
						    </div>

						    <div class="col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						          <a href="news-details?news_id=<?php echo $sec16_left1->id?>">
						        <h5 class="card-title pt-2"><?php echo $sec16_left1->title;?></h5>
						        </a>
						      </div>
						    </div>
						    </div>
					<?php }?>
						    
						    </div>
					</div>
					<hr>

					</div>
					<div class="mt-5 col-md-6">
					
					<?php
					foreach($news_section16_left2 as $sec16_left2){?>
						<div class="row">
						 <div class="img-fluid col-md-4 border-0">
						     <a href="news-details?news_id=<?php echo $sec16_left2->id?>">
						  <img src="<?php echo $sec16_left2->image;?>?size=100:58" class="" alt="..." style="width: 100%;">
						  </a>
						    </div>

						    <div class="col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						          <a href="news-details?news_id=<?php echo $sec16_left2->id?>">
						        <h5 class="card-title pt-2"><?php echo $sec16_left1->title;?>.</h5>
						        </a>
						      </div>
						    </div>
						    </div>
						    <hr>
					<?php }?>
						   
						    
						  
					</div>
				</div>




				</div>
				<!--2 row  -->
			<div class="col-md-4" style="padding-left: 30px;">
				
				<div class="mt-5 tab-border row">
					<!-- tab -->
					<ul class="justify-content-evenly nav nav-tabs" id="myTab-5" role="tablist">
  <li class="nav-item post-tab" role="presentation">
    <button class="nav-link active" id="home-tab " data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
  </li>
  <li class="nav-item post-tab" role="presentation" style=" padding-top: 6px;">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Profile</button>
  </li>
  <li class="nav-item post-tab" role="presentation" style=" padding-top: 6px;">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Contact</button>
  </li>
 
</ul>
<div class="tab-content" id="myTab-5Content">
  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
  	<div class="mb-4 row">
  		<p class="my-4 mi">March 12, IPL,2023 Apr 08,19.30(IST)</p>
  		
  		<div class="col-md-4">
  			<h6 class="mi">MI</h6>
  			<img src="https://akm-img-a-in.tosshub.com/sites/live-score/resources-live/images/flag_img_c/1111.png" class="rounded mx-auto d-block " alt="...">
  		</div>
  		<div class="col-md-4" style=" text-align: center;">
  			<div class="vs">VS</div>
  		</div>
  		<div class="col-md-4">
  			<h6 class="mi">MI</h6>
  			<img src="https://akm-img-a-in.tosshub.com/sites/live-score/resources-live/images/flag_img_c/1108.png" class="rounded mx-auto d-block " alt="...">
  		</div>
  		<p class="my-4 mi"><b>Wankhede Stadium, Mumbai</b></p>
  	</div>
  </div>
  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
  	<div class="mb-4 row">
  		<p class="my-4 mi">March 12, IPL,2023 Apr 08,19.30(IST)</p>
  		
  		<div class="col-md-4">
  			<h6 class="mi">MI</h6>
  			<img src="https://akm-img-a-in.tosshub.com/sites/live-score/resources-live/images/flag_img_c/1111.png" class="rounded mx-auto d-block " alt="...">
  		</div>
  		<div class="col-md-4" style=" text-align: center;">
  			<div class="vs">VS</div>
  		</div>
  		<div class="col-md-4">
  			<h6 class="mi">MI</h6>
  			<img src="https://akm-img-a-in.tosshub.com/sites/live-score/resources-live/images/flag_img_c/1108.png" class="rounded mx-auto d-block " alt="...">
  		</div>
  		<p class="my-4 mi"><b>Wankhede Stadium, Mumbai</b></p>
  	</div>


  </div>
  <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
  	<div class="mb-4 row">
  		<p class="my-4 mi">March 12, IPL,2023 Apr 08,19.30(IST)</p>
  		
  		<div class="col-md-4">
  			<h6 class="mi">MI</h6>
  			<img src="https://akm-img-a-in.tosshub.com/sites/live-score/resources-live/images/flag_img_c/1111.png" class="rounded mx-auto d-block " alt="...">
  		</div>
  		<div class="col-md-4" style=" text-align: center;">
  			<div class="vs">VS</div>
  		</div>
  		<div class="col-md-4">
  			<h6 class="mi">MI</h6>
  			<img src="https://akm-img-a-in.tosshub.com/sites/live-score/resources-live/images/flag_img_c/1108.png" class="rounded mx-auto d-block " alt="...">
  		</div>
  		<p class="my-4 mi"><b>Wankhede Stadium, Mumbai</b></p>
  	</div>


  </div>

</div>

		     <!-- tab end -->
				</div>
				
				<!-- section a -->
				<?php
		$section_five_right= DB::table('home_templates')->where('page_name','home')->where('position','right')->where('section','5')->first();
$news_section5_right=DB::table('news')->whereIn('category',[$section_five_right->category])->orderBy('news_date','DESC')->limit(1)->first();

$news_section5_right_category=DB::table('categories')->where('id',$section_five_right->category)->first();	

$section5_right_news=DB::table('news')->whereIn('category',[$section_five_right->category])->orderBy('news_date','DESC')->limit(3)->get();		
				?>
				<a href="news-categoris?category_id=<?php echo $news_section5_right_category->id?>">
				<h4 class="mt-5 mb-3"><?php echo $news_section5_right_category->title;?></h4>
				</a>
				<div class="row">
					<div class="col-md-12">
					    <a href="news-details?news_id=<?php echo $news_section5_right->id?>">
						<img src="uploads/news/<?php echo $news_section5_right->image;?>" class="img-fluid" alt="Responsive image">
						</a>
					</div>
				</div>
				<?php
				foreach($section5_right_news as $list){?>
				    <div class="mt-3 row">
						 <div class="img-fluid col-md-4 border-0">
						     <a href="news-details?news_id=<?php echo $list->id?>">
						  <img src="uploads/news/<?php echo $list->image;?>" class="" alt="..." style="width: 100%;">
						  </a>
						    </div>

						    <div class="col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						           <a href="news-details?news_id=<?php echo $list->id?>">
						        <h5 class="card-title pt-2"><?php echo $list->title;?></h5>
						        </a>
						      </div>
						    </div>
						    </div>
						    <hr>
				<?php }?>	
							
						    
              <!-- section b -->
			<?php  
			  $section_six_right= DB::table('home_templates')->where('page_name','home')->where('position','right')->where('section','6')->first();
$news_section6_right=DB::table('news')->whereIn('category',[$section_six_right->category])->orderBy('news_date','DESC')->limit(1)->first();

$news_section6_right_category=DB::table('categories')->where('id',$section_six_right->category)->first();
$section6_right=DB::table('news')->whereIn('category',[$section_six_right->category])->orderBy('news_date','DESC')->limit(4)->get();	
	?>		  
			  <a href="news-categoris?catgory_id=<?php echo $news_section6_right_category->id?>">
						    <h4 class="mt-5 mb-3"><?php echo $news_section6_right_category->title;?></h4>
						    </a>
				<div class="row">
					<div class="col-md-12">
					    <a href="news-details?news_id=<?php echo $news_section6_right->id?>">
						<img src="uploads/news/<?php echo $news_section6_right->image;?>" class="img-fluid" alt="Responsive image">
						</a>
					</div>
				</div>
				<?php
				foreach($section6_right as $row){?>
				    <div class="mt-3 row">
						 <div class="img-fluid col-md-4 border-0">
						     <a href="news-details?news_id=<?php echo $row->id?>">
						  <img src="uploads/news/<?php echo $row->image;?>?size=100:58" class="" alt="..." style="width: 100%;">
						  </a>
						    </div>

						    <div class="col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						          <a href="news-details?news_id=<?php echo $row->id?>">
						        <h5 class="card-title pt-2"><?php echo $row->title;?></h5>
						        </a>
						      </div>
						    </div>
						    </div>
						    <hr>
				<?php }?>	
							
						    
						  
						   
               
						 
						
					
              <!-- section d -->
            
         
					
					
					
					<!-- section e -->
					 <h4 class="mt-5 mb-3">आपका वोट</h4>
					 <div class="row" style=" background: #ddd; border-radius: 8px; padding: 27px;">
					 	<h4>क्या बारहवीं बोर्ड की परीक्षा में दो सेमेस्टर का सिस्टम सही है?</h4>
					 <div class="my-4 progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="">
          <div class="progress-bar bg-success" style="width: 65%;">
          	  	<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" style=" margin: 7px;">
  <label class="form-check-label" for="flexRadioDefault1" style=" margin-left: -121px;">हां</label>
</div>
          </div>
          <span class="text-1">25%</span>
          </div>
          <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
          <div class="progress-bar bg-info text-dark" style="width: 50%">
          	<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" style=" margin: 7px;">
  <label class="form-check-label" for="flexRadioDefault1" style=" margin-left: -70px;">नहीं</label>
</div>
          </div>
          <span class="text-1">50%</span>
          </div>
          </div>
				 <!-- section f -->
	       <!-- section g -->
		   
					<?php  
			  $section_seven_middle= DB::table('home_templates')->where('page_name','home')->where('position','middle')->where('section','7')->first();
$news_section7_middle=DB::table('news')->whereIn('category',[$section_seven_middle->category])->orderBy('news_date','DESC')->limit(1)->first();

$news_section7_middle_category=DB::table('categories')->where('id',$section_seven_middle->category)->first();
$section7_middle=DB::table('news')->whereIn('category',[$section_seven_middle->category])->orderBy('news_date','DESC')->skip(1)->limit(4)->get();
?>   
		   
	       <h4 class="mt-5 mb-3"><?php echo $news_section7_middle_category->title;?></h4>
				<div class="row">
					<div class="col-md-12">
					    <a href="news-details?news_id=<?php echo $news_section7_middle->id;?>">
						<img src="uploads/news/<?php echo $news_section7_middle->image;?>?size=465:262" class="img-fluid" alt="Responsive image">
						</a>
					</div>
				</div>
				<?php
				foreach($section7_middle as $sec7middle){?>
				    <div class="mt-3 row">
						 <div class="img-fluid col-md-4 border-0">
						     <a href="news-details?news_id=<?php echo $sec7middle->id;?>">
						  <img src="uploads/news/<?php echo $sec7middle->image;?>?size=100:58" class="" alt="..." style="width: 100%;">
						  </a>
						    </div>

						    <div class="col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						          <a href="news-details?news_id=<?php echo $sec7middle->id;?>">
						        <h5 class="card-title pt-2"><?php echo $sec7middle->title;?></h5>
						        </a>
						      </div>
						    </div>
						    </div>
						    <hr>
				<?php }?>	
							
						  
			<?php  
			  $section_seven_right= DB::table('home_templates')->where('page_name','home')->where('position','right')->where('section','7')->first();
$news_section7_right=DB::table('news')->whereIn('category',[$section_seven_right->category])->orderBy('news_date','DESC')->limit(1)->first();

$news_section7_right_category=DB::table('categories')->where('id',$section_seven_right->category)->first();
$section7_right=DB::table('news')->whereIn('category',[$section_seven_right->category])->orderBy('news_date','DESC')->skip(0)->limit(4)->get();
?>  			   
						
             <h4 class="mt-5 mb-3"><?php echo $news_section7_right_category->title;?></h4>
              
			  <?php foreach($section7_right as $sec7Middle){?>
			  <div class="mt-3 row">
						 <div class="img-fluid col-md-4 border-0">
						     <a href="news-details?news_id=<?php echo $sec7Middle->id;?>">
						  <img src="uploads/news/<?php echo $sec7Middle->image;?>?size=100:58" class="" alt="..." style="width: 100%;">
						  </a>
						    </div>

						    <div class="col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">
						          <a href="news-details?news_id=<?php echo $sec7Middle->id;?>">
						        <h6 class="card-title pt-2"><?php echo $sec7Middle->title;?></h6>
						        </a>
						      </div>
						    </div>
						    </div>
						    <hr>
			  <?php }?>
						    
						     
							 
						    <!-- section h -->
						    
				
				    
						     
						  <!-- section i -->
						  
              <?php
$section_eight_right= DB::table('home_templates')->where('page_name','home')->where('position','right')->where('section','8')->first();

$section_eight_right_cat= DB::table('categories')->where('id',$section_eight_right->category)->first();
$news_section8_right=DB::table('news')->whereIn('category',[$section_eight_right->category])->orderBy('news_date','DESC')->skip(0)->limit(3)->get();
	?>		
<h4 class="mt-5 mb-3"><?php echo $section_eight_right_cat->title;?></h4>
		<?php  foreach($news_section8_right as $right8row){?>
			  <div class="mt-3 row">
						 <div class="img-fluid col-md-4 border-0">
						    <a href="news-details?news_id=<?php echo $right8row->id;?>">
						  <img src="uploads/news/<?php echo $right8row->image;?>?size=100:58" class="" alt="..." style="width: 100%;">
						  </a>
						    </div>

						    <div class="col-md-8" style="padding-left: 0px !important">
						      <div class="card-body">title
						      <a href="news-details?news_id=<?php echo $right8row->id;?>">
						        <h6 class="card- pt-2"><?php echo $right8row->title;?></h6>
						        </a>
						      </div>
						    </div>
						    </div>
						    <hr>
		<?php }?>
						     
						     
						  <!-- section i end -->
						  

			</div>
		</div>
	</div>
</section>


<!--footer -->
<x-front_footer :menucategory="$menucategory"/>