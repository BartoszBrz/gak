<?php get_header(); ?>

<main>
    <div class="uk-container gak-container uk-margin-large-top">
    
        <div class="gak-section-header">

            <h2 class="gak-header">e-GAK</h2>
            
       
        </div>

        <div class="uk-margin-large-bottom uk-margin-large-top" uk-grid>

            <div class="gak-width-100">
            <div class="uk-grid-medium" uk-grid>

                <?php

                        // Check rows exists.

                        if( have_rows('praca_grupa_pol') ):

                            // Loop through rows.
                            while( have_rows('praca_grupa_pol') ) : the_row();?>

                            <?php $sub_value_movie = get_sub_field('opis');  ?>

                            <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l"><?php echo $sub_value_movie ?></div>

                            <?php

                            // End loop.
                            endwhile;
                            // Do something...
                        endif;
                            
                ?>

            </div>

            </div>

        </div>

    </div>
    
</main>

<?php get_footer(); ?>