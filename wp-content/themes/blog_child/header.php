<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js jquery-loading lt-ie9 lt-ie8 lt-ie7"> <![endif]-->

<!--[if IE 7]>         <html class="no-js jquery-loading lt-ie9 lt-ie8"> <![endif]-->

<!--[if IE 8]>         <html class="no-js jquery-loading lt-ie9"> <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js jquery-loading"> <!--<![endif]-->
    <html <?php language_attributes(); ?> class="no-js">
        <head>
            <meta charset="<?php bloginfo('charset'); ?>">
            <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
            <meta name="viewport" content="width=device-width">
            <meta name = "format-detection" content = "telephone=no">
            <link rel="profile" href="http://gmpg.org/xfn/11">
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
            <!--[if lt IE 9]>
            <script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/html5.js"></script>
            <![endif]-->
            <?php wp_head(); ?>
        </head>
        <body <?php body_class(); ?>>

        <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top" role="navigation">
            <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>
                <?php
                wp_nav_menu( array(
                    'theme_location'    => 'primary',
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

        <div class="jumbotron jumbotron-fluid position-relative" style="background: url(<?php echo esc_url(get_header_image()); ?>) no-repeat; background-size:cover;" >
            <div class="color-overlay w-100 h-100 position-absolute top-0" style="background-color: blue; "></div>
            <div class="container header-wrapper position-relative text-white text-center" >
                <?php 
                    if( is_front_page() ) { ?>
                        <h1 class="display-3 header-title"><?php echo get_bloginfo('name'); ?></h1> 
                        <p class="lead"><?php echo get_bloginfo('description');?></p> 
                
                <?php 
                    }

                    if ( is_archive() ) { ?>
                        <h1 class="display-3 header-title"><?php the_archive_title(); ?></h1>
                        <p class="lead"><?php the_archive_description(); ?></p> 
                <?php
                    }

                    if ( is_single() ) { ?>
                        <h1 class="display-3 header-title"><?php single_post_title(); ?></h1>
                <?php
                    } 
                ?>
            
            </div>
        </div>