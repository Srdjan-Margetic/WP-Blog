<div class="col-xs-12">
    <h2 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <p class="card-text"><small class="text-muted"> <span><i class="fas fa-square"></i></span> <?php the_author(); ?> </small></p>
</div>

<div class="col-xs-12">
    <div class="row content no-gutters mb-4">
        <div class="col-xs-12 col-lg-7 pr-3" >
            <p><?php echo get_the_excerpt(); ?></p>
        </div>
        
        <div class="col-xs-12 col-lg-5 content-img">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="post-img">
                    <?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid' ) ); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<hr>