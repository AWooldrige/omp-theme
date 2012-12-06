<div class="row">
    <div class="span12">
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
        ?>
        <div class="alert alert-block">
            <h3>No Recipe Found</h3>
            <p>
                No recipe could be found at the URL you provided.
            </p>
            <p>
                <ol>
                    <li>Try searching for the recipe, it may have moved!</li>
                    <li>If you're sure there was a recipe at this URL before and it can no longer be found, please contact me (see the About page)</li>
                </ol>
            </p>
        </div>
        <?php
        }
        ?>
    <!-- /.span12 -->
    </div>
<!-- /.recipe-peepbox -->
</div>
