<?php get_header(); ?>

<div class="row post-wrapper no-gutters">
    <div class="col-xs-12 ">
        <?php if( have_posts() ) :
            while( have_posts() ) : the_post(); ?>
                <div class="col-xs-12">
                    <h2><?php the_title();?></h2>
                    <p class="card-text"><small class="text-muted"><i class="fas fa-square"></i> <?php the_author(); ?></small></p>
                </div>

                <div class="col-xs-12">
                    <div class="row single-post-content-wrapper">
                        <div class="col-xs-12 " id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="page-news-img pr-3 float-right">
                                <?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid' ) ); ?>
                            </div>
                        <?php endif; ?>
                        <p><?php the_content (); ?></p>
                      </div>
                  </div>
              </div>
              <hr>

            <?php endwhile;
        endif; ?>

        <div class="text-right">
            <?php echo paginate_links(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
