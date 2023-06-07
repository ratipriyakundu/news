<footer id="footer-1">
	<div class="container-fluid mt-5">
		<div class="row">
			@foreach($menucategory as $mcat)
				<div class="col-md-3" style=" padding-left: 80px;">
					<h5>{{$mcat->title}}</h5>
					<hr class="border border-danger border-1 opacity-75">
					<ul class="">
						<?php
							$subcategories = DB::table('menu_categories')->where('menu_id', $mcat->id)->get();
						?>
						@foreach($subcategories as $subcat)
							<li><a href="{{route('news-categories')}}?category_id={{$subcat->category_id}}">{{$subcat->title}}</a> </li>
						@endforeach
					</ul>
				</div>
			@endforeach
		</div>
		<div id="footer-2">
			<div class="py-1 row" style=" background: black;padding-right: 30px;">
				<div class="mt-3 col-md-2">
					<?php
						$header_banner= DB::table('header_banner')->where('id',1)->first();
						$logo= DB::table('logo')->where('id',1)->first();
					?>
					<img src="uploads/logo/{{$logo->logo}}" class="rounded mx-auto d-block" alt="..." width="32%">
				</div>
				<?php
					$pages = DB::table('pages')->orderBy('id','DESC')->get();
				?>
				<div class="mt-3 col-md-10" style="margin-top: -69px;">
					<div class="row">
						<?php $i=1;?>
						@foreach($pages as $p1)<?php if($i==1){ $class="";}else{ $class="";}?>
							<div class="col-md-2 {{$class}}">
								<p>{{$p1->title}}</p>
							</div>
							<?php $i++;?>
						@endforeach
					</div>
				</div>
				<div class="row">
					<div class="col text-center mt-4">
						<ul>
							<?php
								$social_links = DB::table('socials')->orderBy('id','ASC')->get();
							?>
							   @foreach($social_links as $links)
							   <li><a href="{{$links->url}}" target="_blank"><i class="fa-brands fa-{{$links->social_name}}"></i></a></li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="py-4 row text-center" style=" background: black; border-top: 1px solid #ddd;">
					<p class="" style="line-height: 20px;"> © Copyright JanGanNews {{\Carbon\Carbon::now()->format('Y')}}. All rights reserved.</p>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- bootstap js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.cookie.min.js"></script>
<script src="js/google-translate.js"></script>
<script src="js/owl.carousel.js"></script>
<script src="js/owl.animate.js"></script>
<script src="js/owl.autoplay.js"></script>
<script src="js/owl.autoheight.js"></script>
<script src="js/owl.hash.js"></script>
<script src="js/owl.lazyload.js"></script>
<script src="js/owl.navigation.js"></script>
<script>
  	var promoticker = function() {
		var window_width = window.innerWidth;
		var speed = 25* window_width;
		$('#promo-notifications li:first').animate( {left: '-980px'}, speed, 'linear', function() {
		$(this).detach().appendTo('#promo-notifications ul').css('left', "100%");
		promoticker();
		});
  	};
	if ($("#promo-notifications li").length > 0) {
		promoticker();
	}
	function showSubMenu(mobile_sub_menu_content_id,sub_menu_control_id) {
		if($('#'+mobile_sub_menu_content_id+'').hasClass('d-none')) {
			$('#'+mobile_sub_menu_content_id+'').removeClass('d-none');
		}else {
			$('#'+mobile_sub_menu_content_id+'').addClass('d-none');
		}
		if($('#'+sub_menu_control_id+'').hasClass('fa-angle-right')) {
			$('#'+sub_menu_control_id+'').removeClass('fa-angle-right');
			$('#'+sub_menu_control_id+'').addClass('fa-angle-down');
		}else {
			$('#'+sub_menu_control_id+'').removeClass('fa-angle-down');			
			$('#'+sub_menu_control_id+'').addClass('fa-angle-right');
		}
	}
	function closeBreakingNews() {
		$('.breaking-news-wrap').addClass('d-none');
	}
</script>
<script>
	var owl = $('.owl-carousel-6');
	owl.owlCarousel({
	  margin: 10,
	  loop: true,
	  autoplay:true,
      autoplayTimeout:1000,
      autoplayHoverPause:true,
	  nav:false,
	  responsive: {
		0: {
		  items: 2
		},
		600: {
		  items: 4
		},
		1000: {
		  items: 5
		},
		1500: {
			items: 6
		}
	  }
	})
</script>
<script>
	var owll = $('.owl-carousel-3');
	owll.owlCarousel({
	  margin: 10,
	  loop: true,
	  autoplay:true,
      autoplayTimeout:1000,
      autoplayHoverPause:true,
	  responsive: {
		0: {
		  items: 1
		},
		600: {
		  items: 2
		},
		1000: {
		  items: 2
		},
		1500: {
			items: 3
		}
	  }
	})
</script>
