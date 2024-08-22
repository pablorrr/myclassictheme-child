<?php
/**
 * The main template file (home)
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package myclassictheme
 */
get_header();
?><div id="content" class="container">
        <div id="load-posts" class="row mx-auto m-single">
            <section id="primary" class="content-area col-sm-12 col-md-8 col-lg-8">
                <main id="main" class="site-main" role="main">
                    <h2><?php echo esc_html('home child'); ?></h2>
                    <ul class="list-group">
                        <?php myclassictheme_display_standard_post_archive(); ?>
                    </ul>
                    <?php if (have_posts()) :
                        /* Start the Loop */
                        while (have_posts()) : the_post();
                            // if (!has_post_format('image')):
                            get_template_part('template-parts/content', get_post_format());
                            //endif;
                        endwhile;
                    else :
                        get_template_part('template-parts/content', 'none');

                    endif; ?>

                </main><!-- #main -->
            </section><!-- #primary -->
            <?php get_sidebar();
            ?>
        </div><!--.row .mx-auto .m-single -->
    </div><!--#content-->
<?php
get_footer();
