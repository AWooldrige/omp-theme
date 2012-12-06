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

            <?php
                if (is_single()) {
                    get_template_part(
                        'recipe',
                        get_post_format()
                    );
                }
                else {
                    get_template_part(
                        'content',
                        get_post_format()
                    );
                }
            ?>


<?php //get_sidebar(); ?>
<?php get_footer(); ?>
