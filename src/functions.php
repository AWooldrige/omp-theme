<?php

/**
 * Specify that this theme supports thumbnails, otherwise no support for
 * thumbnails is provided in the admin interface
 */
add_theme_support('post-thumbnails');
add_image_size('omp-recipe-peepbox', 370, 170, true);
add_image_size('omp-recipe-featured-image', 770, 999999);

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
        $iLine = "\n".'<dt>'.$i['name']."</dt>\n";

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
 * Return an unformatted list for the meta items, with an icon for each
 *
 * @param array $meta key/value of metadata about recipe
 * @access public
 * @return string unordered list of meta items for display
 */
function ompThemeMeta($meta) {
    $line = "<ul class=\"omp-recipe-meta\">\n";
    foreach($meta as $key => $val) {
        $icon = '';
        switch($key) {
            case 'active_time':
                $title = 'Active Time';
                $icon = 'icon-time';
                break;
            case 'inactive_time':
                $title = 'Inactive Time';
                $icon = 'icon-time';
                break;
            case 'difficulty':
                $title = 'Difficulty';
                $icon = 'icon-signal';
                break;
            case 'rating':
                $title = 'Our Rating';
                $icon = 'icon-star';
                break;
            case 'cost':
                $title = 'Cost per Serving';
                $icon = 'icon-shopping-cart';
                break;
            case 'serves':
                $title = 'Serves';
                $icon = 'icon-user';
                break;
        }
        $line .= '<li><i class="'.$icon.'"></i> '.$title.': '.$val."</li>\n";
    }
    $line .= '<!-- /omp-recipe-meta -->';
    $line .= "\n</ul>\n";

    return $line;
}

/**
 * Output a generic HTML list from the array given. The array is expected to
 * have the following format:
 * TODO
 *
 * @param array $data unordred list containing data to format
 * @param string $type optional list type (ul or ol). Defaults to ul
 * @param string $class optional css class to apply to the UL
 * @access public
 * @return void
 */
function ompThemeList(array $data, $type = 'ul', $class = NULL) {

    if((count($data) === 1) || ($data === Null)) return null;

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
