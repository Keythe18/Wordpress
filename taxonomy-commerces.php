<?php get_header(); ?>
<main>taxonomy-commerces
    <div class="container">
        <section class="row">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article class="col-lg-6 col-xl-3 text-center">
                    <div class="shadow p-3 text-light h-100">
                        <a href="<?php the_permalink(); ?>">
                            <h2><?php the_title(); ?></h2>
                            <?php the_excerpt(); ?>
                            <?php the_post_thumbnail ('thumbnail', array('class' => 'img-fluid')); ?>
                        </a>
                    </div>
                </article>
            <?php endwhile; ?>
            <div class="col-12 d-flex justify-content-center mt-5">
                <?php the_posts_pagination( array (
                    'prev_text' => __( 'Précédent'),
                    'next_text' => __( 'Suivant'),
                ) ); ?> 
            </div>
            <?php else: ?>
                <p><?php esc_html_e( 'Pas de résultats.' ); ?></p>
            <?php endif; ?>
        </section>
        <section>	
		<script type="text/javascript">
			var lat = 48.854631; 
			var lon = 2.346255; 
			var macarte = null; 
			var villes = {
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php echo '"' ?><?php the_title( '<a href=' . esc_url( get_permalink() ) . '>', '</a>"' ); ?><?php echo ': { "lat": ' ?><?php echo get_post_meta( $post->ID, 'latitude', true ) ?><?php echo ', "lon":' ?><?php echo get_post_meta( $post->ID, 'longitude', true ) ?><?php echo '},' ?>
				<?php endwhile; ?>
				<?php else: ?>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			};
			function initMap() {macarte = L.map('map').setView([lat, lon], 12); 
			L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', { 
				attribution: 'données © OpenStreetMap/ODbL - rendu OSM France', 
				minZoom: 1, 
				maxZoom: 20	}).addTo(macarte); 
			for (ville in villes) {	
				var marker = L.marker([villes[ville].lat, villes[ville].lon]).addTo(macarte); marker.bindPopup(ville); } } 
				window.onload = function(){ 
				initMap(); 
				macarte.scrollWheelZoom.disable(); 
			};
		</script>
		<div id="map" style="height:500px"></div>
	</section>
    </div>
</main>
<?php get_footer(); ?>