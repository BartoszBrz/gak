<!DOCTYPE html>
<html lang="pl">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon">
    <link href='<?= get_stylesheet_directory_uri() . '/assets/styles/style.css' ?>' rel='stylesheet' />
    <title>
    <?php
        if ( is_singular('placowki') && is_single( array( 'Gdańskie Lodowisko', 'Gama',
        'Projektornia', 'Scena Muzyczna', 'Teatr GAK', 'Winda', 'Wyspa Skarbów', 'Zespół Pieśni i Tańca Gdańsk',
        'Plama', 'Stacja Orunia', 'Dom Sztuki', 'Mobilny Dom Kultury') )) {
            echo get_the_title() . ' | GAK';
        } elseif ( is_singular('placowki') && is_single()) {
            $parent_title = get_the_title($post->post_parent);
            echo get_the_title() . ' | ' . $parent_title;
        } elseif (is_single()) {
            echo get_the_title() . ' | GAK';
        } elseif (is_front_page()) {
            echo 'Gdański Archipelag Kultury';
        } else {
            echo get_the_title() . ' | GAK ';
        }
    ?>
    </title>
    <?php
    if (is_single()) { ?>
    <meta property="og:url" content="<?php echo get_permalink(); ?>" />
    <meta property="og:title" content="<?php echo get_the_title()?>" />
    <?php if ( has_excerpt() ) {  ?>
    <meta property="og:description" content="<?php the_excerpt(); ?>" />
    <?php } else { ?>
    <meta property="og:description" content="<?php $content = strip_tags(get_the_content()); echo mb_strimwidth($content, 0, 200, '...');?>" />
     <?php } ?>
    <meta property="og:image" content="<?php the_post_thumbnail_url(); ?>" />
    <?php } ?>
    <?php wp_head(); ?>

</head>

<body <?php body_class( '' ); ?>>

<div class="gak-overlay">
    <div class="gak-overlay-animation"></div>
</div>

<?php if( is_front_page() ): ?>
    
    <header>
        
        <div class="uk-container uk-container-expand gak-padding-top gak-mobile-padding cd-auto-hide-header">

            <div class="gak-nav-height" uk-grid>

                <div class="gak-site-logo-container">

                    <a href="<?php echo get_home_url(); ?>" class="gak-site-logo" title="Strona główna GAK">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gak-logo-big.svg" alt="Logo GAK" title="Logo GAK" />
                    </a>

                    <div class="gak-menu-box" uk-toggle="target: #my-id">

                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="17" viewBox="0 0 35 17">
                            <path fill="#fff"
                                d="M.858 10.33V6.89H34.8v3.44zM6.083 3.96V.517h23.5v3.441zM6.083 16.702V13.26h23.5v3.442z" />
                        </svg>
                        <p>MENU</p>
                        
                    </div>
                </div>

                <div class="uk-width-expand gak-nav-main-container">
                    <nav class="gak-main-nav" aria-label="główna">

                        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

                    </nav>

                    <div class="gak-nav-right">

                        <ul class="gak-soc-ul">

                            <?php if( get_field('facebook_link', 'option') ): ?>
                                <li>
                                    <a href="<?php the_field('facebook_link', 'option'); ?>" title="facebook Gdański Archipelag Kultury">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9.851" height="19.7"><path data-name="Path 203" d="M8.053 3.271h1.8V.139A23.229 23.229 0 007.231 0C4.638 0 2.862 1.631 2.862 4.629v2.759H.001v3.5h2.861V19.7H6.37v-8.81h2.741l.436-3.5H6.365V4.976c0-1.012.273-1.7 1.684-1.7z"/></svg>
                                    </a>
                                </li>

                            <?php endif; ?>

                            <?php if( get_field('instagram_link', 'option') ): ?>
                                <li>
                                    <a href="<?php the_field('instagram_link', 'option'); ?>" title="instagram Gdański Archipelag Kultury">
                                    <svg data-name="Group 73" xmlns="http://www.w3.org/2000/svg" width="21.777" height="21.777"><path data-name="Path 200" d="M15.882 0H5.895A5.9 5.9 0 000 5.895v9.988a5.9 5.9 0 005.895 5.895h9.988a5.9 5.9 0 005.895-5.895V5.895A5.9 5.9 0 0015.882 0zm-4.993 16.843a5.955 5.955 0 115.955-5.955 5.961 5.961 0 01-5.955 5.955zm6.1-10.5a1.76 1.76 0 111.76-1.76 1.761 1.761 0 01-1.763 1.755z"/><path data-name="Path 201" d="M10.891 6.211a4.678 4.678 0 104.678 4.678 4.683 4.683 0 00-4.678-4.678z"/><path data-name="Path 202" d="M16.986 4.095a.483.483 0 10.483.483.483.483 0 00-.483-.483z"/></svg>
                                    </a>
                                </li>

                            <?php endif; ?>
                        </ul>

                    </div>
                </div>

            </div>

        </div>
        
    </header>
 
    <div id="my-id" uk-offcanvas="mode: push">
            <div class="uk-offcanvas-bar">

                <button class="uk-offcanvas-close" type="button" uk-close><span class="gak-hide">Zamknij</span></button>

                <a href="<?php echo get_home_url(); ?>" title="Strona główna GAK">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mobile-logo.svg" alt="Logo GAK" title="Logo GAK" />
                </a>

                <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

                <p class="gak-places-mobile">placówki</p>

                <ul class="gak-places-ul">
                    <?php

                        $args = array(
                            'post_type' => 'placowki',
                            'category_name' => 'placowka-kat',
                            'post_status' => 'publish',
                            'posts_per_page' => 14,
                            'orderby' => 'title',
                            'order' => 'ASC',
                        );
                        $loop = new WP_Query( $args );
                        
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <li class="menu-item ">
                                <a href="<?php echo get_permalink(); ?>">
                                <?php $post_object = get_field('uproszczone_logo');
                                        if( $post_object ): ?>
                                    <i class="icon <?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $post_object->ID)));?>" style="background: url(<?php echo get_field('uproszczone_logo', $post_object->ID); ?>)"></i>

                                <?php endif; ?>
                             
                                    <?php str_replace(' ', '', the_title_attribute());?>
                                </a>
                            </li>

                        <?php the_excerpt();  ?>
                        
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        
                    ?>
                </ul>

            </div>
    </div>

<?php elseif ( is_page('o-nas') ): ?>

    <header class="gak-not-main gak-black-header cd-auto-hide-header">

        <div class="uk-container uk-container-expand gak-padding-top gak-mobile-padding">

            <div class="gak-nav-height" uk-grid>

                <div class="gak-site-logo-container">

                    <a href="<?php echo get_home_url(); ?>" class="gak-site-logo" title="Strona główna GAK">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gak-logo-big-white.svg" alt="Logo GAK" title="Logo GAK" />
                    </a>

                    <div class="gak-menu-box" uk-toggle="target: #my-id">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="17" viewBox="0 0 35 17">
                            <path fill="#fff"
                                d="M.858 10.33V6.89H34.8v3.44zM6.083 3.96V.517h23.5v3.441zM6.083 16.702V13.26h23.5v3.442z" />
                        </svg>
                        <p>MENU</p>
                        
                    </div>

                </div>

                <div class="uk-width-expand gak-nav-main-container">
                    <nav class="gak-main-nav" aria-label="główna">
                    <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

                    </nav>


                    <div class="gak-nav-right">

                    <a class="" href="<?php echo get_permalink(268); ?>" title="Strona kalendarz wydarzeń">
                        <div class="gak-index">
                            <div>
                                    <span class="gak-small-calendar-box__link">___cały kalendarz</span>
                            </div>
                        </div>
                        </a>
                        
                        <ul class="gak-soc-ul">

                            <?php if( get_field('facebook_link', 'option') ): ?>
                            <li>
                                <a href="<?php the_field('facebook_link', 'option'); ?>" title="facebook Gdański Archipelag Kultury">
                                <svg xmlns="http://www.w3.org/2000/svg" width="9.851" height="19.7" style="fill: rgb(255, 255, 255);">
                                    <path data-name="Path 203" d="M8.053 3.271h1.8V.139A23.229 23.229 0 007.231 0C4.638 0 2.862 1.631 2.862 4.629v2.759H.001v3.5h2.861V19.7H6.37v-8.81h2.741l.436-3.5H6.365V4.976c0-1.012.273-1.7 1.684-1.7z"/>
                                </svg>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php if( get_field('instagram_link', 'option') ): ?>
                            <li>
                                <a href="<?php the_field('instagram_link', 'option'); ?>" title="instagram Gdański Archipelag Kultury">
                                <svg data-name="Group 73" xmlns="http://www.w3.org/2000/svg" width="21.777" height="21.777" style="fill: rgb(255, 255, 255);">
                                    <path data-name="Path 200" d="M15.882 0H5.895A5.9 5.9 0 000 5.895v9.988a5.9 5.9 0 005.895 5.895h9.988a5.9 5.9 0 005.895-5.895V5.895A5.9 5.9 0 0015.882 0zm-4.993 16.843a5.955 5.955 0 115.955-5.955 5.961 5.961 0 01-5.955 5.955zm6.1-10.5a1.76 1.76 0 111.76-1.76 1.761 1.761 0 01-1.763 1.755z"/>
                                    <path data-name="Path 201" d="M10.891 6.211a4.678 4.678 0 104.678 4.678 4.683 4.683 0 00-4.678-4.678z"/>
                                    <path data-name="Path 202" d="M16.986 4.095a.483.483 0 10.483.483.483.483 0 00-.483-.483z"/>
                                </svg>
                                </a>
                                
                            </li>
                            <?php endif; ?>
                        </ul>
                        
                    </div>
                </div>

            </div>

        </div>

    </header>

    <div id="my-id" uk-offcanvas="mode: push">
            <div class="uk-offcanvas-bar">

                <button class="uk-offcanvas-close" type="button" uk-close><span class="gak-hide">Zamknij</span></button>

                <a href="<?php echo get_home_url(); ?>" title="Strona główna GAK">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mobile-logo.svg" alt="Logo GAK" title="Logo GAK" />
                </a>

                <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

                <p class="gak-places-mobile">placówki</p>

                <ul class="gak-places-ul">
                    <?php

                        $args = array(
                            'post_type' => 'placowki',
                            'category_name' => 'placowka-kat',
                            'post_status' => 'publish',
                            'posts_per_page' => 14,
                            'orderby' => 'title',
                            'order' => 'ASC',
                        );
                        $loop = new WP_Query( $args );
                        
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <li class="menu-item ">
                                <a href="<?php echo get_permalink(); ?>">
                                <?php $post_object = get_field('uproszczone_logo');
                                        if( $post_object ): ?>
                                    <i class="icon <?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $post_object->ID)));?>" style="background: url(<?php echo get_field('uproszczone_logo', $post_object->ID); ?>)"></i>

                                <?php endif; ?>
                             
                                    <?php str_replace(' ', '', the_title_attribute());?>
                                </a>
                            </li>

                        <?php the_excerpt();  ?>
                        
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        
                    ?>
                </ul>

            </div>
    </div>

<?php elseif ( !is_singular('placowki') && is_single() && !in_category( 'Aktualność' )): ?>

    <header class="gak-not-main gak-black-header cd-auto-hide-header">

        <div class="uk-container uk-container-expand gak-padding-top gak-mobile-padding">

            <div class="gak-nav-height" uk-grid>

                <div class="gak-site-logo-container">

                    <a href="<?php echo get_home_url(); ?>" class="gak-site-logo" title="Strona główna GAK">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gak-logo-big-white.svg" alt="Logo GAK" title="Logo GAK" />
                    </a>

                    <div class="gak-menu-box" uk-toggle="target: #my-id">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="17" viewBox="0 0 35 17">
                            <path fill="#fff"
                                d="M.858 10.33V6.89H34.8v3.44zM6.083 3.96V.517h23.5v3.441zM6.083 16.702V13.26h23.5v3.442z" />
                        </svg>
                        <p>MENU</p>
                        
                    </div>

                </div>

                <div class="uk-width-expand gak-nav-main-container">
                    <nav class="gak-main-nav" aria-label="główna">
                        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
                    </nav>

                    <div class="gak-nav-right">

                    <a class="" href="<?php echo get_permalink(268); ?>" title="Strona kalendarz wydarzeń">
                        <div class="gak-index">
                            <div>
                                    <span class="gak-small-calendar-box__link">___cały kalendarz</span>
                            </div>
                        </div>
                        </a>
                        
                        <ul class="gak-soc-ul">
                            <?php if( get_field('facebook_link', 'option') ): ?>

                            <li>
                                <a href="<?php the_field('facebook_link', 'option'); ?>" title="facebook Gdański Archipelag Kultury">
                                <svg xmlns="http://www.w3.org/2000/svg" width="9.851" height="19.7" style="fill: rgb(255, 255, 255);">
                                    <path data-name="Path 203" d="M8.053 3.271h1.8V.139A23.229 23.229 0 007.231 0C4.638 0 2.862 1.631 2.862 4.629v2.759H.001v3.5h2.861V19.7H6.37v-8.81h2.741l.436-3.5H6.365V4.976c0-1.012.273-1.7 1.684-1.7z"/>
                                </svg>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php if( get_field('instagram_link', 'option') ): ?>
                            <li>
                                <a href="<?php the_field('instagram_link', 'option'); ?>" title="instagram Gdański Archipelag Kultury">
                                <svg data-name="Group 73" xmlns="http://www.w3.org/2000/svg" width="21.777" height="21.777" style="fill: rgb(255, 255, 255);">
                                    <path data-name="Path 200" d="M15.882 0H5.895A5.9 5.9 0 000 5.895v9.988a5.9 5.9 0 005.895 5.895h9.988a5.9 5.9 0 005.895-5.895V5.895A5.9 5.9 0 0015.882 0zm-4.993 16.843a5.955 5.955 0 115.955-5.955 5.961 5.961 0 01-5.955 5.955zm6.1-10.5a1.76 1.76 0 111.76-1.76 1.761 1.761 0 01-1.763 1.755z"/>
                                    <path data-name="Path 201" d="M10.891 6.211a4.678 4.678 0 104.678 4.678 4.683 4.683 0 00-4.678-4.678z"/>
                                    <path data-name="Path 202" d="M16.986 4.095a.483.483 0 10.483.483.483.483 0 00-.483-.483z"/>
                                </svg>
                                </a>
                                
                            </li>
                            <?php endif; ?>
                        </ul>
                        
                    </div>
                </div>

            </div>

        </div>

    </header>

    <div id="my-id" uk-offcanvas="mode: push">
            <div class="uk-offcanvas-bar">

                <button class="uk-offcanvas-close" type="button" uk-close><span class="gak-hide">Zamknij</span></button>

                <a href="<?php echo get_home_url(); ?>" title="Strona główna GAK">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mobile-logo.svg" alt="Logo GAK" title="Logo GAK" />
                </a>

                <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

                <p class="gak-places-mobile">placówki</p>

                <ul class="gak-places-ul">
                    <?php

                        $args = array(
                            'post_type' => 'placowki',
                            'category_name' => 'placowka-kat',
                            'post_status' => 'publish',
                            'posts_per_page' => 14,
                            'orderby' => 'title',
                            'order' => 'ASC',
                        );
                        $loop = new WP_Query( $args );
                        
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <li class="menu-item ">
                                <a href="<?php echo get_permalink(); ?>">
                                <?php $post_object = get_field('uproszczone_logo');
                                        if( $post_object ): ?>
                                    <i class="icon <?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $post_object->ID)));?>" style="background: url(<?php echo get_field('uproszczone_logo', $post_object->ID); ?>)"></i>

                                <?php endif; ?>
                             
                                    <?php str_replace(' ', '', the_title_attribute());?>
                                </a>
                            </li>

                        <?php the_excerpt();  ?>
                        
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        
                    ?>
                </ul>

                <?php if( get_field('link_do_kup_teraz', $parentPageId) ): ?>
                    <a title="Kup bilet <?php echo get_field('nazwa_stacji', $post_object->ID) ?>" class="gak-buy-tickets" href="<?php the_field('link_do_kup_teraz', $parentPageId); ?>">KUP BILET</a>
                <?php endif; ?>


            </div>
    </div>
  
