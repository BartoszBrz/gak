<?php get_header(); ?>

<main>
    <div class="uk-container gak-container">

        <h2 class="gak-header gak-availability-header">Dostępność</h2>

        <div uk-grid>

            <div class="uk-width-1-1">

                <div class="gak-std-content">
                    <?php the_content(); ?>
                </div>
                
            </div>

            <div class="uk-width-1-1">

                <div class="uk-margin-large-bottom uk-margin-top">

                    <div class="gak-width-100">

                        <ol class="uk-grid-small" uk-grid>

                            <?php

                            // Check rows exists.
                            if( have_rows('dostepnosc_grupa') ):

                                $counter = -1;

                                // Loop through rows.
                                while( have_rows('dostepnosc_grupa') ) : the_row();
                                $counter++;

                                ?>

                                <?php

                                $sub_value = get_sub_field('tytul_wynajmu');
                                $sub_value2 = get_sub_field('podtytul_wynajmu_kopia');
                                $sub_value3 = get_sub_field('grafika_wynajmu_modal');

                                ?>

                                <li class="uk-width-1-1 uk-width-1-1@s uk-width-1-2@m">

                                    <?php
                                        $file = get_sub_field('file');
                                        if( $file ): ?>
                                            <a class="gak-card-link" href="<?php echo $file['url']; ?>" title="Otwiera nowe okno">

                                                <div class="gak-rent-box gak-rent-box-noimg">

                                                    <div class="gak-rent-info">
                                                        <h3 class="gak-rent-info__name"><?php echo $sub_value ?></h3>
                                                        <p class="gak-rent-info__details"><?php echo $sub_value2 ?></p>
                                                    </div>

                                                    <div class="gak-rent-logo">
                                                        
                                                        <img src="<?php echo $sub_value3 ?>" aria-hidden="true" class="gak-calendar-slider__img" alt="Logo placówki" title="Logo placówki" />
                                                        
                                                    </div>

                                                    <div class="gak-download-container">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/pdf-icon-black.svg" aria-hidden="true" alt="Ikona pliku" title="Ikona pliku" />
                                                    </div>

                                                    <span class="gak-rent-link gak-arrow-link-white gak-download"><span aria-hidden="true">___</span>pobierz</span>
                                                
                                        

                                                    
                                                </div>

                                            </a>
                                    <?php endif; ?>
                   
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
