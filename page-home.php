<?php get_header(); ?>
<div class="gak-hide-slider-on-mobile" uk-slideshow="animation: fade; ratio: false; autoplay: false; autoplay-interval: 5000; pause-on-hover: true" role="complementary" aria-label="Kalnedarz wydarzeń">

    <div class="gak-calendar-main gak-max-slider-height">

        <div class="uk-container uk-container-expand gak-pad-mobile">
    
            <div uk-grid>
                <aside class="uk-padding-remove" aria-label="Link do podstrony z nadchodzącymi wydarzeniami">    
                    <a class="gak-index-link" href="<?php echo get_permalink(268); ?>" title="Kalendarz wydarzeń">
                        <div class="gak-index uk-padding-remove">
                            <h2 class="gak-small-calendar-box__title">Nadchodzące wydarzenia:</h2>
                            <div class="gak-center-calendar">
                            <img class="gak-calendar-icon  gak-calendar-icon-black" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/calendar-icon.png" alt="Ikona kalendarza" title="Ikona kalendarza" />
                            <img class="gak-calendar-icon gak-calendar-icon-white" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/calendar-icon-white.png" alt="Ikona kalendarza biała" title="Ikona kalendarza biała" />
                                    <span class="gak-small-calendar-box__link">___cały kalendarz</span>
                            </div>
                        </div>
                    </a>
                </aside>
    

                <div class="uk-width-expand gak-calendar-line-right" uk-slider="finite: true;">
    
                    <div uk-grid class="uk-thumbnav uk-slider-items uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-3@m uk-child-width-1-4@l uk-child-width-1-4@xl">

                        <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 80,
                        );

                        $post_query = new WP_Query($args);

                        if ($post_query->have_posts()) {

                            $counter = -1;

                            while ($post_query->have_posts()) {

                                $post_query->the_post();
                                ?>

                                                    <?php

                                                    if (get_field('wyswietlanie_na_stronie_glownej') == 'tak') {


                                                        $date_start = get_field('data_wydarzenia_poczatek');
                                                        $date_end = get_field('data_wydarzenia_koniec');
                                                        $dateToday = date("d-m-Y");

                                                        $dateTimestampStart = strtotime($date_start);
                                                        $dateTimestampToday = strtotime($dateToday);
                                                        $dateTimestampEnd = strtotime($date_end);

                                                        ?>

                                                            <?php if (!in_category('Aktualność')) { ?>

                                                                    <?php
                                                                    if (($dateTimestampStart >= $dateTimestampToday) || ($dateTimestampEnd >= $dateTimestampToday)) {
                                                                        ?>  

                                                                        <?php $counter++; ?>  

                                                                            <div uk-slideshow-item="<?php echo $counter; ?>" class="gak-event-min">

                                                                                <a href="#" title="<?php echo get_the_title() ?>">
                                                                                        <div class="gak-event-interval">
                                                                                        <p class="gak-event-min__date">
                                                
                                                                                        <?php
                                                                                        if (in_category('Aktualność')) {

                                                                                            $date_start_ts = get_the_date('U');
                                                                                            $date_end = null;

                                                                                        } else {

                                                                                            $date_start = get_field('data_wydarzenia_poczatek');
                                                                                            $date_start_ts = strtotime($date_start);
                                                                                            $date_end = get_field('data_wydarzenia_koniec');
                                                                                            $date_end_ts = strtotime($date_end);

                                                                                        }
                                                                                        ?>
                                                                    
                                                                                            <span class="gak-date-number"><?php echo date_i18n("d", $date_start_ts) ?></span>
                                                                                            <span class="gak-white-line"></span>
                                                                
                                                                                            <?php echo date_i18n("F", $date_start_ts) ?>
                                                                                            </p>
                                                                                            <?php if (!empty($date_end) && $date_start_ts != $date_end_ts) { ?>
                                                                                                <span class="gak-date-separator-home">-</span>
                                                                                                <p class="gak-event-min__date gak-event-min-left">                                                             
                                                                                                    <span class="gak-date-number"><?php echo date_i18n("d", $date_end_ts) ?></span>
                                                                                                    <span class="gak-white-line"></span>
                                                                        
                                                                                                    <?php echo date_i18n("F", $date_end_ts) ?>
                                                                                                </p>
                                                                                            <?php } ?>
                                                                                            </div>
                                                                    
                                                                
                                                                                        <div class="uk-flex">
                                                                                        <?php
                                                                                        $posttags = get_the_tags();

                                                                                        if ($posttags) {

                                                                                            foreach ($posttags as $tag) {
                                                                                                ?>

                                                                                                            <span class="gak-event-min__category gak-event-min__category--<?php echo $tag->name . ' '; ?>">

                                                                                                                <?php echo $tag->name . ' '; ?>

                                                                                                            </span>

                                                                                                            <?php

                                                                                            }
                                                                                        }

                                                                                        ?>
                                                                                        </div>

                                                                                        <p class="gak-event-min__title">
                                                                                            <?php echo mb_strimwidth(get_the_title(), 0, 30, '...'); ?>
                                                                                        </p>
                                                                                    </a>

                                                        
                                                                            </div>

                                                                        <?php

                                                                    } ?>  


                                                    
                                                                    <?php

                                                            } else { ?>

                                                                <?php $counter++; ?>  

                                                                    <div uk-slideshow-item="<?php echo $counter; ?>" class="gak-event-min">
                                                                
                                                                            <a href="#" title="<?php echo get_the_title() ?>">
                                                                                    <div class="gak-event-interval">
                                                                                    <p class="gak-event-min__date">
                                                
                                                                                    <?php
                                                                                    if (in_category('Aktualność')) {

                                                                                        $date_start_ts = get_the_date('U');
                                                                                        $date_end = null;

                                                                                    } else {

                                                                                        $date_start = get_field('data_wydarzenia_poczatek');
                                                                                        $date_start_ts = strtotime($date_start);
                                                                                        $date_end = get_field('data_wydarzenia_koniec');
                                                                                        $date_end_ts = strtotime($date_end);

                                                                                    }
                                                                                    ?>
                                                                    
                                                                                        <span class="gak-date-number"><?php echo date_i18n("d", $date_start_ts) ?></span>
                                                                                        <span class="gak-white-line"></span>
                                                                
                                                                                        <?php echo date_i18n("F", $date_start_ts) ?>
                                                                                        </p>
                                                                                        <?php if (!empty($date_end) && $date_start_ts != $date_end_ts) { ?>
                                                                                            <span class="gak-date-separator-home">-</span>
                                                                                            <p class="gak-event-min__date gak-event-min-left">                                                             
                                                                                                <span class="gak-date-number"><?php echo date_i18n("d", $date_end_ts) ?></span>
                                                                                                <span class="gak-white-line"></span>
                                                                        
                                                                                                <?php echo date_i18n("F", $date_end_ts) ?>
                                                                                            </p>
                                                                                        <?php } ?>
                                                                                        </div>
                                                                    
                                                                
                                                                                    <div class="uk-flex">
                                                                                    <?php
                                                                                    $posttags = get_the_tags();

                                                                                    if ($posttags) {

                                                                                        foreach ($posttags as $tag) {
                                                                                            ?>

                                                                                                        <span class="gak-event-min__category gak-event-min__category--<?php echo $tag->name . ' '; ?>">

                                                                                                            <?php echo $tag->name . ' '; ?>

                                                                                                        </span>

                                                                                                        <?php

                                                                                        }
                                                                                    }

                                                                                    ?>
                                                                                    </div>

                                                                                    <p class="gak-event-min__title">
                                                                                        <?php echo mb_strimwidth(get_the_title(), 0, 30, '...'); ?>
                                                                                    </p>
                                                                                </a>
                                                                
                                                                    </div>

                                                                    <?php
                                                            }
                                                            ?>

                                                        <?php

                                                    }

                                                    ?>
                                            
                                                <?php
                            }

                        }

                        ?>
    
                    </div>
    
                </div>
            </div>
    
        </div>
    
    </div>
    
    <div class="uk-position-relative uk-container uk-container-expand uk-padding-remove gak-light-blue">

        <div id="container"></div>
    
        <div class="uk-position-relative uk-visible-toggle gak-uk-slideshow">
    
            <div class="uk-slideshow-items">

                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 80,
                );

                $post_query = new WP_Query($args);

                if ($post_query->have_posts()) {

                    $counter = -1;

                    while ($post_query->have_posts()) {

                        $post_query->the_post();
                        ?>
                                    
                                    <?php if (!in_category('Aktualność')): ?>

                                                        <?php

                                                        if (get_field('wyswietlanie_na_stronie_glownej') == 'tak') {
                                                            $counter++;
                                                            $date_start = get_field('data_wydarzenia_poczatek');
                                                            $date_end = get_field('data_wydarzenia_koniec');
                                                            $dateToday = date("d-m-Y");

                                                            $dateTimestampStart = strtotime($date_start);
                                                            $dateTimestampToday = strtotime($dateToday);
                                                            $dateTimestampEnd = strtotime($date_end);

                                                            ?>
                                            
                                                            <?php
                                                            if (($dateTimestampStart >= $dateTimestampToday) || ($dateTimestampEnd >= $dateTimestampToday)) {
                                                                ?>  

                                                                <div class="gak-calendar-slider">
                                                
                                                                    <div class="uk-grid-collapse" uk-grid>

                                                                        <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l uk-width-2-5@xl">

                                                                            <div class="gak-calendar-slider__text">
                                                                                <div class="gak-category-box">
                                                                                    <?php
                                                                                    $posttags = get_the_tags();

                                                                                    if ($posttags) {

                                                                                        foreach ($posttags as $tag) {
                                                                                            ?>

                                                                                                            <div class="gak-post-category gak-post-category--<?php echo $tag->name . ' '; ?>">
                                                                                                                <span>

                                                                                                                    <?php echo $tag->name . ' '; ?>

                                                                                                                </span>
                                                                                                            </div>

                                                                                                            <?php

                                                                                        }
                                                                                    }

                                                                                    ?>
                                                                                    </div>
                                                                                <div class="gak-text-content">

                                                                                    <div class="gak-text-content__date">

                                                                                        <div class="gak-date-box">

                                                                                        <?php
                                                                                        $date = get_field('data_wydarzenia_poczatek');
                                                                                        $dateDay = date_i18n("d", strtotime($date));
                                                                                        $dateMonth = date_i18n("F", strtotime($date));
                                                                                        $dateYear = date_i18n("Y", strtotime($date));
                                                                                        $dayOfWeek = date_i18n("l", strtotime($date));
                                                                                        $dateOver = get_field('data_wydarzenia_koniec');
                                                                                        ?>

                                                                                            <div class="gak-number-date">
                                                                                                <p><?php echo $dateDay ?></p>
                                                                                                <a class="gak-prev-arrow" href="#" uk-slideshow-item="previous" title="Poprzedni slajd">
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13.005 26">
                                                                                                    <path d="M0 13.005L12.995 0l.01 26z"/></svg>

                                                                                                </a>

                                                                                            </div>

                                                                                            <div class="gak-divider-black"></div>

                                                                                            <div class="gak-text-date">
                                                                            
                                                                                                <p class="gak-flex-date"><?php echo $dateMonth ?><span> <?php echo $dateYear ?></span></p>
                                                                                                <a class="gak-next-arrow" href="#" uk-slideshow-item="next" title="Następny slajd">
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13.025 26">
                                                                                                    <path d="M13.025 13.025L0 26 .05 0z"/></svg>
                                                                                                </a>

                                                                                            </div>

                                                                                        </div>

                                                                                        <div class="gak-event-details">
                                                                                            <p class="gak-event-details__title"><?php the_title(); ?></p>

                                                                                            <div class="gak-event-details-box">

                                                                                                <div class="gak-details">
                                                                                                    <p class="gak-details__header">organizator:</p>
                                                                                                    <p class="gak-details__value">
                                                                                                        <i class="icon icon-<?php foreach (get_the_category() as $category) {
                                                                                                            echo strtolower(str_replace(' ', '', $category->cat_name));
                                                                                                        } ?>"></i>
                                                                                                        <?php foreach (get_the_category() as $category) {
                                                                                                            echo $category->cat_name;
                                                                                                        } ?>
                                                                            
                                                                                                    </p>
                                                                                                </div>

                                                                                                <div class="gak-details gak-details-flex-3">
                                                                                                    <p class="gak-details__header">data:</p>
                                                                                                    <p class="gak-details__value"> <?php echo $dateDay ?>                     <?php echo $dateMonth ?> <br> (<?php echo $dayOfWeek ?>), godz. <?php the_field('godzina_wydarzenia'); ?></p>
                                                                                                </div>

                                                                                                <div class="gak-details gak-details-address">
                                                                                                    <p class="gak-details__header">adres:</p>
                                                                                                    <p class="gak-details__value"><?php the_field('adres_wydarzenia'); ?></p>
                                                                                                </div>

                                                                                            </div>

                                                                                        </div>

                                                                                        <div class="gak-flex-end">
                                                                                            <a class="gak-small-calendar-box__link gak-small-calendar-box__link--absolute gak-arrow-link"
                                                                                                href="<?php echo get_permalink(); ?>" title="Link do wydarzenia <?php the_title(); ?>">___czytaj więcej</a>
                                                                                        </div>

                                                                                    </div>

                                                                                </div>


                                                                            </div>

                                                                        </div>

                                                                        <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l uk-width-3-5@xl">

                                                                            <div class="gak-calendar-slider__img gak-institution_logo gak-institution-<?php foreach (get_the_category() as $category) {
                                                                                echo strtolower(str_replace(' ', '', $category->cat_name));
                                                                            } ?>">

                                                                            <?php
                                                                            $imageArray = get_field('zdjecie_wydarzenia');
                                                                            ?>
                                                
                                                                            <?php if (get_field('zdjecie_wydarzenia')): ?>
                                                                        
                                                            <img class="gak-calendar-slider__img" src="<?php echo esc_url($imageArray['url']); ?>" alt="<?php echo esc_attr($imageArray['alt']); ?>" title="" />
                                                         
                                                            
                                                            <?php endif; ?>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                <?php

                                                            } ?>  

                                                            <?php

                                                        }

                                                        ?>

                                                <?php else: ?>

                                                        <?php

                                                        if (get_field('wyswietlanie_na_stronie_glownej') == 'tak') {
                                                            $counter++;


                                                            ?>

                                                                <div class="gak-calendar-slider gak-calendar-slider-event">
                                                    
                                                                    <div class="uk-grid-collapse" uk-grid>

                                                                        <div class="uk-width-1-1">

                                                                            <div class="gak-calendar-slider__text">

                                                                                <?php
                                                                                $posttags = get_the_tags();

                                                                                if ($posttags) {

                                                                                    foreach ($posttags as $tag) {
                                                                                        ?>

                                                                                                        <div class="gak-post-category gak-post-category--<?php echo $tag->name . ' '; ?>">
                                                                                                            <span>

                                                                                                                <?php echo $tag->name . ' '; ?>

                                                                                                            </span>
                                                                                                        </div>

                                                                                                        <?php
                                                                                    }
                                                                                }
                                                                                ?>

                                                                                <div class="gak-event-white-box">

                                                                                    <p class="gak-event-details__title gak-event-details__title-white"><?php the_field('banner_aktualnosci', ''); ?></p>
                                                                    
                                                                                    <a class="gak-small-calendar-box__link gak-arrow-link" href="<?php echo get_permalink(); ?>" title="Link do akualności <?php the_field('banner_aktualnosci', ''); ?>">___czytaj więcej</a>
                                                                    
                                                                                </div>

                                                                                <?php if (get_field('grafika_banneru_aktualnosci')): ?>
                                                        
                                                                                        <img src="<?php the_field('grafika_banneru_aktualnosci'); ?>" class="gak-max-height" alt="Grafika akualności" title="Grafika akualności" />
                                                                    
                                                                                <?php endif; ?>
                                                                
                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                    

                                                            <?php

                                                        }

                                                        ?>

              
                                                <?php endif; ?>

                                    <?php
                    }
                }

                ?>
    
            </div>
    
        </div>
    
    </div>

