<section id="starter-section" class="starter-section section">
	<!-- <div class="container section-title" data-aos="fade-up">
		<span class="description-title">Itineraries</span>
		<h2>Itineraries</h2>
		<p>Check Out Some Of The Stops Along The Way. Click To Make Larger.</p>
	</div> -->
	<div class="container" data-aos="fade-up">
		<style>.owl-nav, .owl-dots {display: none;}</style>
		<div class="row g-4">
			<div class="col-lg-12 carousel-6items owl-carousel px-2 magnific-popup">
			<?php foreach ((new AdvSysDir('assets/img/cruises/1470299/itinerary'))->match('/\.(jpe?g|png|gif|webp|bmp|svg)$/i')->limit(0, -1) AS $img_file) : ?>
				<a href="<?=$img_file->getPathname()?>" title="<?=ucwords(str_replace(['_','.jpg'], [' ',''], $img_file->getFilename()))?>">
					<img src="<?=$img_file->getPathname()?>" alt="<?=ucwords(str_replace(['_','.jpg'], [' ',''], $img_file->getFilename()))?>" class="hover-opacity rounded img-fluid">
				</a>
			<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
