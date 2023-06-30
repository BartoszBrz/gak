<?php get_header(); ?>

<?php if( is_singular('placowki') && is_single( array( 'Gdańskie Lodowisko', 'Gama', 'Projektornia', 'Scena Muzyczna', 'Teatr GAK', 'Winda', 'Wyspa Skarbów', 'Zespół Pieśni i Tańca Gdańsk', 'Plama', 'Stacja Orunia', 'Dom Sztuki', 'Mobilny Dom Kultury') )): ?>
    
    <main>

            <div class="">

                <div class="uk-container uk-container-expand uk-container-expand-left uk-padding-remove uk-margin-bottom">

                            <div class="uk-grid-collapse" uk-grid>

                                <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-2@m">

                                    <div class="gak-facility-video">

                                        <div class="gak-facility-banner">

                                            <div>
                                                <i class="icon" style="background: url(<?php the_field('uproszczone_logo'); ?>)"></i>
                                                <?php $post_object = get_field('nazwa_stacji');
                                                if( $post_object ): ?>
                                                    <p><?php the_field('nazwa_stacji', $post_object->ID); ?></p>
                                                <?php endif; ?>
                                            </div>

                                        </div>

                                        <div class="gak-facility-video-box">

                                            <div id="bgfloating">

                                                <button class="gak-video-controls" id="gak-video-controls" aria-label="zatrzymaj film">

                                                <svg focusable="false" aria-hidden="true" enable-background="new 0 0 511.448 511.448" height="512" viewBox="0 0 511.448 511.448" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m436.508 74.94c-99.913-99.913-261.64-99.928-361.567 0-99.913 99.913-99.928 261.64 0 361.567 99.913 99.913 261.64 99.928 361.567 0 99.912-99.912 99.927-261.639 0-361.567zm-180.784 394.45c-117.816 0-213.667-95.851-213.667-213.667s95.851-213.666 213.667-213.666 213.666 95.851 213.666 213.667-95.85 213.666-213.666 213.666z"/><path d="m298.39 160.057c-11.598 0-21 9.402-21 21v149.333c0 11.598 9.402 21 21 21s21-9.402 21-21v-149.333c0-11.598-9.401-21-21-21z"/><path d="m213.057 160.057c-11.598 0-21 9.402-21 21v149.333c0 11.598 9.402 21 21 21s21-9.402 21-21v-149.333c0-11.598-9.401-21-21-21z"/></svg> zatrzymaj film

                                                </button>

                                                <div class="overaly-logo" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/facility-movie-logo/<?php $post_object = get_field('nazwa_stacji');if( $post_object ): ?><?php echo str_replace(' ', '', get_field('nazwa_stacji')); ?>.svg<?php endif; ?>)">
                                                </div>

                                                <?php
                                                    $file3 = get_field('plik_video');
                                                    if( $file3 ): ?>

                                                        <div class="movie">
                                                            
                                                            <div id="bgfloating-movie" data-src-mp4="<?php echo $file3['url']; ?>"
                                                            data-src-webm="<?php echo $file3['url']; ?>">

                                                                <video autoplay="" loop="" muted="" id="video">
                                                                    <source src="<?php echo $file3['url']; ?>" type="video/mp4">
                                                                    <source src="<?php echo $file3['url']; ?>" type="video/webm"></video>
                                                                    <!-- <img class="uk-hidden@s gak-slide-mobile-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/pattern.png" alt="plakat"> -->

                                                            </div>
                                
                                                        </div>
                                        
                                                    <?php

                                                    else : ?>

                                                        <div class="movie">
                                
                                                            <div id="bgfloating-movie" data-src-mp4="<?php echo get_stylesheet_directory_uri(); ?>/assets/video/<?php echo str_replace(' ', '', get_field('nazwa_stacji')); ?>.mp4"
                                                            data-src-webm="<?php echo get_stylesheet_directory_uri(); ?>/assets/video/<?php echo str_replace(' ', '', get_field('nazwa_stacji')); ?>.mp4">

                                                                <video autoplay="" loop="" muted="" id="video">
                                                                    <source src="<?php echo get_stylesheet_directory_uri(); ?>/assets/video/<?php echo str_replace(' ', '', get_field('nazwa_stacji')); ?>.mp4" type="video/mp4">
                                                                    <source src="<?php echo get_stylesheet_directory_uri(); ?>/assets/video/<?php echo str_replace(' ', '', get_field('nazwa_stacji')); ?>.mp4" type="video/webm"></video>
                                                                    <!-- <img class="gak-slide-mobile-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/pattern.png" alt="plakat"> -->

                                                            </div>
                                
                                                        </div>

                                                    <?php
                                                    
                                                    endif;

                                                    ?>


                                            </div>
                                        
                                        </div>

                                    
                            

                                    </div>

                                </div>

                                <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-2@m">

                                    <div class="gak-video-description">
                                        <p class="gak-video-description--medium">GAK</p>
                                        <h1 class="gak-video-description--big"><?php $post_object = get_field('nazwa_stacji');
                                                if( $post_object ): ?>
                                                    <?php echo str_replace(' ',' <br>', get_field('nazwa_stacji')); ?>
                                                <?php endif; ?>
                                        </h1>
                                        <div class="gak-video-description--small">
                                                <?php $post_object = get_field('opis_stacji');
                                                if( $post_object ): ?>
                                                    <?php the_field('opis_stacji', $post_object->ID); ?>
                                                <?php endif; ?>
                                        </div>

                                        <div class="gak-link-box">

                                                <?php $post_object = get_field('nazwa_stacji');
                                                if( $post_object != "Mobilny Dom Kultury"): ?>
                                                  <a class="gak-small-calendar-box__link gak-arrow-link" href="<?php get_permalink()?>o-nas">_czytaj więcej</a>
                                                <?php endif; ?>
                                            
                                         

                                                    <?php if( have_rows('adres', $post_object->ID) ): ?>
                                                    <?php while( have_rows('adres', $post_object->ID) ): the_row();

                                                        // Get sub field values.

                                                        $lat = get_sub_field('szerokosc_geograficzna');
                                                        $lng = get_sub_field('dlugosc_geograficzna');
                                                        
                                                        ?>

                                                        <a class="gak-small-calendar-box__link gak-arrow-link" href="https://maps.google.com/maps?directionsmode=driving&amp;dirflg=d&amp;daddr=<?php echo $lat; ?>+<?php echo $lng; ?>8&amp;hl=pl">_jak dojechać</a>

                                                    <?php endwhile; ?>
                                                <?php endif; ?>

                            
                                            
                                        </div>

                                    </div>

                                </div>

                            </div>

                </div>

            </div>

            <div class="uk-container uk-container-expand uk-container-expand-left">
    
                <?php
    
                $GLOBALS['facility_category'] = strtr(sanitize_title(get_field('nazwa_stacji')), ['-' => '_']);
                include get_theme_file_path('calendar.php');
                wp_reset_query();
                ?>



            </div>
            <!-- aktualności stopka/dół -->
            <section class="gak-light-blue">

                <div class="gak-new-events">

                    <div class="gak-header-box">
                    
                    <?php $post_object = get_field('nazwa_stacji');
                 
                    
                            if( $post_object ): ?>

                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/full_logo/<?php echo strtolower(str_replace(' ', '', get_field('nazwa_stacji', $post_object->ID)));?>-full-logo-black.svg" alt="Logo <?php echo get_field('nazwa_stacji') ?>" title="Logo <?php echo get_field('nazwa_stacji') ?>" />

                            <?php endif; ?>
                        <h2 class="gak-section-title">
                        
                        Aktualności
                        </h2>

                    </div>
                    

                    <div class="uk-container uk-container-expand uk-padding-remove">
                        <div class="gak-news-grid">
                            <div class="uk-child-width-1-1 uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-2@l uk-child-width-1-3@xl" uk-grid>
                                
                                <?php
                                    $facilityName = strtr(sanitize_title(get_field('nazwa_stacji', $post_object->ID)), ['-' => '_']);
                                    $args = array(
                                        'post_type' => 'post',
                                        'category_name' => 'aktualnosc+' . $facilityName,
                                        'posts_per_page' => 3,
                                    );

                                    $post_query = new WP_Query($args);

                                    if($post_query->have_posts() ) {

                                        $counter = 0;
                                        while($post_query->have_posts() ) {
                                            $counter++;
                                            $post_query->the_post();
                                            ?>

                                            <div>
                                                <a class="gak-news-modal" href="#news-<?php echo $counter; ?>" uk-toggle>
                                                    <div class="gak-news-card">
                                                    <?php

                                                        $thumbnail_id = get_post_thumbnail_id( $post->ID );
                                                        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

                                                        ?>

                                                        <img class="gak-news-card__img" src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo $alt ?>" title="<?php the_title(); ?>">  
                                                        <div class="gak-news-card-box">
                                                            <p class="gak-news-card-box__date">_<?php echo get_the_date(''); ?></p>
                                                            <p class="gak-news-card-box__title"><?php the_title(); ?></p>
                                                            <?php if ( has_excerpt() ) {
                                                                ?>
                                                                <p class="gak-news-card-box__short"><?php the_excerpt(); ?> <span class="gak-arrow-footer-black"></span></p>

                                                                <?php
                                                                } else { ?>
                                                                    <p class="gak-news-card-box__short"><?php $content = strip_tags(get_the_content()); echo mb_strimwidth($content, 0, 100, '...');?><span class="gak-arrow-footer-black"></span></p>
                                                                    <?php
                                                                } ?>
                                                            
                                                        </div>

                                                    </div>
                                                </a>

                                                <div id="news-<?php echo $counter; ?>" class="uk-modal-container uk-flex-top" uk-modal>
                                                    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
                                                    <button class="uk-modal-close-default" type="button" uk-close></button>

                                                            <article class="gak-article-modal">
                                                            
                                                                <div class="uk-container gak-article-container gak-article-left">
                                                
                                                                    <div>
                                                                        <p class="gak-article-date"><?php echo get_the_date('d.m'); ?>.20<?php echo get_the_date('y'); ?></p>
                                                                    </div>
                                                            
                                                                    <header class="gak-article-header">
                                                            
                                                                        <div uk-grid>
                                                            
                                                                            <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@m uk-width-1-2@l">
                                                                                <h1 class="gak-article-header__text"><?php the_title(); ?></h1>
                                                                            </div>
                                                            
                                                                            <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@m uk-width-1-2@l gak-flex-end">
                                                                            <div class="gak-soc-share"><h2 class="gak-sh-text">udostępnij na:</h2>
                                                                                    <a title="facebook" href="https://www.facebook.com/sharer?u=<?php the_permalink();?>;&t=<?php the_title(); ?>;" rel="noopener noreferrer">
                                                                                    <svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="9.851" height="19.7"><path data-name="Path 203" d="M8.053 3.271h1.8V.139A23.229 23.229 0 007.231 0C4.638 0 2.862 1.631 2.862 4.629v2.759H.001v3.5h2.861V19.7H6.37v-8.81h2.741l.436-3.5H6.365V4.976c0-1.012.273-1.7 1.684-1.7z"></path></svg>
                                                                                        facebook
                                                                                    </a>
                                                                                    <a title="twitter" href="http://twitter.com/intent/tweet?text=Czytam obecnie <?php the_title(); ?>&url=<?php the_permalink(); ?>" rel="noopener noreferrer">
                                                                                    <svg focusable="false" aria-hidden="true" class="gak-tw" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21.534 7.113A9.822 9.822 0 0024 4.559v-.001c-.893.391-1.843.651-2.835.777a4.894 4.894 0 002.165-2.719 9.845 9.845 0 01-3.12 1.191 4.919 4.919 0 00-8.511 3.364c0 .39.033.765.114 1.122-4.09-.2-7.71-2.16-10.142-5.147a4.962 4.962 0 00-.674 2.487c0 1.704.877 3.214 2.186 4.089A4.863 4.863 0 01.96 9.116v.054a4.943 4.943 0 003.942 4.835c-.401.11-.837.162-1.29.162-.315 0-.633-.018-.931-.084.637 1.948 2.447 3.381 4.597 3.428a9.89 9.89 0 01-6.101 2.098c-.403 0-.79-.018-1.177-.067a13.856 13.856 0 007.548 2.208c8.683 0 14.342-7.244 13.986-14.637z"/></svg>
                                                                                            twitter
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                            
                                                                        </div>
                                                            
                                                                    </header>
                                                                </div>
                                    
                                                                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo $alt ?>" title="<?php the_title(); ?>">  
                                                
                                                                <div class="uk-container gak-article-container">
                                                        
                                                                    <div class="gak-edit-article">
                                                        
                                                                    <?php the_content(); ?>
                                                        
                                                                    </div>
                                                        
                                                                    <div class="gak-article-gallery">

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

                                                            </article>
                                                    
                                                    </div>
                                                </div>

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
        
    </main>

<?php else: ?>

    <?php if( get_field('szablon') == 'szablon1' ): ?>

    <main class="uk-padding-remove-top">
        
        <script>
            var body = document.body;
            body.classList.add("gak-no-month");
        </script>
        
        <?php $about = get_field('szablon'); if( $about ): ?>
        <?php $template1 = get_field('pole_dla_szablonu_1'); ?>

        <section class="gak-full-bg gak-full-bg-high" style="background: url(<?php echo $template1['tlo']; ?>) no-repeat top center fixed">

            <?php endif; ?>

            <div class="uk-container">

                <div class="gak-basic-edit-text">

                <?php

                    $about = get_field('szablon');

                    if( $about ): ?>

                        <h2>
                            <?php echo $template1['tytul']; ?>

                        </h2>

                        <div>
                            <?php echo $template1['opis']; ?>
                        </div>

                    <?php endif; ?>
            
                </div>

                <div class="gak-sh">
                    <p>—</p>
                    <p>zobacz nas na:</p>

                    <ul class="gak-soc-ul">
                                <li>
                                    <a href="<?php the_field('facebook_link', 'option'); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9.851" height="19.7" style="fill: rgb(255, 255, 255);">
                                        <path data-name="Path 203" d="M8.053 3.271h1.8V.139A23.229 23.229 0 007.231 0C4.638 0 2.862 1.631 2.862 4.629v2.759H.001v3.5h2.861V19.7H6.37v-8.81h2.741l.436-3.5H6.365V4.976c0-1.012.273-1.7 1.684-1.7z"/>
                                    </svg>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php the_field('instagram_link', 'option'); ?>">
                                    <svg data-name="Group 73" xmlns="http://www.w3.org/2000/svg" width="21.777" height="21.777" style="fill: rgb(255, 255, 255);">
                                        <path data-name="Path 200" d="M15.882 0H5.895A5.9 5.9 0 000 5.895v9.988a5.9 5.9 0 005.895 5.895h9.988a5.9 5.9 0 005.895-5.895V5.895A5.9 5.9 0 0015.882 0zm-4.993 16.843a5.955 5.955 0 115.955-5.955 5.961 5.961 0 01-5.955 5.955zm6.1-10.5a1.76 1.76 0 111.76-1.76 1.761 1.761 0 01-1.763 1.755z"/>
                                        <path data-name="Path 201" d="M10.891 6.211a4.678 4.678 0 104.678 4.678 4.683 4.683 0 00-4.678-4.678z"/>
                                        <path data-name="Path 202" d="M16.986 4.095a.483.483 0 10.483.483.483.483 0 00-.483-.483z"/>
                                    </svg>
                                    </a>
                                    
                                </li>
                            </ul>
                </div>

                <div class="gak-flex-end-box">
                    <a class="gak-small-calendar-box__link gak-white-link" href="javascript:history.go(-1)">___wstecz</a>
                </div>


            </div>

        </section>
        
    </main>

    <?php elseif (get_field('szablon') == 'szablon2') : ?>

    <main class="gak-patter-bg">

    <?php $about2 = get_field('szablon');
        if( $about2 ): ?>

        <?php $template2 = get_field('pole_dla_szablonu_2'); ?>

        <div class="uk-container gak-container uk-margin-large-top">

                <a class="gak-small-calendar-box__link gak-arrow-link-back" href="javascript:history.go(-1)">___wstecz</a>

            <div class="uk-margin-large-top uk-margin-large-bottom" uk-grid>

                <div class="gak-article gak-page-basic">

                    <div class="uk-container">

                        <div class="gak-article-header">

                            <div uk-grid>

                                <div class="uk-width-1-1 uk-width-2-3@s uk-width-1-2@m uk-margin-large-bottom">
                            
                                    <h1 class="gak-article-header__text gak-font-400"><?php echo $template2['opis']['tytul']; ?></h1>

                                    <div class="gak-article-header--small"><?php echo $template2['opis']['opis_bloku']; ?></div>

                            
                                </div>

                                <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-2@m gak-flex-end-start">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logos.png" alt="Loga wszystkich placówek">
                                </div>

                            </div>

                        </div>

                        <div class="uk-grid-large" uk-grid>

                            <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@s uk-width-1-2@m ">

                            <?php $aboutInspire = $template2['sekcja_1'];

                                if( $aboutInspire ): ?>

                                <figure class="gak-about-figure">

                                    <img src="<?php echo $template2['sekcja_1']['grafika_pierwsza_duza']; ?>" alt="">
                                    <figcaption><?php echo $template2['sekcja_1']['grafika_pierwsza_duza_podpis']; ?>
                                        <span><?php echo $template2['sekcja_1']['grafika_pierwsza_duza_podpis_data']; ?></span>
                                    </figcaption>

                                </figure>

                            
                            </div>

                            <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@s uk-width-1-2@m ">

                                <div class="gak-text-container">

                                    <h2 class="gak-text-container__title"><?php echo $template2['sekcja_1']['tytul_sekcja_1']; ?></h2>

                                    <div class="gak-text-container__desc">
                                    <?php echo $template2['sekcja_1']['opis_1']; ?>
                                    </div>

                                </div>

                            </div>

                            <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@s uk-width-1-2@m gak-small-img-box">

                                <figure class="gak-about-figure gak-about-figure__small">

                                    <figcaption><?php echo $template2['sekcja_1']['grafika_mala_podpis']; ?><span> <?php echo $template2['sekcja_1']['grafika_mala_podpis_data']; ?></span></figcaption>
                                    <img src=" <?php echo $template2['sekcja_1']['grafika_mala']; ?>" alt="">

                                </figure>

                            </div>

                            <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@s uk-width-1-2@m">

                                <figure class="gak-about-figure">

                                    <img src="<?php echo $template2['sekcja_1']['grafika_druga_duza']; ?>" alt="">
                                    <figcaption><?php echo $template2['sekcja_1']['grafika_druga_duza_podpis']; ?><span> <?php echo $template2['sekcja_1']['grafika_druga_duza_podpis_data']; ?></span></figcaption>

                                </figure>

                            </div>

                            <?php endif; ?>


                            <?php $aboutInspire2 = $template2['sekcja_2'];

                                if( $aboutInspire2 ): ?>

                                <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@s uk-width-1-2@m">

                                    <div class="gak-text-container">
                                    <h2 class="gak-text-container__title"><?php echo $template2['sekcja_2']['tytul_sekcji_2']; ?></h2>

                                            <div class="gak-text-container__desc">
                                            <?php echo $template2['sekcja_2']['opis_sekcji_2']; ?>
                                            </div>

                                    </div>

                                </div>

                            <?php endif; ?>

                            <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@s uk-width-1-2@m">

                            </div>


                            <?php $aboutInspire3 = $template2['sekcja_3'];

                                    if( $aboutInspire3 ): ?>

                                    <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@s uk-width-1-2@m gak-flex-bottom">

                                        <div class="gak-text-container">

                                            <h2 class="gak-text-container__title"><?php echo $template2['sekcja_3']['tytul_sekcji_3']; ?></h2>

                                            <div class="gak-text-container__desc"><?php echo $template2['sekcja_3']['opis_3']; ?>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@s uk-width-1-2@m gak-last-figure">

                                        <figure class="gak-about-figure">

                                            <figcaption><?php echo $template2['sekcja_3']['grafika_sekcja_3_podpis']; ?><span> <?php echo $template2['sekcja_3']['grafika_sekcja_3_podpis_data']; ?></span></figcaption>
                                            <img src="<?php echo $template2['sekcja_3']['grafika_sekcja_3']; ?>" alt="">

                                        </figure>

                                    </div>

                            <?php endif; ?>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    <?php endif; ?>

    </main>

    <?php endif; ?>

<?php endif; ?>


<?php get_footer(); ?>
