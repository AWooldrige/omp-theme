<?php
/**
 * Template for an individual recipe page.
 *
 * @package OMP
 * @subpackage Theme
 * @copyright 1997-2012 Alistair Wooldrige
 * @author Alistair Wooldrige <alistair@wooldrige.co.uk>
 */
?>

<!-- Recipe Header - Title and Image
================================================== -->
<div class="row">
    <div class="span12">
        <header class="jumbotron subhead" id="recipe-header-<?php the_ID(); ?>">
            <h1 id="recipe-title"><?php the_title(); ?></h1>
        </header>
    <!-- /span12 -->
    </div>
<!-- /row -->
</div>

<!-- Recipe Content - Method & Sidebar
================================================== -->
<section id="recipe-body-<?php the_ID(); ?>" class="recipe-body">
    <div class="row">
        <div class="span8">

            <!-- Featured Image -->
<?php
    if (has_post_thumbnail( $post->ID )) :

        $featuredImageId = get_post_thumbnail_id($post->ID);
        $featuredImage = OMP_Wordpress_DynamicResize::getResizedImageFromId(
            $featuredImageId,
            620,
            null
        );
        $featuredImage['alt'] = get_post_meta(
            $featuredImageId,
            '_wp_attachment_image_alt',
            true
        );

?>
                <img src="<?php echo $featuredImage['url']; ?>" 
                     alt="<?php echo $featuredImage['alt']; ?>"
                     width="<?php echo $featuredImage['width']; ?>"
                     height ="<?php echo $featuredImage['height']; ?>"/>
<?php
    endif;
?>

            <article id="post-<?php the_ID(); ?>" class="recipe-left">

                <div class="omp-recipe-summary">
                <?php echo $post->post_content_filtered; ?>
                </div>

                <h2>Method</h2>
<?php
    echo ompThemeMethodList($post->recipe_data['Method']);
?>


<?php
    if ($post->recipe_data['Tips'] !== NULL) {
        echo '<h2>Tips</h2>';
        echo ompThemeList($post->recipe_data['Tips']);
    }

    if($post->recipe_data['Meta'] !== NULL) {
        echo '<h2>Information</h2>';
        echo ompThemeMeta($post->recipe_data['Meta']);
    }
?>

            <!-- #post-<?php the_ID(); ?> -->
            </article>
        <!-- /span8 -->
        </div>

        <div class="span4 omp-recipe-sidebar">

<?php
    ksort($post->recipe_data['Ingredients']);
    if (isset($post->recipe_data['Ingredients']['_'])) {
        echo '<h2>Main Ingredients</h2>';
        echo ompThemeIngredientsListDescription($post->recipe_data['Ingredients']['_']);
        unset($post->recipe_data['Ingredients']['_']);
    }
    foreach($post->recipe_data['Ingredients'] as $component => $ingredients) {
        echo '<h2>' . $component . ' Ingredients</h2>';
        echo ompThemeIngredientsListDescription($ingredients);
    }
?>

                <div class="entry-content">
                    <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
            <!-- .entry-content -->
            </div>

        <!-- /span4 /omp-recipe-sidebar -->
        </div>
    <!-- /row -->
    </div>
<!-- /recipe-body-<?php the_ID(); ?> -->
</section>
