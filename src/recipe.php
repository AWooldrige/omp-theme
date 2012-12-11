<article class="omp-recipe">
    <div class="row">
        <div class="span12">
            <header> <h1><?php the_title(); ?></h1> </header>
        <!-- /.span12 -->
        </div>
    <!-- /.row -->
    </div>

    <div class="row">
        <div class="span8">
            <?php
            if (has_post_thumbnail( $post->ID )) {
                echo get_the_post_thumbnail(
                    $post->ID,
                    'omp-recipe-featured-image',
                    array('class' => 'img-polaroid featured-image')
                );
            }
            ?>
            <div class="lead">
                <?php echo $post->post_content_filtered; ?>
            </div>

            <h3>Method</h3>
            <div>
                <?php
                echo ompThemeMethodList(
                    $post->recipe_data['Method']
                );
                ?>
            </div>

            <?php
            if ($post->recipe_data['Tips'] !== NULL) {
                echo '<h3>Tips</h3>';
                echo ompThemeList($post->recipe_data['Tips']);
            }
            ?>

            <?php comments_template( '', true ); ?> 
        <!-- /span8 -->
        </div>

    <div class="span4">
        <?php
        ksort($post->recipe_data['Ingredients']);

        $classForFirst = ' class="no-top-margin"';
        foreach($post->recipe_data['Ingredients'] as $component => $ingredients) {
            if($component == '_') {
                $component = 'Main';
            }

            echo '<h3'.$classForFirst.'>'.$component.' Ingredients</h3>';

            $classForFirst = '';
            echo ompThemeIngredientsListDescription(
                $ingredients
            );
        }
        ?>
        <?php
        if($post->recipe_data['Meta'] !== NULL) {
            echo '<h3>Information</h3>';
            echo ompThemeMeta($post->recipe_data['Meta']);
        }
        ?>

            <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>

        <!-- /span4 -->
        </div>
    <!-- /row -->
    </div>
</article>