<?php elseif ( is_singular('placowki') && is_single( array( 'Gdańskie Lodowisko', 'Gama',
'Projektornia', 'Scena Muzyczna', 'Teatr GAK', 'Winda', 'Wyspa Skarbów', 'Zespół Pieśni i Tańca Gdańsk',
'Plama', 'Stacja Orunia', 'Dom Sztuki', 'Mobilny Dom Kultury') )): ?>

    <header class="gak-not-main gak-facility-header cd-auto-hide-header">

        <div class="uk-container uk-container-expand gak-padding-top gak-mobile-padding gak-border-bottom gak-first-facility-menu">

            <div class="gak-nav-height" uk-grid>

                <div class="gak-site-logo-container">

                    <a href="<?php echo get_home_url(); ?>" class="gak-site-logo" title="Strona główna GAK">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gak-logo-big.svg" alt="Logo GAK" title="Logo GAK" />
                    </a>

                    <div class="gak-menu-box" uk-toggle="target: #my-id2">

                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="17" viewBox="0 0 35 17">
                            <path fill="#fff"
                                d="M.858 10.33V6.89H34.8v3.44zM6.083 3.96V.517h23.5v3.441zM6.083 16.702V13.26h23.5v3.442z" />
                        </svg>
                        <p>MENU</p>
                        
                    </div>

                </div>

                <div class="uk-width-expand gak-nav-main-container gak-main-menu-facility">
                    <nav class="gak-main-nav" aria-label="główna">

                        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

                    </nav>

                    <div class="gak-nav-right">

                        <ul class="gak-soc-ul">

                            <?php if( get_field('facebook_link', 'option') ): ?>
                                <li>
                                    <a href="<?php the_field('facebook_link', 'option'); ?>" title="facebook Gdański Archipelag Kultury">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9.851" height="19.7"><path data-name="Path 203" d="M8.053 3.271h1.8V.139A23.229 23.229 0 007.231 0C4.638 0 2.862 1.631 2.862 4.629v2.759H.001v3.5h2.861V19.7H6.37v-8.81h2.741l.436-3.5H6.365V4.976c0-1.012.273-1.7 1.684-1.7z"/></svg>
                                    </a>
                                </li>

                            <?php endif; ?>

                            <?php if( get_field('instagram_link', 'option') ): ?>
                                <li>
                                    <a href="<?php the_field('instagram_link', 'option'); ?>" title="instagram Gdański Archipelag Kultury">
                                    <svg data-name="Group 73" xmlns="http://www.w3.org/2000/svg" width="21.777" height="21.777"><path data-name="Path 200" d="M15.882 0H5.895A5.9 5.9 0 000 5.895v9.988a5.9 5.9 0 005.895 5.895h9.988a5.9 5.9 0 005.895-5.895V5.895A5.9 5.9 0 0015.882 0zm-4.993 16.843a5.955 5.955 0 115.955-5.955 5.961 5.961 0 01-5.955 5.955zm6.1-10.5a1.76 1.76 0 111.76-1.76 1.761 1.761 0 01-1.763 1.755z"/><path data-name="Path 201" d="M10.891 6.211a4.678 4.678 0 104.678 4.678 4.683 4.683 0 00-4.678-4.678z"/><path data-name="Path 202" d="M16.986 4.095a.483.483 0 10.483.483.483.483 0 00-.483-.483z"/></svg>
                                    </a>
                                </li>

                            <?php endif; ?>
                        </ul>

                    </div>
                </div>

            </div>

        </div>

        <div class="uk-container uk-container-expand gak-padding-top gak-mobile-padding gak-second-facility-menu">

            <div class="gak-nav-height" uk-grid>

                <div class="gak-site-logo-container">

                <?php $post_object = get_field('nazwa_stacji'); ?>

                <a href="<?php wps_parent_post(); ?>" class="gak-site-logo gak-site-logo-special" title="Strona główna <?php echo get_field('nazwa_stacji', $post_object->ID) ?>">

                <?php
                        if( $post_object ): ?>

                    <img class="gak-img-<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $post_object->ID)));?>" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/full_logo/<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $post_object->ID)));?>-full-logo-black.svg" alt="Logo <?php echo get_field('nazwa_stacji', $post_object->ID) ?>" title="Logo <?php echo get_field('nazwa_stacji', $post_object->ID) ?>" />

                <?php endif; ?>

                </a>

                <div class="gak-menu-box" uk-toggle="target: #my-id">

                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="17" viewBox="0 0 35 17">
                        <path fill="#fff"
                            d="M.858 10.33V6.89H34.8v3.44zM6.083 3.96V.517h23.5v3.441zM6.083 16.702V13.26h23.5v3.442z" />
                    </svg>
                    <p>MENU</p>

                    </div>

                </div>

                <div class="uk-width-expand gak-nav-main-container gak-main-menu-facility">

                    <nav class="gak-facility-menu" aria-label="główna wplacówki">

                        <!-- <h1>
                        <?php echo $facilityName ?>
                        </h1> -->

                        <?php $parentPageId = wp_get_post_parent_id( $post_ID ); ?>
                        <?php $facilityName = get_field('nazwa_stacji', $parentPageId); ?>

                        <?php if($facilityName == 'Stacja Orunia') {
                            wp_nav_menu( array( 'theme_location' => 'facility-orunia' ) );
                        } else if ($facilityName == 'Plama') {
                            wp_nav_menu( array( 'theme_location' => 'facility-plama' ) );
                        } else if ($facilityName == 'Dom Sztuki') {
                            wp_nav_menu( array( 'theme_location' => 'facility-dom-sztuki' ) );
                        } else if ($facilityName == 'Projektornia') {
                            wp_nav_menu( array( 'theme_location' => 'facility-projektornia' ) );
                        } else if ($facilityName == 'Scena Muzyczna') {
                            wp_nav_menu( array( 'theme_location' => 'facility-scena-muzyczna' ) );
                        } else if ($facilityName == 'Teatr GAK') {
                            wp_nav_menu( array( 'theme_location' => 'facility-teatr-gak' ) );
                        } else if ($facilityName == 'Gama') {
                            wp_nav_menu( array( 'theme_location' => 'facility-gama' ) );
                        } else if ($facilityName == 'Winda') {
                            wp_nav_menu( array( 'theme_location' => 'facility-winda' ) );
                        } else if ($facilityName == 'Zespół Pieśni i Tańca Gdańsk') {
                            wp_nav_menu( array( 'theme_location' => 'facility-zespol-piesni-i-tanca-gdansk' ) );
                        } else if ($facilityName == 'Gdańskie Lodowisko') {
                            wp_nav_menu( array( 'theme_location' => 'facility-gdanskie-lodowisko' ) );
                        } else if ($facilityName == 'Wyspa Skarbów') {
                            wp_nav_menu( array( 'theme_location' => 'facility-wyspa-skarbow' ) );
                        } else if ($facilityName == 'Mobilny Dom Kultury') {
                            wp_nav_menu( array( 'theme_location' => 'facility-mobilny-dom-kultury' ) );
                        }

                        ?>


                    </nav>

                    <div class="gak-nav-right">
                    <?php if( get_field('link_do_kup_teraz', $parentPageId) ): ?>
                    <a title="Kup bilet <?php echo get_field('nazwa_stacji', $post_object->ID) ?>" class="gak-buy-tickets" href="<?php the_field('link_do_kup_teraz', $parentPageId); ?>">KUP BILET</a>
                    <?php endif; ?>

                    <ul class="gak-soc-ul">

                        <?php if( get_field('facebook_link_stacja', $parentPageId) ): ?>
                        <li>
                            <a href="<?php the_field('facebook_link_stacja', $parentPageId); ?>" title="facebook <?php echo get_field('nazwa_stacji', $post_object->ID) ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="9.851" height="19.7" >
                                <path data-name="Path 203" d="M8.053 3.271h1.8V.139A23.229 23.229 0 007.231 0C4.638 0 2.862 1.631 2.862 4.629v2.759H.001v3.5h2.861V19.7H6.37v-8.81h2.741l.436-3.5H6.365V4.976c0-1.012.273-1.7 1.684-1.7z"/>
                            </svg>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if( get_field('instagram_link_stacja', $parentPageId) ): ?>

                        <li>
                            <a href="<?php the_field('instagram_link_stacja', $parentPageId); ?>" title="instagram <?php echo get_field('nazwa_stacji', $post_object->ID) ?>">
                            <svg data-name="Group 73" xmlns="http://www.w3.org/2000/svg" width="21.777" height="21.777">
                                <path data-name="Path 200" d="M15.882 0H5.895A5.9 5.9 0 000 5.895v9.988a5.9 5.9 0 005.895 5.895h9.988a5.9 5.9 0 005.895-5.895V5.895A5.9 5.9 0 0015.882 0zm-4.993 16.843a5.955 5.955 0 115.955-5.955 5.961 5.961 0 01-5.955 5.955zm6.1-10.5a1.76 1.76 0 111.76-1.76 1.761 1.761 0 01-1.763 1.755z"/>
                                <path data-name="Path 201" d="M10.891 6.211a4.678 4.678 0 104.678 4.678 4.683 4.683 0 00-4.678-4.678z"/>
                                <path data-name="Path 202" d="M16.986 4.095a.483.483 0 10.483.483.483.483 0 00-.483-.483z"/>
                            </svg>
                            </a>
                            
                        </li>
                        <?php endif; ?>
                    </ul>

                    </div>

                </div>

            </div>

        </div>

    </header>

    <div id="my-id" uk-offcanvas="mode: push">
            <div class="uk-offcanvas-bar">

                <button class="uk-offcanvas-close" type="button" uk-close><span class="gak-hide">Zamknij</span></button>
              

                <?php $post_object = get_field('nazwa_stacji');

                    if( $post_object ): ?>
                    <a href="<?php wps_parent_post(); ?>" title="Strona główna <?php echo get_field('nazwa_stacji', $post_object->ID) ?>">
                    <img class="gak-img-<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $post_object->ID)));?> gak-mobile-menu-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/full_logo/<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $post_object->ID)));?>-full-logo.svg" alt="Logo <?php echo get_field('nazwa_stacji', $post_object->ID) ?>" title="Logo <?php echo get_field('nazwa_stacji', $post_object->ID) ?>" />
                </a>
                <?php endif; ?>

                <?php if($facilityName == 'Stacja Orunia') {
                       wp_nav_menu( array( 'theme_location' => 'facility-orunia' ) );
                } else if ($facilityName == 'Plama') {
                    wp_nav_menu( array( 'theme_location' => 'facility-plama' ) );
                } else if ($facilityName == 'Dom Sztuki') {
                    wp_nav_menu( array( 'theme_location' => 'facility-dom-sztuki' ) );
                } else if ($facilityName == 'Projektornia') {
                    wp_nav_menu( array( 'theme_location' => 'facility-projektornia' ) );
                } else if ($facilityName == 'Scena Muzyczna') {
                    wp_nav_menu( array( 'theme_location' => 'facility-scena-muzyczna' ) );
                } else if ($facilityName == 'Teatr GAK') {
                    wp_nav_menu( array( 'theme_location' => 'facility-teatr-gak' ) );
                } else if ($facilityName == 'Gama') {
                    wp_nav_menu( array( 'theme_location' => 'facility-gama' ) );
                } else if ($facilityName == 'Winda') {
                    wp_nav_menu( array( 'theme_location' => 'facility-winda' ) );
                } else if ($facilityName == 'Zespół Pieśni i Tańca Gdańsk') {
                    wp_nav_menu( array( 'theme_location' => 'facility-zespol-piesni-i-tanca-gdansk' ) );
                } else if ($facilityName == 'Gdańskie Lodowisko') {
                    wp_nav_menu( array( 'theme_location' => 'facility-gdanskie-lodowisko' ) );
                } else if ($facilityName == 'Wyspa Skarbów') {
                    wp_nav_menu( array( 'theme_location' => 'facility-wyspa-skarbow' ) );
                } else if ($facilityName == 'Mobilny Dom Kultury') {
                    wp_nav_menu( array( 'theme_location' => 'facility-mobilny-dom-kultury' ) );
                }
     
                ?>

                <div class="gak-white-separator"></div>

                <a class="gak-return" href="<?php echo get_home_url(); ?>" title="Strona główna GAK">Powrót do GAKu
            
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mobile-logo.svg" alt="Logo GAK" title="Logo GAK" />

                </a>

                <div class="gak-white-separator"></div>

                <ul uk-accordion>
                    <li>
                    <a class="uk-accordion-title gak-places-mobile" href="#">pozostałe placówki</a>
                        <div class="uk-accordion-content">
                <ul class="gak-places-ul">
                    <?php

                        $args = array(
                            'post_type' => 'placowki',
                            'category_name' => 'placowka-kat',
                            'post_status' => 'publish',
                            'posts_per_page' => 14,
                            'orderby' => 'title',
                            'order' => 'ASC',
                        );
                        $loop = new WP_Query( $args );
                        
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <li class="menu-item ">
                                <a href="<?php echo get_permalink(); ?>">
                                <?php $post_object = get_field('uproszczone_logo');
                                        if( $post_object ): ?>
                                                <i class="icon <?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $post_object->ID)));?>" style="background: url(<?php echo get_field('uproszczone_logo', $post_object->ID); ?>)"></i>

                                <?php endif; ?>
                             
                                    <?php str_replace(' ', '', the_title_attribute());?>
                                </a>
                            </li>

                        <?php the_excerpt();  ?>
                        
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        
                    ?>
                </ul>
                        </div>
                    </li>
                </ul>

                <?php if( get_field('link_do_kup_teraz', $parentPageId) ): ?>
                    <a title="Kup bilet <?php echo get_field('nazwa_stacji', $post_object->ID) ?>" class="gak-buy-tickets" href="<?php the_field('link_do_kup_teraz', $parentPageId); ?>">KUP BILET</a>
                <?php endif; ?>

            </div>
    </div>

    <div id="my-id2" uk-offcanvas="mode: push">
            <div class="uk-offcanvas-bar">

                <button class="uk-offcanvas-close" type="button" uk-close><span class="gak-hide">Zamknij</span></button>

                <a href="<?php echo get_home_url(); ?>" title="Strona główna GAK">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mobile-logo.svg" alt="Logo GAK" title="Logo GAK" />
                </a>

                <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

                <p class="gak-places-mobile">placówki</p>

                <ul class="gak-places-ul">
                    <?php

                        $args = array(
                            'post_type' => 'placowki',
                            'category_name' => 'placowka-kat',
                            'post_status' => 'publish',
                            'posts_per_page' => 14,
                            'orderby' => 'title',
                            'order' => 'ASC',
                        );
                        $loop = new WP_Query( $args );
                        
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <li class="menu-item ">
                                <a href="<?php echo get_permalink(); ?>">
                                <?php $post_object = get_field('uproszczone_logo');
                                        if( $post_object ): ?>
                                    <i class="icon <?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $post_object->ID)));?>" style="background: url(<?php echo get_field('uproszczone_logo', $post_object->ID); ?>)"></i>

                                <?php endif; ?>
                             
                                    <?php str_replace(' ', '', the_title_attribute());?>
                                </a>
                            </li>

                        <?php the_excerpt();  ?>
                        
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        
                    ?>
                </ul>

            </div>
    </div>

