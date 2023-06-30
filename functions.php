<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true);
    add_image_size('im450', 450, 253, true);
    add_image_size('im768', 768, 330, true);
    add_image_size('im1920', 1920, 655, true);

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// APP js
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        wp_enqueue_script('app'); // Enqueue it!
    }
}

// Style
function html5blank_styles()
{
    wp_register_style('style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('style'); // Enqueue it!
}

function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/style-login.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

function my_login_logo_url()
{
    return home_url();
}

add_filter('login_headerurl', 'my_login_logo_url');

function my_login_logo_url_title()
{
    return 'GAK';
}

add_filter('login_headertitle', 'my_login_logo_url_title');

// menu
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'header-menu-facility' => __('Header Menu Facility', 'html5blank'), // Cars Navigation
        'footer-menu-1' => __('Footer Menu 1', 'html5blank'), // Footer menu 1 Navigation
        'footer-menu-facility' => __('Footer Menu Facility', 'html5blank'),
        'facility-orunia' => __('Orunia', 'html5blank'),
        'facility-plama' => __('Plama', 'html5blank'),
        'facility-dom-sztuki' => __('Dom Sztuki', 'html5blank'),
        'facility-projektornia' => __('Projektornia', 'html5blank'),
        'facility-scena-muzyczna' => __('Scena Muzyczna', 'html5blank'),
        'facility-teatr-gak' => __('Teatr GAK', 'html5blank'),
        'facility-gama' => __('Gama', 'html5blank'),
        'facility-winda' => __('Winda', 'html5blank'),
        'facility-zespol-piesni-i-tanca-gdansk' => __('Zespół Pieśni i Tańca Gdańsk', 'html5blank'),
        'facility-gdanskie-lodowisko' => __('Gdańskie Lodowisko', 'html5blank'),
        'facility-wyspa-skarbow' => __('Wyspa Skarbów', 'html5blank'),
        'facility-mobilny-dom-kultury' => __('Mobilny Dom Kultury', 'html5blank'),
    ));
}

function show_all_tagcloud_admin( $args, $taxonomies ) {
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX && isset( $_POST['action'] ) && $_POST['action'] === 'get-tagcloud' ) {
	    unset( $args['number'] );
	    $args['hide_empty'] = 0;
	}
	return $args;
}
add_filter( 'get_terms_args', 'show_all_tagcloud_admin', 10, 2 );

//walker
/**
 * Create HTML list of nav menu items.
 * Replacement for the native Walker, using the description.
 *
 * @see    https://wordpress.stackexchange.com/q/14037/
 * @author fuxia
 */
