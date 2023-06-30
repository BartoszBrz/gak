<?php get_header(); ?>


<main class="gak-patter-bg-top">
    <div class="gak-event-header gak-event-header--padding" style="background: url(<?php the_field('obrazek_baner_glowny') ?>) no-repeat top center fixed, #100d08;">
    <div class="gak-category-box">
        <?php
                $posttags = get_the_tags();

                        if ($posttags) {

                          

                                foreach($posttags as $tag) {?>

                                        <div class="gak-event-category gak-event-category--<?php echo $tag->name . ''; ?>">

                                                <span>
                                                    <?php echo $tag->name . ''; ?>
                                                </span>

                                        </div>


                                <?php

                        }
                    }

            ?>
    </div>
        <div class="uk-container">

            <h1 class="gak-event-header__text"><?php the_title(); ?></h1>

                <ol class="gak-event-details" uk-grid>

                    <li class="gak-event-details__element">

                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/full_logo/<?php foreach(get_the_category() as $category) { echo strtolower(str_replace(' ', '', $category->cat_name)); } ?>-full-logo.svg" alt="" title="" />

                    </li>

                    <?php $date = get_field('data_wydarzenia_poczatek'); ?>

                    <?php $dayOfWeek  = date_i18n("l", strtotime($date)); ?>
                    <?php $dateFull = date_i18n("d.m.y", strtotime($date)); ?>

                    <li class="gak-event-details__element">
                        <p>data</p>
                        <p class="uk-text-capitalize"><?php echo $dateFull ?> <br> <?php echo $dayOfWeek ?></p>
                    </li>

                    <li class="gak-event-details__element">
                        <p>godzina</p>
                        <p><?php the_field('godzina_wydarzenia'); ?></p>
                    </li>

                    <?php if( get_field('wstep_na_wydarzenie') ): ?>
                        
                        <div class="gak-event-details__element">

                            <p>wstęp</p>
                            <p><?php the_field('wstep_na_wydarzenie'); ?></p>

                        </div>
                    <?php endif; ?>    

                    <li class="gak-event-details__element">
                        <p>adres</p>
                        <p><?php the_field('adres_wydarzenia'); ?></p>
                    </li>

                    <?php $terms  = wp_get_post_terms( $post->ID, 'dla_kogo' );

                    if ($terms) : ?>
                    <li class="gak-event-details__element">

                        <p>dla kogo?</p>
                        <p>
                                            <?php $count = count($terms); ?>
                                            <?php foreach($terms as $i => $term): ?>
                                                        <?php echo $term->name; ?>
                                                    
                                                    <?php if ($i < $count - 1) echo ", "; ?>
                                            <?php endforeach; ?>
                            

                            </p>
                        
                        </li>
                        <?php endif; ?>
                </ol>

            </div>

        </div>

    </div>

    <div class="gak-event-single">
        <div class="gak-breadcrumbs gak-breadcrumbs-padding">

        <div class="uk-container uk-container-expand-left gak-breadcrumbs-events">

            <div class="gak-breadcrumb-container">
                <ul class="gak-breadcrumb">
                    <li><a href="javascript:history.go(-1)" class="gak-breadcrumb-back">___wstecz</a></li>
                </ul>
            </div>
        
            <div class="gak-transport">

                    <?php while ( have_rows('mapa_google') ) : the_row(); ?>
                        <?php $howToGetThere = get_sub_field('lokalizacja'); ?>
                        <h2 class="gak-transport__text">jak dojechać?</h2>
                        <ul class="gak-transport__ul">
                            <li class="bus">
                                <a title="Komunikacją miejską" href="http://trojmiasto.jakdojade.pl/?fn=SKAD_JEDZIESZ&amp;tn=<?php foreach(get_the_category() as $category) { echo $category->cat_name; }?>&amp;tc=<?php echo $howToGetThere['lat']; ?>:<?php echo $howToGetThere['lng']; ?>&amp;ia=true"></a>
                            </li>
                            <li class="car">
                                <a title="Samochodem" href="https://maps.google.com/maps?directionsmode=driving&amp;dirflg=d&amp;daddr=<?php echo $howToGetThere['lat']; ?>+<?php echo $howToGetThere['lng']; ?>8&amp;hl=pl" "="""
                                ></a>
                            </li>
                            <li class="bike">
                                <a title="Pieszo lub rowerem" href="https://maps.google.com/maps?directionsmode=bicycling&amp;dirflg=b&amp;daddr=<?php echo $howToGetThere['lat']; ?>+<?php echo $howToGetThere['lng']; ?>&amp;hl=pl" "="""
                                ></a>
                            </li>

                        </ul>

                    <?php endwhile; ?>
                    
    
            </div>
        </div>

    </div>



    <div class="uk-container">

        <div class="gak-event-grid uk-grid-large uk-margin-large-top" uk-grid>

            <div class="uk-width-expand">

                <div class="gak-event-editable">

                <img class="gak-hidden-sharing" src="<?php the_field('obrazek_baner_glowny') ?>" alt="" title="" />

                <?php the_content(); ?>

                    <div class="gak-event-extra-info">
                        —

                        <?php $extraInfo = get_field('dodatkowe_informacje');?>
                        <?php if( $extraInfo ): ?>
                            <?php echo $extraInfo ?>
                        <?php endif; ?>

                    </div>


                    <?php $fullInfo = get_field('caly_opis');?>
                    <?php if( $fullInfo ): ?>
                    <ul class="uk-margin-large-bottom" uk-accordion>

                        <li>
                            <a class="uk-accordion-title gak-small-calendar-box__link gak-bottom-arrow" href="#">___pokaż cały opis</a>
                            <div class="uk-accordion-content">
                      
                            <?php echo $fullInfo ?>
                            </div>
                        </li>
                        
                    </ul>
                    <?php endif; ?>

                </div>

                <div class="gak-article-gallery gak-article-gallery-margin uk-margin-medium-top">

                        <?php 
                        $images = get_field('galeria_aktualnosci');

                    

                        if( $images ): ?>

                        <div class="gak-article-gallery">

                            <h2 class="gak-article-gallery__title">Galeria:</h2>

                            <div class="uk-position-relative uk-light" tabindex="-1" uk-slider>

                                <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-child-width-1-5@l uk-grid" uk-lightbox="animation: fade">
                                    <?php foreach( $images as $image ): ?>
                                        <li>
                                            <a class="uk-inline" href="<?php echo esc_url($image['url']); ?>" title="<?php echo esc_attr($image['alt']); ?>" data-alt="<?php echo esc_attr($image['alt']); ?>">
                                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                            </a>
                                
                                        </li>
                                    <?php endforeach; ?>
                                </ul>


                            </div>   

                        </div>    
                        <?php endif; ?>
                </div>

            </div>

            <aside class="gak-aside">
                <div class="gak-soc-share gak-soc-share__aside">
                    <h2>udostępnij na:</h2>

                    <div class="gak-share-links">
                    <a title="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" rel="nofollow">
                        <svg role="presentation" xmlns="http://www.w3.org/2000/svg" width="9.851" height="19.7"><path data-name="Path 203" d="M8.053 3.271h1.8V.139A23.229 23.229 0 007.231 0C4.638 0 2.862 1.631 2.862 4.629v2.759H.001v3.5h2.861V19.7H6.37v-8.81h2.741l.436-3.5H6.365V4.976c0-1.012.273-1.7 1.684-1.7z"></path></svg>
                            facebook
                        </a>
                        <a title="twitter" href="http://twitter.com/intent/tweet?text=Czytam obecnie <?php the_title(); ?>&url=<?php the_permalink(); ?>" rel="noopener noreferrer">
                                                                        <svg role="presentation" class="gak-tw" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21.534 7.113A9.822 9.822 0 0024 4.559v-.001c-.893.391-1.843.651-2.835.777a4.894 4.894 0 002.165-2.719 9.845 9.845 0 01-3.12 1.191 4.919 4.919 0 00-8.511 3.364c0 .39.033.765.114 1.122-4.09-.2-7.71-2.16-10.142-5.147a4.962 4.962 0 00-.674 2.487c0 1.704.877 3.214 2.186 4.089A4.863 4.863 0 01.96 9.116v.054a4.943 4.943 0 003.942 4.835c-.401.11-.837.162-1.29.162-.315 0-.633-.018-.931-.084.637 1.948 2.447 3.381 4.597 3.428a9.89 9.89 0 01-6.101 2.098c-.403 0-.79-.018-1.177-.067a13.856 13.856 0 007.548 2.208c8.683 0 14.342-7.244 13.986-14.637z"/></svg>
                                                                                twitter
                                                                        </a>
                    </div>


                </div>
            </aside>
            

        </div>

    </div>

    </div>

    <?php if( have_rows('mapa_google') ): ?>
        <div>
            <div class="uk-container">
                <div class="">
                    <h2 class="gak-article-gallery__title">Mapa dojazdu:</h2>

                </div>
            </div>

            <div class="uk-container uk-container-expand uk-padding-remove">
                <div class="map_container">
        
                    <div class="acf-map">
                        <?php while ( have_rows('mapa_google') ) : the_row(); ?>
                        <?php $location = get_sub_field('lokalizacja'); ?>
                            <div class="marker"
                                 data-lat="<?php echo $location['lat']; ?>"
                                 data-lng="<?php echo $location['lng']; ?>"
                                 data-icon="<?php the_sub_field('marker') ?>"
                            >
                            <h4 style="color: #000; font-weight: bold; padding-bottom: 5px;font-size: 18px;font-family: Silka;"> <?php foreach(get_the_category() as $category) { echo $category->cat_name; } ?></h4>
                            <p style="font-family: Silka;"><?php the_title(); ?></p>
                            <p class="gak-map-<?php echo $tag->name . ''; ?>" style="color: #fff; font-weight: bold; padding: 5px; margin-top: 5px; font-family: Silka; display: block; max-width: 120px"><span style="font-weight: 300; font-size: 0.75rem;"><?php echo $tag->name . ''; ?></span></p>
                            </div>
                            
                        <?php endwhile; ?>
                    </div>

                </div>
            </div>


        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
