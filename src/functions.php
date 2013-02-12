<?php

/**
 * Specify that this theme supports thumbnails, otherwise no support for
 * thumbnails is provided in the admin interface
 */
add_theme_support('post-thumbnails');
add_image_size('omp-recipe-peepbox-370-300', 370, 300, true);
add_image_size('omp-recipe-featured-image', 770, 999999);
add_image_size('omp-recipe-extra-images', 560, 999999);

/**
 * Return a formatted ingredients description list
 *
 * @param array $ingredients 1D array of ingredients
 * @access public
 * @return string the HTML DL representation of the array
 */
function ompThemeIngredientsListDescription($ingredients) {
    $line = "<dl>";
    foreach($ingredients as $i) {
        $directives = ($i['quantity'] !== NULL) ? $i['quantity'] : '';
        $directives .= ($i['directive'] !== NULL) ? ' - '.$i['directive'] : '';
        $directives = (mb_strlen($directives) > 0) ? $directives : NULL;
        $iLine = "\n".'<dt itemprop="ingredients">'.$i['name']."</dt>\n";

        if($directives !== NULL) {
            $iLine .= '<dd>'.$directives."</dd>";
        }
        $line .= $iLine;
    }
    $line .= "\n</dl>\n";
    return $line;
}

/**
 * Recursive method to output the Method array as an ordered list
 *
 * @param array $method n dimension array containing the method for the recipe
 * @access public
 * @return string HTML OL representation of the method array
 */
function ompThemeMethodList($method) {
    $line = "<ul class=\"omp-method-list\">\n";
    foreach($method as $m) {
        $iLine = '    <li><span class="omp-method-name">' . $m['item'] .
                 '</span>';
        if ($m['subitems'] !== NULL) {
            $iLine .= ompThemeMethodList($m['subitems']);
        }
        $iLine .= "</li>\n";
        $line .= $iLine;
    }
    $line .= '<!-- /omp-method-list -->';
    $line .= "\n</ul>\n";

    return $line;
}

/**
 * Output a generic HTML list from the array given. The array is expected to
 * have the following format:
 *
 * @param array $data unordred list containing data to format
 * @param string $type optional list type (ul or ol). Defaults to ul
 * @param string $class optional css class to apply to the UL
 * @access public
 * @return void
 */
function ompThemeList(array $data, $type = 'ul', $class = NULL) {

    if((count($data) <= 0) || ($data === Null)) return null;

    $line = '<' . $type;
    if ($class !== NULL) {
        $line .= ' class="' . $class . '"';
    }
    $line .= ">\n";
    foreach($data as $m) {
        $iLine = '    <li>' . $m['item'];
        if ($m['subitems'] !== NULL) {
            $iLine .= ompThemeMethodList($m['subitems']);
        }
        $iLine .= "</li>\n";
        $line .= $iLine;
    }
    $line .= '<!-- /' . $class . ' -->';
    $line .= "\n</" . $type . ">\n";

    return $line;
}

function add_custom_taxonomies() {
    register_taxonomy(
        'recipe-category',
        'recipe',
        array(
            'hierarchical' => true,
            'labels' => array(
                'name' => __('Recipe Category'),
                'singular_name' => __('Recipe Category'),
                'search_items' => __('Search Recipe Categories'),
                'all_items' => __('All Recipe Categories'),
                'parent_item' => __('Parent Recipe Category'),
                'parent_item_colon' => __('Parent Recipe Category:'),
                'edit_item' => __('Edit Recipe Category'),
                'update_item' => __('Update Recipe Category'),
                'add_new_item' => __('Add New Recipe Category'),
                'new_item_name' => __('New Recipe Category'),
                'menu_name' => __('Recipe Categories'),
            ),
            'rewrite' => array(
                'slug' => 'locations',
                'with_front' => false,
                'hierarchical' => true
            ),
        )
    );
}
add_action('init', 'add_custom_taxonomies', 0);

/**
 * Registers the OMP custom post types
 */
function register_omp_custom_post_types() {
    register_post_type('recipe',
        array(
            'labels' => array(
                'name' => __('Recipes'),
                'singular_name' => __('Recipe'),
                'add_new' => __('Add New'),
                'add_new_item' => __('Add New Recipe'),
                'edit' => __('Edit'),
                'edit_item' => __('Edit Recipe'),
                'new_item' => __('New Recipe'),
                'view' => __('View'),
                'view_item' => __('View Recipe'),
                'search_items' => __('Search Recipes'),
                'not_found' => __('No recipes found'),
                'not_found_in_trash' => __('No recipes found in Trash'),
                'parent' => __('Parent Recipe'),
            ),
            'public' => true,
            'menu_position' => 5,
            'query_var' => true,
            'has_archive' => true,
            'taxonomies' => array('post_tag', 'recipe-category'),
            'supports' => array(
                'title', 'editor', 'author', 'thumbnail', 'trackbacks',
                'comments', 'revisions', 'post-formats')
        )
    );
}
add_action('init', 'register_omp_custom_post_types');

/**
 * Adds the recipe custom post type to the main post query
 */
function add_omp_custom_post_types_to_main_loop($query) {
    if (is_home() && $query->is_main_query()) {
        $query->set('post_type', array('post', 'recipe'));
    }
    return $query;
}
add_filter('pre_get_posts', 'add_omp_custom_post_types_to_main_loop');
