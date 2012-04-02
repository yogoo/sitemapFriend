<?php
/**
 * sitemapFriend
 *
 * Copyright 2010 by Mihai Șucan <mihai.sucan@gmail.com>
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

/* setup path to component */
$path = $modx->getOption('sitemapfriend.core_path',null,$modx->getOption('core_path').'components/sitemapfriend/');

/* instanciate the class */
$sitemapFriend = $modx->getService('sitemapfriend','SitemapFriend',$path.'model/sitemapfriend/',$scriptProperties);
if (!($sitemapFriend instanceof SitemapFriend)) return $modx->lexicon('sitemapfriend.error.loadingclass',array('path' => $path.'model/sitemapfriend/'));

/* generate the sitemap */
$result = $sitemapFriend->run();
unset($sitemapFriend);
return $result;
