


<?php
//## przygotowanie listy tagów
$all_tags = get_tags(array(
    'exclude' => array(10, 44),
    'hide_empty' => false
));
$allowed_tags = [];
foreach($all_tags as $f_tag) {
    $allowed_tags[] = $f_tag->slug;
}

//## przygotowanie listy "dla kogo"
$all_terms = get_terms([
    'taxonomy' => 'dla_kogo',
    'hide_empty' => false,
]);
$allowed_terms = [];
foreach($all_terms as $f_tag) {
    $allowed_terms[] = $f_tag->slug;
}

//## pobranie i walidacja danych z GET
if(!empty($_GET['data'])) {
    $f_date = preg_replace('#[^\d/.-]#iu', '', strtr(urldecode($_GET['data']), array('-' => '/', '.' => '/')));
    $f_date_ts = strtotime(strtr($f_date, ['/' => '-']));
    $f_month_year = '';
    $f_month = date('m', $f_date_ts);
    $f_year = date('Y', $f_date_ts);
} else {
    $f_date = '';
    
    $f_month_year = (
        !empty($_GET['msc']) && preg_match('#^(0[1-9]|1[0-2])-(2\d{3})$#i', $_GET['msc'])
            ? $_GET['msc']
            : date('m-Y')
    );
    
    $day = ($f_month_year == date('m-Y') ? date('d') : '01');
    $f_date_ts = strtotime($day.'-'.$f_month_year);
    $f_month = date('m', $f_date_ts);
    $f_year = date('Y', $f_date_ts);
}

$f_tag = (!empty($_GET['tag']) && in_array($_GET['tag'], $allowed_tags) ? $_GET['tag'] : '');
$f_term = (!empty($_GET['dla']) ? $_GET['dla'] : '');
$f_terms = array_intersect($allowed_terms, explode('+', $f_term));
$f_paged = max(1, (!empty($_GET['strona']) ? (int)$_GET['strona'] : 1));

$prev_moyr = date('m-Y', strtotime('-1 month', $f_date_ts));
$next_moyr = date('m-Y', strtotime('+1 month', $f_date_ts));
$month_name = date_i18n('F', $f_date_ts);
$f_date_ymd = date('Ymd', $f_date_ts);

//## pobranie wydarzeń z uwzględnieniem filtrów
$events_args = array(
    'post_type' => 'post',
    'category__not_in' => 9, //wykluczone Aktualności
    'posts_per_page' => 8,
    'paged' => $f_paged,
    'order' => 'ASC',
    'orderby' => 'meta_value',
    'meta_key'  => 'data_wydarzenia_poczatek',
);
if(!empty($f_date)) {
    $events_args['meta_query'] = array(
        'relation' => 'OR',
        array(
            'relation' => 'AND',
            array(
                'key'     => 'data_wydarzenia_poczatek',
                'value'   => $f_date_ymd,
                'type' => 'DECIMAL',
            ),
            array(
                'key'     => 'data_wydarzenia_koniec',
                'value'   => '',
            ),
        ),
        array(
            'relation' => 'AND',
            array(
                'key'     => 'data_wydarzenia_poczatek',
                'compare' => '<=',
                'value'   => $f_date_ymd,
                'type' => 'DECIMAL',
            ),
            array(
                'key'     => 'data_wydarzenia_koniec',
                'compare' => '!=',
                'value'   => '',
            ),
            array(
                'key'     => 'data_wydarzenia_koniec',
                'compare' => '>=',
                'value'   => $f_date_ymd,
                'type' => 'DECIMAL',
            ),
        ),
    );
    
} elseif(!empty($f_month_year)) {
    $events_args['meta_query'] = array(
        'relation' => 'OR',
        array(
            'key'     => 'data_wydarzenia_poczatek',
            'value'   => array(
                $f_date_ymd,
                date('Ymd', strtotime('last day of this month', $f_date_ts))
            ),
            'type'    => 'numeric',
            'compare' => 'BETWEEN',
        ),
        array(
            'relation' => 'AND',
            array(
                'key'     => 'data_wydarzenia_poczatek',
                'compare' => '<=',
                'value'   => $f_date_ymd,
                'type' => 'DECIMAL',
            ),
            array(
                'key'     => 'data_wydarzenia_koniec',
                'compare' => '!=',
                'value'   => '',
            ),
            array(
                'key'     => 'data_wydarzenia_koniec',
                'compare' => '>=',
                'value'   => $f_date_ymd,
                'type' => 'DECIMAL',
            ),
        ),
    );
}
if(!empty($f_tag)) {
    $events_args['tag'] = $f_tag;
}
if(!empty($f_terms)) {
    $events_args['tax_query'] = array(
        array(
            'taxonomy' => 'dla_kogo',
            'field'    => 'slug',
            'terms'    => $f_terms,
            'operator' => 'IN',
        ),
    );
}
if(isset($GLOBALS['facility_category'])) {
    $events_args['category_name'] = $GLOBALS['facility_category'];
}