class Description_Walker extends Walker_Nav_Menu
{
    /**
     * Start the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  object $item   Menu item data object.
     * @param  int $depth     Depth of menu item. May be used for padding.
     * @param  array|object $args    Additional strings. Actually always an
                                     instance of stdClass. But this is WordPress.
     * @return void
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
    {
        $classes     = empty ( $item->classes ) ? array () : (array) $item->classes;

        $class_names = join(
            ' nav__item '
        ,   apply_filters(
                'nav_menu_css_class'
            ,   array_filter( $classes ), $item
            )
        );

        ! empty ( $class_names )
            and $class_names = ' class="'. esc_attr( $class_names ) . '"';

        $output .= "<li id='menu-item-$item->ID' $class_names>";

        $attributes  = '';

        ! empty( $item->attr_title )
            and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
        ! empty( $item->target )
            and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        ! empty( $item->xfn )
            and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        ! empty( $item->url )
            and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';

        // insert description for top level elements only
        // you may change this
        $description = ( ! empty ( $item->description ) and 0 == $depth )
            ? '<small class="nav_desc">' . esc_attr( $item->description ) . '</small>' : '';

        $title = apply_filters( 'the_title', $item->title, $item->ID );

        $item_output = $args->before
            . "<a $attributes>"
            . $args->link_before
            . $title
            . '</a> '
            . $args->link_after
            . $description
            . $args->after;

        // Since $output is called by reference we don't need to return anything.
        $output .= apply_filters(
            'walker_nav_menu_start_el'
        ,   $item_output
        ,   $item
        ,   $depth
        ,   $args
        );
    }
}

// anchors class
function my_walker_nav_menu_start_el($item_output, $item, $depth, $args) {
//  $classes     = implode(' ', $item->classes);
    $classes     = 'nav__link';
    $item_output = preg_replace('/<a /', '<a class="'.$classes.'" ', $item_output, 1);
    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'my_walker_nav_menu_start_el', 10, 4);


//walker footer
/**
 * Create HTML list of nav menu items.
 * Replacement for the native Walker, using the description.
 *
 * @see    https://wordpress.stackexchange.com/q/14037/
 * @author fuxia
 */
class Footer_Description_Walker extends Walker_Nav_Menu
{
    /**
     * Start the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  object $item   Menu item data object.
     * @param  int $depth     Depth of menu item. May be used for padding.
     * @param  array|object $args    Additional strings. Actually always an
                                     instance of stdClass. But this is WordPress.
     * @return void
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
    {
        $classes     = empty ( $item->classes ) ? array () : (array) $item->classes;

        $class_names = join(
            ' footer__item '
        ,   apply_filters(
                'nav_menu_css_class'
            ,   array_filter( $classes ), $item
            )
        );

        ! empty ( $class_names )
            and $class_names = ' class="'. esc_attr( $class_names ) . '"';

        $output .= "<li id='menu-item-$item->ID' $class_names>";

        $attributes  = '';

        ! empty( $item->attr_title )
            and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
        ! empty( $item->target )
            and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        ! empty( $item->xfn )
            and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        ! empty( $item->url )
            and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';

        // insert description for top level elements only
        // you may change this
        $description = ( ! empty ( $item->description ) and 0 == $depth )
            ? '<small class="nav_desc">' . esc_attr( $item->description ) . '</small>' : '';

        $title = apply_filters( 'the_title', $item->title, $item->ID );

        $item_output = $args->before
            . "<a $attributes>"
            . $args->link_before
            . $title
            . '</a> '
            . $args->link_after
            . $description
            . $args->after;

        // Since $output is called by reference we don't need to return anything.
        $output .= apply_filters(
            'footer_walker_nav_menu_start_el'
        ,   $item_output
        ,   $item
        ,   $depth
        ,   $args
        );
    }
}

// footer anchors class
function footer_my_walker_nav_menu_start_el($item_output, $item, $depth, $args) {
    //  $classes     = implode(' ', $item->classes);
        $classes     = 'footer__link';
        $item_output = preg_replace('/<a /', '<a class="'.$classes.'"', $item_output, 1);
        return $item_output;
    }
add_filter('footer_walker_nav_menu_start_el', 'footer_my_walker_nav_menu_start_el', 10, 4);


// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
// Remove Injected classes, ID's and Page ID's from Navigation <li> items
// Remove Injected classes, ID's and Page ID's from Navigation <li> items
// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
//add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
//function create_post_type_html5()
//{
//    register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
//    register_taxonomy_for_object_type('post_tag', 'html5-blank');
//    register_post_type('html5-blank', // Register Custom Post Type
//        array(
//        'labels' => array(
//            'name' => __('HTML5 Blank Custom Post', 'html5blank'), // Rename these to suit
//            'singular_name' => __('HTML5 Blank Custom Post', 'html5blank'),
//            'add_new' => __('Add New', 'html5blank'),
//            'add_new_item' => __('Add New HTML5 Blank Custom Post', 'html5blank'),
//            'edit' => __('Edit', 'html5blank'),
//            'edit_item' => __('Edit HTML5 Blank Custom Post', 'html5blank'),
//            'new_item' => __('New HTML5 Blank Custom Post', 'html5blank'),
//            'view' => __('View HTML5 Blank Custom Post', 'html5blank'),
//            'view_item' => __('View HTML5 Blank Custom Post', 'html5blank'),
//            'search_items' => __('Search HTML5 Blank Custom Post', 'html5blank'),
//            'not_found' => __('No HTML5 Blank Custom Posts found', 'html5blank'),
//            'not_found_in_trash' => __('No HTML5 Blank Custom Posts found in Trash', 'html5blank')
//        ),
//        'public' => true,
//        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
//        'has_archive' => true,
//        'supports' => array(
//            'title',
//            'editor',
//            'excerpt',
//            'thumbnail'
//        ), // Go to Dashboard Custom HTML5 Blank post for supports
//        'can_export' => true, // Allows export in Tools > Export
//        'taxonomies' => array(
//            'post_tag',
//            'category'
//        ) // Add Category and Post Tags support
//    ));
//}

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}

// Advanced option page in admin menu

if( function_exists('acf_add_options_page') ) {
    
    // add parent
   $parent = acf_add_options_page(array(
       'page_title' 	=> 'Opcje strony',
       'menu_title' 	=> 'Opcje strony',
       'redirect' 		=> false
   ));
   
}

function wphe_body_classes( $classes ) {
    global $post;
    
    if ( is_singular( 'page' ) ||  is_singular( 'post' ) || is_singular('placowki') ) {

        $monthName = date('m');
        $months = array(1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5', 6 => '6', 7 => '7', 8 => '8', 9 => '9', 10 => '10', 11 => '11', 12 => '12');

        foreach ($months as $index => $month) {
            if($month == $monthName){
                $month_number = $month;
            break;
            }
        }

        $classes[] = "gak-month-{$month_number}";
    }
    
    if (  !is_singular('placowki') && is_single() && !in_category( 'Aktualność' ) ) {
        $classes[] = 'gak-negative';
    }
    
    if ( is_singular('placowki') && is_single( array( 'O nas' ))) {
        $classes[] = 'gak-negative-facility';
    }

    if ( is_singular('placowki') && !is_single( array( 'O nas' ))) {
        $classes[] = 'gak-facility-body';
    }

    if ( is_page('dla-mediow') ) {
        $classes[] = 'gak-month-13';
    }
    
    if ( is_page('o-nas') ) {
        $classes[] = 'gak-negative';
    }
    
    if ( is_front_page() ) {
        $classes[] = 'index';
    }
    
    return $classes;
}


add_filter( 'body_class', 'wphe_body_classes' );

// Our custom post type function
function create_posttype() {
 
    register_post_type( 'placowki',
    // CPT Options
        $labels = array(
            'labels' => array(
                'name' => __( 'Placówki' ),
                'singular_name' => __( 'placowki' )
            ),
            'public' => true,
            'publicly_queryable' => true,
            'query_var' => true,
            'rewrite' => true,
            'hierarchical' => true,
            'capability_type' => 'page',
            'supports' => array('title', 'page-attributes'),
            'taxonomies' => array( 'category' ),
            'has_archive' => false,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-id-alt',
 
        )
    );
}

// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

add_action( 'init', 'create_forwho_taxonomy' );

function create_forwho_taxonomy() {
	$labels = array(
		'name'                           => 'Dla kogo?',
		'singular_name'                  => 'Dla kogo?',
		'search_items'                   => 'Wyszukaj',
		'all_items'                      => 'Wszystkie',
		'edit_item'                      => 'Edytuj',
		'update_item'                    => 'Aktualizuj',
		'add_new_item'                   => 'Dodaj',
		'new_item_name'                  => 'Nowa nazwa',
		'menu_name'                      => 'Dla kogo?',
		'view_item'                      => 'Zobacz Dla kogo?',
		'popular_items'                  => 'Popularne',
		'separate_items_with_commas'     => 'Oddziel dla kogo przecinkami (Dorośli, Dzieci, Familijne, Młodzież, Seniorzy)',
		'add_or_remove_items'            => 'Usuń',
		'choose_from_most_used'          => 'Wybierz z najpopularniejszych',
		'not_found'                      => 'Nie znaleziono'
	);

	register_taxonomy(
		'dla_kogo',
		'post',
		array(
			'label' => __( 'Dla Kogo?' ),
			'hierarchical' => false,
			'labels' => $labels,
			'public' => true,
			'show_in_nav_menus' => false,
			'show_tagcloud' => false,
			'show_admin_column' => true,
			'rewrite' => array(
				'slug' => 'dla_kogo'
			)
		)
	);
}

function add_my_post_types_to_query( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'placowki' ) );
    return $query;
}

function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);

function wps_parent_post(){
    global $post;
    if ($post->post_parent){
      $ancestors=get_post_ancestors($post->ID);
      $root=count($ancestors)-1;
      $parent = $ancestors[$root];
    } else {
      $parent = $post->ID;
    }
    if($post->ID != $parent){
        echo get_permalink($parent);
    }
  }

  // Method 2: Setting.
function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyD6hIMIfE0j7ttgCGKjL2_OvHKyf6YD5bE');
}
add_action('acf/init', 'my_acf_init');

add_action('wp_head', function () {
    global $template;
    $tpl_name = strtok(substr( $template, strrpos( $template, '/' ) + 1 ), '.');
    
    if(in_array($tpl_name, array('page-kalendarz-wydarzen', 'single-placowki'))) {
        wp_enqueue_script('calendar', get_template_directory_uri() . '/assets/js/calendar.js', array('jquery'), false, true);
    }
});

// Removes from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

?>