<?php elseif (is_single( array( 'Kadra' ))): ?>

    <header class="gak-not-main gak-facility-header cd-auto-hide-header">

        <div class="uk-container uk-container-expand gak-padding-top gak-mobile-padding gak-border-bottom gak-first-facility-menu">

            <div class="gak-nav-height" uk-grid>

                <div class="gak-site-logo-container">

                    <a href="<?php echo get_home_url(); ?>" class="gak-site-logo" title="Strona główna GAK">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gak-logo-big.svg" alt="Logo GAK" title="Logo GAK" />
                    </a>

                    <div class="gak-menu-box" uk-toggle="target: #my-id2">

                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="17" viewBox="0 0 35 17">
                            <path fill="#fff"
                                d="M.858 10.33V6.89H34.8v3.44zM6.083 3.96V.517h23.5v3.441zM6.083 16.702V13.26h23.5v3.442z" />
                        </svg>
                        <p>MENU</p>
                        
                    </div>
                </div>

                <div class="uk-width-expand gak-nav-main-container gak-main-menu-facility">
                    <nav class="gak-main-nav" aria-label="główna">

                        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

                    </nav>

                    <div class="gak-nav-right">

                        <ul class="gak-soc-ul">

                            <?php if( get_field('facebook_link', 'option') ): ?>
                                <li>
                                    <a href="<?php the_field('facebook_link', 'option'); ?>" title="facebook Gdański Archipelag Kultury">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9.851" height="19.7"><path data-name="Path 203" d="M8.053 3.271h1.8V.139A23.229 23.229 0 007.231 0C4.638 0 2.862 1.631 2.862 4.629v2.759H.001v3.5h2.861V19.7H6.37v-8.81h2.741l.436-3.5H6.365V4.976c0-1.012.273-1.7 1.684-1.7z"/></svg>
                                    </a>
                                </li>

                            <?php endif; ?>

                            <?php if( get_field('instagram_link', 'option') ): ?>
                                <li>
                                    <a href="<?php the_field('instagram_link', 'option'); ?>" title="instagram Gdański Archipelag Kultury">
                                    <svg data-name="Group 73" xmlns="http://www.w3.org/2000/svg" width="21.777" height="21.777"><path data-name="Path 200" d="M15.882 0H5.895A5.9 5.9 0 000 5.895v9.988a5.9 5.9 0 005.895 5.895h9.988a5.9 5.9 0 005.895-5.895V5.895A5.9 5.9 0 0015.882 0zm-4.993 16.843a5.955 5.955 0 115.955-5.955 5.961 5.961 0 01-5.955 5.955zm6.1-10.5a1.76 1.76 0 111.76-1.76 1.761 1.761 0 01-1.763 1.755z"/><path data-name="Path 201" d="M10.891 6.211a4.678 4.678 0 104.678 4.678 4.683 4.683 0 00-4.678-4.678z"/><path data-name="Path 202" d="M16.986 4.095a.483.483 0 10.483.483.483.483 0 00-.483-.483z"/></svg>
                                    </a>
                                </li>

                            <?php endif; ?>
                        </ul>

                    </div>
                </div>

            </div>

        </div>

        <div class="uk-container uk-container-expand gak-padding-top gak-mobile-padding gak-second-facility-menu">

            <div class="gak-nav-height" uk-grid>

                <div class="gak-site-logo-container">

                <?php $parentPageId = wp_get_post_parent_id( $post_ID ); ?>

                <a href="<?php wps_parent_post(); ?>" class="gak-site-logo gak-site-logo-special" title="Strona główna <?php echo get_field('nazwa_stacji', $parentPageId) ?>">


                <?php $post_object = get_field('nazwa_stacji', $parentPageId);
                        if( $parentPageId ): ?>

                    <img class="gak-img-<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $parentPageId)));?>" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/full_logo/<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $parentPageId)));?>-full-logo-black.svg" alt="Logo <?php echo get_field('nazwa_stacji', $parentPageId) ?>" title="Logo <?php echo get_field('nazwa_stacji', $parentPageId) ?>" />

                <?php endif; ?>

                </a>

                <div class="gak-menu-box" uk-toggle="target: #my-id">

                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="17" viewBox="0 0 35 17">
                    <path fill="#fff"
                        d="M.858 10.33V6.89H34.8v3.44zM6.083 3.96V.517h23.5v3.441zM6.083 16.702V13.26h23.5v3.442z" />
                </svg>
                <p>MENU</p>

                </div>

                </div>

                <div class="uk-width-expand gak-nav-main-container gak-main-menu-facility">

                    <nav class="gak-facility-menu" aria-label="główna wplacówki">

                        <!-- <h1>
                        <?php echo $facilityName ?>
                        </h1> -->

                        <?php $parentPageId = wp_get_post_parent_id( $post_ID ); ?>
                        <?php $facilityName = get_field('nazwa_stacji', $parentPageId); ?>

                        <?php if($facilityName == 'Stacja Orunia') {
                            wp_nav_menu( array( 'theme_location' => 'facility-orunia' ) );
                        } else if ($facilityName == 'Plama') {
                            wp_nav_menu( array( 'theme_location' => 'facility-plama' ) );
                        } else if ($facilityName == 'Dom Sztuki') {
                            wp_nav_menu( array( 'theme_location' => 'facility-dom-sztuki' ) );
                        } else if ($facilityName == 'Projektornia') {
                            wp_nav_menu( array( 'theme_location' => 'facility-projektornia' ) );
                        } else if ($facilityName == 'Scena Muzyczna') {
                            wp_nav_menu( array( 'theme_location' => 'facility-scena-muzyczna' ) );
                        } else if ($facilityName == 'Teatr GAK') {
                            wp_nav_menu( array( 'theme_location' => 'facility-teatr-gak' ) );
                        } else if ($facilityName == 'Gama') {
                            wp_nav_menu( array( 'theme_location' => 'facility-gama' ) );
                        } else if ($facilityName == 'Winda') {
                            wp_nav_menu( array( 'theme_location' => 'facility-winda' ) );
                        } else if ($facilityName == 'Zespół Pieśni i Tańca Gdańsk') {
                            wp_nav_menu( array( 'theme_location' => 'facility-zespol-piesni-i-tanca-gdansk' ) );
                        } else if ($facilityName == 'Gdańskie Lodowisko') {
                            wp_nav_menu( array( 'theme_location' => 'facility-gdanskie-lodowisko' ) );
                        } else if ($facilityName == 'Wyspa Skarbów') {
                            wp_nav_menu( array( 'theme_location' => 'facility-wyspa-skarbow' ) );
                        } else if ($facilityName == 'Mobilny Dom Kultury') {
                            wp_nav_menu( array( 'theme_location' => 'facility-mobilny-dom-kultury' ) );
                        }

                        ?>


                    </nav>

                    <div class="gak-nav-right">

                    <?php if( get_field('link_do_kup_teraz', $parentPageId) ): ?>
                    <a title="Kup bilet <?php echo get_field('nazwa_stacji', $post_object->ID) ?>" class="gak-buy-tickets" href="<?php the_field('link_do_kup_teraz', $parentPageId); ?>">KUP BILET</a>
                    <?php endif; ?>

                        <ul class="gak-soc-ul">

                            <?php if( get_field('facebook_link_stacja', $parentPageId) ): ?>
                            <li>
                                <a href="<?php the_field('facebook_link_stacja', $parentPageId); ?>" title="facebook <?php echo get_field('nazwa_stacji', $parentPageId) ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="9.851" height="19.7" >
                                    <path data-name="Path 203" d="M8.053 3.271h1.8V.139A23.229 23.229 0 007.231 0C4.638 0 2.862 1.631 2.862 4.629v2.759H.001v3.5h2.861V19.7H6.37v-8.81h2.741l.436-3.5H6.365V4.976c0-1.012.273-1.7 1.684-1.7z"/>
                                </svg>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php if( get_field('instagram_link_stacja', $parentPageId) ): ?>
                            <li>
                                <a href="<?php the_field('instagram_link_stacja', $parentPageId); ?>" title="instagram <?php echo get_field('nazwa_stacji', $parentPageId) ?>">
                                <svg data-name="Group 73" xmlns="http://www.w3.org/2000/svg" width="21.777" height="21.777">
                                    <path data-name="Path 200" d="M15.882 0H5.895A5.9 5.9 0 000 5.895v9.988a5.9 5.9 0 005.895 5.895h9.988a5.9 5.9 0 005.895-5.895V5.895A5.9 5.9 0 0015.882 0zm-4.993 16.843a5.955 5.955 0 115.955-5.955 5.961 5.961 0 01-5.955 5.955zm6.1-10.5a1.76 1.76 0 111.76-1.76 1.761 1.761 0 01-1.763 1.755z"/>
                                    <path data-name="Path 201" d="M10.891 6.211a4.678 4.678 0 104.678 4.678 4.683 4.683 0 00-4.678-4.678z"/>
                                    <path data-name="Path 202" d="M16.986 4.095a.483.483 0 10.483.483.483.483 0 00-.483-.483z"/>
                                </svg>
                                </a>
                            </li>

                            <?php endif; ?>
                        </ul>

                    </div>

                </div>

            </div>

        </div>
        
    </header>

    <div id="my-id" uk-offcanvas="mode: push">
            <div class="uk-offcanvas-bar">

                <button class="uk-offcanvas-close" type="button" uk-close><span class="gak-hide">Zamknij</span></button>

                <?php $parentPageId = wp_get_post_parent_id( $post_ID ); ?>

                <?php $post_object = get_field('nazwa_stacji', $parentPageId);
                        if( $parentPageId ): ?>
                    <a href="<?php wps_parent_post(); ?>" title="Strona główna GAK">
                        <img class="gak-img-<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $parentPageId)));?> gak-mobile-menu-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/full_logo/<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $parentPageId)));?>-full-logo.svg" alt="Logo GAK" title="Logo GAK" />
                </a>
                <?php endif; ?>

                <?php if($facilityName == 'Stacja Orunia') {
                       wp_nav_menu( array( 'theme_location' => 'facility-orunia' ) );
                } else if ($facilityName == 'Plama') {
                    wp_nav_menu( array( 'theme_location' => 'facility-plama' ) );
                } else if ($facilityName == 'Dom Sztuki') {
                    wp_nav_menu( array( 'theme_location' => 'facility-dom-sztuki' ) );
                } else if ($facilityName == 'Projektornia') {
                    wp_nav_menu( array( 'theme_location' => 'facility-projektornia' ) );
                } else if ($facilityName == 'Scena Muzyczna') {
                    wp_nav_menu( array( 'theme_location' => 'facility-scena-muzyczna' ) );
                } else if ($facilityName == 'Teatr GAK') {
                    wp_nav_menu( array( 'theme_location' => 'facility-teatr-gak' ) );
                } else if ($facilityName == 'Gama') {
                    wp_nav_menu( array( 'theme_location' => 'facility-gama' ) );
                } else if ($facilityName == 'Winda') {
                    wp_nav_menu( array( 'theme_location' => 'facility-winda' ) );
                } else if ($facilityName == 'Zespół Pieśni i Tańca Gdańsk') {
                    wp_nav_menu( array( 'theme_location' => 'facility-zespol-piesni-i-tanca-gdansk' ) );
                } else if ($facilityName == 'Gdańskie Lodowisko') {
                    wp_nav_menu( array( 'theme_location' => 'facility-gdanskie-lodowisko' ) );
                } else if ($facilityName == 'Wyspa Skarbów') {
                    wp_nav_menu( array( 'theme_location' => 'facility-wyspa-skarbow' ) );
                } else if ($facilityName == 'Mobilny Dom Kultury') {
                    wp_nav_menu( array( 'theme_location' => 'facility-mobilny-dom-kultury' ) );
                }
     
                ?>

                <div class="gak-white-separator"></div>

                <a class="gak-return" href="<?php echo get_home_url(); ?>" title="Strona główna GAK">Powrót do GAKu

                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mobile-logo.svg" alt="Logo GAK" title="Logo GAK" />

                </a>

                <div class="gak-white-separator"></div>

                <ul uk-accordion>
                    <li>
                    <a class="uk-accordion-title gak-places-mobile" href="#">pozostałe placówki</a>
                        <div class="uk-accordion-content">
                <ul class="gak-places-ul">
                    <?php

                        $args = array(
                            'post_type' => 'placowki',
                            'category_name' => 'placowka-kat',
                            'post_status' => 'publish',
                            'posts_per_page' => 14,
                            'orderby' => 'title',
                            'order' => 'ASC',
                        );
                        $loop = new WP_Query( $args );
                        
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <li class="menu-item ">
                                <a href="<?php echo get_permalink(); ?>">
                                <?php $post_object = get_field('uproszczone_logo');
                                        if( $post_object ): ?>
                                                <i class="icon <?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $post_object->ID)));?>" style="background: url(<?php echo get_field('uproszczone_logo', $post_object->ID); ?>)"></i>

                                <?php endif; ?>
                             
                                    <?php str_replace(' ', '', the_title_attribute());?>
                                </a>
                            </li>

                        <?php the_excerpt();  ?>
                        
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        
                    ?>
                </ul>
                        </div>
                    </li>
                </ul>

                <?php if( get_field('link_do_kup_teraz', $parentPageId) ): ?>
                    <a title="Kup bilet <?php echo get_field('nazwa_stacji', $post_object->ID) ?>" class="gak-buy-tickets" href="<?php the_field('link_do_kup_teraz', $parentPageId); ?>">KUP BILET</a>
                <?php endif; ?>


            </div>
    </div>

    <div id="my-id2" uk-offcanvas="mode: push">
            <div class="uk-offcanvas-bar">

                <button class="uk-offcanvas-close" type="button" uk-close><span class="gak-hide">Zamknij</span></button>

                <a href="<?php echo get_home_url(); ?>" title="Strona główna GAK">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mobile-logo.svg" alt="Logo GAK" title="Logo GAK" />
                </a>

                <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

                <p class="gak-places-mobile">placówki</p>

                <ul class="gak-places-ul">
                    <?php

                        $args = array(
                            'post_type' => 'placowki',
                            'category_name' => 'placowka-kat',
                            'post_status' => 'publish',
                            'posts_per_page' => 14,
                            'orderby' => 'title',
                            'order' => 'ASC',
                        );
                        $loop = new WP_Query( $args );
                        
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <li class="menu-item ">
                                <a href="<?php echo get_permalink(); ?>">
                                <?php $post_object = get_field('uproszczone_logo');
                                        if( $post_object ): ?>
                                    <i class="icon <?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $post_object->ID)));?>" style="background: url(<?php echo get_field('uproszczone_logo', $post_object->ID); ?>)"></i>

                                <?php endif; ?>
                             
                                    <?php str_replace(' ', '', the_title_attribute());?>
                                </a>
                            </li>

                        <?php the_excerpt();  ?>
                        
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        
                    ?>
                </ul>

            </div>
    </div>

