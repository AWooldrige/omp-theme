<?php
/**
 * The default (fallback) template for displaying content.
 *
 * @package OMP
 * @subpackage Theme
 * @copyright 1997-2012 Alistair Wooldrige
 * @author Alistair Wooldrige <alistair@wooldrige.co.uk>
 * @license Apache License, Version 2.0 {@link http://www.apache.org/licenses/LICENSE-2.0}
 */
?>


    <?php if ( is_sticky() ) : ?>


    <div id="post-<?php the_ID(); ?>" class="hero-unit">
        <h1><?php the_title(); ?></h1>
        <p><?php the_content(); ?></p>
        <p><a class="btn btn-primary btn-large" href="View Recipe" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">Get Recipe  &raquo;</a></p>
    </div>

    <div class="row">
    <?php else : ?>

        <div class="span4">
            <h2><?php the_title(); ?></h2>
            <p><?php the_content(); ?></p>
            <p><a class="btn" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">Get Recipe  &raquo;</a></p>
        </div><!--/span-->

    <?php endif; ?>
