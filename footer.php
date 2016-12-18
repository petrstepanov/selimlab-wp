<?php
/**
 * The template for displaying the footer
 */
?>

<div class="spacer-4em"></div>
<div class="footer-container font-size-controller">
    <footer class="container">
        <div class="col-xs-12 col-md-8 left-column">
            <img src="<?php bloginfo('template_directory');?>/img/selimlab-logo-grayscale.png" class="hidden-xs hidden-sm logo-grayscale" />
            <nav class="flex space-between">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Welcome</a>
                <a href="<?php echo esc_url( home_url( '/research' ) ); ?>">Research</a>
                <a href="<?php echo esc_url( home_url( '/s-w-doppler-parameters-software' ) ); ?>">Software</a>
                <a href="<?php echo esc_url( home_url( '/facilities' ) ); ?>">Facilities</a>
                <a href="<?php echo esc_url( home_url( '/publications' ) ); ?>">Publications</a>
                <a href="<?php echo esc_url( home_url( '/teaching' ) ); ?>">Teaching</a>
                <a href="<?php echo esc_url( home_url( '/people' ) ); ?>">People</a>
            </nav>
        </div>
        <div class="col-xs-12 col-md-4 right-column">
            <a href="http://www.nsf.gov/" rel="nofollow">
                <svg class="icon"><use xlink:href="<?php bloginfo('template_directory');?>/img/icons.svg#icon-nsf-logo"></use></svg><br />
                <span>National Science<br class="hidden-sm" /> Foundation</span>
            </a>
            <a href="http://www.airforce.com/" rel="nofollow">
                <svg class="icon"><use xlink:href="<?php bloginfo('template_directory');?>/img/icons.svg#icon-airforce-logo"></use></svg><br />
                <span>United States<br class="hidden-sm" /> Air Force</span>
            </a>
        </div>
    </footer>
</div>

<?php $scriptsMinified = false; ?>

<?php if ($scriptsMinified == true){ ?>
    <script src="<?php bloginfo('template_directory');?>/js/selimlab.min.js"></script>
<?php } else { ?>
    <script src="<?php bloginfo('template_directory');?>/bower_components/jquery/dist/jquery.js"></script>
    <script src="<?php bloginfo('template_directory');?>/bower_components/bootstrap/dist/js/bootstrap.js"></script>
    <script src="<?php bloginfo('template_directory');?>/bower_components/salvattore/dist/salvattore.js"></script>
    <script src="<?php bloginfo('template_directory');?>/bower_components/chocolat/dist/js/jquery.chocolat.js"></script>
    <script src="<?php bloginfo('template_directory');?>/js/main.js"></script>
<?php } ?>
<?php
   /* Always have wp_footer() just before the closing </body>
    * tag of your theme, or you will break many plugins, which
    * generally use this hook to reference JavaScript files.
    */
    wp_footer();
?>
</body>
</html>
