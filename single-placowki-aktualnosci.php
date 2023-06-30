<?php get_header(); ?>
<?php $parentPageId = wp_get_post_parent_id( $post_ID ); ?>

    <main>

        <section class="uk-margin-large-top">

            <div class="uk-container uk-container-expand">

                <div class="gak-new-events-about">

                    <div class="uk-container uk-container-expand uk-padding-remove">
                        <div class="gak-news-grid">
                            <div class="uk-child-width-1-1 uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-2@l uk-child-width-1-3@xl" uk-grid>

                                <?php
                                    $facilityName = strtr(sanitize_title(get_field('nazwa_stacji', $parentPageId)), ['-' => '_']);
                                    $args = array(
                                        'post_type' => 'post',
                                        'category_name' => 'aktualnosc+' . $facilityName,
                                        'posts_per_page' => 30,
                                    );

                                    $post_query = new WP_Query($args);

                                    if($post_query->have_posts() ) {
                                        
                                        $counter = 0;
                                        while($post_query->have_posts() ) {
                                            $counter++;
                                            $post_query->the_post();
	
	                                        /*if( !in_category( $facilityName ) ) {
	                                            continue;
                                            }*/
                                            ?>
                                    
                                            <div data-fn="<?=$facilityName?>">
                                                <a class="gak-news-modal" href="#news-<?php echo $counter; ?>" uk-toggle>
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

                                                <div id="news-<?php echo $counter; ?>" class="uk-modal-container uk-flex-top" uk-modal>
                                                    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
                                                    <button class="uk-modal-close-default" type="button" uk-close></button>

                                                            <article class="gak-article-modal">
                                                        
                                                                <div class="uk-container gak-article-container gak-article-left">
                                                        
                                                                    <div>
                                                                        <p class="gak-article-date"><?php echo get_the_date('d.m'); ?>.20<?php echo get_the_date('y'); ?></p>
                                                                    </div>
                                                            
                                                                    <header class="gak-article-header">
                                                            
                                                                        <div uk-grid>
                                                            
                                                                            <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@m uk-width-1-2@l">
                                                                                <h2 class="gak-article-header__text"><?php the_title(); ?></h2>
                                                                            </div>
                                                            
                                                                            <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@m uk-width-1-2@l gak-flex-end">
                                                                                <div class="gak-soc-share"><h2 class="gak-sh-text">udostępnij na:</h2>
                                                                                <a title="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" rel="nofollow">
                                                                                    <svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="9.851" height="19.7"><path data-name="Path 203" d="M8.053 3.271h1.8V.139A23.229 23.229 0 007.231 0C4.638 0 2.862 1.631 2.862 4.629v2.759H.001v3.5h2.861V19.7H6.37v-8.81h2.741l.436-3.5H6.365V4.976c0-1.012.273-1.7 1.684-1.7z"></path></svg>
                                                                                        facebook
                                                                                    </a>
                                                                                    <a title="twitter" href="http://twitter.com/intent/tweet?text=Czytam obecnie <?php the_title(); ?>&url=<?php the_permalink(); ?>" rel="noopener noreferrer">
                                                                                    <svg focusable="false" aria-hidden="true" class="gak-tw" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21.534 7.113A9.822 9.822 0 0024 4.559v-.001c-.893.391-1.843.651-2.835.777a4.894 4.894 0 002.165-2.719 9.845 9.845 0 01-3.12 1.191 4.919 4.919 0 00-8.511 3.364c0 .39.033.765.114 1.122-4.09-.2-7.71-2.16-10.142-5.147a4.962 4.962 0 00-.674 2.487c0 1.704.877 3.214 2.186 4.089A4.863 4.863 0 01.96 9.116v.054a4.943 4.943 0 003.942 4.835c-.401.11-.837.162-1.29.162-.315 0-.633-.018-.931-.084.637 1.948 2.447 3.381 4.597 3.428a9.89 9.89 0 01-6.101 2.098c-.403 0-.79-.018-1.177-.067a13.856 13.856 0 007.548 2.208c8.683 0 14.342-7.244 13.986-14.637z"/></svg>
                                                                                            twitter
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                            
                                                                        </div>
                                                            
                                                                    </header>
                                                                </div>
                                                        
                                                                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo $alt ?>" title="<?php the_title(); ?>">
                                                        
                                                                <div class="uk-container gak-article-container">
                                                        
                                                                    <div class="gak-edit-article">
                                                        
                                                                    <?php the_content(); ?>
                                                        
                                                                    </div>
                                                        
                                                                    <div class="gak-article-gallery">

                                                    
                                                                    <?php 
                                                                    $images = get_field('galeria_aktualnosci');

                                                                

                                                                    if( $images ): ?>

                                                                    <div class="gak-article-gallery">

                                                                        <h2 class="gak-article-gallery__title">Galeria:</h2>

                                                                        <div class="uk-position-relative uk-light" tabindex="-1" uk-slider>

                                                                            <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-child-width-1-5@l uk-grid" uk-lightbox="animation: fade">
                                                                                <?php foreach( $images as $image ): ?>
                                                                                    <li>
                                                                                        <a class="uk-inline" href="<?php echo esc_url($image['url']); ?>" title="<?php echo esc_attr($image['alt']); ?>" data-alt="<?php echo esc_attr($image['alt']); ?>">
                                                                                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                                                                        </a>
                                                                            
                                                                                    </li>
                                                                                <?php endforeach; ?>
                                                                            </ul>


                                                                        </div>   

                                                                    </div>    
                                                                    <?php endif; ?>
                                                                            
                                                                    </div>
                                                        
                                                                </div>

                                                            </article>
                                                    
                                                    </div>
                                                </div>

                                            </div>
                                            
                                            <?php
                                            }
                                        }
                                    
                                    ?>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>

    </main>

<?php get_footer(); ?>
