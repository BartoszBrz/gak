<?php get_header(); ?>

<main>
    <div class="uk-container gak-container uk-margin-large-top">
    
        <div class="gak-section-header">

            <h2 class="gak-header">Praca</h2>
            
        </div>

        <div class="uk-margin-large-bottom uk-margin-large-top" uk-grid>

            <div class="gak-width-100">
                
                <ol class="uk-grid-small job-offers" uk-grid>

                        <?php
                                $activitiesCounter = 0;
                            
                                while( have_rows('praca_grupa_pol') ) :
                                    the_row();

                                    $activitiesCounter++;
                                    
                                    $tytul = get_sub_field('tytul');
                                    $podtytul = get_sub_field('podtytul');
                                    //$zdjecie = get_sub_field('grafika');
                                    $opis = get_sub_field('opis');
                                    $adres = get_sub_field('adres');
                                    $email = get_sub_field('e-mail');
                                    $telefon = get_sub_field('numer_telefonu');
                                    $logo = get_sub_field('logo_instutacji');

                        ?>


                        <li class="uk-width-1-1 uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l">

                            <a class="gak-card-link" href="#modal-center<?php echo $activitiesCounter ?>" uk-toggle title="Otwiera nowe okno">

                                <div class="gak-rent-box gak-rent-box-noimg gak-rent-readmore">

                                    <div class="gak-rent-info">
                                        <h3 class="gak-rent-info__name"><?php echo $tytul ?></h3>
                                        <p class="gak-rent-info__details" aria-hidden="true"><?php echo $podtytul ?></p>
                                    </div>

                                    <div class="gak-rent-logo">
                                        <img src="<?php echo $logo ?>" aria-hidden="true" class="gak-calendar-slider__img" alt="Logo placówki" title="Logo placówki" />
                                    </div>

                                    <span class="gak-rent-link gak-arrow-link-white"><span aria-hidden="true">___</span>czytaj więcej</span>
                                </div>

                            </a>

                            <div id="modal-center<?php echo $activitiesCounter ?>" class="uk-modal-container uk-flex-top gak-activities-modal" uk-modal>

                                <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-padding-remove gak-light-blue">

                                  

                                    <div class="uk-grid-collapse" uk-grid>

                                        <div
                                            class="uk-width-1-1 gak-light-blue gak-modal-padding-big gak-modal-logo">

                                            <div class="gak-modal-header">
                                                <div class="gak-modal-header-box">
                                                    <p class="gak-modal-header-box__title"><?php echo $tytul ?></p>
                                                    <p class="gak-modal-header-box__details"><?php echo $podtytul ?></p>
                                                </div>

                                                <img src="<?php echo $logo ?>" alt="Logo placówki" title="Logo placówki">

                                            </div>

                                            <div class="gak-decription-modal">
                                                <?php echo $opis ?>
                                            </div>
                                            
                                            <div class="gak-event-details-box gak-event-details-modal">

                                            <?php if( !empty($telefon) ): ?>
                                            <div class="gak-details">
                                                <p class="gak-details__value"><i class="icon gak-phone"></i>
                                                    <a href="tel:<?php echo $telefon; ?>" title="Numer telefonu"><?php echo $telefon; ?></a>
                                                </p>
                                            </div>
                                            <?php endif; ?>
                                            
                                            <?php if( !empty($email) ): ?>
                                            <div class="gak-details gak-details-flex-3">
                                                <p class="gak-details__value"><i class="icon gak-mail"></i><a
                                                        href="mailto:<?php echo $email; ?>" title="E-mail"><?php echo $email; ?></a>
                                                </p>
                                            </div>
                                            <?php endif; ?>

                                            <?php if( !empty($adres) ): ?>
                                            <div class="gak-details">
                                                <p class="gak-details__value"><i class="icon gak-marker"></i>
                                                <a target="_blank" href="https://www.google.com/maps/search/?api=1&query=<?php echo $adres; ?>" title="Adres">
                                                <?php echo $adres; ?></p>
                                                </a>
                                            </div>
                                            <?php endif; ?>

                                            </div>

                                        </div>

                                        <a class="uk-modal-close-default gak-small-calendar-box__link gak-arrow-link-back" href="#">___wstecz</a>

                                    </div>

                                </div>
                            </div>

                                            </li>

                        <?php
                            endwhile;
                        ?>

                </ol>

            </div>

        </div>

    </div>
    
</main>

<?php get_footer(); ?>