<?php elseif (is_single( array( 'Zajęcia' ))): ?>

    <header class="gak-not-main gak-facility-header cd-auto-hide-header">

        <div class="uk-container uk-container-expand gak-padding-top gak-mobile-padding gak-border-bottom gak-first-facility-menu">

            <div class="gak-nav-height" uk-grid>

                <div class="gak-site-logo-container">

                    <a href="<?php echo get_home_url(); ?>" class="gak-site-logo" title="Strona główna GAK">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gak-logo-big.svg" alt="Logo GAK" title="Logo GAK" />
                    </a>

                    <div class="gak-menu-box" uk-toggle="target: #my-id2">

                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="17" viewBox="0 0 35 17">
                            <path fill="#fff"
                                d="M.858 10.33V6.89H34.8v3.44zM6.083 3.96V.517h23.5v3.441zM6.083 16.702V13.26h23.5v3.442z" />
                        </svg>
                        <p>MENU</p>
                        
                    </div>

                </div>

                <div class="uk-width-expand gak-nav-main-container gak-main-menu-facility">
                    <nav class="gak-main-nav" aria-label="główna">

                        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

                    </nav>

                    <div class="gak-nav-right">

                        <ul class="gak-soc-ul">

                            <?php if( get_field('facebook_link', 'option') ): ?>
                                <li>
                                    <a href="<?php the_field('facebook_link', 'option'); ?>" title="facebook Gdański Archipelag Kultury">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9.851" height="19.7"><path data-name="Path 203" d="M8.053 3.271h1.8V.139A23.229 23.229 0 007.231 0C4.638 0 2.862 1.631 2.862 4.629v2.759H.001v3.5h2.861V19.7H6.37v-8.81h2.741l.436-3.5H6.365V4.976c0-1.012.273-1.7 1.684-1.7z"/></svg>
                                    </a>
                                </li>

                            <?php endif; ?>

                            <?php if( get_field('instagram_link', 'option') ): ?>
                                <li>
                                    <a href="<?php the_field('instagram_link', 'option'); ?>" title="instagram Gdański Archipelag Kultury">
                                    <svg data-name="Group 73" xmlns="http://www.w3.org/2000/svg" width="21.777" height="21.777"><path data-name="Path 200" d="M15.882 0H5.895A5.9 5.9 0 000 5.895v9.988a5.9 5.9 0 005.895 5.895h9.988a5.9 5.9 0 005.895-5.895V5.895A5.9 5.9 0 0015.882 0zm-4.993 16.843a5.955 5.955 0 115.955-5.955 5.961 5.961 0 01-5.955 5.955zm6.1-10.5a1.76 1.76 0 111.76-1.76 1.761 1.761 0 01-1.763 1.755z"/><path data-name="Path 201" d="M10.891 6.211a4.678 4.678 0 104.678 4.678 4.683 4.683 0 00-4.678-4.678z"/><path data-name="Path 202" d="M16.986 4.095a.483.483 0 10.483.483.483.483 0 00-.483-.483z"/></svg>
                                    </a>
                                </li>

                            <?php endif; ?>
                        </ul>

                    </div>
                </div>

            </div>

        </div>

        <div class="uk-container uk-container-expand gak-padding-top gak-mobile-padding gak-second-facility-menu">

            <div class="gak-nav-height" uk-grid>

                <div class="gak-site-logo-container">

                <?php $parentPageId = wp_get_post_parent_id( $post_ID ); ?>

                <a href="<?php wps_parent_post(); ?>" class="gak-site-logo gak-site-logo-special" title="Strona główna <?php echo get_field('nazwa_stacji', $parentPageId) ?>">


                <?php $post_object = get_field('nazwa_stacji', $parentPageId);
                        if( $parentPageId ): ?>

                    <img class="gak-img-<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $parentPageId)));?>" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/full_logo/<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $parentPageId)));?>-full-logo-black.svg" alt="Logo <?php echo get_field('nazwa_stacji', $parentPageId) ?>" title="Logo <?php echo get_field('nazwa_stacji', $parentPageId) ?>" />

                <?php endif; ?>

                </a>

                <div class="gak-menu-box" uk-toggle="target: #my-id">

                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="17" viewBox="0 0 35 17">
                        <path fill="#fff"
                            d="M.858 10.33V6.89H34.8v3.44zM6.083 3.96V.517h23.5v3.441zM6.083 16.702V13.26h23.5v3.442z" />
                    </svg>
                    <p>MENU</p>

                </div>

                </div>

                <div class="uk-width-expand gak-nav-main-container gak-main-menu-facility">

                    <nav class="gak-facility-menu" aria-label="Nawigacja placówki">

                        <!-- <h1>
                        <?php echo $facilityName ?>
                        </h1> -->

                        <?php $parentPageId = wp_get_post_parent_id( $post_ID ); ?>
                        <?php $facilityName = get_field('nazwa_stacji', $parentPageId); ?>

                        <?php if($facilityName == 'Stacja Orunia') {
                            wp_nav_menu( array( 'theme_location' => 'facility-orunia' ) );
                        } else if ($facilityName == 'Plama') {
                            wp_nav_menu( array( 'theme_location' => 'facility-plama' ) );
                        } else if ($facilityName == 'Dom Sztuki') {
                            wp_nav_menu( array( 'theme_location' => 'facility-dom-sztuki' ) );
                        } else if ($facilityName == 'Projektornia') {
                            wp_nav_menu( array( 'theme_location' => 'facility-projektornia' ) );
                        } else if ($facilityName == 'Scena Muzyczna') {
                            wp_nav_menu( array( 'theme_location' => 'facility-scena-muzyczna' ) );
                        } else if ($facilityName == 'Teatr GAK') {
                            wp_nav_menu( array( 'theme_location' => 'facility-teatr-gak' ) );
                        } else if ($facilityName == 'Gama') {
                            wp_nav_menu( array( 'theme_location' => 'facility-gama' ) );
                        } else if ($facilityName == 'Winda') {
                            wp_nav_menu( array( 'theme_location' => 'facility-winda' ) );
                        } else if ($facilityName == 'Zespół Pieśni i Tańca Gdańsk') {
                            wp_nav_menu( array( 'theme_location' => 'facility-zespol-piesni-i-tanca-gdansk' ) );
                        } else if ($facilityName == 'Gdańskie Lodowisko') {
                            wp_nav_menu( array( 'theme_location' => 'facility-gdanskie-lodowisko' ) );
                        } else if ($facilityName == 'Wyspa Skarbów') {
                            wp_nav_menu( array( 'theme_location' => 'facility-wyspa-skarbow' ) );
                        } else if ($facilityName == 'Mobilny Dom Kultury') {
                            wp_nav_menu( array( 'theme_location' => 'facility-mobilny-dom-kultury' ) );
                        }

                        ?>


                    </nav>

                    <div class="gak-nav-right">

                    <?php if( get_field('link_do_kup_teraz', $parentPageId) ): ?>
                    <a title="Kup bilet <?php echo get_field('nazwa_stacji', $post_object->ID) ?>" class="gak-buy-tickets" href="<?php the_field('link_do_kup_teraz', $parentPageId); ?>">KUP BILET</a>
                    <?php endif; ?>


                    <ul class="gak-soc-ul">

                        <?php if( get_field('facebook_link_stacja', $parentPageId) ): ?>
                        <li>
                            <a href="<?php the_field('facebook_link_stacja', $parentPageId); ?>" title="facebook <?php echo get_field('nazwa_stacji', $parentPageId) ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="9.851" height="19.7" >
                                <path data-name="Path 203" d="M8.053 3.271h1.8V.139A23.229 23.229 0 007.231 0C4.638 0 2.862 1.631 2.862 4.629v2.759H.001v3.5h2.861V19.7H6.37v-8.81h2.741l.436-3.5H6.365V4.976c0-1.012.273-1.7 1.684-1.7z"/>
                            </svg>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if( get_field('instagram_link_stacja', $parentPageId) ): ?>
                        <li>
                            <a href="<?php the_field('instagram_link_stacja', $parentPageId); ?>" title="instagram <?php echo get_field('nazwa_stacji', $parentPageId) ?>">
                            <svg data-name="Group 73" xmlns="http://www.w3.org/2000/svg" width="21.777" height="21.777">
                                <path data-name="Path 200" d="M15.882 0H5.895A5.9 5.9 0 000 5.895v9.988a5.9 5.9 0 005.895 5.895h9.988a5.9 5.9 0 005.895-5.895V5.895A5.9 5.9 0 0015.882 0zm-4.993 16.843a5.955 5.955 0 115.955-5.955 5.961 5.961 0 01-5.955 5.955zm6.1-10.5a1.76 1.76 0 111.76-1.76 1.761 1.761 0 01-1.763 1.755z"/>
                                <path data-name="Path 201" d="M10.891 6.211a4.678 4.678 0 104.678 4.678 4.683 4.683 0 00-4.678-4.678z"/>
                                <path data-name="Path 202" d="M16.986 4.095a.483.483 0 10.483.483.483.483 0 00-.483-.483z"/>
                            </svg>
                            </a>
                        </li>

                        <?php endif; ?>
                    </ul>

                    </div>

                </div>

            </div>

        </div>

    </header>
    
    <div id="my-id" uk-offcanvas="mode: push">
            <div class="uk-offcanvas-bar">

                <button class="uk-offcanvas-close" type="button" uk-close><span class="gak-hide">Zamknij</span></button>

                <?php $parentPageId = wp_get_post_parent_id( $post_ID ); ?>

                <?php $post_object = get_field('nazwa_stacji', $parentPageId);
                        if( $parentPageId ): ?>
                    <a href="<?php wps_parent_post(); ?>" title="Strona główna GAK">
                        <img class="gak-img-<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $parentPageId)));?> gak-mobile-menu-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/full_logo/<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $parentPageId)));?>-full-logo.svg" alt="Logo GAK" title="Logo GAK" />
                    </a>
                <?php endif; ?>

                <?php if($facilityName == 'Stacja Orunia') {
                       wp_nav_menu( array( 'theme_location' => 'facility-orunia' ) );
                } else if ($facilityName == 'Plama') {
                    wp_nav_menu( array( 'theme_location' => 'facility-plama' ) );
                } else if ($facilityName == 'Dom Sztuki') {
                    wp_nav_menu( array( 'theme_location' => 'facility-dom-sztuki' ) );
                } else if ($facilityName == 'Projektornia') {
                    wp_nav_menu( array( 'theme_location' => 'facility-projektornia' ) );
                } else if ($facilityName == 'Scena Muzyczna') {
                    wp_nav_menu( array( 'theme_location' => 'facility-scena-muzyczna' ) );
                } else if ($facilityName == 'Teatr GAK') {
                    wp_nav_menu( array( 'theme_location' => 'facility-teatr-gak' ) );
                } else if ($facilityName == 'Gama') {
                    wp_nav_menu( array( 'theme_location' => 'facility-gama' ) );
                } else if ($facilityName == 'Winda') {
                    wp_nav_menu( array( 'theme_location' => 'facility-winda' ) );
                } else if ($facilityName == 'Zespół Pieśni i Tańca Gdańsk') {
                    wp_nav_menu( array( 'theme_location' => 'facility-zespol-piesni-i-tanca-gdansk' ) );
                } else if ($facilityName == 'Gdańskie Lodowisko') {
                    wp_nav_menu( array( 'theme_location' => 'facility-gdanskie-lodowisko' ) );
                } else if ($facilityName == 'Wyspa Skarbów') {
                    wp_nav_menu( array( 'theme_location' => 'facility-wyspa-skarbow' ) );
                } else if ($facilityName == 'Mobilny Dom Kultury') {
                    wp_nav_menu( array( 'theme_location' => 'facility-mobilny-dom-kultury' ) );
                }
     
                ?>

                <div class="gak-white-separator"></div>

                <a class="gak-return" href="<?php echo get_home_url(); ?>" title="Strona główna GAK">Powrót do GAKu

                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mobile-logo.svg" alt="Logo GAK" title="Logo GAK" />

                </a>

                <div class="gak-white-separator"></div>

                <ul uk-accordion>
                    <li>
                    <a class="uk-accordion-title gak-places-mobile" href="#">pozostałe placówki</a>
                        <div class="uk-accordion-content">
                <ul class="gak-places-ul">
                    <?php

                        $args = array(
                            'post_type' => 'placowki',
                            'category_name' => 'placowka-kat',
                            'post_status' => 'publish',
                            'posts_per_page' => 14,
                            'orderby' => 'title',
                            'order' => 'ASC',
                        );
                        $loop = new WP_Query( $args );
                        
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <li class="menu-item ">
                                <a href="<?php echo get_permalink(); ?>">
                                <?php $post_object = get_field('uproszczone_logo');
                                        if( $post_object ): ?>
                                                <i class="icon <?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $post_object->ID)));?>" style="background: url(<?php echo get_field('uproszczone_logo', $post_object->ID); ?>)"></i>

                                <?php endif; ?>
                             
                                    <?php str_replace(' ', '', the_title_attribute());?>
                                </a>
                            </li>

                        <?php the_excerpt();  ?>
                        
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        
                    ?>
                </ul>
                        </div>
                    </li>
                </ul>

                <?php if( get_field('link_do_kup_teraz', $parentPageId) ): ?>
                    <a title="Kup bilet <?php echo get_field('nazwa_stacji', $post_object->ID) ?>" class="gak-buy-tickets" href="<?php the_field('link_do_kup_teraz', $parentPageId); ?>">KUP BILET</a>
                <?php endif; ?>

            </div>
    </div>

    <div id="my-id2" uk-offcanvas="mode: push">
            <div class="uk-offcanvas-bar">

                <button class="uk-offcanvas-close" type="button" uk-close><span class="gak-hide">Zamknij</span></button>

                <a href="<?php echo get_home_url(); ?>" title="Strona główna GAK">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mobile-logo.svg" alt="Logo GAK" title="Logo GAK" />
                </a>

                <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

                <p class="gak-places-mobile">placówki</p>

                <ul class="gak-places-ul">
                    <?php

                        $args = array(
                            'post_type' => 'placowki',
                            'category_name' => 'placowka-kat',
                            'post_status' => 'publish',
                            'posts_per_page' => 14,
                            'orderby' => 'title',
                            'order' => 'ASC',
                        );
                        $loop = new WP_Query( $args );
                        
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <li class="menu-item ">
                                <a href="<?php echo get_permalink(); ?>">
                                <?php $post_object = get_field('uproszczone_logo');
                                        if( $post_object ): ?>
                                    <i class="icon <?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $post_object->ID)));?>" style="background: url(<?php echo get_field('uproszczone_logo', $post_object->ID); ?>)"></i>

                                <?php endif; ?>
                             
                                    <?php str_replace(' ', '', the_title_attribute());?>
                                </a>
                            </li>

                        <?php the_excerpt();  ?>
                        
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        
                    ?>
                </ul>

            </div>
    </div>

