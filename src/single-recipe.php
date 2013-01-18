<?php get_header(); ?>

<!-- Individual recipe -->
<article class="omp-recipe">
    <div class="row">
        <div class="span12">
            <header><h1><?php the_title(); ?></h1></header>
        <!-- /.span12 -->
        </div>
    <!-- /.row -->
    </div>

    <div class="row">
        <div class="span8">
            <?php
            if (has_post_thumbnail($post->ID)) {
                $image_url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
            ?>
                <a href="<?php echo $image_url; ?>" target="_blank">
                <?php
                echo get_the_post_thumbnail(
                    $post->ID,
                    'omp-recipe-featured-image',
                    array('class' => 'img-polaroid featured-image')
                );
                ?>
                </a>
            <?php
            }
            ?>
            <div class="lead">
                <?php echo $post->post_content_filtered; ?>
            </div>

            <h3 class="no-top-margin">Method</h3>
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

        <h3>Recipe Information</h3>
        <?php
        $post_date = sprintf(
            '<time class="entry-date" datetime="%1$s">%2$s</time>',
            esc_attr(get_the_date('c')),
            esc_html(get_the_date())
        );

        if($post->recipe_data['Meta'] !== NULL) {
            echo ompThemeMeta($post->recipe_data['Meta']);
        }
        ?>
        <small>Recipe published on <?php echo $post_date; ?>.</small>
        <!-- /span4 -->
        </div>
    <!-- /row -->
    </div>

    <div class="row">
        <div class="span12">
            <h3 class="top-line">Comments</h3>
            <?php comments_template('', true); ?>
    <!-- /row -->
    </div>
</article>

<?php get_footer(); ?>
