<?php get_header(); ?>

<main>


    <div class="uk-container gak-container uk-margin-large-top">

        <div class="gak-section-header uk-margin-large-bottom">

            <h2 class="gak-header">Kadra</h2>

        </div>

        <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l uk-margin-large-bottom"
            uk-grid>

            <?php

            // Check rows exists.
            if( have_rows('kadra-osoba') ):

            $counter = -1;

            // Loop through rows.
            while( have_rows('kadra-osoba') ) : the_row();
                $counter++;
                
                $sub_value = get_sub_field('imie_i_nazwisko');
                $sub_value2 = get_sub_field('stanowisko');
                $sub_value3 = get_sub_field('zdjecie_miniaturka');
                $sub_value4 = get_sub_field('numer_telefonu');
                $sub_value5 = get_sub_field('email');
            ?>

                    <div>
                        
                        <div class="uk-card gak-crew-card">
                            <div class="uk-card-media-top">
                            <img src="<?php echo esc_url($sub_value3['url']); ?>" alt="<?php echo esc_attr($sub_value3['alt']); ?>" title="" />
                                        
                            </div>
                            <div class="uk-card-body">
                                <h3 class="uk-card-title"><?php echo $sub_value ?></h3>
                                <p><?php echo $sub_value2 ?></p>
                                <?php if( !empty($sub_value4) ) {
                                    echo "<p class=\"tel\"><a href=\"tel:{$sub_value4}\">{$sub_value4}</a></p>";
                                } ?>
                                <?php if( !empty($sub_value5) ) {
                                    echo "<p class=\"mail\"><a href=\"mailto:{$sub_value5}\">{$sub_value5}</a></p>";
                                } ?>
                            </div>
                        </div>
                        
                    </div>

            <?php
                endwhile;
                
            endif;
            ?>

        </div>


        <?php if( get_field('video') ): ?>

        <div class="gak-video-margin">
            <h2 class="uk-margin-bottom gak-article-gallery__title">Obejrzyj Video:</h2>

            <div class="gak-video-container gak-video-play">
                <video id="video">
                    <source src="<?php echo get_field('video');  ?>">
                </video>

                <button type="button" id="play_button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="127" height="127" viewBox="0 0 127 127">
                        <path fill="#fff"
                            d="M119.314 34.655c-4.401-8.536-10.82-16.074-18.561-21.799a2.558 2.558 0 00-3.042 4.114A58.268 58.268 0 01114.767 37c4.238 8.218 6.387 17.107 6.387 26.421 0 31.834-25.9 57.733-57.733 57.733-31.834 0-57.733-25.899-57.733-57.733 0-31.834 25.9-57.733 57.733-57.733a2.558 2.558 0 000-5.116C28.766.572.572 28.766.572 63.421s28.194 62.848 62.849 62.848 62.849-28.193 62.849-62.848c0-9.995-2.405-19.942-6.956-28.766z" />
                        <path fill="#fff"
                            d="M47.34 34.239a2.559 2.559 0 00-1.294 2.223v56.135a2.558 2.558 0 005.115 0V40.962l37.872 22.545-27.85 17.943a2.558 2.558 0 102.772 4.3l31.32-20.18a2.558 2.558 0 00-.078-4.348L49.912 34.264a2.558 2.558 0 00-2.573-.025z" />
                    </svg>
                </button>
            </div>

        </div>

        <?php endif; ?>

    </div>
    
</main>

<?php get_footer(); ?>