<?php elseif (is_single( array( 'Aktualności' ))): ?>

    <header class="gak-not-main gak-facility-header cd-auto-hide-header">

        <div class="uk-container uk-container-expand gak-padding-top gak-mobile-padding gak-border-bottom gak-first-facility-menu">

            <div class="gak-nav-height" uk-grid>

                <div class="gak-site-logo-container">

                    <a href="<?php echo get_home_url(); ?>" class="gak-site-logo" title="Strona główna GAK">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gak-logo-big.svg" alt="Logo GAK" title="Logo GAK" />
                    </a>

                    <div class="gak-menu-box" uk-toggle="target: #my-id2">

                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="17" viewBox="0 0 35 17">
                            <path fill="#fff"
                                d="M.858 10.33V6.89H34.8v3.44zM6.083 3.96V.517h23.5v3.441zM6.083 16.702V13.26h23.5v3.442z" />
                        </svg>
                        <p>MENU</p>
                        
                    </div>
                </div>

                <div class="uk-width-expand gak-nav-main-container gak-main-menu-facility">
                    <nav class="gak-main-nav" aria-label="główna">

                        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

                    </nav>

                    <div class="gak-nav-right">

                        <ul class="gak-soc-ul">

                            <?php if( get_field('facebook_link', 'option') ): ?>
                                <li>
                                    <a href="<?php the_field('facebook_link', 'option'); ?>" title="facebook Gdański Archipelag Kultury">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9.851" height="19.7"><path data-name="Path 203" d="M8.053 3.271h1.8V.139A23.229 23.229 0 007.231 0C4.638 0 2.862 1.631 2.862 4.629v2.759H.001v3.5h2.861V19.7H6.37v-8.81h2.741l.436-3.5H6.365V4.976c0-1.012.273-1.7 1.684-1.7z"/></svg>
                                    </a>
                                </li>

                            <?php endif; ?>

                            <?php if( get_field('instagram_link', 'option') ): ?>
                                <li>
                                    <a href="<?php the_field('instagram_link', 'option'); ?>" title="instagram Gdański Archipelag Kultury">
                                    <svg data-name="Group 73" xmlns="http://www.w3.org/2000/svg" width="21.777" height="21.777"><path data-name="Path 200" d="M15.882 0H5.895A5.9 5.9 0 000 5.895v9.988a5.9 5.9 0 005.895 5.895h9.988a5.9 5.9 0 005.895-5.895V5.895A5.9 5.9 0 0015.882 0zm-4.993 16.843a5.955 5.955 0 115.955-5.955 5.961 5.961 0 01-5.955 5.955zm6.1-10.5a1.76 1.76 0 111.76-1.76 1.761 1.761 0 01-1.763 1.755z"/><path data-name="Path 201" d="M10.891 6.211a4.678 4.678 0 104.678 4.678 4.683 4.683 0 00-4.678-4.678z"/><path data-name="Path 202" d="M16.986 4.095a.483.483 0 10.483.483.483.483 0 00-.483-.483z"/></svg>
                                    </a>
                                </li>

                            <?php endif; ?>
                        </ul>

                    </div>
                </div>

            </div>

        </div>

        <div class="uk-container uk-container-expand gak-padding-top gak-mobile-padding gak-second-facility-menu">

            <div class="gak-nav-height" uk-grid>

                <div class="gak-site-logo-container">

                <?php $parentPageId = wp_get_post_parent_id( $post_ID ); ?>

                <a href="<?php wps_parent_post(); ?>" class="gak-site-logo gak-site-logo-special" title="Strona główna <?php echo get_field('nazwa_stacji', $parentPageId) ?>">


                <?php $post_object = get_field('nazwa_stacji', $parentPageId);
                        if( $parentPageId ): ?>

                    <img class="gak-img-<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $parentPageId)));?>" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/full_logo/<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $parentPageId)));?>-full-logo-black.svg" alt="Logo <?php echo get_field('nazwa_stacji', $parentPageId) ?>" title="Logo <?php echo get_field('nazwa_stacji', $parentPageId) ?>" />

                <?php endif; ?>

                </a>

                <div class="gak-menu-box" uk-toggle="target: #my-id">

                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="17" viewBox="0 0 35 17">
                        <path fill="#fff"
                            d="M.858 10.33V6.89H34.8v3.44zM6.083 3.96V.517h23.5v3.441zM6.083 16.702V13.26h23.5v3.442z" />
                    </svg>
                    <p>MENU</p>

                    </div>

                </div>

                <div class="uk-width-expand gak-nav-main-container gak-main-menu-facility">

                    <nav class="gak-facility-menu" aria-label="Nawigacja placówki">

                        <!-- <h1>
                        <?php echo $facilityName ?>
                        </h1> -->

                        <?php $parentPageId = wp_get_post_parent_id( $post_ID ); ?>
                        <?php $facilityName = get_field('nazwa_stacji', $parentPageId); ?>

                        <?php if($facilityName == 'Stacja Orunia') {
                            wp_nav_menu( array( 'theme_location' => 'facility-orunia' ) );
                        } else if ($facilityName == 'Plama') {
                            wp_nav_menu( array( 'theme_location' => 'facility-plama' ) );
                        } else if ($facilityName == 'Dom Sztuki') {
                            wp_nav_menu( array( 'theme_location' => 'facility-dom-sztuki' ) );
                        } else if ($facilityName == 'Projektornia') {
                            wp_nav_menu( array( 'theme_location' => 'facility-projektornia' ) );
                        } else if ($facilityName == 'Scena Muzyczna') {
                            wp_nav_menu( array( 'theme_location' => 'facility-scena-muzyczna' ) );
                        } else if ($facilityName == 'Teatr GAK') {
                            wp_nav_menu( array( 'theme_location' => 'facility-teatr-gak' ) );
                        } else if ($facilityName == 'Gama') {
                            wp_nav_menu( array( 'theme_location' => 'facility-gama' ) );
                        } else if ($facilityName == 'Winda') {
                            wp_nav_menu( array( 'theme_location' => 'facility-winda' ) );
                        } else if ($facilityName == 'Zespół Pieśni i Tańca Gdańsk') {
                            wp_nav_menu( array( 'theme_location' => 'facility-zespol-piesni-i-tanca-gdansk' ) );
                        } else if ($facilityName == 'Gdańskie Lodowisko') {
                            wp_nav_menu( array( 'theme_location' => 'facility-gdanskie-lodowisko' ) );
                        } else if ($facilityName == 'Wyspa Skarbów') {
                            wp_nav_menu( array( 'theme_location' => 'facility-wyspa-skarbow' ) );
                        } else if ($facilityName == 'Mobilny Dom Kultury') {
                            wp_nav_menu( array( 'theme_location' => 'facility-mobilny-dom-kultury' ) );
                        }

                        ?>


                    </nav>

                    <div class="gak-nav-right">

                    <?php if( get_field('link_do_kup_teraz', $parentPageId) ): ?>
                    <a title="Kup bilet <?php echo get_field('nazwa_stacji', $post_object->ID) ?>" class="gak-buy-tickets" href="<?php the_field('link_do_kup_teraz', $parentPageId); ?>">KUP BILET</a>
                    <?php endif; ?>


                    <ul class="gak-soc-ul">

                        <?php if( get_field('facebook_link_stacja', $parentPageId) ): ?>
                        <li>
                            <a href="<?php the_field('facebook_link_stacja', $parentPageId); ?>" title="facebook <?php echo get_field('nazwa_stacji', $parentPageId) ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="9.851" height="19.7" >
                                <path data-name="Path 203" d="M8.053 3.271h1.8V.139A23.229 23.229 0 007.231 0C4.638 0 2.862 1.631 2.862 4.629v2.759H.001v3.5h2.861V19.7H6.37v-8.81h2.741l.436-3.5H6.365V4.976c0-1.012.273-1.7 1.684-1.7z"/>
                            </svg>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if( get_field('instagram_link_stacja', $parentPageId) ): ?>
                        <li>
                            <a href="<?php the_field('instagram_link_stacja', $parentPageId); ?>" title="instagram <?php echo get_field('nazwa_stacji', $parentPageId) ?>">
                            <svg data-name="Group 73" xmlns="http://www.w3.org/2000/svg" width="21.777" height="21.777">
                                <path data-name="Path 200" d="M15.882 0H5.895A5.9 5.9 0 000 5.895v9.988a5.9 5.9 0 005.895 5.895h9.988a5.9 5.9 0 005.895-5.895V5.895A5.9 5.9 0 0015.882 0zm-4.993 16.843a5.955 5.955 0 115.955-5.955 5.961 5.961 0 01-5.955 5.955zm6.1-10.5a1.76 1.76 0 111.76-1.76 1.761 1.761 0 01-1.763 1.755z"/>
                                <path data-name="Path 201" d="M10.891 6.211a4.678 4.678 0 104.678 4.678 4.683 4.683 0 00-4.678-4.678z"/>
                                <path data-name="Path 202" d="M16.986 4.095a.483.483 0 10.483.483.483.483 0 00-.483-.483z"/>
                            </svg>
                            </a>
                        </li>

                        <?php endif; ?>
                    </ul>

                    </div>

                </div>

            </div>

        </div>

    </header>

    <div id="my-id" uk-offcanvas="mode: push">
            <div class="uk-offcanvas-bar">

                    <button class="uk-offcanvas-close" type="button" uk-close><span class="gak-hide">Zamknij</span></button>

                    <?php $parentPageId = wp_get_post_parent_id( $post_ID ); ?>

                    <?php $post_object = get_field('nazwa_stacji', $parentPageId);
                            if( $parentPageId ): ?>
                        <a href="<?php wps_parent_post(); ?>" title="Strona główna <?php echo get_field('nazwa_stacji', $parentPageId) ?>">
                            <img class="gak-img-<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $parentPageId)));?> gak-mobile-menu-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/full_logo/<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $parentPageId)));?>-full-logo.svg" alt="Logo <?php echo get_field('nazwa_stacji', $parentPageId) ?>" title="Logo <?php echo get_field('nazwa_stacji', $parentPageId) ?>" />
                </a>
                    <?php endif; ?>

                <?php if($facilityName == 'Stacja Orunia') {
                    wp_nav_menu( array( 'theme_location' => 'facility-orunia' ) );
                } else if ($facilityName == 'Plama') {
                    wp_nav_menu( array( 'theme_location' => 'facility-plama' ) );
                } else if ($facilityName == 'Dom Sztuki') {
                    wp_nav_menu( array( 'theme_location' => 'facility-dom-sztuki' ) );
                } else if ($facilityName == 'Projektornia') {
                    wp_nav_menu( array( 'theme_location' => 'facility-projektornia' ) );
                } else if ($facilityName == 'Scena Muzyczna') {
                    wp_nav_menu( array( 'theme_location' => 'facility-scena-muzyczna' ) );
                } else if ($facilityName == 'Teatr GAK') {
                    wp_nav_menu( array( 'theme_location' => 'facility-teatr-gak' ) );
                } else if ($facilityName == 'Gama') {
                    wp_nav_menu( array( 'theme_location' => 'facility-gama' ) );
                } else if ($facilityName == 'Winda') {
                    wp_nav_menu( array( 'theme_location' => 'facility-winda' ) );
                } else if ($facilityName == 'Zespół Pieśni i Tańca Gdańsk') {
                    wp_nav_menu( array( 'theme_location' => 'facility-zespol-piesni-i-tanca-gdansk' ) );
                } else if ($facilityName == 'Gdańskie Lodowisko') {
                    wp_nav_menu( array( 'theme_location' => 'facility-gdanskie-lodowisko' ) );
                } else if ($facilityName == 'Wyspa Skarbów') {
                    wp_nav_menu( array( 'theme_location' => 'facility-wyspa-skarbow' ) );
                } else if ($facilityName == 'Mobilny Dom Kultury') {
                    wp_nav_menu( array( 'theme_location' => 'facility-mobilny-dom-kultury' ) );
                }
    
                ?>

                    <div class="gak-white-separator"></div>

                    <a class="gak-return" href="<?php echo get_home_url(); ?>" title="Strona główna GAK">Powrót do GAKu

                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mobile-logo.svg" alt="Logo GAK" title="Logo GAK" />

                    </a>

                    <div class="gak-white-separator"></div>

                    <ul uk-accordion>
                        <li>
                        <a class="uk-accordion-title gak-places-mobile" href="#">pozostałe placówki</a>
                            <div class="uk-accordion-content">
                <ul class="gak-places-ul">
                    <?php

                        $args = array(
                            'post_type' => 'placowki',
                            'category_name' => 'placowka-kat',
                            'post_status' => 'publish',
                            'posts_per_page' => 14,
                            'orderby' => 'title',
                            'order' => 'ASC',
                        );
                        $loop = new WP_Query( $args );
                        
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <li class="menu-item ">
                                <a href="<?php echo get_permalink(); ?>">
                                <?php $post_object = get_field('uproszczone_logo');
                                        if( $post_object ): ?>
                                                    <i class="icon <?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $post_object->ID)));?>" style="background: url(<?php echo get_field('uproszczone_logo', $post_object->ID); ?>)"></i>

                                <?php endif; ?>
                            
                                    <?php str_replace(' ', '', the_title_attribute());?>
                                </a>
                            </li>

                        <?php the_excerpt();  ?>
                        
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        
                    ?>
                </ul>
                            </div>
                        </li>
                    </ul>

                    <?php if( get_field('link_do_kup_teraz', $parentPageId) ): ?>
                    <a title="Kup bilet <?php echo get_field('nazwa_stacji', $post_object->ID) ?>" class="gak-buy-tickets" href="<?php the_field('link_do_kup_teraz', $parentPageId); ?>">KUP BILET</a>
                <?php endif; ?>


            </div>
    </div>

    <div id="my-id2" uk-offcanvas="mode: push">
            <div class="uk-offcanvas-bar">

                <button class="uk-offcanvas-close" type="button" uk-close><span class="gak-hide">Zamknij</span></button>

                <a href="<?php echo get_home_url(); ?>" title="Strona główna GAK">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mobile-logo.svg" alt="Logo GAK" title="Logo GAK" />
                </a>

                <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

                <p class="gak-places-mobile">placówki</p>

                <ul class="gak-places-ul">
                    <?php

                        $args = array(
                            'post_type' => 'placowki',
                            'category_name' => 'placowka-kat',
                            'post_status' => 'publish',
                            'posts_per_page' => 14,
                            'orderby' => 'title',
                            'order' => 'ASC',
                        );
                        $loop = new WP_Query( $args );
                        
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <li class="menu-item ">
                                <a href="<?php echo get_permalink(); ?>">
                                <?php $post_object = get_field('uproszczone_logo');
                                        if( $post_object ): ?>
                                    <i class="icon <?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $post_object->ID)));?>" style="background: url(<?php echo get_field('uproszczone_logo', $post_object->ID); ?>)"></i>

                                <?php endif; ?>
                             
                                    <?php str_replace(' ', '', the_title_attribute());?>
                                </a>
                            </li>

                        <?php the_excerpt();  ?>
                        
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        
                    ?>
                </ul>

            </div>
    </div>



