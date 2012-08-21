<?php
/**
 * Template for a featured recipe (sticky WordPress post). Displayed as a
 * bootstrap hero unit
 *
 * @package OMP
 * @subpackage Theme
 * @copyright 1997-2012 Alistair Wooldrige
 * @author Alistair Wooldrige <alistair@wooldrige.co.uk>
 * @license Apache License, Version 2.0 {@link http://www.apache.org/licenses/LICENSE-2.0}
 */
?>

                    <!-- Featured recipe highlight -->
                    <div id="post-<?php the_ID(); ?>" class="hero-unit">
                        <h1><a class="no-hover"
                               href="<?php the_permalink(); ?>"
                               title="<?php printf('Permalink to %s', the_title_attribute( 'echo=0' ) ); ?>"
                               rel="bookmark"><?php the_title(); ?></a></h1>
                        <p><?php the_content(); ?></p>
                        <p><a class="btn btn-primary btn-large"
                              href="<?php the_permalink(); ?>"
                              title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>"
                              rel="bookmark">Get Recipe  &raquo;</a></p>
                    </div>
                    <!-- /Featured recipe highlight -->

