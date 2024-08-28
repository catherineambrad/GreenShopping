<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package greenshop
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/output.css" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<?php wp_body_open(); ?>
<div id="page" class="site">
    <header id="masthead" class="header ">
        <div class="flex container max-w-1200 mx-auto items-center	justify-between pt-6 pb-4 border-green-200 border-b">
            <?php
            the_custom_logo();
            ?>


            <nav id="site-navigation" class="main-navigation flex justify-center">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id' => 'primary-menu',
                        'menu_class' => 'flex gap-x-12	justify-center',
                        'container' => false,
                        'fallback_cb' => false,
                    )
                );
                ?>
            </nav>
            <div>
                <button>Login</button>
            </div>
        </div>
    </header>
