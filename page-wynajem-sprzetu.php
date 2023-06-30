<?php get_header(); ?>

<main>
    <div class="uk-container gak-container">

        <h2 class="uk-margin-bottom gak-header gak-margin-top-80">Wynajem sprzętu</h2>

        <div uk-grid>

            <div class="uk-width-1-1">

                <div class="uk-margin-large-bottom uk-margin-top">

                    <div class="gak-width-100" uk-filter="target: .js-filter">

                    <h3 class="gak-pick-district">Wybierz dzielinicę</h3>

                    <?php

                        // Check rows exists.
                        if( have_rows('wynajem_sprzetu') ):
                            $counter = 0; ?>

                                <ul class="gak-district-list">

                                    <li class="uk-active" uk-filter-control>
                                        <a class="gak-district-link" href="#">Wszystkie</a><span>,</span>
                                    </li>

                                    <?php
                                        $choices = [];
                                        while( have_rows('wynajem_sprzetu') ):
                                            the_row();
                                            $select2 = get_sub_field_object('dzielnica');
                                            $value2 = $select2['value'];
                                            $temp = $select2['choices'][$value2];
                                            if(in_array($temp, $choices))
                                                continue;
                                            $choices[] = $temp;      

                                             if(!empty($temp)): ?>
                                                <li uk-filter-control=".<?php echo preg_replace('/[\s.,-]+/','',$temp); ?>">
                                                <a class="gak-district-link" href="#">
                                                    <?php echo $temp; ?><span>,</span>
                                                </a>    
                                            </li>

                                            <?php endif; ?>

                                       

                                        <?php endwhile;?>
                                    
                                </ul>
                                                                
                                <ol class="js-filter uk-grid-small" uk-grid>

                                    <?php
                                    
                                            // Loop through rows.
                                            while( have_rows('wynajem_sprzetu') ) : the_row();
                                            $counter++;

                                            $sub_value = get_sub_field('tytul_wynajmu');  
                                            $sub_value2 = get_sub_field('pojemnosc_pomieszczenia');  
                                            $sub_value3 = get_sub_field('grafika_wynajmu');  
                                            $sub_value4 = get_sub_field('glowna_grafika');  
                                            $sub_value5 = get_sub_field('opis_wynajmu');  
                                            $sub_value6 = get_sub_field('grafika_wynajmu_modal');  
                                            $sub_value7 = get_sub_field('grafika_przykladowa_1');  
                                            $sub_value8 = get_sub_field('grafika_przykladowa_2');  
                                            $sub_value9 = get_sub_field('wynajem_numer_telefonu');  
                                            $sub_value10 = get_sub_field('wynajem_e-mail');  
                                            $sub_value11 = get_sub_field('wynajem_adres');  
                                            $sub_value12 = get_sub_field('wynajem_dodatkowe_informacje');  
                                            $sub_value13 = get_sub_field('wynajem_cena');  
                                            $select2 = get_sub_field_object('dzielnica');
                                            $value2 = $select2['value'];
                                            $label2 = $select2['choices'][ $value2 ];
                                
                                        ?>
                         
                                                <li class="uk-width-1-1 uk-width-1-1@s uk-width-1-2@m <?php echo preg_replace('/[\s.,-]+/','',$label2); ?>">

                                                <a class="gak-card-link" href="#modal-center<?php echo $counter ?>" uk-toggle title="Otwiera nowe okno">

                                                    <div class="gak-rent-box">

                                                        <div class="gak-rent-info">
                                                            <h3 class="gak-rent-info__name"><?php echo $sub_value ?></h3>
                                                            <p class="gak-rent-info__details" aria-hidden="true">Pojemność: <?php echo $sub_value2 ?> osób</p>
                                                            <?php if($label2 ): ?>
                                                                <p class="gak-rent-info__details" aria-hidden="true">
                                                                    Dzielnica: 
                                                                    <?php echo $label2 ?>
                                                                </p>
                                                            <?php endif; ?>
                                                        </div>

                                                        <div class="gak-rent-logo">
                                                                        
                                                            <img src="<?php echo $sub_value3 ?>" aria-hidden="true" class="gak-calendar-slider__img" alt="Logo placówki" title="Logo placówki" />
                                                                                                                    
                                                        </div>

                                                        <span class="gak-rent-link gak-arrow-link-white"><span aria-hidden="true">___</span>czytaj więcej</span>

                                                        <img class="gak-rent-box__img" aria-hidden="true" src="<?php echo esc_url($sub_value4['url']); ?>" alt="<?php echo esc_attr($sub_value4['alt']); ?>" title="" />

                                                    
                                                                                                
                                                    </div>

                                                </a>

                                                <div id="modal-center<?php echo $counter ?>" class="uk-modal-container uk-flex-top" uk-modal>

                                                    <div
                                                        class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-padding-remove gak-light-blue">

                                                        <div class="uk-grid-collapse" uk-grid>

                                                            <?php if($sub_value7 ): ?>

                                                                <div
                                                                    class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@m uk-width-1-3@l uk-width-1-3@xl">
                                                        
                                                                        <div class="gak-img-container">
                                                                            <img class="" src="<?php echo $sub_value7 ?>" alt="<?php echo $sub_value ?> zdjęcie 1" title="">
                                                                            <img class="" src="<?php echo $sub_value8 ?>" alt="<?php echo $sub_value ?> zdjęcie 2 " title="">
                                                                        </div>

                                                                </div>

                                                                <div
                                                                    class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@m uk-width-2-3@l uk-width-2-3@xl gak-light-blue gak-modal-padding-big gak-modal-logo">

                                                                    <div class="gak-modal-header">
                                                                        <div class="gak-modal-header-box">
                                                                            <p class="gak-modal-header-box__title"><?php echo $sub_value ?></p>
                                                                            <p class="gak-modal-header-box__details">Pojemność: <?php echo $sub_value2 ?> osób</p>
                                                                        </div>

                                                                        <img src="<?php echo $sub_value6 ?>" alt="Logo placówki czarne" title="Logo placówki czarne">
                                                                    </div>

                                                                    <div class="gak-price-container">

                                                                        <div class="gak-price-details">
                                                                            <div class="gak-price-details__title">Cena:</div>


                                                                                <div class="gak-price-details__text">
                                                                                    <?php echo $sub_value13 ?>
                                                                                </div>
                                                            
                                                                        </div>

                                                                        <?php if($sub_value12 ): ?>
                                                                            <div class="gak-price-extra-details">
                                                                                <?php echo $sub_value12 ?>

                                                                            </div>
                                                                        <?php endif; ?>

                                                                    </div>

                                                                    <div class="gak-decription-modal">
                                                                        <?php echo $sub_value5 ?>
                                                                    </div>

                                                                    <div class="gak-event-details-box gak-event-details-modal">

                                                                        <?php if($sub_value9 ): ?>
                                                                            <div class="gak-details">
                                                                                <p class="gak-details__value"><i class="icon gak-phone"></i>
                                                                                    <a href="tel:<?php echo $sub_value9 ?>"><?php echo $sub_value9 ?></a>
                                                                                </p>
                                                                            </div>
                                                                        <?php endif; ?>

                                                                        <?php if($sub_value10 ): ?>
                                                                            <div class="gak-details gak-details-flex-3">
                                                                                <p class="gak-details__value"><i class="icon gak-mail"></i><a
                                                                                        href="mailto:<?php echo $sub_value10 ?>"><?php echo $sub_value10 ?></a>
                                                                                </p>
                                                                            </div>
                                                                        <?php endif; ?>

                                                                        <?php if($sub_value11 ): ?>                                                            
                                                                            <div class="gak-details">
                                                                                <p class="gak-details__value"><i class="icon gak-marker"></i><?php echo $sub_value11 ?></p>
                                                                            </div>
                                                                        <?php endif; ?>

                                                                    </div>

                                                                </div>

                                                            <?php else: ?>

                                                                    <div class="uk-width-1-1 gak-light-blue gak-modal-padding-big gak-modal-logo">

                                                                        <div class="gak-modal-header">
                                                                            <div class="gak-modal-header-box">
                                                                                <p class="gak-modal-header-box__title"><?php echo $sub_value ?></p>
                                                                                <p class="gak-modal-header-box__details">Pojemność: <?php echo $sub_value2 ?> osób</p>
                                                                            </div>

                                                                            <img src="<?php echo $sub_value6 ?>" alt="Logo placówki czarne" title="Logo placówki czarne">
                                                                        </div>

                                                                        <div class="gak-price-container">

                                                                            <div class="gak-price-details">
                                                                                <div class="gak-price-details__title">Cena:</div>

                                                                                <div class="gak-price-details__text">
                                                                                <?php echo $sub_value13 ?>
                                                                                </div>

                                                                            </div>

                                                                            <?php if($sub_value12 ): ?>
                                                                            <div class="gak-price-extra-details">
                                                                                <?php echo $sub_value12 ?>

                                                                            </div>
                                                                        <?php endif; ?>

                                                                        </div>

                                                                        <div class="gak-decription-modal">
                                                                            <?php echo $sub_value5 ?>
                                                                        </div>

                                                                        <div class="gak-event-details-box gak-event-details-modal">

                                                                            <div class="gak-details">
                                                                                <p class="gak-details__value"><i class="icon gak-phone"></i>
                                                                                    <a href="tel:<?php echo $sub_value9 ?>"><?php echo $sub_value9 ?></a>
                                                                                </p>
                                                                            </div>

                                                                            <div class="gak-details gak-details-flex-3">
                                                                                <p class="gak-details__value"><i class="icon gak-mail"></i><a
                                                                                        href="mailto:<?php echo $sub_value10 ?>"><?php echo $sub_value10 ?></a>
                                                                                </p>
                                                                            </div>

                                                                            <div class="gak-details">
                                                                                <p class="gak-details__value"><i class="icon gak-marker"></i><?php echo $sub_value11 ?></p>
                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                            <?php endif; ?>

                                                        </div>

                                                        <a class="uk-modal-close-default gak-small-calendar-box__link gak-arrow-link-back"
                                                            href="#">___wstecz</a>

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

        </div>

    </div>
</main>

<?php get_footer(); ?>