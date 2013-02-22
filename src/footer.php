
            </div><!-- .container -->
        </div><!-- #content -->
    </div><!-- #primary -->
    <div class="container">
        <div class="row">
            <div class="span12">
                <footer>
                <p class="pull-right">&copy; <?php echo date('Y'); ?> Alistair Wooldrige</p>
                    <p>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <?php bloginfo( 'name' ); ?>
                        </a> - <?php echo get_bloginfo('description', 'display') ?>
                    </p>
                </footer>
            </div>
        </div>
    </div>

<!-- /.container-fluid -->
</div>

<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/jquery/jquery-1.8.3.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://zor.livefyre.com/wjs/v3.0/javascripts/livefyre.js"></script>
<script type="text/javascript">
(function () {
    var articleId = "<?php the_ID(); ?>";
    fyre.conv.load({}, [{
        el: 'livefyre-comments',
        network: "livefyre.com",
        siteId: "319302",
        articleId: articleId,
        signed: false,
        collectionMeta: {
            articleId: articleId,
            url: fyre.conv.load.makeCollectionUrl(),
        }
    }], function() {});
}());
</script>
</body>
</html>
