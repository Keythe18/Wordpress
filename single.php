<?php get_header(); ?>
<main class="<?php echo get_post_meta( $post->ID, 'couleur', true); ?>">single
    <div class="container clearfix">
        <?php while ( have_posts() ) : the_post(); ?>
            <article>
                <?php the_post_thumbnail ('large', array('class' => 'img-fluid float-lg-left mr-lg-3')); ?>
                <h1><?php the_title(); ?></h1>
                <small class="mb-5">
                    <a href="/author/<?php echo get_the_author_meta('user_login') ?>"><?php the_author(); ?></a> le <time datetime="<?php echo get_the_date('c'); ?>" ><?php echo get_the_date(); ?></time>
                </small>
                <?php the_category(); ?>
                <?php echo get_the_tag_list (
                    '<ul class="pl-0"><li class="d-inline-block mr-2">',
                    '</li><li class="d-inline-block mr-2">',
                    '</li></ul>',get_queried_object_id()); ?>
                <?php the_content(); ?>
                <?php $champs_invites = get_post_meta($post->ID, "invites", true); 
                if ($champs_invites)
                    { ?><p><b>Invités</b> : <?php echo $champs_invites; ?></p> <?php } 
                else { ?> <?php } ?> 
                <?php $expo = get_post_meta($post->ID, 'expo', false); 
                if( count( $expo ) != 0 ) 
                    { ?> <ul><?php foreach ($expo as $expo) { echo '<li>'.$expo.'</li>'; } ?></ul> <?php } 
                else { } ?> 
            </article>
            <?php edit_post_link ('Editer', '<p>', '</p>'); ?>
            <?php comments_popup_link (
                'Pas de commentaires', 
                '1 Commentaire', 
                '% Commentaires', 
                'comments-link', 
                'Commentaires désactivés'); ?>
            <?php comments_template(); ?>
        <?php endwhile; ?>
    </div>
</main>
<?php get_footer(); ?>