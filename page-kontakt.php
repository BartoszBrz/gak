<?php get_header(); ?>

<main class="gak-patter-bg-top gak-patter-bg-top-large">


    <div class="gak-event-single">
        <div class="gak-breadcrumbs gak-breadcrumbs-padding">

        <div class="uk-container uk-container-expand-left gak-breadcrumbs-events">

            <div class="gak-breadcrumb-container">
                <ul class="gak-breadcrumb">
                    <li><a href="javascript:history.go(-1)" class="gak-breadcrumb-back">___wstecz</a></li>
                </ul>
            </div>
        
            <div class="gak-transport">

                    <?php
                    $gak_lat = 54.325388933077406;
                    $gak_lng = 18.63384975364072;
                    ?>
                    <h2 class="gak-transport__text">jak dojechać?</h2>
                    <ul class="gak-transport__ul">
                        <li class="bus">
                            <a id="jak_dojade" href="http://trojmiasto.jakdojade.pl/?fn=SKAD_JEDZIESZ&amp;tn=<?php foreach(get_the_category() as $category) { echo $category->cat_name; }?>&amp;tc=<?php echo $gak_lat; ?>:<?php echo $gak_lng; ?>&amp;ia=true"
                            title="Komunikacja miejska"></a>
                        </li>
                        <li class="car">
                            <a id="google" href="https://maps.google.com/maps?directionsmode=driving&amp;dirflg=d&amp;daddr=<?php echo $gak_lat; ?>+<?php echo $gak_lng; ?>8&amp;hl=pl"
                            title="Dojazd samochodem"></a>
                        </li>
                        <li class="bike">
                            <a id="google2" href="https://maps.google.com/maps?directionsmode=bicycling&amp;dirflg=b&amp;daddr=<?php echo $gak_lat; ?>+<?php echo $gak_lng; ?>&amp;hl=pl"
                            title="Pieszo lub rowerem"></a>
                        </li>

                    </ul>

            </div>
        </div>

    </div>



    <div class="uk-container">

        <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l uk-grid-large uk-margin-large-top uk-margin-large-bottom uk-grid-row-small" uk-grid>
 
            <?php

                // Check rows exists.
                if( have_rows('placowka') ):

                // Loop through rows.
                while( have_rows('placowka') ) : the_row();

                ?>

                <?php

                $sub_value = get_sub_field('nazwa_placowki');
                $sub_value2 = get_sub_field('dane_placowki');

                ?>
                        <div class="gak-institution">
                            <div class="gak-institution-header"><?php echo $sub_value ?></div>
                            <div class="gak-edit-institution"><?php echo $sub_value2 ?></div>
                        </div>
                    

                <?php
                    endwhile;

                else :

                endif;

            ?>

            

        </div>

    </div>

</div>

    <?php if( have_rows('placowka') ): ?>
        <div>
            <div class="uk-container">
                <div class="">
                    <h2 class="gak-article-gallery__title">Mapa dojazdu:</h2>

                </div>
            </div>

            <div class="uk-container uk-container-expand uk-padding-remove">
                <div class="map_container">
        
                    <div class="acf-map">
                        <?php while ( have_rows('placowka') ) : the_row(); ?>
                        <?php $location = get_sub_field('lokalizacja'); ?>
                            <div class="marker"
                                 data-lat="<?php echo $location['lat']; ?>"
                                 data-lng="<?php echo $location['lng']; ?>"
                                 data-icon="<?php the_sub_field('ikonka') ?>"
                            >
                                <?php the_sub_field('nazwa_placowki') ?>
                            </div>
                        <?php endwhile; ?>
                    </div>

                </div>
            </div>


        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
