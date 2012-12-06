
    <?php
        /* A sidebar in the footer? Yep. You can can customize
         * your footer with three columns of widgets.
         */
        if ( ! is_404() )
            //get_sidebar( 'footer' );
    ?>

            </div><!-- .container -->
        </div><!-- #content -->
    </div><!-- #primary -->
    <div class="container">
        <div class="row">
            <div class="span12">
                <footer>
                    <p class="pull-right">
                        &copy; 2012 Alistair Wooldrige
                    </p>
                    <p>
                        <a href="<?php echo esc_url(home_url('/')); ?>">OnMyPlate.co.uk</a>
                    </p>
                </footer>
            </div>
        </div>
    </div>

<!-- /.container-fluid -->
</div>

<script src="<?php echo get_template_directory_uri(); ?>/jquery/jquery-1.8.3.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/bootstrap/js/bootstrap.min.js"></script>
<?php wp_footer(); ?>
</body>
</html>
