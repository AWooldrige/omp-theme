<?php
/**
 * This is the main template file, it is used to display a page when nothing
 * matches a query. This is one of the two required files for a theme, along
 * with style.css.
 *
 * @package OMP
 * @subpackage Theme
 * @copyright 1997-2012 Alistair Wooldrige
 * @author Alistair Wooldrige <alistair@wooldrige.co.uk>
 * @license Apache License, Version 2.0 {@link http://www.apache.org/licenses/LICENSE-2.0}
 */

get_header(); ?>

    <div id="primary">
        <div id="content" role="main">
            <div class="container">
                <?php if ( have_posts() ) :

                //Counter for non-sticky posts
                $i = 1;
                while ( have_posts() ) : the_post();
                    if ( is_sticky() ) {
                        get_template_part(
                            'front-page-hero-unit',
                            get_post_format()
                        );
                    }
                    else {
                        if($i === 1) :
                        ?>

                <!-- Row of 3 recipe highlights -->
                <div class="row">
                        <?php
                        endif;

                        get_template_part(
                            'front-page-recipe',
                            get_post_format()
                        );

                        if(($i % 3) === 0) :
                        ?>
                </div><!-- /Row of 3 recipe highlights -->

                <!-- Row of 3 recipe highlights -->
                <div class="row">
                        <?php
                        endif;
                        $i++;
                    }

                endwhile; ?>
                </div><!-- /Row of 3 recipe highlights -->

                <?php else : ?>

                <h1 class="No posts found"></h1>

                <?php endif; ?>

            </div><!-- .container -->
        </div><!-- #content -->
    </div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