<?php elseif (is_single( array( 'O nas' ))): ?>

    <div class="gak-facility-black-header" style="background: url(<?php the_field('obrazek_baner_glowny') ?>) no-repeat top center fixed;">

        <header class="gak-not-main gak-black-header gak-facility-header cd-auto-hide-header">

            <div class="uk-container uk-container-expand gak-padding-top gak-mobile-padding gak-white-border-bottom">

                <div class="gak-nav-height" uk-grid>

                    <div class="gak-site-logo-container">

                        <a href="<?php echo get_home_url(); ?>" class="gak-site-logo" title="Strona główna GAK">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gak-logo-big-white.svg" alt="Logo GAK" title="Logo GAK" />
                        </a>

                        <div class="gak-menu-box" uk-toggle="target: #my-id2">

                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="17" viewBox="0 0 35 17">
                                <path fill="#fff"
                                    d="M.858 10.33V6.89H34.8v3.44zM6.083 3.96V.517h23.5v3.441zM6.083 16.702V13.26h23.5v3.442z" />
                            </svg>
                            <p>MENU</p>
                            
                        </div>
                    </div>

                    <div class="uk-width-expand gak-nav-main-container gak-main-menu-facility">
                        <nav class="gak-main-nav" aria-label="główna">

                            <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

                        </nav>

                        <div class="gak-nav-right">

                            <ul class="gak-soc-ul">

                                <?php if( get_field('facebook_link', 'option') ): ?>
                                    <li>
                                        <a href="<?php the_field('facebook_link', 'option'); ?>" title="facebook Gdański Archipelag Kultury">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="9.851" height="19.7" fill="#fff">
                                                <path data-name="Path 203" d="M8.053 3.271h1.8V.139A23.229 23.229 0 007.231 0C4.638 0 2.862 1.631 2.862 4.629v2.759H.001v3.5h2.861V19.7H6.37v-8.81h2.741l.436-3.5H6.365V4.976c0-1.012.273-1.7 1.684-1.7z"/>
                                            </svg>
                                        </a>
                                    </li>

                                <?php endif; ?>

                                <?php if( get_field('instagram_link', 'option') ): ?>
                                    <li>
                                        <a href="<?php the_field('instagram_link', 'option'); ?>" title="instagram Gdański Archipelag Kultury">
                                            <svg data-name="Group 73" xmlns="http://www.w3.org/2000/svg" width="21.777" height="21.777" fill="#fff">
                                                <path data-name="Path 200" d="M15.882 0H5.895A5.9 5.9 0 000 5.895v9.988a5.9 5.9 0 005.895 5.895h9.988a5.9 5.9 0 005.895-5.895V5.895A5.9 5.9 0 0015.882 0zm-4.993 16.843a5.955 5.955 0 115.955-5.955 5.961 5.961 0 01-5.955 5.955zm6.1-10.5a1.76 1.76 0 111.76-1.76 1.761 1.761 0 01-1.763 1.755z"/>
                                                <path data-name="Path 201" d="M10.891 6.211a4.678 4.678 0 104.678 4.678 4.683 4.683 0 00-4.678-4.678z"/>
                                                <path data-name="Path 202" d="M16.986 4.095a.483.483 0 10.483.483.483.483 0 00-.483-.483z"/>
                                            </svg>
                                        </a>
                                    </li>

                                <?php endif; ?>
                            </ul>

                        </div>
                    </div>

                </div>

            </div>

            <div class="uk-container uk-container-expand gak-padding-top gak-mobile-padding gak-second-facility-menu">

                <div class="gak-nav-height" uk-grid>

                    <div class="gak-site-logo-container">

                    <?php $parentPageId = wp_get_post_parent_id( $post_ID ); ?>

                    <a href="<?php wps_parent_post(); ?>" class="gak-site-logo gak-site-logo-special" title="Strona główna <?php echo get_field('nazwa_stacji', $parentPageId) ?>">


                    <?php $post_object = get_field('nazwa_stacji', $parentPageId);
                            if( $parentPageId ): ?>

                        <img class="gak-img-<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $parentPageId)));?>" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/full_logo/<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $parentPageId)));?>-full-logo.svg" alt="Logo <?php echo get_field('nazwa_stacji', $parentPageId) ?>" title="Logo <?php echo get_field('nazwa_stacji', $parentPageId) ?>" />

                    <?php endif; ?>

                    </a>

                    <div class="gak-menu-box" uk-toggle="target: #my-id">

                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="17" viewBox="0 0 35 17">
                            <path fill="#fff"
                                d="M.858 10.33V6.89H34.8v3.44zM6.083 3.96V.517h23.5v3.441zM6.083 16.702V13.26h23.5v3.442z" />
                        </svg>
                        <p>MENU</p>

                    </div>

                    </div>

                    <div class="uk-width-expand gak-nav-main-container gak-main-menu-facility">

                        <nav class="gak-facility-menu" aria-label="Nawigacja placówki">

                            <!-- <h1>
                            <?php echo $facilityName ?>
                            </h1> -->

                            <?php $parentPageId = wp_get_post_parent_id( $post_ID ); ?>
                            <?php $facilityName = get_field('nazwa_stacji', $parentPageId); ?>

                            <?php if($facilityName == 'Stacja Orunia') {
                                wp_nav_menu( array( 'theme_location' => 'facility-orunia' ) );
                            } else if ($facilityName == 'Plama') {
                                wp_nav_menu( array( 'theme_location' => 'facility-plama' ) );
                            } else if ($facilityName == 'Dom Sztuki') {
                                wp_nav_menu( array( 'theme_location' => 'facility-dom-sztuki' ) );
                            } else if ($facilityName == 'Projektornia') {
                                wp_nav_menu( array( 'theme_location' => 'facility-projektornia' ) );
                            } else if ($facilityName == 'Scena Muzyczna') {
                                wp_nav_menu( array( 'theme_location' => 'facility-scena-muzyczna' ) );
                            } else if ($facilityName == 'Teatr GAK') {
                                wp_nav_menu( array( 'theme_location' => 'facility-teatr-gak' ) );
                            } else if ($facilityName == 'Gama') {
                                wp_nav_menu( array( 'theme_location' => 'facility-gama' ) );
                            } else if ($facilityName == 'Winda') {
                                wp_nav_menu( array( 'theme_location' => 'facility-winda' ) );
                            } else if ($facilityName == 'Zespół Pieśni i Tańca Gdańsk') {
                                wp_nav_menu( array( 'theme_location' => 'facility-zespol-piesni-i-tanca-gdansk' ) );
                            } else if ($facilityName == 'Gdańskie Lodowisko') {
                                wp_nav_menu( array( 'theme_location' => 'facility-gdanskie-lodowisko' ) );
                            } else if ($facilityName == 'Wyspa Skarbów') {
                                wp_nav_menu( array( 'theme_location' => 'facility-wyspa-skarbow' ) );
                            } else if ($facilityName == 'Mobilny Dom Kultury') {
                                wp_nav_menu( array( 'theme_location' => 'facility-mobilny-dom-kultury' ) );
                            }

                            ?>


                        </nav>

                        <div class="gak-nav-right">

                        <?php if( get_field('link_do_kup_teraz', $parentPageId) ): ?>
                        <a title="Kup bilet <?php echo get_field('nazwa_stacji', $post_object->ID) ?>" class="gak-buy-tickets" href="<?php the_field('link_do_kup_teraz', $parentPageId); ?>">KUP BILET</a>
                        <?php endif; ?>


                        <ul class="gak-soc-ul">

                            <?php if( get_field('facebook_link_stacja', $parentPageId) ): ?>
                            <li>
                                <a href="<?php the_field('facebook_link_stacja', $parentPageId); ?>" title="facebook <?php echo get_field('nazwa_stacji', $parentPageId) ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="9.851" height="19.7" fill="#fff">
                                        <path data-name="Path 203" d="M8.053 3.271h1.8V.139A23.229 23.229 0 007.231 0C4.638 0 2.862 1.631 2.862 4.629v2.759H.001v3.5h2.861V19.7H6.37v-8.81h2.741l.436-3.5H6.365V4.976c0-1.012.273-1.7 1.684-1.7z"/>
                                    </svg>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php if( get_field('instagram_link_stacja', $parentPageId) ): ?>
                            <li>
                                <a href="<?php the_field('instagram_link_stacja', $parentPageId); ?>" title="instagram <?php echo get_field('nazwa_stacji', $parentPageId) ?>">
                                <svg data-name="Group 73" xmlns="http://www.w3.org/2000/svg" width="21.777" height="21.777" fill="#fff">
                                        <path data-name="Path 200" d="M15.882 0H5.895A5.9 5.9 0 000 5.895v9.988a5.9 5.9 0 005.895 5.895h9.988a5.9 5.9 0 005.895-5.895V5.895A5.9 5.9 0 0015.882 0zm-4.993 16.843a5.955 5.955 0 115.955-5.955 5.961 5.961 0 01-5.955 5.955zm6.1-10.5a1.76 1.76 0 111.76-1.76 1.761 1.761 0 01-1.763 1.755z"/>
                                        <path data-name="Path 201" d="M10.891 6.211a4.678 4.678 0 104.678 4.678 4.683 4.683 0 00-4.678-4.678z"/>
                                        <path data-name="Path 202" d="M16.986 4.095a.483.483 0 10.483.483.483.483 0 00-.483-.483z"/>
                                    </svg>
                                </a>
                            </li>

                            <?php endif; ?>
                        </ul>

                        </div>

                    </div>

                </div>

            </div>

        </header>

        <div id="my-id" uk-offcanvas="mode: push">
            <div class="uk-offcanvas-bar">

                <button class="uk-offcanvas-close" type="button" uk-close><span class="gak-hide">Zamknij</span></button>

                <?php $parentPageId = wp_get_post_parent_id( $post_ID ); ?>

                <?php $post_object = get_field('nazwa_stacji', $parentPageId);
                        if( $parentPageId ): ?>
                    <a href="<?php wps_parent_post(); ?>" title="Strona główna <?php echo get_field('nazwa_stacji', $parentPageId) ?>">
                        <img class="gak-img-<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $parentPageId)));?> gak-mobile-menu-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/full_logo/<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $parentPageId)));?>-full-logo.svg" alt="Logo <?php echo get_field('nazwa_stacji', $parentPageId) ?>" title="Logo <?php echo get_field('nazwa_stacji', $parentPageId) ?>" />
                </a>
                <?php endif; ?>

                <?php if($facilityName == 'Stacja Orunia') {
                       wp_nav_menu( array( 'theme_location' => 'facility-orunia' ) );
                } else if ($facilityName == 'Plama') {
                    wp_nav_menu( array( 'theme_location' => 'facility-plama' ) );
                } else if ($facilityName == 'Dom Sztuki') {
                    wp_nav_menu( array( 'theme_location' => 'facility-dom-sztuki' ) );
                } else if ($facilityName == 'Projektornia') {
                    wp_nav_menu( array( 'theme_location' => 'facility-projektornia' ) );
                } else if ($facilityName == 'Scena Muzyczna') {
                    wp_nav_menu( array( 'theme_location' => 'facility-scena-muzyczna' ) );
                } else if ($facilityName == 'Teatr GAK') {
                    wp_nav_menu( array( 'theme_location' => 'facility-teatr-gak' ) );
                } else if ($facilityName == 'Gama') {
                    wp_nav_menu( array( 'theme_location' => 'facility-gama' ) );
                } else if ($facilityName == 'Winda') {
                    wp_nav_menu( array( 'theme_location' => 'facility-winda' ) );
                } else if ($facilityName == 'Zespół Pieśni i Tańca Gdańsk') {
                    wp_nav_menu( array( 'theme_location' => 'facility-zespol-piesni-i-tanca-gdansk' ) );
                } else if ($facilityName == 'Gdańskie Lodowisko') {
                    wp_nav_menu( array( 'theme_location' => 'facility-gdanskie-lodowisko' ) );
                } else if ($facilityName == 'Wyspa Skarbów') {
                    wp_nav_menu( array( 'theme_location' => 'facility-wyspa-skarbow' ) );
                } else if ($facilityName == 'Mobilny Dom Kultury') {
                    wp_nav_menu( array( 'theme_location' => 'facility-mobilny-dom-kultury' ) );
                }
     
                ?>

                <div class="gak-white-separator"></div>

                <a class="gak-return" href="<?php echo get_home_url(); ?>" title="Strona główna GAK">Powrót do GAKu

                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mobile-logo.svg" alt="Logo GAK" title="Logo GAK" />

                </a>

                <div class="gak-white-separator"></div>

                <ul uk-accordion>
                    <li>
                    <a class="uk-accordion-title gak-places-mobile" href="#">pozostałe placówki</a>
                        <div class="uk-accordion-content">
                <ul class="gak-places-ul">
                    <?php

                        $args = array(
                            'post_type' => 'placowki',
                            'category_name' => 'placowka-kat',
                            'post_status' => 'publish',
                            'posts_per_page' => 14,
                            'orderby' => 'title',
                            'order' => 'ASC',
                        );
                        $loop = new WP_Query( $args );
                        
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <li class="menu-item ">
                                <a href="<?php echo get_permalink(); ?>">
                                <?php $post_object = get_field('uproszczone_logo');
                                        if( $post_object ): ?>
                                                <i class="icon <?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $post_object->ID)));?>" style="background: url(<?php echo get_field('uproszczone_logo', $post_object->ID); ?>)"></i>

                                <?php endif; ?>
                             
                                    <?php str_replace(' ', '', the_title_attribute());?>
                                </a>
                            </li>

                        <?php the_excerpt();  ?>
                        
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        
                    ?>
                </ul>
                        </div>
                    </li>
                </ul>

                <?php if( get_field('link_do_kup_teraz', $parentPageId) ): ?>
                    <a title="Kup bilet <?php echo get_field('nazwa_stacji', $post_object->ID) ?>" class="gak-buy-tickets" href="<?php the_field('link_do_kup_teraz', $parentPageId); ?>">KUP BILET</a>
                <?php endif; ?>



            </div>
        </div>

        <div id="my-id2" uk-offcanvas="mode: push">
            <div class="uk-offcanvas-bar">

                <button class="uk-offcanvas-close" type="button" uk-close><span class="gak-hide">Zamknij</span></button>

                <a href="<?php echo get_home_url(); ?>" title="Strona główna GAK">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mobile-logo.svg" alt="Logo GAK" title="Logo GAK" />
                </a>

                <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

                <p class="gak-places-mobile">placówki</p>

                <ul class="gak-places-ul">
                    <?php

                        $args = array(
                            'post_type' => 'placowki',
                            'category_name' => 'placowka-kat',
                            'post_status' => 'publish',
                            'posts_per_page' => 14,
                            'orderby' => 'title',
                            'order' => 'ASC',
                        );
                        $loop = new WP_Query( $args );
                        
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <li class="menu-item ">
                                <a href="<?php echo get_permalink(); ?>">
                                <?php $post_object = get_field('uproszczone_logo');
                                        if( $post_object ): ?>
                                    <i class="icon <?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $post_object->ID)));?>" style="background: url(<?php echo get_field('uproszczone_logo', $post_object->ID); ?>)"></i>

                                <?php endif; ?>
                             
                                    <?php str_replace(' ', '', the_title_attribute());?>
                                </a>
                            </li>

                        <?php the_excerpt();  ?>
                        
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        
                    ?>
                </ul>

            </div>
        </div>

        <div class="gak-breadcrumbs-facility gak-breadcrumbs-facility-top-padding">

            <div class="gak-breadcrumbs-facility-container">
                <div class="gak-bread-position">
                    Jesteś tutaj:
                    <ul class="gak-breadcrumbs-facility">
                        <li><a href="<?php wps_parent_post(); ?>"><?php echo get_the_title( $post->post_parent ); ?></a></li>
                        <li><span>O nas</span></li>
                    </ul>
                </div>
            
            </div>

        </div>

        <div class="uk-container uk-container-expand uk-margin-large-top">

            <div class="uk-container gak-container">

                <div class="gak-section-header">

                    <p class="gak-header">O nas</p>

                    <p class="uk-margin-top uk-margin-large-bottom"><?php echo get_the_title( $post->post_parent ); ?></p>

                    <div>
                            <img class="gak-calendar-icon gak-calendar-icon__main" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/calendar-icon-white.png" alt="Logo" title="Logo" />
                                <a class="gak-small-calendar-box__link gak-white-link gak-white-link-before" href="<?php wps_parent_post(); ?>">___kalendarz wydarzeń</a>
                            </div>
        

                </div>

            </div>

        </div>

    </div>

