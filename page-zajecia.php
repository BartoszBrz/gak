<?php get_header(); ?>

<main>
    <?php
        $subtext = get_field('z_subtext', 'option');
        $kafelki = get_field('kafelki', 'option');
        $reg_link = get_field('reg_link', 'option')
    ?>
    <div class="uk-container gak-container uk-margin-large-top">
    
        <div class="gak-section-header">

            <h2 class="gak-header">Zajęcia</h2>
            
       
        </div>

        <div class="uk-child-width-1-1">

        
            <div uk-filter="target: .filter" class="uk-width-1-1 filter-main">
                
                    <?php if($subtext): ?>
                        <div class="z-subtext">
                            <p>
                                <?= $subtext ?>
                            </p>
                        </div>
                    <?php endif ?>

                    <div class="z-grid uk-margin-large-bottom uk-animation-toggle" uk-grid>

                        <div class="gak-width-100">
                            <ol class="uk-grid-small filter" uk-grid tabindex="0">

                                    <?php
                                    foreach($kafelki as $item): ?>

                                        <li class="z-li uk-width-1-1 uk-width-1-2@s uk-width-1-2@m uk-width-1-3@l">

                                                <a class="gak-card-link z-link" href="<?= $item['link'] ?>" target="_blank" title="Otwiera się w nowym oknie">

                                                    <img class="z-img" src="<?= $item['img']['url'] ?>" alt="">
                                                    <div class="z-bottom">
                                                        <h3><?= $item['title'] ?></h3>
                                                    </div>

                                                </a>

                                        </li>

                                    <?php endforeach ?>

                                    <?php if($reg_link): ?>
                                        <li class="z-li z-reg uk-width-1-1 uk-width-1-2@s uk-width-1-2@m uk-width-1-3@l">

                                                <a class="gak-card-link z-link" href="<?= $reg_link ?>" target="_blank" title="Otwiera się w nowym oknie">
                                                    <div class="z-img"></div>
                                                    <div class="z-bottom">
                                                        <h3>Regulamin</h3>
                                                    </div>

                                                </a>

                                        </li>
                                    <?php endif ?>
                                    
                                    


                            </ol>
                        </div>

                    </div>

            </div>



        </div>



    </div>
    
</main>

<?php get_footer(); ?>