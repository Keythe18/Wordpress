<?php get_header(); ?>
<main>home
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel"> 
        <ol class="carousel-indicators">
            <?php $slider = get_posts(array('post_type' => 'slides'));
            $counter = 0;
            foreach ($slider as $slide) { ?>
                <li class="<?php echo ($counter == 0) ? 'active' : ''; ?>" data-target="#carouselExampleCaptions" data-slide-to="<?= $counter ?>"></li>
            <?php $counter++;} ?>
        </ol>
        <div class="carousel-inner">
            <?php $slider = get_posts(array('post_type' => 'slides')); ?>
            <?php $count = 0; ?>
            <?php foreach($slider as $slide): ?>
                <div class="carousel-item <?php echo ($count == 0) ? 'active' : ''; ?>">
                    <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($slide->ID)) ?>" 
                        class="d-block w-100" 
                        alt="<?php get_post_meta( $imagePost->ID, '_wp_attachment_image_alt', true )?>">
                    <div class="carousel-caption d-none d-md-block">
                        <h2><?php echo get_the_title ($slide->ID) ?></h2>
                        <p><?php echo wp_get_attachment_caption (get_post_thumbnail_id($slide->ID)) ?></p>
                    </div>
                </div>
                <?php $count++; ?>
            <?php endforeach; ?>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Suivant</span></a>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Précedent</span></a>
        </div>
    </div>
    <div class="container">
        <article id="intro">
            <?php if (is_active_sidebar ('intro') ) :?>
                <?php dynamic_sidebar ('intro'); ?>
            <?php endif; ?> 
        </article>
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
    </div>
    <section>	
		<script type="text/javascript">
			var lat = 48.854631; var lon =  2.346255; var macarte = null; var villes = {

				"Saturn Elektrohandels GmbH": { "lat": 52.437937, "lon": 13.262166 },

			<?php $commerces = get_posts(array('post_type' => 'commerces_cpt' , 'posts_per_page' => -1 )); ?>
			<?php foreach($commerces as $commerce): ?>
				<?php echo '"<a href=' . get_permalink ($commerce->ID) . '>' . get_the_title ($commerce->ID) . '</a>" : { "lat":' . get_post_meta( $commerce->ID, 'latitude', true ) . ', "lon":' . get_post_meta( $commerce->ID, 'longitude', true ) . '},' ?>
			<?php endforeach; ?>

			}; function initMap() {macarte = L.map('map').setView([lat, lon], 12); L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', { attribution: 'données © OpenStreetMap/ODbL - rendu OSM France', minZoom: 1, maxZoom: 20	}).addTo(macarte); for (ville in villes) {	var marker = L.marker([villes[ville].lat, villes[ville].lon]).addTo(macarte); marker.bindPopup(ville); } } window.onload = function(){ initMap(); macarte.scrollWheelZoom.disable(); };
		</script>
		<div id="map" style="height:500px"></div>
	</section>
</main>
<?php get_footer(); ?>