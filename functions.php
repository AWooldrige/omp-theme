<?php

/**
 * Specify that this theme supports thumbnails, otherwise no support for
 * thumbnails is provided in the admin interface
 */
add_theme_support('post-thumbnails');


/**
 * Return a formatted ingredients unordered list
 *
 * @param array $ingredients 1D array of ingredients
 * @access public
 * @return string the HTML UL representation of the array
 */
function ompThemeIngredientsListUnordered($ingredients) {
    $line = "<ul class=\"omp-ingredients-list\">\n\n";
    foreach($ingredients as $i) {
        $iLine = '    <li><span class="omp-ingredient-name">' . $i['name'] .
                 '</span><br />';

        if ((NULL !== $i['quantity']) || (NULL !== $i['directive'])) {

            $iLine .= '<span class="omp-ingredient-meta">';

            if(NULL !== $i['quantity']) {
                $iLine .= '<span class="omp-ingredient-quantity">' .
                          $i['quantity'] . '</span>';
            }

            if(NULL !== $i['directive']) {

                if(NULL !== $i['quantity']) {
                    $iLine .= ' - ';
                }

                $iLine .= '<span class="omp-ingredient-directive"><em>' .
                          $i['directive'] . '</em></span>';
            }

            $iLine .= '</span>';
        }

        $iLine .= "</li>\n";
        $line .= $iLine;
    }
    $line .= '<!-- /omp-ingredients-list -->';
    $line .= "\n</ul>\n";

    return $line;
}

/**
 * Return a formatted ingredients description list
 *
 * @param array $ingredients 1D array of ingredients
 * @access public
 * @return string the HTML DL representation of the array
 */
function ompThemeIngredientsListDescription($ingredients) {
    $line = "<dl class=\"omp-ingredients-list\">\n\n";
    foreach($ingredients as $i) {
        $iLine = "\n" . '    <dt class="omp-ingredient-name">' . $i['name'] .
            "</dt>\n";

        if(NULL !== $i['quantity']) {
            $iLine .= '    <dd class="omp-ingredient-quantity">' .
                $i['quantity'] . "</dd>\n";
        }

        if(NULL !== $i['directive']) {
            $iLine .= '<dd class="omp-ingredient-directive">' .
                $i['directive'] . "</dd>\n";
        }

        $line .= $iLine;
    }
    $line .= '<!-- /omp-ingredients-list -->';
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
    $line = "<div class=\"row omp-recipe-meta\">\n";
    foreach($meta as $key => $val) {
        $icon = '';
        switch($key) {
            case 'active_time': $icon = 'icon-time'; break;
            case 'inactive_time': $icon = 'icon-time'; break;
            case 'difficulty': $icon = 'icon-signal'; break;
            case 'rating': $icon = 'icon-star'; break;
            case 'cost': $icon = 'icon-shopping-cart'; break;
            case 'serves': $icon = 'icon-user'; break;
        }
        $iLine = '    <div class="span2"><i class="' . $icon . '"></i>' . $key .
                 ': ' . $val . "</div>\n";
        $line .= $iLine;
    }
    $line .= '<!-- /omp-recipe-meta -->';
    $line .= "\n</div>\n";

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

    $line = '<' . $type;
    if ($class !== NULL) {
        $line .= ' class="' . $class . '"';
    }
    $line .= ">\n";
    foreach($method as $m) {
        $iLine = '    <li>' . $m['item'];
        if ($m['subitems'] !== NULL) {
            $iLine .= ompThemeMethodList($m['subitems']);
        }
        $iLine .= "</li>\n";
        $line .= $iLine;
    }
    $line .= '<!-- /' . $class . ' -->';
    $line .= "\n</' . $type . '>\n";

    return $line;
}
