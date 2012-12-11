<?php get_header(); ?>
<article class="omp-page">
    <div class="row">
        <div class="span12">
            <header><h1><?php the_title(); ?></h1></header>
             <?php
            while(have_posts()) {
                the_post();
                the_content();
            }
            ?>
        <!-- /.span12 -->
        </div>
    <!-- /.row -->
    </div>
</article>
<?php get_footer(); ?>
