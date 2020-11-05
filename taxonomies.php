<?php
/* Template Name: Taxonomies */
?>

<?php get_header(); ?>

<main class="container">
    <?php while ( have_posts() ) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
    <?php endwhile; ?>
    <ul><?php wp_get_archives('type=monthly'); ?></ul> 
    <?php wp_list_pages(); ?> 
    <?php wp_list_authors(); ?> 
    <?php wp_list_categories(); ?> 
    <?php wp_tag_cloud(); ?> 
</main>

<?php get_footer(); ?>