<?php get_header(); ?>

<main>

    <div class="uk-container uk-container-expand-right gak-container-large gak-no-padding-right">

    <h2 class="gak-header gak-margin-top-80">Cennik</h2>

    <div class="gak-price-box uk-margin-top uk-margin-large-bottom" uk-grid>

        <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l">

            <div class="gak-price-description">

                <h2 class="gak-price-description__header"><?php the_field('cennik_tytul'); ?></h2>

                <div class="gak-price-edit">
                <?php the_field('cennik_opis'); ?>
               
                </div>

            </div>


        </div>

        <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l">

            <?php if( get_field('cennik_pdf') ): ?>
                <?php $file2 = get_field('cennik_pdf'); ?>
    
                <a href="<?php echo $file2['url']; ?>">
                    <div uk-grid class="uk-grid-collapse gak-dark gak-pdf-box">

                        <div class="gak-pdf-box__img">
                            <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/pdf-icon.svg" alt="" title="">
                        </div>

                        <div class="uk-width-expand gak-pdf-box__text">

                            <p>Pobierz PDF</p>
                            <p><?php the_field('cennik_opis_skrocony'); ?></p>

                        </div>

                    </div>
                </a>
            <?php endif; ?>

        </div>

    </div>

    </div>
    
</main>


<?php get_footer(); ?>