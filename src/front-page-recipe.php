<?php
/**
 * Template for a recipe highlight (WordPress more text)
 *
 * @package OMP
 * @subpackage Theme
 * @copyright 1997-2012 Alistair Wooldrige
 * @author Alistair Wooldrige <alistair@wooldrige.co.uk>
 * @license Apache License, Version 2.0 {@link http://www.apache.org/licenses/LICENSE-2.0}
 */
?>

                    <!-- Recipe highlight -->
                    <div class="span4">
                        <h2><a class="no-hover"
                               href="<?php the_permalink(); ?>"
                               title="<?php printf('Permalink to %s', the_title_attribute( 'echo=0' ) ); ?>"
                               rel="bookmark"><?php the_title(); ?></a></h2>

<?php
    if (has_post_thumbnail( $post->ID )) :

        $attachmentId = get_post_thumbnail_id($post->ID);

        $thumb = OMP_Wordpress_DynamicResize::getResizedImageFromId(
            $attachmentId,
            150,
            150
        );
?>

                            <img src="<?php echo $thumb['url']; ?>"
                                 alt="<?php echo $thumb['alt']; ?>" />

<?php
    endif;
?>

                        <p><?php the_content(); ?></p>
                        <p><a class="btn"
                              href="<?php the_permalink(); ?>"
                              title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>"
                              rel="bookmark">Get Recipe  &raquo;</a></p>
                    </div>
                    <!--/Recipe highlight-->