<?php elseif (is_single() && !is_category( 'aktualnosc' )): ?>

    <?php if( get_field('szablon') == 'szablon1' ): ?>

        <div class="uk-padding-remove-bottom gak-negative-facility gak-facility-black-header">
        
            <header class="gak-not-main gak-black-header gak-facility-header cd-auto-hide-header">

                <div class="uk-container uk-container-expand gak-padding-top gak-mobile-padding gak-white-border-bottom">

                    <div class="gak-nav-height" uk-grid>

                        <div class="gak-site-logo-container">

                            <a href="<?php echo get_home_url(); ?>" class="gak-site-logo" title="Strona główna GAK">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gak-logo-big-white.svg" alt="Logo GAK" title="Logo GAK" />
                            </a>

                            <div class="gak-menu-box" uk-toggle="target: #my-id">

                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="17" viewBox="0 0 35 17">
                                    <path fill="#fff"
                                        d="M.858 10.33V6.89H34.8v3.44zM6.083 3.96V.517h23.5v3.441zM6.083 16.702V13.26h23.5v3.442z" />
                                </svg>
                                <p>MENU</p>
                                
                            </div>
                        </div>

                        <div class="uk-width-expand gak-nav-main-container gak-main-menu-facility">
                            <nav class="gak-main-nav" aria-label="główna">

                                <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

                            </nav>

                            <div class="gak-nav-right">

                                <ul class="gak-soc-ul">

                                    <?php if( get_field('facebook_link', 'option') ): ?>
                                        <li>
                                            <a href="<?php the_field('facebook_link', 'option'); ?>" title="facebook Gdański Archipelag Kultury">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="9.851" height="19.7" fill="#fff">
                                                    <path data-name="Path 203" d="M8.053 3.271h1.8V.139A23.229 23.229 0 007.231 0C4.638 0 2.862 1.631 2.862 4.629v2.759H.001v3.5h2.861V19.7H6.37v-8.81h2.741l.436-3.5H6.365V4.976c0-1.012.273-1.7 1.684-1.7z"/>
                                                </svg>
                                            </a>
                                        </li>

                                    <?php endif; ?>

                                    <?php if( get_field('instagram_link', 'option') ): ?>
                                        <li>
                                            <a href="<?php the_field('instagram_link', 'option'); ?>" title="instagram Gdański Archipelag Kultury">
                                                <svg data-name="Group 73" xmlns="http://www.w3.org/2000/svg" width="21.777" height="21.777" fill="#fff">
                                                    <path data-name="Path 200" d="M15.882 0H5.895A5.9 5.9 0 000 5.895v9.988a5.9 5.9 0 005.895 5.895h9.988a5.9 5.9 0 005.895-5.895V5.895A5.9 5.9 0 0015.882 0zm-4.993 16.843a5.955 5.955 0 115.955-5.955 5.961 5.961 0 01-5.955 5.955zm6.1-10.5a1.76 1.76 0 111.76-1.76 1.761 1.761 0 01-1.763 1.755z"/>
                                                    <path data-name="Path 201" d="M10.891 6.211a4.678 4.678 0 104.678 4.678 4.683 4.683 0 00-4.678-4.678z"/>
                                                    <path data-name="Path 202" d="M16.986 4.095a.483.483 0 10.483.483.483.483 0 00-.483-.483z"/>
                                                </svg>
                                            </a>
                                        </li>

                                    <?php endif; ?>
                                </ul>

                            </div>
                        </div>

                    </div>

                </div>

                <div class="uk-container uk-container-expand gak-padding-top gak-mobile-padding gak-second-facility-menu">

                    <div class="gak-nav-height" uk-grid>

                        <div class="gak-site-logo-container">

                        <?php $parentPageId = wp_get_post_parent_id( $post_ID ); ?>

                        <a href="<?php wps_parent_post(); ?>" class="gak-site-logo gak-site-logo-special" title="Strona główna <?php echo get_field('nazwa_stacji', $parentPageId) ?>">


                        <?php $post_object = get_field('nazwa_stacji', $parentPageId);
                                if( $parentPageId ): ?>

                            <img class="gak-img-<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $parentPageId)));?>" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/full_logo/<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $parentPageId)));?>-full-logo.svg" alt="Logo <?php echo get_field('nazwa_stacji', $parentPageId) ?>" title="Logo <?php echo get_field('nazwa_stacji', $parentPageId) ?>" />

                        <?php endif; ?>

                        </a>

                        <div class="gak-menu-box" uk-toggle="target: #my-id2">

                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="17" viewBox="0 0 35 17">
                                <path fill="#fff"
                                    d="M.858 10.33V6.89H34.8v3.44zM6.083 3.96V.517h23.5v3.441zM6.083 16.702V13.26h23.5v3.442z" />
                            </svg>
                            <p>MENU</p>

                        </div>

                        </div>

                        <div class="uk-width-expand gak-nav-main-container gak-main-menu-facility">

                            <nav class="gak-facility-menu" aria-label="Nawigacja placówki">

                                <!-- <h1>
                                <?php echo $facilityName ?>
                                </h1> -->

                                <?php $parentPageId = wp_get_post_parent_id( $post_ID ); ?>
                                <?php $facilityName = get_field('nazwa_stacji', $parentPageId); ?>

                                <?php if($facilityName == 'Stacja Orunia') {
                                    wp_nav_menu( array( 'theme_location' => 'facility-orunia' ) );
                                } else if ($facilityName == 'Plama') {
                                    wp_nav_menu( array( 'theme_location' => 'facility-plama' ) );
                                } else if ($facilityName == 'Dom Sztuki') {
                                    wp_nav_menu( array( 'theme_location' => 'facility-dom-sztuki' ) );
                                } else if ($facilityName == 'Projektornia') {
                                    wp_nav_menu( array( 'theme_location' => 'facility-projektornia' ) );
                                } else if ($facilityName == 'Scena Muzyczna') {
                                    wp_nav_menu( array( 'theme_location' => 'facility-scena-muzyczna' ) );
                                } else if ($facilityName == 'Teatr GAK') {
                                    wp_nav_menu( array( 'theme_location' => 'facility-teatr-gak' ) );
                                } else if ($facilityName == 'Gama') {
                                    wp_nav_menu( array( 'theme_location' => 'facility-gama' ) );
                                } else if ($facilityName == 'Winda') {
                                    wp_nav_menu( array( 'theme_location' => 'facility-winda' ) );
                                } else if ($facilityName == 'Zespół Pieśni i Tańca Gdańsk') {
                                    wp_nav_menu( array( 'theme_location' => 'facility-zespol-piesni-i-tanca-gdansk' ) );
                                } else if ($facilityName == 'Gdańskie Lodowisko') {
                                    wp_nav_menu( array( 'theme_location' => 'facility-gdanskie-lodowisko' ) );
                                } else if ($facilityName == 'Wyspa Skarbów') {
                                    wp_nav_menu( array( 'theme_location' => 'facility-wyspa-skarbow' ) );
                                } else if ($facilityName == 'Mobilny Dom Kultury') {
                                    wp_nav_menu( array( 'theme_location' => 'facility-mobilny-dom-kultury' ) );
                                }

                                ?>


                            </nav>

                            <div class="gak-nav-right">

                            <?php if( get_field('link_do_kup_teraz', $parentPageId) ): ?>
                            <a title="Kup bilet <?php echo get_field('nazwa_stacji', $post_object->ID) ?>" class="gak-buy-tickets" href="<?php the_field('link_do_kup_teraz', $parentPageId); ?>">KUP BILET</a>
                            <?php endif; ?>


                            <ul class="gak-soc-ul">

                                <?php if( get_field('facebook_link_stacja', $parentPageId) ): ?>
                                <li>
                                    <a href="<?php the_field('facebook_link_stacja', $parentPageId); ?>" title="facebook <?php echo get_field('nazwa_stacji', $parentPageId) ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9.851" height="19.7" fill="#fff">
                                            <path data-name="Path 203" d="M8.053 3.271h1.8V.139A23.229 23.229 0 007.231 0C4.638 0 2.862 1.631 2.862 4.629v2.759H.001v3.5h2.861V19.7H6.37v-8.81h2.741l.436-3.5H6.365V4.976c0-1.012.273-1.7 1.684-1.7z"/>
                                        </svg>
                                    </a>
                                </li>
                                <?php endif; ?>

                                <?php if( get_field('instagram_link_stacja', $parentPageId) ): ?>
                                <li>
                                    <a href="<?php the_field('instagram_link_stacja', $parentPageId); ?>" title="instagram <?php echo get_field('nazwa_stacji', $parentPageId) ?>">
                                    <svg data-name="Group 73" xmlns="http://www.w3.org/2000/svg" width="21.777" height="21.777" fill="#fff">
                                            <path data-name="Path 200" d="M15.882 0H5.895A5.9 5.9 0 000 5.895v9.988a5.9 5.9 0 005.895 5.895h9.988a5.9 5.9 0 005.895-5.895V5.895A5.9 5.9 0 0015.882 0zm-4.993 16.843a5.955 5.955 0 115.955-5.955 5.961 5.961 0 01-5.955 5.955zm6.1-10.5a1.76 1.76 0 111.76-1.76 1.761 1.761 0 01-1.763 1.755z"/>
                                            <path data-name="Path 201" d="M10.891 6.211a4.678 4.678 0 104.678 4.678 4.683 4.683 0 00-4.678-4.678z"/>
                                            <path data-name="Path 202" d="M16.986 4.095a.483.483 0 10.483.483.483.483 0 00-.483-.483z"/>
                                        </svg>
                                    </a>
                                </li>

                                <?php endif; ?>
                            </ul>

                            </div>

                        </div>

                    </div>

                </div>


            </header>

        </div>

    <?php elseif (get_field('szablon') == 'szablon2') : ?>

        <header class="gak-not-main gak-facility-header cd-auto-hide-header">

            <div class="uk-container uk-container-expand gak-padding-top gak-mobile-padding gak-border-bottom gak-first-facility-menu">

                <div class="gak-nav-height" uk-grid>

                    <div class="gak-site-logo-container">

                        <a href="<?php echo get_home_url(); ?>" class="gak-site-logo" title="Strona główna GAK">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gak-logo-big.svg" alt="Logo GAK" title="Logo GAK" />
                        </a>

                        <div class="gak-menu-box" uk-toggle="target: #my-id">

                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="17" viewBox="0 0 35 17">
                                <path fill="#fff"
                                    d="M.858 10.33V6.89H34.8v3.44zM6.083 3.96V.517h23.5v3.441zM6.083 16.702V13.26h23.5v3.442z" />
                            </svg>
                            <p>MENU</p>
                            
                        </div>

                    </div>

                    <div class="uk-width-expand gak-nav-main-container gak-main-menu-facility">
                        <nav class="gak-main-nav" aria-label="główna">

                            <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

                        </nav>

                        <div class="gak-nav-right">

                            <ul class="gak-soc-ul">

                                <?php if( get_field('facebook_link', 'option') ): ?>
                                    <li>
                                        <a href="<?php the_field('facebook_link', 'option'); ?>" title="facebook Gdański Archipelag Kultury">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9.851" height="19.7"><path data-name="Path 203" d="M8.053 3.271h1.8V.139A23.229 23.229 0 007.231 0C4.638 0 2.862 1.631 2.862 4.629v2.759H.001v3.5h2.861V19.7H6.37v-8.81h2.741l.436-3.5H6.365V4.976c0-1.012.273-1.7 1.684-1.7z"/></svg>
                                        </a>
                                    </li>

                                <?php endif; ?>

                                <?php if( get_field('instagram_link', 'option') ): ?>
                                    <li>
                                        <a href="<?php the_field('instagram_link', 'option'); ?>" title="instagram Gdański Archipelag Kultury">
                                        <svg data-name="Group 73" xmlns="http://www.w3.org/2000/svg" width="21.777" height="21.777"><path data-name="Path 200" d="M15.882 0H5.895A5.9 5.9 0 000 5.895v9.988a5.9 5.9 0 005.895 5.895h9.988a5.9 5.9 0 005.895-5.895V5.895A5.9 5.9 0 0015.882 0zm-4.993 16.843a5.955 5.955 0 115.955-5.955 5.961 5.961 0 01-5.955 5.955zm6.1-10.5a1.76 1.76 0 111.76-1.76 1.761 1.761 0 01-1.763 1.755z"/><path data-name="Path 201" d="M10.891 6.211a4.678 4.678 0 104.678 4.678 4.683 4.683 0 00-4.678-4.678z"/><path data-name="Path 202" d="M16.986 4.095a.483.483 0 10.483.483.483.483 0 00-.483-.483z"/></svg>
                                        </a>
                                    </li>

                                <?php endif; ?>
                            </ul>

                        </div>
                    </div>

                </div>

            </div>

            <div class="uk-container uk-container-expand gak-padding-top gak-mobile-padding gak-second-facility-menu">

                <div class="gak-nav-height" uk-grid>

                    <div class="gak-site-logo-container">

                    <?php $parentPageId = wp_get_post_parent_id( $post_ID ); ?>

                    <a href="<?php wps_parent_post(); ?>" class="gak-site-logo gak-site-logo-special" title="Strona główna <?php echo get_field('nazwa_stacji', $parentPageId) ?>">


                    <?php $post_object = get_field('nazwa_stacji', $parentPageId);
                            if( $parentPageId ): ?>

                        <img class="gak-img-<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $parentPageId)));?>" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/full_logo/<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $parentPageId)));?>-full-logo-black.svg" alt="Logo <?php echo get_field('nazwa_stacji', $parentPageId) ?>" title="Logo <?php echo get_field('nazwa_stacji', $parentPageId) ?>" />

                    <?php endif; ?>

                    </a>

                    <div class="gak-menu-box" uk-toggle="target: #my-id2">

                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="17" viewBox="0 0 35 17">
                            <path fill="#fff"
                                d="M.858 10.33V6.89H34.8v3.44zM6.083 3.96V.517h23.5v3.441zM6.083 16.702V13.26h23.5v3.442z" />
                        </svg>
                        <p>MENU</p>

                    </div>

                    </div>

                    <div class="uk-width-expand gak-nav-main-container gak-main-menu-facility">

                        <nav class="gak-facility-menu" aria-label="Nawigacja placówki">

                            <!-- <h1>
                            <?php echo $facilityName ?>
                            </h1> -->

                            <?php $parentPageId = wp_get_post_parent_id( $post_ID ); ?>
                            <?php $facilityName = get_field('nazwa_stacji', $parentPageId); ?>

                            <?php if($facilityName == 'Stacja Orunia') {
                                wp_nav_menu( array( 'theme_location' => 'facility-orunia' ) );
                            } else if ($facilityName == 'Plama') {
                                wp_nav_menu( array( 'theme_location' => 'facility-plama' ) );
                            } else if ($facilityName == 'Dom Sztuki') {
                                wp_nav_menu( array( 'theme_location' => 'facility-dom-sztuki' ) );
                            } else if ($facilityName == 'Projektornia') {
                                wp_nav_menu( array( 'theme_location' => 'facility-projektornia' ) );
                            } else if ($facilityName == 'Scena Muzyczna') {
                                wp_nav_menu( array( 'theme_location' => 'facility-scena-muzyczna' ) );
                            } else if ($facilityName == 'Teatr GAK') {
                                wp_nav_menu( array( 'theme_location' => 'facility-teatr-gak' ) );
                            } else if ($facilityName == 'Gama') {
                                wp_nav_menu( array( 'theme_location' => 'facility-gama' ) );
                            } else if ($facilityName == 'Winda') {
                                wp_nav_menu( array( 'theme_location' => 'facility-winda' ) );
                            } else if ($facilityName == 'Zespół Pieśni i Tańca Gdańsk') {
                                wp_nav_menu( array( 'theme_location' => 'facility-zespol-piesni-i-tanca-gdansk' ) );
                            } else if ($facilityName == 'Gdańskie Lodowisko') {
                                wp_nav_menu( array( 'theme_location' => 'facility-gdanskie-lodowisko' ) );
                            } else if ($facilityName == 'Wyspa Skarbów') {
                                wp_nav_menu( array( 'theme_location' => 'facility-wyspa-skarbow' ) );
                            } else if ($facilityName == 'Mobilny Dom Kultury') {
                                wp_nav_menu( array( 'theme_location' => 'facility-mobilny-dom-kultury' ) );
                            }

                            ?>


                        </nav>

                        <div class="gak-nav-right">

                        <?php if( get_field('link_do_kup_teraz', $parentPageId) ): ?>
                        <a title="Kup bilet <?php echo get_field('nazwa_stacji', $post_object->ID) ?>" class="gak-buy-tickets" href="<?php the_field('link_do_kup_teraz', $parentPageId); ?>">KUP BILET</a>
                        <?php endif; ?>


                        <ul class="gak-soc-ul">

                            <?php if( get_field('facebook_link_stacja', $parentPageId) ): ?>
                            <li>
                                <a href="<?php the_field('facebook_link_stacja', $parentPageId); ?>" title="facebook <?php echo get_field('nazwa_stacji', $parentPageId) ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="9.851" height="19.7" >
                                    <path data-name="Path 203" d="M8.053 3.271h1.8V.139A23.229 23.229 0 007.231 0C4.638 0 2.862 1.631 2.862 4.629v2.759H.001v3.5h2.861V19.7H6.37v-8.81h2.741l.436-3.5H6.365V4.976c0-1.012.273-1.7 1.684-1.7z"/>
                                </svg>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php if( get_field('instagram_link_stacja', $parentPageId) ): ?>
                            <li>
                                <a href="<?php the_field('instagram_link_stacja', $parentPageId); ?>" title="instagram <?php echo get_field('nazwa_stacji', $parentPageId) ?>">
                                <svg data-name="Group 73" xmlns="http://www.w3.org/2000/svg" width="21.777" height="21.777">
                                    <path data-name="Path 200" d="M15.882 0H5.895A5.9 5.9 0 000 5.895v9.988a5.9 5.9 0 005.895 5.895h9.988a5.9 5.9 0 005.895-5.895V5.895A5.9 5.9 0 0015.882 0zm-4.993 16.843a5.955 5.955 0 115.955-5.955 5.961 5.961 0 01-5.955 5.955zm6.1-10.5a1.76 1.76 0 111.76-1.76 1.761 1.761 0 01-1.763 1.755z"/>
                                    <path data-name="Path 201" d="M10.891 6.211a4.678 4.678 0 104.678 4.678 4.683 4.683 0 00-4.678-4.678z"/>
                                    <path data-name="Path 202" d="M16.986 4.095a.483.483 0 10.483.483.483.483 0 00-.483-.483z"/>
                                </svg>
                                </a>
                            </li>

                            <?php endif; ?>
                        </ul>

                        </div>

                    </div>

                </div>

            </div>

        </header>

<?php else: ?>

    <header class="gak-not-main gak-facility-header cd-auto-hide-header">

        <div class="uk-container uk-container-expand gak-padding-top gak-mobile-padding">

            <div class="gak-nav-height" uk-grid>

                <div class="gak-site-logo-container">

                    <a href="<?php echo get_home_url(); ?>" class="gak-site-logo" title="Strona główna GAK">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gak-logo-big.svg" alt="Logo GAK" title="Logo GAK" />
                    </a>

                    <div class="gak-menu-box" uk-toggle="target: #my-id">

                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="17" viewBox="0 0 35 17">
                            <path fill="#fff"
                                d="M.858 10.33V6.89H34.8v3.44zM6.083 3.96V.517h23.5v3.441zM6.083 16.702V13.26h23.5v3.442z" />
                        </svg>
                        <p>MENU</p>
                        
                    </div>
                </div>

                <div class="uk-width-expand gak-nav-main-container gak-main-menu-facility">
                    <nav class="gak-main-nav" aria-label="główna">

                        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

                    </nav>

                    <div class="gak-nav-right">

                        <ul class="gak-soc-ul">

                            <?php if( get_field('facebook_link', 'option') ): ?>
                                <li>
                                    <a href="<?php the_field('facebook_link', 'option'); ?>" title="facebook Gdański Archipelag Kultury">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9.851" height="19.7"><path data-name="Path 203" d="M8.053 3.271h1.8V.139A23.229 23.229 0 007.231 0C4.638 0 2.862 1.631 2.862 4.629v2.759H.001v3.5h2.861V19.7H6.37v-8.81h2.741l.436-3.5H6.365V4.976c0-1.012.273-1.7 1.684-1.7z"/></svg>
                                    </a>
                                </li>

                            <?php endif; ?>

                            <?php if( get_field('instagram_link', 'option') ): ?>
                                <li>
                                    <a href="<?php the_field('instagram_link', 'option'); ?>" title="instagram Gdański Archipelag Kultury">
                                    <svg data-name="Group 73" xmlns="http://www.w3.org/2000/svg" width="21.777" height="21.777"><path data-name="Path 200" d="M15.882 0H5.895A5.9 5.9 0 000 5.895v9.988a5.9 5.9 0 005.895 5.895h9.988a5.9 5.9 0 005.895-5.895V5.895A5.9 5.9 0 0015.882 0zm-4.993 16.843a5.955 5.955 0 115.955-5.955 5.961 5.961 0 01-5.955 5.955zm6.1-10.5a1.76 1.76 0 111.76-1.76 1.761 1.761 0 01-1.763 1.755z"/><path data-name="Path 201" d="M10.891 6.211a4.678 4.678 0 104.678 4.678 4.683 4.683 0 00-4.678-4.678z"/><path data-name="Path 202" d="M16.986 4.095a.483.483 0 10.483.483.483.483 0 00-.483-.483z"/></svg>
                                    </a>
                                </li>

                            <?php endif; ?>
                        </ul>

                    </div>
                </div>

            </div>

        </div>

        
    </header>

