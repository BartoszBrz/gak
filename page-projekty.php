<?php get_header(); ?>

<main>
    <div class="uk-container gak-container uk-margin-large-top">
    
        <div class="gak-section-header">

            <h2 class="gak-header">Projekty</h2>
            
       
        </div>

        <div class="uk-margin-large-bottom uk-margin-large-top" uk-grid>

            <div class="gak-width-100">
                <ol class="uk-grid-small" uk-grid uk-scrollspy="target: > div; cls: uk-animation-fade; delay: 50">
           
                <?php
            
                // Check rows exists.
                
                if( have_rows('flagowe_wydarzenia_grupa') ):
                    $counter = 0;
                    // Loop through rows.
                    while( have_rows('flagowe_wydarzenia_grupa') ) : the_row(); ?>

                    <?php
                        $counter++;
                        $sub_value = get_sub_field('tytul');
                        $sub_value2 = get_sub_field('podtytul');
                        $sub_value3 = get_sub_field('grafika');
                        $sub_value4 = get_sub_field('opis');
                    ?>

                    <li class="uk-width-1-1 uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l">

                        <a class="gak-card-link" href="#modal-center<?php echo $counter ?>" title="Otwiera nowe okno" uk-toggle>

                            <div class="gak-rent-box">

                                <div class="gak-rent-info">
                                    <h3 class="gak-rent-info__name"><?php echo $sub_value ?></h3>
                                    <p class="gak-rent-info__details" aria-hidden="true"><?php echo $sub_value2 ?></p>
                                
                                </div>

                                <span class="gak-rent-link gak-arrow-link-white"><span aria-hidden="true">___</span>czytaj więcej</span>
                    
                                                        
                                <img class="gak-rent-box__img" src="<?php echo esc_url($sub_value3['url']); ?>" aria-hidden="true" alt="<?php echo esc_attr($sub_value3['alt']); ?>" title="" />
                                        
                 

                            </div>

                        </a>

                        <div id="modal-center<?php echo $counter ?>" class="uk-modal-container uk-flex-top gak-activities-modal" uk-modal>

                            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-padding-remove gak-light-blue">

                          

                                <div class="uk-grid-collapse" uk-grid>

                                    <div class="uk-width-1-1 gak-light-blue gak-modal-padding-big gak-modal-logo">

                                        <div class="gak-modal-header">
                                            <div class="gak-modal-header-box">
                                                <p class="gak-modal-header-box__title"><?php echo $sub_value ?></p>
                                                <p class="gak-modal-header-box__details"><?php echo $sub_value2 ?></p>
                                            </div>
                                        </div>

                                        <div class="gak-decription-modal">
                                            <?php echo $sub_value4 ?>
                                        </div>

                                    </div>
                                    <a class="uk-modal-close-default gak-small-calendar-box__link gak-arrow-link-back" href="#">___wstecz</a>

                                </div>

                            </div>
                        </div>
                    </li>

                    <?php

                endwhile;

                endif;
            
                ?>

                </ol>
            </div>

        </div>

    </div>
    
</main>

<?php get_footer(); ?>
