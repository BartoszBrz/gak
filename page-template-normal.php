<?php

/*
 * Template Name: Czarne menu
 * Template Post Type: page
 */

?> 

<?php get_header(); ?>

<main class="gak-patter-bg">

    <div class="uk-container gak-container uk-margin-large-top">

        <a class="gak-small-calendar-box__link gak-arrow-link-back" href="javascript:history.go(-1)">___wstecz</a>

        <div class="uk-margin-large-top uk-margin-large-bottom" uk-grid>

            <div class="gak-article gak-page-basic">

                <div class="uk-container">

                    <div class="gak-article-header">

                        <div uk-grid>

                            <div class="uk-width-1-1 uk-width-2-3@s uk-width-1-2@m uk-margin-large-bottom">
                        
                            <?php

                            $aboutMain = get_field('dla_mediow_opis');
                            if( $aboutMain ): ?>

                                <h1 class="gak-article-header__text gak-font-400"><?php echo $aboutMain['dla_mediow_tytul']; ?></h1>

                                <div class="gak-article-header--small"><?php echo $aboutMain['dla_mediow_opis_bloku']; ?></div>

                            <?php endif; ?>

                          
                            </div>

                            <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-2@m gak-flex-end-start">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logos.png" alt="Wszystkie loga placówek">
                            </div>

                        </div>

                    </div>

                    <div class="uk-grid-large" uk-grid>

                        <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@s uk-width-1-2@m ">

                        <?php

                            $aboutInspire = get_field('dla_mediow_inspirujemy');
                            if( $aboutInspire ): ?>

                            <figure class="gak-about-figure">

                                <img src="<?php echo $aboutInspire['inspirujemy_grafika']; ?>" alt="">
                                <figcaption><?php echo $aboutInspire['grafika_podpis']; ?><span>
                                    <?php echo $aboutInspire['grafika_podpis_data']; ?></span></figcaption>

                            </figure>

                           

                        </div>

                        <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@s uk-width-1-2@m ">

                            <div class="gak-text-container">

                                <h2 class="gak-text-container__title"><?php echo $aboutInspire['tytul_sekcja_1']; ?></h2>

                                <div class="gak-text-container__desc">
                                <?php echo $aboutInspire['inspirujemy_opis']; ?>
                                </div>

                            </div>

                        </div>

                        <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@s uk-width-1-2@m gak-small-img-box">

                            <figure class="gak-about-figure gak-about-figure__small">

                                <figcaption><?php echo $aboutInspire['inspirujemy_grafika_mala_podpis']; ?><span> <?php echo $aboutInspire['inspirujemy_grafika_mala_podpis_data']; ?></span></figcaption>
                                <img src=" <?php echo $aboutInspire['inspirujemy_grafika_mala']; ?>" alt="">

                            </figure>

                        </div>

                        <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@s uk-width-1-2@m">

                            <figure class="gak-about-figure">

                                <img src="<?php echo $aboutInspire['inspirujemy_grafika_prawa']; ?>" alt="">
                                <figcaption><?php echo $aboutInspire['inspirujemy_grafika_prawa_podpis']; ?><span> <?php echo $aboutInspire['inspirujemy_grafika_prawa_podpis_data']; ?></span></figcaption>

                            </figure>

                        </div>

                        <?php endif; ?>

                        <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@s uk-width-1-2@m">

                        <?php

                            $aboutTeach = get_field('dla_mediow_uczymy'); ?>

                            <div class="gak-text-container">
                            <h2 class="gak-text-container__title"><?php echo $aboutTeach['tytul_sekcja_2']; ?></h2>

                            <?php

                                if( $aboutTeach ): ?>

                                    <div class="gak-text-container__desc">
                                        <?php echo $aboutTeach['uczymy_opis']; ?>
                                    </div>

                                <?php endif; ?>    

                            </div>

                        </div>

                        <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@s uk-width-1-2@m">

                        </div>
                            <?php

                            $aboutIntegrate = get_field('dla_mediow_integrujemy');
                            if( $aboutIntegrate ): ?>

                                <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@s uk-width-1-2@m gak-flex-bottom">

                                    <div class="gak-text-container">

                                        <h2 class="gak-text-container__title"><?php echo $aboutIntegrate['tytul_sekcja_3']; ?></h2>

                                        <div class="gak-text-container__desc"><?php echo $aboutIntegrate['integrujemy_opis']; ?>
                                        </div>

                                    </div>

                                </div>

                                <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@s uk-width-1-2@m gak-last-figure">

                                    <figure class="gak-about-figure">

                                        <figcaption><?php echo $aboutIntegrate['integrujemy_grafika_podpis']; ?><span> <?php echo $aboutIntegrate['integrujemy_grafika_podpis_data']; ?></span></figcaption>
                                        <img src="<?php echo $aboutIntegrate['integrujemy_grafika']; ?>" alt="">

                                    </figure>

                                </div>

                            <?php endif; ?>  
                    </div>

                </div>

            </div>

        </div>

    </div>
    
</main>

<?php get_footer(); ?>