<?php endif; ?>
    
    <div id="my-id" uk-offcanvas="mode: push">
            <div class="uk-offcanvas-bar">

                <button class="uk-offcanvas-close" type="button" uk-close><span class="gak-hide">Zamknij</span></button>

                <a href="<?php echo get_home_url(); ?>" title="Strona główna GAK">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mobile-logo.svg" alt="Logo GAK" title="Logo GAK" />
                </a>

                <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

                <p class="gak-places-mobile">placówki</p>

                <ul class="gak-places-ul">
                    <?php

                        $args = array(
                            'post_type' => 'placowki',
                            'category_name' => 'placowka-kat',
                            'post_status' => 'publish',
                            'posts_per_page' => 14,
                            'orderby' => 'title',
                            'order' => 'ASC',
                        );
                        $loop = new WP_Query( $args );
                        
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <li class="menu-item ">
                                <a href="<?php echo get_permalink(); ?>">
                                <?php $post_object = get_field('uproszczone_logo');
                                        if( $post_object ): ?>
                                    <i class="icon <?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $post_object->ID)));?>" style="background: url(<?php echo get_field('uproszczone_logo', $post_object->ID); ?>)"></i>

                                <?php endif; ?>
                             
                                    <?php str_replace(' ', '', the_title_attribute());?>
                                </a>
                            </li>

                        <?php the_excerpt();  ?>
                        
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        
                    ?>
                </ul>

                <?php if( get_field('link_do_kup_teraz', $parentPageId) ): ?>
                    <a title="Kup bilet <?php echo get_field('nazwa_stacji', $post_object->ID) ?>" class="gak-buy-tickets" href="<?php the_field('link_do_kup_teraz', $parentPageId); ?>">KUP BILET</a>
                <?php endif; ?>


            </div>
    </div>

    <div id="my-id2" uk-offcanvas="mode: push">
            <div class="uk-offcanvas-bar">

                <button class="uk-offcanvas-close" type="button" uk-close><span class="gak-hide">Zamknij</span></button>

                <?php $parentPageId = wp_get_post_parent_id( $post_ID ); ?>

                <?php $post_object = get_field('nazwa_stacji', $parentPageId);
                        if( $parentPageId ): ?>
                    <a href="<?php wps_parent_post(); ?>" title="Strona główna <?php echo get_field('nazwa_stacji', $parentPageId) ?>">
                        <img class="gak-img-<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $parentPageId)));?> gak-mobile-menu-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/full_logo/<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $parentPageId)));?>-full-logo.svg" alt="Logo <?php echo get_field('nazwa_stacji', $parentPageId) ?>" title="Logo <?php echo get_field('nazwa_stacji', $parentPageId) ?>" />
                </a>
                <?php endif; ?>

                <?php if($facilityName == 'Stacja Orunia') {
                       wp_nav_menu( array( 'theme_location' => 'facility-orunia' ) );
                } else if ($facilityName == 'Plama') {
                    wp_nav_menu( array( 'theme_location' => 'facility-plama' ) );
                } else if ($facilityName == 'Dom Sztuki') {
                    wp_nav_menu( array( 'theme_location' => 'facility-dom-sztuki' ) );
                } else if ($facilityName == 'Projektornia') {
                    wp_nav_menu( array( 'theme_location' => 'facility-projektornia' ) );
                } else if ($facilityName == 'Scena Muzyczna') {
                    wp_nav_menu( array( 'theme_location' => 'facility-scena-muzyczna' ) );
                } else if ($facilityName == 'Teatr GAK') {
                    wp_nav_menu( array( 'theme_location' => 'facility-teatr-gak' ) );
                } else if ($facilityName == 'Gama') {
                    wp_nav_menu( array( 'theme_location' => 'facility-gama' ) );
                } else if ($facilityName == 'Winda') {
                    wp_nav_menu( array( 'theme_location' => 'facility-winda' ) );
                } else if ($facilityName == 'Zespół Pieśni i Tańca Gdańsk') {
                    wp_nav_menu( array( 'theme_location' => 'facility-zespol-piesni-i-tanca-gdansk' ) );
                } else if ($facilityName == 'Gdańskie Lodowisko') {
                    wp_nav_menu( array( 'theme_location' => 'facility-gdanskie-lodowisko' ) );
                } else if ($facilityName == 'Wyspa Skarbów') {
                    wp_nav_menu( array( 'theme_location' => 'facility-wyspa-skarbow' ) );
                } else if ($facilityName == 'Mobilny Dom Kultury') {
                    wp_nav_menu( array( 'theme_location' => 'facility-mobilny-dom-kultury' ) );
                }
     
                ?>

                <div class="gak-white-separator"></div>

                <a class="gak-return" href="<?php echo get_home_url(); ?>" title="Strona główna GAK">Powrót do GAKu

                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mobile-logo.svg" alt="Logo GAK" title="Logo GAK" />

                </a>

                <div class="gak-white-separator"></div>

                <ul uk-accordion>
                    <li>
                    <a class="uk-accordion-title gak-places-mobile" href="#">pozostałe placówki</a>
                        <div class="uk-accordion-content">
                <ul class="gak-places-ul">
                    <?php

                        $args = array(
                            'post_type' => 'placowki',
                            'category_name' => 'placowka-kat',
                            'post_status' => 'publish',
                            'posts_per_page' => 14,
                            'orderby' => 'title',
                            'order' => 'ASC',
                        );
                        $loop = new WP_Query( $args );
                        
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <li class="menu-item ">
                                <a href="<?php echo get_permalink(); ?>">
                                <?php $post_object = get_field('uproszczone_logo');
                                        if( $post_object ): ?>
                                                <i class="icon <?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $post_object->ID)));?>" style="background: url(<?php echo get_field('uproszczone_logo', $post_object->ID); ?>)"></i>

                                <?php endif; ?>
                             
                                    <?php str_replace(' ', '', the_title_attribute());?>
                                </a>
                            </li>

                        <?php the_excerpt();  ?>
                        
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        
                    ?>
                </ul>
                        </div>
                    </li>
                </ul>

                <?php if( get_field('link_do_kup_teraz', $parentPageId) ): ?>
                    <a title="Kup bilet <?php echo get_field('nazwa_stacji', $post_object->ID) ?>" class="gak-buy-tickets" href="<?php the_field('link_do_kup_teraz', $parentPageId); ?>">KUP BILET</a>
                <?php endif; ?>


            </div>
    </div>

<?php else: ?>

    <?php
    if ( is_page_template( 'page-template-negative.php' ) ) {
        ?>

    <div class="gak-negative-facility">

    <header class="gak-not-main gak-black-header cd-auto-hide-header">

        <div class="uk-container uk-container-expand gak-padding-top gak-mobile-padding">

            <div class="gak-nav-height" uk-grid>

                <div class="gak-site-logo-container">

                    <a href="<?php echo get_home_url(); ?>" class="gak-site-logo" title="Strona główna GAK">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gak-logo-big-white.svg" alt="Logo GAK" title="Logo GAK" />
                    </a>

                    <div class="gak-menu-box" uk-toggle="target: #my-id">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="17" viewBox="0 0 35 17">
                            <path fill="#fff"
                                d="M.858 10.33V6.89H34.8v3.44zM6.083 3.96V.517h23.5v3.441zM6.083 16.702V13.26h23.5v3.442z" />
                        </svg>
                        <p>MENU</p>
                        
                    </div>

                </div>

                <div class="uk-width-expand gak-nav-main-container">
                    <nav class="gak-main-nav" aria-label="główna">
                    <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

                    </nav>


                    <div class="gak-nav-right">

                        <a class="" href="<?php echo get_permalink(268); ?>" title="Strona kalendarz wydarzeń">
                        <div class="gak-index">
                            <div>
                                    <span class="gak-small-calendar-box__link">___cały kalendarz</span>
                            </div>
                        </div>
                        </a>
                        
                        <ul class="gak-soc-ul">

                            <?php if( get_field('facebook_link', 'option') ): ?>
                            <li>
                                    <a href="<?php the_field('facebook_link', 'option'); ?>" title="facebook Gdański Archipelag Kultury">
                                <svg xmlns="http://www.w3.org/2000/svg" width="9.851" height="19.7" style="fill: rgb(255, 255, 255);">
                                    <path data-name="Path 203" d="M8.053 3.271h1.8V.139A23.229 23.229 0 007.231 0C4.638 0 2.862 1.631 2.862 4.629v2.759H.001v3.5h2.861V19.7H6.37v-8.81h2.741l.436-3.5H6.365V4.976c0-1.012.273-1.7 1.684-1.7z"/>
                                </svg>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php if( get_field('instagram_link', 'option') ): ?>
                            <li>
                                    <a href="<?php the_field('instagram_link', 'option'); ?>" title="instagram Gdański Archipelag Kultury">
                                <svg data-name="Group 73" xmlns="http://www.w3.org/2000/svg" width="21.777" height="21.777" style="fill: rgb(255, 255, 255);">
                                    <path data-name="Path 200" d="M15.882 0H5.895A5.9 5.9 0 000 5.895v9.988a5.9 5.9 0 005.895 5.895h9.988a5.9 5.9 0 005.895-5.895V5.895A5.9 5.9 0 0015.882 0zm-4.993 16.843a5.955 5.955 0 115.955-5.955 5.961 5.961 0 01-5.955 5.955zm6.1-10.5a1.76 1.76 0 111.76-1.76 1.761 1.761 0 01-1.763 1.755z"/>
                                    <path data-name="Path 201" d="M10.891 6.211a4.678 4.678 0 104.678 4.678 4.683 4.683 0 00-4.678-4.678z"/>
                                    <path data-name="Path 202" d="M16.986 4.095a.483.483 0 10.483.483.483.483 0 00-.483-.483z"/>
                                </svg>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                        
                    </div>
                </div>

            </div>

        </div>

    </header>

    </div>

    <div id="my-id" uk-offcanvas="mode: push">
            <div class="uk-offcanvas-bar">

                <button class="uk-offcanvas-close" type="button" uk-close><span class="gak-hide">Zamknij</span></button>

                <a href="<?php echo get_home_url(); ?>" title="Strona główna GAK">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mobile-logo.svg" alt="Logo GAK" title="Logo GAK" />
                </a>

                <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

                <p class="gak-places-mobile">placówki</p>

                <ul class="gak-places-ul">
                    <?php

                        $args = array(
                            'post_type' => 'placowki',
                            'category_name' => 'placowka-kat',
                            'post_status' => 'publish',
                            'posts_per_page' => 14,
                            'orderby' => 'title',
                            'order' => 'ASC',
                        );
                        $loop = new WP_Query( $args );
                        
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <li class="menu-item ">
                                <a href="<?php echo get_permalink(); ?>">
                                <?php $post_object = get_field('uproszczone_logo');
                                        if( $post_object ): ?>
                                    <i class="icon <?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $post_object->ID)));?>" style="background: url(<?php echo get_field('uproszczone_logo', $post_object->ID); ?>)"></i>

                                <?php endif; ?>
                             
                                    <?php str_replace(' ', '', the_title_attribute());?>
                                </a>
                            </li>

                        <?php the_excerpt();  ?>
                        
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        
                    ?>
                </ul>

                <?php if( get_field('link_do_kup_teraz', $parentPageId) ): ?>
                    <a title="Kup bilet <?php echo get_field('nazwa_stacji', $post_object->ID) ?>" class="gak-buy-tickets" href="<?php the_field('link_do_kup_teraz', $parentPageId); ?>">KUP BILET</a>
                <?php endif; ?>

            </div>
    </div>

    <?php
    } else { ?>
    
    <header class="gak-not-main cd-auto-hide-header">

    <div class="uk-container uk-container-expand gak-padding-top gak-mobile-padding">

        <div class="gak-nav-height" uk-grid>

            <div class="gak-site-logo-container">

                    <a href="<?php echo get_home_url(); ?>" class="gak-site-logo" title="Strona główna GAK">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gak-logo-big.svg" alt="Logo GAK" title="Logo GAK" />
                </a>

                <div class="gak-menu-box" uk-toggle="target: #my-id">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="17" viewBox="0 0 35 17">
                        <path fill="#fff"
                            d="M.858 10.33V6.89H34.8v3.44zM6.083 3.96V.517h23.5v3.441zM6.083 16.702V13.26h23.5v3.442z" />
                    </svg>
                    <p>MENU</p>
                    
                </div>

            </div>

            <div class="uk-width-expand gak-nav-main-container">
                <nav class="gak-main-nav" aria-label="główna">

                <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

                </nav>

                <div class="gak-nav-right">

                    <a class="" href="<?php get_permalink()?>kalendarz-wydarzen" title="Strona kalendarz wydarzeń">
                    <div class="gak-index">

                        <div>
                                    <img class="gak-calendar-icon gak-calendar-icon__main" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/calendar-icon.png" alt="Ikona kalendarza" title="Ikona kalendarza" />
                                        <span class="gak-small-calendar-box__link" >___kalendarz wydarzeń</span>
                        </div>

                    </div>
                        </a>

                    <ul class="gak-soc-ul">

                            <?php if( get_field('facebook_link', 'option') ): ?>
                            <li>
                                    <a href="<?php the_field('facebook_link', 'option'); ?>" title="facebook Gdański Archipelag Kultury">
                                <svg xmlns="http://www.w3.org/2000/svg" width="9.851" height="19.7"><path data-name="Path 203" d="M8.053 3.271h1.8V.139A23.229 23.229 0 007.231 0C4.638 0 2.862 1.631 2.862 4.629v2.759H.001v3.5h2.861V19.7H6.37v-8.81h2.741l.436-3.5H6.365V4.976c0-1.012.273-1.7 1.684-1.7z"/></svg>
                                </a>
                            </li>
                            <?php endif; ?>
                            
                            <?php if( get_field('instagram_link', 'option') ): ?>
                            <li>
                                    <a href="<?php the_field('instagram_link', 'option'); ?>" title="instagram Gdański Archipelag Kultury">
                                <svg data-name="Group 73" xmlns="http://www.w3.org/2000/svg" width="21.777" height="21.777"><path data-name="Path 200" d="M15.882 0H5.895A5.9 5.9 0 000 5.895v9.988a5.9 5.9 0 005.895 5.895h9.988a5.9 5.9 0 005.895-5.895V5.895A5.9 5.9 0 0015.882 0zm-4.993 16.843a5.955 5.955 0 115.955-5.955 5.961 5.961 0 01-5.955 5.955zm6.1-10.5a1.76 1.76 0 111.76-1.76 1.761 1.761 0 01-1.763 1.755z"/><path data-name="Path 201" d="M10.891 6.211a4.678 4.678 0 104.678 4.678 4.683 4.683 0 00-4.678-4.678z"/><path data-name="Path 202" d="M16.986 4.095a.483.483 0 10.483.483.483.483 0 00-.483-.483z"/></svg>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>

                                   <?php if( get_field('link_do_kup_teraz', $parentPageId) ): ?>
                    <a title="Kup bilet <?php echo get_field('nazwa_stacji', $post_object->ID) ?>" class="gak-buy-tickets" href="<?php the_field('link_do_kup_teraz', $parentPageId); ?>">KUP BILET</a>
                <?php endif; ?>
                </div>
            </div>

        </div>

    </div>

    </header>

    <div id="my-id" uk-offcanvas="mode: push">
            <div class="uk-offcanvas-bar">

                <button class="uk-offcanvas-close" type="button" uk-close><span class="gak-hide">Zamknij</span></button>

                <a href="<?php echo get_home_url(); ?>" title="Strona główna GAK">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mobile-logo.svg" alt="Logo GAK" title="Logo GAK" />
                </a>

                <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

                <p class="gak-places-mobile">placówki</p>

                <ul class="gak-places-ul">
                    <?php

                        $args = array(
                            'post_type' => 'placowki',
                            'category_name' => 'placowka-kat',
                            'post_status' => 'publish',
                            'posts_per_page' => 14,
                            'orderby' => 'title',
                            'order' => 'ASC',
                        );
                        $loop = new WP_Query( $args );
                        
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <li class="menu-item ">
                                <a href="<?php echo get_permalink(); ?>">
                                <?php $post_object = get_field('uproszczone_logo');
                                        if( $post_object ): ?>
                                    <i class="icon <?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $post_object->ID)));?>" style="background: url(<?php echo get_field('uproszczone_logo', $post_object->ID); ?>)"></i>

                                <?php endif; ?>
                            
                                    <?php str_replace(' ', '', the_title_attribute());?>
                                </a>
                            </li>

                        <?php the_excerpt();  ?>
                        
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        
                    ?>
                </ul>

                <?php if( get_field('link_do_kup_teraz', $parentPageId) ): ?>
                    <a title="Kup bilet <?php echo get_field('nazwa_stacji', $post_object->ID) ?>" class="gak-buy-tickets" href="<?php the_field('link_do_kup_teraz', $parentPageId); ?>">KUP BILET</a>
                <?php endif; ?>

            </div>
    </div>

    <?php
    }

    ?>

<?php endif; ?>

<?php
        if ( is_singular('placowki') && is_single( array( 'Gdańskie Lodowisko', 'Gama',
        'Projektornia', 'Scena Muzyczna', 'Teatr GAK', 'Winda', 'Wyspa Skarbów', 'Zespół Pieśni i Tańca Gdańsk',
        'Plama', 'Stacja Orunia', 'Dom Sztuki', 'Mobilny Dom Kultury') )) {

        } elseif ( is_singular('placowki') && is_single()) {
            ?> 
            <h1 class="gak-sr-only"><?php echo get_the_title() . ' ' . $parent_title?></h1>
            <?php
        } elseif (is_single()) {
            ?> 
            <h1 class="gak-sr-only"><?php echo get_the_title() . ' GAK'?></h1>
            <?php
        } elseif (is_front_page()) {
            ?> 
            <h1 class="gak-sr-only"><?php  echo 'Gdański Archipelag Kultury' ?></h1>
            <?php
        } else {
            ?> 
            <h1 class="gak-sr-only"><?php  echo get_the_title() . ' GAK' ?></h1>
            <?php
        }
    ?>