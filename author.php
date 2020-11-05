<?php get_header(); ?>
<main class="container">author
<h1><?php the_author(); ?></h1> 


<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?> 

<p><?php echo $curauth->user_description; ?></p> 

<?php if ( !empty( $curauth->facebook ) ) { 
    echo '<a href=" ' . $curauth->facebook . '"><span class="dashicons dashicons-facebook"></span></a>'; } ?>
<?php if ( !empty( $curauth->twitter ) ) { 
    echo '<a href=" ' . $curauth->twitter . '"><span class="dashicons dashicons-twitter"></span></a>'; } ?>
<?php if ( !empty( $curauth->instagram ) ) { 
    echo '<a href=" ' . $curauth->instagram . '"><span class="dashicons dashicons-instagram"></span></a>'; } ?>
    
<?php print ('<h2>Derniers posts :</h2>'); ?> 

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
    <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a> 
    <?php endwhile; ?> 
    <?php the_posts_pagination( array('prev_text' => __('Précédent'), 'next_text' => __('Suivant')) ); ?> 
<?php else: ?> 
    <p><?php _e('Pas de résultats'); ?></p> <?php endif; ?>

</main>
<?php get_footer(); ?>