</div>

<div class="gak-hide-slider-on-desktop">

    <div class="uk-container uk-container-expand uk-padding-remove">

            <h2 class="gak-eventsmobile-text">
                Nadchodzące wydarzenia:
            </h2>

        <ul class="gak-mobile-event-view">

   

            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 80,
            );

            $post_query = new WP_Query($args);

            if ($post_query->have_posts()) {

                $counter = -1;
                while ($post_query->have_posts()) {

                    $post_query->the_post();
                    ?>

                                            <?php
                                            if (get_field('wyswietlanie_na_stronie_glownej') == 'tak') {

                                                $date_start = get_field('data_wydarzenia_poczatek');
                                                $date_end = get_field('data_wydarzenia_koniec');
                                                $dateToday = date("d-m-Y");

                                                $dateTimestampStart = strtotime($date_start);
                                                $dateTimestampToday = strtotime($dateToday);
                                                $dateTimestampEnd = strtotime($date_end);


                                                ?>

                                    

                                                    <?php if (!in_category('Aktualność')): ?>

                                                            <?php
                                                            if (($dateTimestampStart >= $dateTimestampToday) || ($dateTimestampEnd >= $dateTimestampToday)) {
                                                                ?>  
                                                                <li class="gak-mobile-event-li">

                                                                    <a class="gak-mobile-event" href="<?php echo get_permalink(); ?>" title="Link do wpisu">

                                                                        <div class="gak-mobile-event__text-box">

                                                                        <?php
                                                                        $posttags = get_the_tags();

                                                                        if ($posttags) {

                                                                            foreach ($posttags as $tag) {
                                                                                ?>

                                                                                                                    <div class="gak-mobile-line gak-mobile-line gak-mobile-line--<?php echo $tag->name . ' '; ?>">
                                                                                                                        <span>

                                                                                                                            <?php echo $tag->name . ' '; ?>

                                                                                                                        </span>
                                                                                                                    </div>

                                                                                                                    <?php
                                                                            }
                                                                        }
                                                                        ?>

                                                                            <div class="gak-mobile-event-date">

                                                                                    <?php
                                                                                    $date = get_field('data_wydarzenia_poczatek');
                                                                                    $dateDay = date_i18n("d", strtotime($date));
                                                                                    $dateMonth = date_i18n("F", strtotime($date));
                                                                                    $dateYear = date_i18n("Y", strtotime($date));
                                                                                    $dayOfWeek = date_i18n("l", strtotime($date));
                                                                                    $dateOver = get_field('data_wydarzenia_koniec');
                                                                                    ?>

                                                                                <span class="gak-mobile-event-date__number">
                                                                                <?php echo $dateDay ?>
                                                                                </span>
                                                                                <div class="gak-mobile-event-date__details">
                                                                                    <p><?php echo $dateMonth ?></p>
                                                                                    <p><?php echo $dateYear ?></p>
                                                                
                                                                                </div>
                                                        
                                                                            </div>

                                                                            <p class="gak-mobile-event-text">
                                                                                <?php the_title(); ?>
                                                                            </p>
                                                                        </div>

                                                                        <?php if (!in_category('Aktualność')): ?>

                                                                                <?php
                                                                                $imageArray2 = get_field('zdjecie_wydarzenia');
                                                                                ?>
     
                                                                            <img class="gak-mobile-event__image" src="<?php echo esc_url($imageArray2['url']); ?>" alt="<?php echo esc_attr($imageArray2['alt']); ?>" title="" />

                                                                        <?php else: ?>
                                                                            <img class="gak-mobile-event__image" src="<?php the_post_thumbnail_url('im450'); ?>" alt="Grafika wydarzenia" title="Grafika wydarzenia">
                                                    
                                                                        <?php endif; ?>

                                                                    </a>

                                                                </li>

                                                                <?php

                                                            } ?>  

                                                    <?php else: ?>
                                                        <li class="gak-mobile-event-li">

                                                            <a class="gak-mobile-event" href="<?php echo get_permalink(); ?>" title="Link do wpisu">

                                                                <div class="gak-mobile-event__text-box">

                                                                <?php
                                                                $posttags = get_the_tags();

                                                                if ($posttags) {

                                                                    foreach ($posttags as $tag) {
                                                                        ?>

                                                                                                                <div class="gak-mobile-line gak-mobile-line gak-mobile-line--<?php echo $tag->name . ' '; ?>">
                                                                                                                    <span>

                                                                                                                        <?php echo $tag->name . ' '; ?>

                                                                                                                    </span>
                                                                                                                </div>

                                                                                                                <?php
                                                                    }
                                                                }
                                                                ?>

                                                                    <div class="gak-mobile-event-date">

                                                                            <?php
                                                                            $date = get_field('data_wydarzenia_poczatek');
                                                                            $dateDay = date_i18n("d", strtotime($date));
                                                                            $dateMonth = date_i18n("F", strtotime($date));
                                                                            $dateYear = date_i18n("Y", strtotime($date));
                                                                            $dayOfWeek = date_i18n("l", strtotime($date));
                                                                            $dateOver = get_field('data_wydarzenia_koniec');
                                                                            ?>

                                                                        <span class="gak-mobile-event-date__number">
                                                                        <?php echo $dateDay ?>
                                                                        </span>
                                                                        <div class="gak-mobile-event-date__details">
                                                                            <p><?php echo $dateMonth ?></p>
                                                                            <p><?php echo $dateYear ?></p>
                                                                
                                                                        </div>
                                                        
                                                                    </div>

                                                                    <p class="gak-mobile-event-text">
                                                                        <?php the_title(); ?>
                                                                    </p>
                                                                </div>

                                                                <?php if (!in_category('Aktualność')): ?>

                                                                            <?php
                                                                            $imageArray3 = get_field('zdjecie_wydarzenia');
                                                                            ?>
                                                                            <img class="gak-mobile-event__image" src="<?php echo esc_url($imageArray3['url']); ?>" alt="<?php echo esc_attr($imageArray3['alt']); ?>" title="" />
                                                                    <?php else: ?>
                                                                        <img class="gak-mobile-event__image" src="<?php the_post_thumbnail_url('im450'); ?>" alt="Grafika wydarzenia" title="Grafika wydarzenia">
                                                    
                                                                    <?php endif; ?>

                                                            </a>
                                                
                                                        </li>
                                                <?php endif; ?>



                                            <?php } ?>

                                            <?php

                }

                ?>

                                    <?php
            }

            ?>

        </ul>


        <a class="gak-index-link" href="<?php echo get_permalink(268); ?>" title="Kalendarz wydarzeń">    
            <div class="gak-index uk-padding-remove">
                            <p class="gak-small-calendar-box__title">Nadchodzące wydarzenia:</p>
                            <div class="gak-center-calendar">
                            <img class="gak-calendar-icon  gak-calendar-icon-black" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/calendar-icon.png" alt="Ikona kalendarza" title="Ikona kalendarza" />
                            <img class="gak-calendar-icon gak-calendar-icon-white" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/calendar-icon-white.png" alt="Ikona kalendarza biała" title="Ikona kalendarza biała" />
                                    <span class="gak-small-calendar-box__link">___cały kalendarz</span>
                            </div>
            </div>
        </a>

    </div>
