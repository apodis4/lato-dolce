<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="<?php bloginfo( 'description' ); ?>">

        <!-- Reset css-->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"> -->
        <!-- Custom style-->
        <!-- <link rel="stylesheet" href="style.css"> -->
        <!-- Google font-->
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700"> -->
    
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

        <div class="container  clearfix">
            <header class="clearfix  header">
                <a href="" class="header__logo"><?php bloginfo( 'name' ); ?></a>
                <a href="#" class="header__icon-bar"><span></span><span></span><span></span></a>

                <?php // Main navigation
                    wp_nav_menu( array( 
                        'theme_location' => 'header', // corrisponde al valore nella funzione register_nav_menus nel file functions.php
                        'depth' => 2, // permette menu a tendina
                        'container' => false,
                        'menu_class' => 'header__menu'
                    ) ); 
                ?>

            </header>

            <h1 class="main-title"><?php bloginfo( 'description' ); ?> </h1>