<?php
/**
 * sitemapFriend
 *
 * Copyright 2012 by Jérôme Perrin <hello@jeromeperrin.com>
 *
 * - Based on GoogleSiteMap by Shaun McCormick <shaun@modx.com>
 *
 * This file is part of sitemapFriend.
 *
 * sitemapFriend is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * sitemapFriend is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * sitemapFriend; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package sitemapfriend
 */

/**
 * sitemapFriend build script
 *
 * @package sitemapfriend
 * @subpackage build
 */

/**
 * @author splittingred
 * @param string $filename The name of the file.
 * @return string The file's content
 */
function getSnippetContent($filename) {
    $o = file_get_contents($filename);
    $o = trim(str_replace(array('<?php','?>'),'',$o));
    return $o;
}

/* @author Mark Hamstra */
$snips = array(
    // snippet name => snippet description
    'sitemapFriend' => 'Allows you to generate site maps as HTML, XML or other formats.',
);

$snippets = array();
$idx = 0;

foreach ($snips as $sn => $sdesc) {
    $idx++;
    $snippets[$idx] = $modx->newObject('modSnippet');
    $snippets[$idx]->fromArray(array(
       'id' => $idx,
       'name' => $sn,
       'description' => $sdesc,
       'snippet' => getSnippetContent($sources['snippets'].$sn.'.snippet.php')
    ));

    $snippetProperties = include $sources['snippets'].$sn.'.properties.php';
    $snippets[$idx]->setProperties($snippetProperties);

    // $snippetProperties = array();
    // $props = include $sources['snippets'].$sn.'.properties.php';
    // foreach ($props as $key => $value) {
    //     if (is_string($value) || is_int($value)) { $type = 'textfield'; }
    //     elseif (is_bool($value)) { $type = 'combo-boolean'; }
    //     else { $type = 'textfield'; }
    //     $snippetProperties[] = array(
    //         'name' => $key,
    //         'desc' => PKG_NAME_LOWER . '.prop_desc.'.$key,
    //         'type' => $type,
    //         'options' => '',
    //         'value' => ($value != null) ? $value : '',
    //         'lexicon' => PKG_NAME_LOWER . ':default'
    //     );
    // }

    // if (count($snippetProperties) > 0)
        // $snippets[$idx]->setProperties($snippetProperties);
}

return $snippets;