</div>

<main>

    <section class="gak-light-blue">

        <div class="gak-new-events">

            <h2 class="gak-section-title"><i class="icon-logo"></i>Aktualności</h2>

            <div class="uk-container uk-container-expand uk-padding-remove">
                <div class="gak-news-grid">
                    <div class="uk-child-width-1-1 uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-2@l uk-child-width-1-3@xl" uk-grid>

                        <?php
                        $args = array(
                            'post_type' => 'post',
                            'category_name' => 'aktualnosc',
                            'posts_per_page' => 3,
                        );

                        $post_query = new WP_Query($args);

                        if ($post_query->have_posts()) {

                            $counter = 0;
                            while ($post_query->have_posts()) {
                                $counter++;
                                $post_query->the_post();
                                ?>
                                      <?php
                                      $image_id = get_post_thumbnail_id();
                                      $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                                      $image_title = get_the_title($image_id);
                                      ?>

                                    <div>
                                        <a class="gak-news-modal" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
                                            <div class="gak-news-card">

                                            <?php

                                            $thumbnail_id = get_post_thumbnail_id($post->ID);
                                            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

                                            ?>

                                                <img class="gak-news-card__img" src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo $alt ?>" title="<?php the_title(); ?>">  

                                        
                                                <div class="gak-news-card-box">
                                                    <p class="gak-news-card-box__date">_<?php echo get_the_date(''); ?></p>
                                                    <p class="gak-news-card-box__title"><?php the_title(); ?></p>
                                              
                                                        <?php if (has_excerpt()) {
                                                            ?>
                                                            <p class="gak-news-card-box__short"><?php the_excerpt(); ?> <span class="gak-arrow-footer-black"></span></p>

                                                            <?php
                                                        } else { ?>
                                                                <p class="gak-news-card-box__short"><?php $content = strip_tags(get_the_content());
                                                                echo mb_strimwidth($content, 0, 100, '...'); ?><span class="gak-arrow-footer-black"></span></p>
                                                                <?php
                                                        } ?>
                                                                                                                                     
                                                </div>

                                            </div>
                                        </a>


                                    </div>
                                    <?php
                            }
                        }

                        ?>

                    </div>
                </div>
            </div>

        </div>

    </section>

    <section class="gak-light-dark">

    <h2 class="uk-invisible uk-hidden">Gak - placówki</h2>

        <div class="uk-container uk-container-expand uk-padding-remove">

            <div class="gak-footer-logos-box" uk-grid>
    
                    <ul class="uk-width-1-1 uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l gak-grid">

                    <?php
                    $args = array(
                        'post_type' => 'placowki',
                        'category_name' => 'placowka-kat',
                        'post_status' => 'publish',
                        'posts_per_page' => 12,
                        'orderby' => 'title',
                        'order' => 'ASC'
                    );
                    $loop = new WP_Query($args);

                    $counter = 0;

                    while ($loop->have_posts()):
                        $loop->the_post(); ?>
                            <?php
                            $counter++; ?>

                                    <?php if ($counter == 1): ?>
     
                                            <!-- <li id="gak-counter-<?php echo $counter ?>" class="gak-center-it gak-place-box uk-active">
                                        <a href="#" title="Logo placówki GAK">
                                                        <?php if (get_field('uproszczone_logo')): ?>
                                                            
                                                            <img src="<?php the_field('uproszczone_logo'); ?>" class="gak-calendar-slider__img gak-visible" alt="Logo placówki GAK" title="Logo placówki GAK" />
                                                            
                                                        <?php endif; ?>

                                                        <?php if (get_field('uproszczone_logo_hover')): ?>
                                                            
                                                            <img src="<?php the_field('uproszczone_logo_hover'); ?>" class="gak-calendar-slider__img gak-hidden" alt="Czarne logo placówki GAK" title="Czarne logo placówki GAK" />
                                                            
                                                        <?php endif; ?>
        
                                        </a>
                                    </li> -->

                                            <li id="gak-counter-<?php echo $counter ?>" class="gak-center-it gak-place-box uk-active">
                                                <a href="<?php echo get_permalink(); ?>" title="Logo placówki <?php the_field('nazwa_stacji') ?>">
                                                                <?php if (get_field('uproszczone_logo')): ?>
                                                            
                                                                    <img src="<?php the_field('uproszczone_logo'); ?>" class="gak-calendar-slider__img gak-visible" alt="Logo placówki <?php the_field('nazwa_stacji') ?>" title="Logo placówki GAK" />
                                                            
                                                            <?php endif; ?>

                                                                <?php if (get_field('uproszczone_logo_hover')): ?>
                                                            
                                                                    <img src="<?php the_field('uproszczone_logo_hover'); ?>" class="gak-calendar-slider__img gak-hidden" alt="Czarne logo placówki <?php the_field('nazwa_stacji') ?>" title="Czarne logo placówki <?php the_field('nazwa_stacji') ?>" />
                                                            
                                                            <?php endif; ?>
        
                                                </a>
                                            </li>

                                        <?php else: ?>

                                            <li id="gak-counter-<?php echo $counter ?>" class="gak-center-it gak-place-box">
                                                <a href="<?php echo get_permalink(); ?>" title="Logo placówki <?php the_field('nazwa_stacji') ?>">
                                                                <?php if (get_field('uproszczone_logo')): ?>
                                                            
                                                                    <img src="<?php the_field('uproszczone_logo'); ?>" class="gak-calendar-slider__img gak-visible" alt="Logo placówki <?php the_field('nazwa_stacji') ?>" title="Logo placówki <?php the_field('nazwa_stacji') ?>" />
                                                            
                                                            <?php endif; ?>

                                                                <?php if (get_field('uproszczone_logo_hover')): ?>
                                                            
                                                                    <img src="<?php the_field('uproszczone_logo_hover'); ?>" class="gak-calendar-slider__img gak-hidden" alt="Czarne logo placówki <?php the_field('nazwa_stacji') ?>" title="Czarne logo placówki <?php the_field('nazwa_stacji') ?>" />
                                                            
                                                            <?php endif; ?>
        
                                                </a>
                                            </li>

                                        <?php endif; ?>                                                                       
                            <?php the_excerpt(); ?>
                            
                            <?php
                    endwhile;
                    wp_reset_postdata();

                    ?>

                    </ul>

                    <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l uk-switcher">

                        <?php

                        $args = array(
                            'post_type' => 'placowki',
                            'category_name' => 'placowka-kat',
                            'post_status' => 'publish',
                            'posts_per_page' => 12,
                            'orderby' => 'title',
                            'order' => 'ASC',
                        );
                        $loop = new WP_Query($args);
                        $counter2 = 0;
                        while ($loop->have_posts()):
                            $loop->the_post(); ?>
                            <?php $counter2++; ?>

                            <div class="<?php echo ($counter2 == 1 ? 'uk-active' : '') ?> gak-full-height gak-counter-<?php echo $counter2 ?>">

                                <div uk-grid class="gak-full-height uk-margin-remove-left">

                                    <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@m uk-width-2-3@l uk-width-3-5@xl uk-padding-remove-left">

                                        <div class="gak-place-padding">

                                            <div class="gak-place-info">

                                            <?php
                                            $post_object = get_field('dzielnica_stacji');

                                            if ($post_object): ?>

                                                                <a href="<?php echo get_permalink(); ?>" title="Link do podstrony placówki">
                                                                <img src="<?php the_field('pelne_logo'); ?>" class="gak-full-logo-small gak-special-<?php str_replace(' ', '', the_title_attribute()); ?>"
                                                                    alt="Logo placówki <?php the_field('nazwa_stacji') ?>" title="Logo placówki <?php the_field('nazwa_stacji') ?>" />
                                                                </a>

                                                            <?php else: ?>

                                                                <a href="<?php echo get_home_url(); ?>/misja" title="Link do podstrony misja">
                                                                <img src="<?php the_field('pelne_logo'); ?>" class="gak-full-logo-small gak-special-<?php str_replace(' ', '', the_title_attribute()); ?>"
                                                                    alt="Logo placówki <?php the_field('nazwa_stacji') ?>" title="Logo placówki <?php the_field('nazwa_stacji') ?>" />
                                                                </a>

                                                        <?php endif; ?>

                                            

                                                <div class="gak-place-info-box">                                                   
                                                    <?php
                                                    $post_object = get_field('dzielnica_stacji');

                                                    if ($post_object): ?>

                                                                <p>dzielnica:</p>
                                                                <p><?php the_field('dzielnica_stacji', $post_object->ID); ?></p>

                                                        <?php endif; ?>
                                                    
                                    
                                                </div>

                                            </div>

                                            <div class="gak-place-edit-text">

                                            <?php
                                            $post_object = get_field('opis_stacji');

                                            if ($post_object): ?>

                                                                <p><?php the_field('opis_stacji', $post_object->ID); ?></p>
                                    

                                                        <?php endif; ?>

                                            </div>



                                        </div>

                                    </div>

                                    <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@m uk-width-1-3@l uk-width-2-5@xl gak-padding-left gak-flex-center gak-overflow">
                                                        <img src="<?php the_field('uproszczone_logo'); ?>" class="gak-big-logo-img gak-<?php the_title_attribute(); ?>"
                                                        alt="Logo placówki <?php the_field('nazwa_stacji') ?>" title="Logo placówki">
                                    </div>

                                </div>

                            </div>

                            

                            <?php the_excerpt(); ?>
                                
                                <?php
                        endwhile;
                        wp_reset_postdata();

                        ?>
                
                    </div>

            </div>

            <div class="gak-footer-logos-box-mobile uk-margin-remove-top" uk-grid>
                <ul class="uk-width-1-1">

                <?php

                $args = array(
                    'post_type' => 'placowki',
                    'category_name' => 'placowka-kat',
                    'post_status' => 'publish',
                    'posts_per_page' => 12,
                    'orderby' => 'title',
                    'order' => 'ASC',
                );
                $loop = new WP_Query($args);

                while ($loop->have_posts()):
                    $loop->the_post(); ?>

                                <li class="gak-center-it gak-footer-logos-box-mobile-small">
                                <a href="<?php echo get_permalink(); ?>" title="Link do podstrony placówki">
                                                        <img src="<?php the_field('pelne_logo'); ?>" class="gak-full-logo-small gak-special-<?php str_replace(' ', '', the_title_attribute()); ?>"
                                                        alt="Logo placówki" title="Logo placówki" />
                                                        <span class="gak-arrow-footer-white"></span>
                                                    </a>
                                </li>
                        
                            <?php the_excerpt(); ?>
                        
                            <?php
                endwhile;
                wp_reset_postdata();

                ?>

                </ul>

            </div>

        </div>



    </section>

</main>

<?php get_footer(); ?>
