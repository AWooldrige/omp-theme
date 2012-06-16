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
                        <p><?php the_content(); ?></p>
                        <p><a class="btn"
                              href="<?php the_permalink(); ?>"
                              title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>"
                              rel="bookmark">Get Recipe  &raquo;</a></p>
                    </div>
                    <!--/Recipe highlight-->

