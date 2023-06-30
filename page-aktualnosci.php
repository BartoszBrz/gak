<?php get_header(); ?>

<main>

    <section>

        <div class="gak-new-events">

            <div class="uk-container uk-container-expand uk-padding-remove">
                <div class="gak-news-grid">
                    <div class="uk-child-width-1-1 uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-2@l uk-child-width-1-3@xl uk-grid-large" uk-grid>

                        <?php
                            $args = array(
                                'post_type' => 'post',
                                'category_name' => 'aktualnosc',
                                'posts_per_page' => 30,
                            );

                            $post_query = new WP_Query($args);


                            if($post_query->have_posts() ) {

                                $counter = 0;
                                while($post_query->have_posts() ) {
                                    $counter++;
                                    $post_query->the_post();
                                    ?>
                                    <div>                                  
                                        <a class="gak-news-modal" href="<?php echo get_permalink(); ?>">
                                            <div class="gak-news-card">

                                            <?php

                                                $thumbnail_id = get_post_thumbnail_id( $post->ID );
                                                $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

                                            ?>

                                                <img class="gak-news-card__img" src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo $alt ?>" title="<?php the_title(); ?>">         
                                                <div class="gak-news-card-box">
                                                    <p class="gak-news-card-box__date">_<?php echo get_the_date(''); ?></p>
                                                    <p class="gak-news-card-box__title"><?php the_title(); ?></p>
                                              
                                                    <?php if ( has_excerpt() ) {
                                                        ?>
                                                        <p class="gak-news-card-box__short"><?php the_excerpt(); ?> <span class="gak-arrow-footer-black"></span></p>

                                                        <?php
                                                        } else { ?>
                                                            <p class="gak-news-card-box__short"><?php $content = strip_tags(get_the_content()); echo mb_strimwidth($content, 0, 100, '...');?><span class="gak-arrow-footer-black"></span></p>
                                                            <?php
                                                        } ?>
                                                                                                                        
                                                </div>

                                            </div>
                                        </a>

                                    </div>
                                    <?php
                                    }
                                }
                            
                            ?>

                    </div>
                </div>
            </div>

        </div>

    </section>

</main>

<?php get_footer(); ?>