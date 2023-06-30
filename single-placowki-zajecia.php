<?php get_header(); ?>

<main>
    <div class="uk-container gak-container uk-margin-large-top">
    
        <div class="gak-section-header">

            <h2 class="gak-header">Zajęcia</h2>
            <?php if( get_field('numer_telefonu') ): ?>
            <p class="uk-margin-top">Zapisy i szczegółowe informacje pod numerem telefonu: <a href="tel: <?php the_field('numer_telefonu'); ?>"><?php the_field('numer_telefonu'); ?></a></p>
            <?php endif; ?> 
        </div>

        <div class="uk-margin-large-bottom uk-margin-large-top" uk-grid>

            <div class="gak-width-100">
                <ol class="uk-grid-small" uk-grid>

                <?php

                // Check rows exists.
                if( have_rows('zajecia_grupa') ):

                    // Loop through rows.
                    while( have_rows('zajecia_grupa') ) : the_row();

                    $activitiesCounter++;?>

                    <?php 

                    $sub_value = get_sub_field('tytul');  
                    $sub_value2 = get_sub_field('podtytul');  
                    $sub_value3 = get_sub_field('grafika');
                    $sub_value4 = get_sub_field('opis');  
                    $sub_value5 = get_sub_field('pelne_logo_biale_logo');


                    ?>

                    <li class="uk-width-1-1 uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l">

                        <a class="gak-card-link" href="#modal-center<?php echo $activitiesCounter ?>" uk-toggle title="Otwiera nowe okno">

                            <div class="gak-rent-box">

                                <div class="gak-rent-info gak-activities-info">
                                    <h2 class="gak-rent-info__name"><?php echo $sub_value ?></h2>
                                    <p class="gak-rent-info__details" aria-hidden="true"><?php echo $sub_value2 ?></p>
                                </div>

                                <div class="gak-rent-logo">
                                                           
                                        <img class="gak-small-white-activitie-logo" aria-hidden="true" src="<?php the_field('pelne_logo_biale_logo', $item); ?>" alt="Logo instutacji" title="Logo instutacji">   
                                                                                                                            
                                </div>
                                
                                <span class="gak-rent-link gak-arrow-link-white"><span aria-hidden="true">___</span>czytaj więcej</span>

                                <img class="gak-rent-box__img" aria-hidden="true" src="<?php echo esc_url($sub_value3['url']); ?>" alt="<?php echo esc_attr($sub_value3['alt']); ?>" title="" />

                              
                            </div>

                        </a>

                        <div id="modal-center<?php echo $activitiesCounter ?>" class="uk-modal-container uk-flex-top gak-crew-modal" uk-modal>

                                        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-padding-remove gak-light-blue">

                                         

                                            <div class="uk-grid-collapse" uk-grid>

                                                <div
                                                    class="uk-width-1-1 gak-light-blue gak-modal-padding-big gak-modal-logo">

                                                    <div class="gak-modal-header">
                                                        <div class="gak-modal-header-box">
                                                            <p class="gak-modal-header-box__title"><?php echo $sub_value ?></p>
                                                            <p class="gak-modal-header-box__details"><?php echo $sub_value2 ?></p>
                                                        </div>    

                                                         <img src="<?php the_field('logo_instutacji', $item); ?>" alt="Logo instutacji" title="Logo instutacji">                                        

                                                    </div>

                                                    <div class="gak-decription-modal">
                                                        <?php echo $sub_value4 ?>
                                                    </div>

                                                    
                                                    <div class="gak-event-details-box gak-event-details-modal">

                                                    <?php if( get_field('numer_telefonu', $item) ): ?>
                                                    <div class="gak-details">
                                                        <p class="gak-details__value"><i class="icon gak-phone"></i>
                                                            <a href="tel:<?php the_field('numer_telefonu', $item); ?>" title="Numer telefonu"><?php the_field('numer_telefonu', $item); ?></a>
                                                        </p>
                                                    </div>
                                                    <?php endif; ?>
                                                    
                                                    <?php if( get_field('e-mail', $item) ): ?>
                                                    <div class="gak-details gak-details-flex-3">
                                                        <p class="gak-details__value"><i class="icon gak-mail"></i><a
                                                                href="mailto:<?php the_field('e-mail', $item); ?>" title="E-mail"><?php the_field('e-mail', $item); ?></a>
                                                        </p>
                                                    </div>
                                                    <?php endif; ?>

                                                    <?php if( get_field('adres', $item) ): ?>
                                                    <div class="gak-details">
                                                        <p class="gak-details__value"><i class="icon gak-marker"></i>
                                                        <a target="_blank" href="https://www.google.com/maps/search/?api=1&query=<?php the_field('adres', $item); ?>" title="Adres">
                                                        <?php the_field('adres', $item); ?></a></p>
                                                        
                                                    </div>
                                                    <?php endif; ?>

                                                    </div>

                                                    <a class="uk-modal-close-default gak-small-calendar-box__link gak-arrow-link-back" href="#">___wstecz</a>

                                                </div>

                                            </div>

                                        </div>
                        </div>   

                    </li>

                    <?php

                // End loop.
                endwhile;

                // No value.
                else :
                // Do something...
                endif;

                ?>

                </ol>
            </div>

        </div>

    </div>
    
</main>

<?php get_footer(); ?>