<?php get_header(); ?>
<main>index
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
    </div>
</main>
<?php get_footer(); ?>