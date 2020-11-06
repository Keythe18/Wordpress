<!doctype html>
<html lang="fr-FR">
    <head>
        <meta charset="utf-8">
        <?php if (is_home()) : ?>
            <meta name="description" content="metadesc home">
        <?php elseif (is_category()) : ?>
            <meta name="description" content="<?php echo category_description(); ?>">
        <?php elseif (is_tag()) : ?>
            <meta name="description" content="<?php echo tag_description(); ?>">
        <?php elseif (is_single () || is_page()) : ?>
            <meta name="description" content="<?php echo get_post_meta( $post->ID, 'meta-description', true ); ?>">
        <?php endif; ?>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php wp_head(); ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <?php if (is_home() || is_tax() || is_singular) : ?>
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    	    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

        <?php endif; ?>

        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>">
    </head>
    <body>
        <header class="bg-black">
            <nav class="navbar navbar-expand-md" role="navigation">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="/"><a href="/"><img src="/wp-content/themes/KeyTheme1/img/logo.gif"></a>
                    <?php
                        wp_nav_menu( array(
                            'theme_location'    => 'header-menu',
                            'depth'             => 2,
                            'container'         => 'div',
                            'container_class'   => 'collapse navbar-collapse',
                            'container_id'      => 'bs-example-navbar-collapse-1',
                            'menu_class'        => 'nav navbar-nav',
                            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'            => new WP_Bootstrap_Navwalker(),  
                        ) );
                    ?>
    </div>
</nav>
            <?php get_template_part( 'template-parts/searchform' ); ?> 
        </header>

        