<?php get_header(); ?>

<div class="row post-wrapper justify-content-between  flex-md-nowrap">
    <div class="col-xs-12 col-lg-8 main-content ">
        <?php     
          $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
          $tag = get_queried_object();
          $args  = array(
              'post_type'      => 'news',
              'tag'            => $tag->slug,
              'posts_per_page' => 2,
              'paged'          => $paged,
              'post_status'    => 'publish',
              'orderby'        => 'desc',
              'orderby'        => 'date',
          );
        ?>

        <?php
          $loop = new WP_Query( $args );

          if( $loop->have_posts() ) :

            while ( $loop->have_posts() ) : 

              $loop->the_post();

              get_template_part('template-parts/section', 'content' );
              
            endwhile;
        ?>

        <div class="text-right news_pagination">
            <?php
                if ($loop->max_num_pages > 1 ) {
                    echo paginate_links( array( // phpcs:ignore
                      'total'              => $loop->max_num_pages,
                      'format'             => '?page=%#%',
                      'current'            => max( 1, get_query_var( 'page' ) ),
                      'before_page_number' => '<span class="screen-reader-text">' . $translated . ' </span>',
                    ) );
                }
                endif; 
            ?>
        </div>

        <?php wp_reset_postdata(); ?>
    </div>

    <div class="col-xs-12 col-lg-4 sidebar-content">
		  <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>