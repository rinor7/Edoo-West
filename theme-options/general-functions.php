<?php 
// Remove WP Block ( Patterns from Appearance )
function remove_wp_block_menu() {
    remove_submenu_page( 'themes.php', 'edit.php?post_type=wp_block' );
}
add_action('admin_init', 'remove_wp_block_menu', 100);



// Disable Theme FileEditor from Appearance
function disable_theme_file_editor() {
    if ( ! defined('DISALLOW_FILE_EDIT') ) {
        define('DISALLOW_FILE_EDIT', true);
    }
}
add_action('init', 'disable_theme_file_editor');



// 
// 
//
//
//
//
//Remove Comments Option from Admin Menu 
function df_disable_comments_admin_menu() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');
// Remove comments from the admin bar
function df_remove_comments_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action('wp_before_admin_bar_render', 'df_remove_comments_admin_bar');
// Remove comments and trackbacks support from post types
function df_remove_comment_support() {
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action('init', 'df_remove_comment_support', 100);
// Redirect any user trying to access comments page
function df_redirect_comments_page() {
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }
}
add_action('admin_init', 'df_redirect_comments_page');
// Close comments on the front-end
function df_disable_comments_status() {
    return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);
// Hide existing comments
function df_hide_existing_comments($comments) {
    $comments = array();
    return $comments;
}
add_filter('comments_array', 'df_hide_existing_comments', 10, 2);





//Function for rendering section headers
function strip_outer_p_tags($content) {
    // Remove outer <p> tags if they exist, but keep inner tags
    if (preg_match('#^<p>(.*)</p>$#is', trim($content), $matches)) {
        return $matches[1];
    }
    return $content;
}

function render_section_header($field_group_name) {
    $fields = get_field($field_group_name, get_the_ID());
    if (!$fields) return;

    $title = $fields['title_section'] ?? '';
    $subtitle = $fields['subtitle_section'] ?? '';

    if ($title || $subtitle) {
        echo '<div class="section-header">';
        
        if ($title) {
            // Add extra class if subtitle is missing
            $title_class = $subtitle ? 'section-header-title' : 'section-header-title no-subtitle';
            echo '<div class="' . esc_attr($title_class) . '">' . wp_kses_post(strip_outer_p_tags($title)) . '</div>';
        }

        if ($subtitle) {
            echo '<div class="section-header-subtitle">' . wp_kses_post(strip_outer_p_tags($subtitle)) . '</div>';
        }

        echo '</div>';
    }
}

//Load locale translation ( this is not connected yet 100% )
function base_theme_load_textdomain() {
    load_theme_textdomain('base-theme-domain-name', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'base_theme_load_textdomain');


//Theme Settings Menu 
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => 'Global Settings',
        'menu_title'    => 'Global Settings',
        'menu_slug'     => 'global-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

add_filter('wpcf7_form_tag', function($tag) {
    if ($tag['name'] !== 'course-select') return $tag;

    $lang = function_exists('pll_current_language') ? pll_current_language() : 'en';
    $placeholder = $lang === 'de' ? 'Kurs auswählen oder Andere:' : 'Select course or Other:';
    $other_label = $lang === 'de' ? 'Andere (Nachricht schreiben)' : 'Other (write your message)';

    $values = [''];          // empty value for placeholder
    $labels = [$placeholder];

    $courses = get_posts([
        'post_type' => 'courses',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC'
    ]);

    foreach ($courses as $course) {
        $values[] = $course->post_title;
        $labels[] = $course->post_title;
    }

    $values[] = 'other';     // safe value for submission
    $labels[] = $other_label;

    $tag['values'] = $values;
    $tag['labels'] = $labels;

    return $tag;
});



//Breadcrumbs custom
add_filter('wpseo_breadcrumb_links', function($links) {
    if (function_exists('pll_current_language') && pll_current_language() === 'de') {
        // Change the first breadcrumb (home) label and URL for German
        if (isset($links[0])) {
            $links[0]['text'] = 'Startseite';
            $links[0]['url']  = home_url('/de/');
        }

        // Loop through breadcrumb links and change 'Courses' to 'Kurse'
        foreach ($links as &$link) {
            if (isset($link['text']) && $link['text'] === 'Courses') {
                $link['text'] = 'Kurse';
            }
        }
    }
    return $links;
});