$post_query = new WP_Query($events_args);

if(!empty($post_query->found_posts)) {
    $pages = ceil($post_query->found_posts / $events_args['posts_per_page']);
} else {
    $pages = 1;
}

$base_url = strtok($_SERVER['REQUEST_URI'], '?');
?>
<form action="<?php echo $base_url; ?>#calendar" method="get" id="calendar-filters" style="display: none;">
    <label for="msc">Miesiąc</label>
    <input name="msc" id="msc" type="text" value="<?php echo $f_month_year; ?>" title="Miesiąc">
    <label for="data">Data</label>
    <input name="data" id="data" type="text" value="<?php echo $f_date; ?>" title="Data">
    <label for="tag">Tag</label>
    <input name="tag" id="tag" type="text" value="<?php echo $f_tag; ?>" title="Tag">
    <label for="dla">Dla kogo</label>
    <input name="dla" id="dla" type="text" value="<?php echo $f_term; ?>" title="Dla kogo">
    <input type="submit" value="Wyszukaj wydarzenie" style="display: none;" title="Przycisk">
</form>
<div id="calendar"></div>
<div uk-grid id="calendar-section">
   
    <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-4@m uk-width-1-5@l">
        <div class="gak-transformed-date">
            
            <div class="gak-month-date">
                <p><?php echo $month_name.' '.$f_year; ?></p>
            </div>
            
            <div class="gak-arrow-box">
                
                <a class="gak-prev" data-ym="<?php echo $prev_moyr; ?>"
                   href="<?php echo $base_url.'?msc='.$prev_moyr; ?>" title="Strzałka poprzedni miesiąc">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13.005 26">
                        <path d="M0 13.005L12.995 0l.01 26z"/></svg>
                </a>
                
                <div class="gak-divider-black"></div>
                
                <a class="gak-next" data-ym="<?php echo $next_moyr; ?>"
                   href="<?php echo $base_url.'?msc='.$next_moyr; ?>" title="Strzałka następny miesiąc">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13.025 26">
                        <path d="M13.025 13.025L0 26 .05 0z"/></svg>
                </a>
            
            </div>
        </div>
    </div>
    
    <div class="uk-width-1-1 uk-width-1-1@s uk-width-3-4@m uk-width-4-5@l gak-min-height">
        <div class="uk-container gak-padding-left-100">
            
            <h2 class="gak-calendar-title">Kalendarz wydarzeń:</h2>
            
            <div uk-grid>
                
                <!-- <div
                    class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@m uk-width-1-1@l uk-width-1-3@xl gak-datapicker-container">
                    <label for="datapicker-gak">wybierz datę: </label>
                    <div class="gak-datapicker-box">
                        <input type="text" name="datapicker-gak" id="datapicker-gak" class="gak-datapicker" value="<?php echo $f_date; ?>" title="Wybierz datę">
                    </div>
                
                </div> -->

                <div style="display:none2"
                    class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@m uk-width-1-1@l uk-width-1-3@xl gak-datapicker-container">

                    <label id="datepickerLabel" for="datepicker">wybierz datę: </label>
                    <div class="gak-datapicker-box">
                        <input type="text" class="gak-datapicker" id="datepicker" value="<?php echo $f_date; ?>" title="Wybierz datę">
                    </div>

                </div>

                <?php if (!empty($all_tags)) { ?>
                <div id="tag_cloud-2"
                     class=" uk-width-1-1 uk-width-1-1@s uk-width-1-1@m uk-width-1-1@l uk-width-2-3@xl widget">
                    <div class="tagcloud">
                        <div id="tag_cloud-1" class="widget widget_tag_cloud">
                            
                            <div class="tagcloud">
                                <a href="<?php echo $base_url; ?>" aria-label="wszystkie" class="tag-cloud-link">
                                    wszystkie
                                </a>
                            <?php
                            foreach($all_tags as $item) {
                                $url = $base_url . '?tag=' . $item->slug;
                                $selected = ($item->slug == $f_tag);
                                ?>
                                <a href="<?php echo $url; ?>" aria-label="<?php echo $item->slug; ?>"
                                   class="tag-cloud-link<?php echo ($selected ? ' active' : ''); ?>">
                                    <?php echo $item->name . ' '; ?>
                                </a>
                                <?php
                            }
                            ?>
                            
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
                <?php if (!empty($all_terms)) { ?>
                <div class="gak-form-100">

                    <div class="uk-margin uk-grid-small uk-flex-middle uk-child-width-auto uk-grid">
<!--  -->
<?php
    $args = array(
        'post_type' => 'post',  // Replace 'post' with the appropriate post type if needed
        'posts_per_page' => -1, // Retrieve all posts
    );

    $loop = new WP_Query($args);

    $authors = array(); // Array to store authors

    if ($loop->have_posts()) {
        while ($loop->have_posts()) {
            $loop->the_post();

            // Get the author's display name
            $author_name = get_the_author();

            // Exclude "artneo" and "admin" from the array
            if ($author_name !== 'Artneo' && $author_name !== 'Admin') {
                // Store the author's name in the array
                $authors[] = $author_name;
            }
        }
    }

    // Restore original post data
    wp_reset_postdata();

    // Deduplicate the array of authors
    $deduplicatedAuthors = array_unique($authors);
    ?>
        <div class="uk-flex uk-flex-middle gak_calendar_authors_holder">
           <label for="gak_calendar_authors_filter"  class="uk-margin-small-right" >Autor</label>
            <select class="" name="gak_calendar_authors_filter" id="gak_calendar_authors_filter">
                <option value=""></option>
                <?php foreach ($deduplicatedAuthors as $author): ?>
                    <option value="<?php echo $author; ?>"><?php echo $author; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


                        <ul class="gak-terms-ul">
                
                        <?php
                        $counter = 0;
                        foreach($all_terms as $item) {
                            $counter++;
                            $selected = in_array($item->slug, $f_terms);
                            ?>
                            <li>
                                <input class="styled-checkbox" type="checkbox"
                                    <?php echo ($selected ? 'checked="checked"' : '') ?>
                                    id="styled-checkbox-<?php echo $counter ?>" name="styled-checkbox-<?php echo $counter ?>" value="<?php echo $item->slug ?>">
                                <label for="styled-checkbox-<?php echo $counter ?>"> <?php echo $item->name ?></label>
                            </li>
                            <?php
                        }
                        ?>

                        </ul>
                        
                        <a class="gak-reset-fields <?php echo (empty($_SERVER['QUERY_STRING']) ? 'gak-disabled-reset' : ''); ?>" href="<?php echo $base_url; ?>"> wyczyść filtry
                        </a>
                    </div>
                </div>
                <?php } ?>

                <div class="gak-filter-btn-box">
                
                    <button class="gak-small-calendar-box__link gak-arrow-link gak-btn-filter-events" aria-label="Wyszukaj wydarzenie">
                        <span aria-hidden="true">___</span>
                        wyszukaj wydarzenie
                    </button>

                </div>
                
            </div>
            
            <div class="gak-news-grid gak-news-grid--bmargin gak-event-cal-box">
                    <div class="uk-child-width-1-1 uk-child-width-1-1@s uk-child-width-1-1@m uk-child-width-1-2@l gak-check-if-empty" uk-grid>
                    <?php
                    
                    if($post_query->have_posts() ) {

                        $counter = -1;

                        while($post_query->have_posts() ) {
                            $counter++;
                            $post_query->the_post();
                            
                            $date_start = get_field('data_wydarzenia_poczatek');
                            $date_start_ts = strtotime($date_start);
                            $date_end = get_field('data_wydarzenia_koniec');
                            $date_end_ts = strtotime($date_end);
                            $dateToday = date("d-m-Y");

                            /*$dateTimestampStart = strtotime($date_start);
                            $dateTimestampToday = strtotime($dateToday);
                            $dateTimestampEnd = strtotime($date_end);*/

                            ?>
                    
                            <?php
                            //if (( $dateTimestampStart >= $dateTimestampToday) || ( $dateTimestampEnd >= $dateTimestampToday) ) {
                                ?>
                         
                            <div>

                                    <a class="gak-news-card__link"
                                    <?php echo (
                                        stripos($_template_file, 'single-placowki-index') !== false
                                            ? 'href="#events-'. $counter .'" uk-toggle'
                                            : 'href="'. get_permalink() .'"'
                                    ); ?>
                                >
                                    <div class="gak-news-card">
                                        
                                        <?php
                                        $posttags = get_the_tags();
                                        $imageArray = get_field('zdjecie_wydarzenia');
                             
                                        if (!empty($posttags)) {
                                            $post_tag = current($posttags);
                                            ?>
                                            <div class="gak-news-category-color gak-news-category-color--<?php echo $post_tag->name . ''; ?>">
                                                <?php if( get_field('zdjecie_wydarzenia') ) { ?>
                                                    <img class="gak-news-card__img" src="<?php echo esc_url($imageArray['url']); ?>" alt="<?php echo esc_attr($imageArray['alt']); ?>" title="" />
                                                <?php } ?>
                                                
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        
                                        <div class="gak-news-card-box">
                                            <p class="gak-black-date">
                                                <span class="gak-black-date__number"><?php echo date_i18n("d", $date_start_ts) ?></span>
                                                <span class="gak-black-date__text"><?php echo date_i18n("F", $date_start_ts) ?></span>
                                                <?php if( !empty($date_end) && $date_start_ts != $date_end_ts ) { ?>
                                                    <span class="gak-date-separator">-</span>
                                                    <span class="gak-black-date__number"><?php echo date_i18n("d", $date_end_ts) ?></span>
                                                    <span class="gak-black-date__text"><?php echo date_i18n("F", $date_end_ts) ?></span>
                                                <?php } ?>
                                            </p>
                                            <p class="gak-news-card-box__title"><?php the_title(); ?></p>

                                            <?php if ( has_excerpt() ) {
                                                        ?>
                                                        <p class="gak-news-card-box__short"><?php the_excerpt(); ?> </p>

                                                        <?php
                                                        } else { ?>
                                                            <p class="gak-news-card-box__short"><?php $content = strip_tags(get_the_content()); echo mb_strimwidth($content, 0, 100, '...');?></p>
                                                            <?php
                                                        } ?>
                                        
                                        </div>
                                    
                                    </div>
                                </a>
                                
                                <?php if(stripos($_template_file, 'single-placowki-index') !== false) { ?>
                                <div id="events-<?php echo $counter; ?>" class="uk-modal-container uk-flex-top" uk-modal>
                                    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-padding-remove">
                                    <button class="uk-modal-close-default" type="button" uk-close></button>

                                        <?php
                                        include get_theme_file_path('calendar-event.php');
                                        ?>
                                    </div>
                                </div>
                                <?php } ?>
               

                            </div>
                         
                            <?php //} ?>
  
                            <?php
                        }
                    } else {
                        ?>
                        <p class="message">Nie znaleziono wydarzeń spełniających wybrane kryteria...</p>
                        <?php
                    }
                    ?>
                
                </div>
            </div>

            <?php if($pages > 1) { ?>
            <div class="pagination">
                <?php
                echo paginate_links( array(
                    'base'         => $base_url.'%_%',
                    'format'       => '?strona=%#%',
                    'type'         => 'list',
                    'total'        => $post_query->max_num_pages,
                    'current'      => $f_paged,
                    'show_all'     => false,
                    'end_size'     => 2,
                    'mid_size'     => 1,
                    'prev_next'    => false,
                    'add_args'     => ['msc' => $f_month_year, 'data' => $f_date, 'tag' => $f_tag, 'dla' => implode('+', $f_terms)],
                    'add_fragment' => '',
                ) );
                ?>
            </div>
            <?php } ?>
        
        </div>
    </div>
</div>
