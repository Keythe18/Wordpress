<?php get_header(); ?>
<main>single-commerces_cpt
    <div class="container clearfix">
        <?php while ( have_posts() ) : the_post(); ?>
            <article>
                <?php the_post_thumbnail ('large', array('class' => 'img-fluid float-lg-left mr-lg-3')); ?>
                <h1><?php the_title(); ?></h1>
                <?php the_category(); ?>
                <?php the_content(); ?>
            </article>
        <?php endwhile; ?>
    </div>
    <div>
		<?php $dlat = get_post_meta($post->ID, "latitude", true); ?>
		<?php $dlon = get_post_meta($post->ID, "longitude", true); ?>
		<script type="text/javascript">
			var lat = <?php echo $dlat; ?>;
			var lon = <?php echo $dlon; ?>;
			var macarte = null;
			function initMap() {
				macarte = L.map('mapsingle').setView([lat, lon], 17);
				L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
					attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
					minZoom: 1,
					maxZoom: 20
				}).addTo(macarte);
				var marker = L.marker([<?php echo $dlat; ?>,<?php echo $dlon; ?>]).addTo(macarte);
			}
			window.onload = function(){
				initMap(); 
				 macarte.scrollWheelZoom.disable();
			};
		</script>
		<div id="mapsingle" style="height:500px"></div>
	</div>
</main>
<?php get_footer(); ?>