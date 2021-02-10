<?php
/**
 * Template Name: News
 *
 * @package blog_child
 */

get_header( 'home' ); ?>

<div class="row post-wrapper justify-content-between flex-md-nowrap">
    <div class="col-xs-12 col-lg-8 main-content ">
        <?php
          $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
          $args  = array(
              'post_type'      => 'news',
              'posts_per_page' => 2,
              'paged'          => $paged,
              'post_status'    => 'publish',
              'orderby'        => 'desc',
              'orderby'        => 'date',
          );

        $loop = new WP_Query( $args );

        if ( $loop->have_posts() ) : 
          while ( $loop->have_posts() ) :
            $loop->the_post();

            get_template_part('template-parts/section', 'content' );
            
          endwhile; ?>

      <div class="text-right news_pagination">
          <?php
            if ($loop->max_num_pages > 1 ) {
                $big        = 999999999;

                echo paginate_links( array( // phpcs:ignore
                    'total'              => $loop->max_num_pages,
                    'base'               => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format'             => '?page=%#%',
                    'current'            => max( 1, get_query_var( 'page' ) ),
                ) );
              }
          ?>
      </div>
      <?php 
        endif; 
        wp_reset_postdata(); 
      ?>
    </div>

    <div class="col-xs-12 col-lg-4 sidebar-content">

		    <?php get_sidebar(); ?>

    </div>
</div>

<?php get_footer(); ?>