<?php

/*
 * Template Name: Białe menu
 * Template Post Type: page
 */

?> 

<?php get_header(); ?>

    <main class="uk-padding-remove-top">
        
        <?php

            $about = get_field('biale_menu');

            if( $about ): ?>
            <section class="gak-full-bg" style="background: url(<?php echo $about['o_nas_tlo']; ?>) no-repeat top center fixed">

            <?php endif; ?>  

            <div class="uk-container gak-width-100">

                <div class="gak-basic-edit-text">

                <?php

                    $about = get_field('biale_menu');

                    if( $about ): ?>

                        <h2>
                            <?php echo $about['o_nas_tytul']; ?>

                        </h2>

                        <div>
                            <?php echo $about['o_nas_opis']; ?>
                        </div>

                <?php endif; ?>    
            
                </div>

                <div class="gak-sh">
                    <p>—</p>
                    <p>zobacz nas na:</p> 

                    <ul class="gak-soc-ul">


                            <?php if( get_field('facebook_link', 'option') ): ?>
                                <li>
                                    <a href="<?php the_field('facebook_link', 'option'); ?>" target="_blank" title="link do konta facebook">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9.851" height="19.7" style="fill: rgb(255, 255, 255);">
                                        <path data-name="Path 203" d="M8.053 3.271h1.8V.139A23.229 23.229 0 007.231 0C4.638 0 2.862 1.631 2.862 4.629v2.759H.001v3.5h2.861V19.7H6.37v-8.81h2.741l.436-3.5H6.365V4.976c0-1.012.273-1.7 1.684-1.7z"/>
                                    </svg>
                                    </a>                         
                                </li>

                            <?php endif; ?> 

                            <?php if( get_field('instagram_link', 'option') ): ?>
                                <li>
                                    <a href="<?php the_field('instagram_link', 'option'); ?>" target="_blank" title="link do konta instagram">
                                    <svg data-name="Group 73" xmlns="http://www.w3.org/2000/svg" width="21.777" height="21.777" style="fill: rgb(255, 255, 255);">
                                        <path data-name="Path 200" d="M15.882 0H5.895A5.9 5.9 0 000 5.895v9.988a5.9 5.9 0 005.895 5.895h9.988a5.9 5.9 0 005.895-5.895V5.895A5.9 5.9 0 0015.882 0zm-4.993 16.843a5.955 5.955 0 115.955-5.955 5.961 5.961 0 01-5.955 5.955zm6.1-10.5a1.76 1.76 0 111.76-1.76 1.761 1.761 0 01-1.763 1.755z"/>
                                        <path data-name="Path 201" d="M10.891 6.211a4.678 4.678 0 104.678 4.678 4.683 4.683 0 00-4.678-4.678z"/>
                                        <path data-name="Path 202" d="M16.986 4.095a.483.483 0 10.483.483.483.483 0 00-.483-.483z"/>
                                    </svg>
                                    </a>                                  
                                </li>

                            <?php endif; ?>   
                    </ul>
                </div>

                <div class="gak-flex-end-box">
                    <a class="gak-small-calendar-box__link gak-white-link" href="javascript:history.go(-1)">___wstecz</a>
                </div>


            </div>

            </section>
        
    </main>

<?php get_footer(); ?>