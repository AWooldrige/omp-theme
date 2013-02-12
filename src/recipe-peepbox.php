<!-- Recipe peepbox -->
<li class="span4 omp-recipe-peepbox">
    <div class="thumbnail">
        <?php if (has_post_thumbnail( $post->ID )) : ?>
        <a href="<?php the_permalink(); ?>"
           title="<?php printf('Permalink to %s', the_title_attribute( 'echo=0' ) ); ?>"
           rel="bookmark">
        <?php echo get_the_post_thumbnail($post->ID, 'omp-recipe-peepbox'); ?>
        </a>
        <?php endif; ?>
        <h3>
            <a href="<?php the_permalink(); ?>"
               title="<?php printf('Permalink to %s', the_title_attribute( 'echo=0' ) ); ?>"
               rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h3>
        <p><?php the_content(); ?></p>
    </div>
</li>
