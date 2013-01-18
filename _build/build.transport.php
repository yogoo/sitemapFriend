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

$tstart = explode(' ', microtime());
$tstart = $tstart[1] + $tstart[0];
set_time_limit(0);

/* define package names */
define('PKG_NAME', 'sitemapFriend');
define('PKG_NAME_LOWER', strtolower(PKG_NAME));
define('PKG_VERSION', '1.0.1');
define('PKG_RELEASE', 'pl');

/* define build paths */
$root = dirname(dirname(__FILE__)).'/';
$sources = array (
    'root' => $root,
    'build' => $root .'_build/',
    'data' => $root . '_build/data/',
    'source_core' => $root.'core/components/'.PKG_NAME_LOWER,
    'source_assets' => $root.'assets/components/'.PKG_NAME_LOWER,
    'docs' => $root.'core/components/'.PKG_NAME_LOWER.'/docs/',
    'snippets' => $root.'core/components/'.PKG_NAME_LOWER.'/elements/snippets/',
    'lexicon' => $root . 'core/components/'.PKG_NAME_LOWER.'/lexicon/',
    'model' => $root.'core/components/'.PKG_NAME_LOWER.'/model/',
);
unset($root);

/* override with your own defines here (see build.config.sample.php) */
require_once dirname(__FILE__) . '/build.config.php';
require_once MODX_CORE_PATH . 'model/modx/modx.class.php';

$modx = new modX();
$modx->initialize('mgr');
$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'HTML');
echo 'Packing '.PKG_NAME_LOWER.'-'.PKG_VERSION.'-'.PKG_RELEASE.'<pre>'; flush();

$modx->loadClass('transport.modPackageBuilder', '', false, true);

$builder = new modPackageBuilder($modx);
$builder->directory = dirname(dirname(__FILE__)).'/_packages/';
$builder->createPackage(PKG_NAME_LOWER, PKG_VERSION, PKG_RELEASE);
$builder->registerNamespace(PKG_NAME_LOWER, false, true, '{core_path}components/'.PKG_NAME_LOWER.'/');

/* create category */
$category = $modx->newObject('modCategory');
$category->set('id', 1);
$category->set('category', PKG_NAME);
$modx->log(modX::LOG_LEVEL_INFO,'Packaged in category.'); flush();

/* add snippets */
$snippets = include $sources['data'].'transport.snippets.php';
if (is_array($snippets)) {
    $category->addMany($snippets,'Snippets');
} else { $modx->log(modX::LOG_LEVEL_FATAL,'Adding snippets failed.'); }
$modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.count($snippets).' snippets.'); flush();
unset($snippets);

/* create category vehicle */
$attr = array(
  xPDOTransport::UNIQUE_KEY => 'category',
  xPDOTransport::PRESERVE_KEYS => false,
  xPDOTransport::UPDATE_OBJECT => true,
  xPDOTransport::RELATED_OBJECTS => true,
  xPDOTransport::RELATED_OBJECT_ATTRIBUTES => array(
    'Snippets' => array(
      xPDOTransport::PRESERVE_KEYS => false,
      xPDOTransport::UPDATE_OBJECT => true,
      xPDOTransport::UNIQUE_KEY => 'name',
    ),
  ),
);

$modx->log(modX::LOG_LEVEL_INFO, 'Packaging in vehicle...'); flush();
$vehicle = $builder->createVehicle($category, $attr);
$vehicle->resolve('file', array(
  'source' => $sources['source_core'],
  'target' => "return MODX_CORE_PATH . 'components/';",
));

$builder->putVehicle($vehicle);
unset($vehicle);
unset($category);

// $modx->log(modX::LOG_LEVEL_INFO, 'Packaging lexicon...'); flush();
// $builder->buildLexicon($sources['lexicon']);

/* now pack in the license file, readme and setup options */
$builder->setPackageAttributes(array(
  'license' => file_get_contents($sources['docs'] . 'license.txt'),
  'readme' => file_get_contents($sources['docs'] . 'readme.txt'),
  'changelog' => file_get_contents($sources['docs'] . 'changelog.txt'),
));
$modx->log(modX::LOG_LEVEL_INFO,'Packaged in package attributes.'); flush();

/* zip up package */
$modx->log(modX::LOG_LEVEL_INFO,'Packing...'); flush();
$builder->pack();
unset($builder);

/* calculate build time */
$tend= explode(" ", microtime());
$tend= $tend[1] + $tend[0];
$totalTime= sprintf("%2.4f s",($tend - $tstart));
$modx->log(modX::LOG_LEVEL_INFO,"\n<br />Package Built.<br />\nExecution time: {$totalTime}\n");
