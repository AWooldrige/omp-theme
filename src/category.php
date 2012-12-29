<?php get_header(); ?>
<div class="row">
    <div class="span12">
        <div class="page-header">
            <h1><?php printf('Category <small>"%s"</small>', single_cat_title('', false)); ?></h1>
        </div>
        <?php
        if ( have_posts() ) {
        ?>
        <ul class="thumbnails">
            <?php
            while ( have_posts() ) {
                the_post();
                get_template_part('recipe-peepbox', get_post_format());
            }
            ?>
        <!-- /.thumbnails -->
        </ul>
        <?php
        }
        else {
            get_template_part('empty-listing');
        }
        ?>
    <!-- /.span12 -->
    </div>
<!-- /.recipe-peepbox -->
</div>

<?php get_footer(); ?>
