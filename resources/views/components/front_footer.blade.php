<footer id="footer-1">
	<div class="container-fluid">
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
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6"></div>
						<div class="col-md-6">
							<h5 style="margin-left:54%;">Follow us onnnnn</h5>
		   					<ul>
								<?php
									$social_links = DB::table('socials')->orderBy('id','ASC')->get();
								?>
               					@foreach($social_links as $links)
									<?php
										if($links->id!=4 && $links->id!=5) {
									?>
									<li><a href="{{$links->url}}" target="_blank"><i class="fa-brands fa-{{$links->social_name}}"></i></a></li>
									<?php 
										}
									?>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
				<div class="py-4 row" style=" background: black; border-top: 1px solid #ddd;">
					<p class="" style="line-height: 20px;">CNN name, logo and all associated elements ® and © 2023 Cable News Network LP, LLLP. A Time Warner Company. All rights reserved. CNN and the CNN logo are registered marks of Cable News Network, LP LLLP, displayed with permission. Use of the CNN name and/or logo on or as part of NEWS18.com does not derogate from the intellectual property rights of Cable News Network in respect of them. © Copyright Network18 Media and Investments Ltd 2023. All rights reserved.</p>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- bootstap js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
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
</script>