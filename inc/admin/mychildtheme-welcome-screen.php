<?php

/**
 * Welcome Screen Class
 * Sets up the welcome screen page, hides the menu item
 * and contains the screen content.
 */
class My_Classic_Child_Theme_Welcome_Screen
{

    /**
     * Constructor
     * Sets up the welcome screen
     */
    public function __construct()
    {

        add_action('admin_menu', array($this, 'my_classic_child_theme_welcome_register_menu'));
        add_action('admin_notices', array($this, 'my_classic_child_theme_activation_admin_notice'));
        add_action('admin_enqueue_scripts', array($this, 'my_classic_child_theme_welcome_style'));
        add_action('my_classic_child_theme_welcome', array($this, 'my_classic_child_theme_welcome_page'), 10);



    } // end constructor


    /**
     * Load welcome screen css
     * @return void
     * @since  0.1
     */
    public function my_classic_child_theme_welcome_style()
    {

        wp_enqueue_style('my-classic-child-theme-welcome-screen', get_template_directory_uri() . '/inc/admin/css/welcome.css');
    }

    /**
     * Creates the dashboard page
     * @see  add_theme_page()
     * @since 1.0.0
     */
    public function my_classic_child_theme_welcome_register_menu()
    {
        add_theme_page(
	        __('My Classic Child Theme Welcome Page', 'myclassicchildtheme'),
	        __('My Classic Child Theme ', 'myclassicchildtheme'),
            'read',
            'myclassiccchildtheme-welcome',
            array($this, 'my_classic_child_theme_welcome_screen')
        );
    }

    /**
     * The welcome screen
     * @since 1.0.0
     */
    public function my_classic_child_theme_welcome_screen()
    {
        ?>
        <div class="wrap about-wrap">

            <?php do_action('my_classic_child_theme_welcome'); ?>

        </div>
        <?php
    }


    public function my_classic_child_theme_welcome_page()
    {
        get_template_part('inc/admin/welcome');
    }

    /**
     * Adds an admin notice upon successful activation.
     * @since 0.1
     */
    public function my_classic_child_theme_activation_admin_notice()
    {
        $noticeClass = 'updated notice is-dismissible';
        $Firstmessage = __('Thanks for choosing My Classic Child Theme!', 'myclassicchildtheme');
        $hyperLink = admin_url('themes.php?page=myclassiccchildtheme-welcome');
        $blankAttr = '_blank';
        $buttonClass = 'button';
        $styleAttr = 'text-decoration: none';
        $Secondmessage = __('Get started with My Classic Child Theme!', 'myclassicchildtheme');


        printf('<div class="%1$s"><p>%2$s</p><p><a href="%3$s" target="%4$s" class="%5$s" style="%6$s">%7$s</a></p></div>',
            esc_attr($noticeClass), esc_html($Firstmessage), esc_url($hyperLink),
            esc_attr($blankAttr), esc_attr($buttonClass), esc_attr($styleAttr), esc_html($Secondmessage));

    }


}

$GLOBALS[' My_Classic_Child_Theme_Welcome_Screen'] = new  My_Classic_Child_Theme_Welcome_Screen();
