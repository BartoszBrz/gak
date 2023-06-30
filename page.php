<?php get_header(); ?>

<main>
    <div class="uk-container gak-container">

        <h2 class="gak-header gak-availability-header"><?php the_title(); ?></h2>

        <div uk-grid class="uk-margin-medium-bottom">

            <div class="uk-width-1-1">

                <div class="gak-std-content">
                <?php the_content(); ?>
                </div>
                
            </div>

        </div>

    </div>
</main>

<?php get_footer(); ?>
