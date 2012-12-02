<?php
/**
 * The default (fallback) template for displaying content.
 */
?>
<div class="row recipe-peepboxes">
    <ul class="thumbnails">
<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        get_template_part('recipe-peepbox', get_post_format());
?>
<?php endwhile; ?>
<?php else : ?>

        <h1 class="No posts found"></h1>

<?php endif; ?>
    <!-- /thumbnails -->
    </ul>
<!-- /recipe-peepbox -->
</div>
