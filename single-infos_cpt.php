<?php get_header(); ?>
<main>single-infos_cpt
    <div class="container clearfix">
        <?php while ( have_posts() ) : the_post(); ?>
            <article>
                <?php the_post_thumbnail ('large', array('class' => 'img-fluid float-lg-left mr-lg-3')); ?>
                <h1><?php the_title(); ?></h1>
                <small class="mb-5">
                    <a href="/author/<?php echo get_the_author_meta('user_login') ?>">
                    <?php the_author(); ?></a> le <time datetime="<?php echo get_the_date('c'); ?>" >
                    <?php echo get_the_date(); ?></time>
                </small>
                <?php the_content(); ?>
        <?php endwhile; ?>
    </div>
</main>
<?php get_footer(); ?>