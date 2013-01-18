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
 * Properties French Topic for sitemapFriend.
 *
 * @package sitemapfriend
 * @subpackage lexicon
 * @language fr
 */
$_lang['sitemapfriend.prop_desc.type'] = 'Type de plan du site: xml ou html. Les valeurs par défaut des autres propriétés changent en fonction de cette valeur.';
$_lang['sitemapfriend.prop_desc.titleField'] = 'Le titre : pagetitle, longtitle, menutitle. Valeur par défaut: pagetitle.';
$_lang['sitemapfriend.prop_desc.urlScheme'] = 'Format des URL: http, https, full, abs, etc. Voir la documentation de $modx->makeUrl(). Valeur par défaut pour un plan du site HTML : abs. Plan du site XML : le format est toujours "full".';
$_lang['sitemapfriend.prop_desc.startId'] = 'ID de la ressource à partir de laquelle construire le plan du site. Valeur par défaut : 0.';
$_lang['sitemapfriend.prop_desc.contexts'] = 'Contextes à inclure, séparés par une virgule. Si vide, le contexte courant sera utilisé. Vide par défaut.';
$_lang['sitemapfriend.prop_desc.showDeleted'] = 'Inclure les resources marquées à supprimer ? Valeur par défaut : non.';
$_lang['sitemapfriend.prop_desc.showUpublished'] = 'Inclure les resources non-publiées ? Valeur par défaut : non.';
$_lang['sitemapfriend.prop_desc.onlySearchable'] = 'Inclure uniquement les resources cherchables ? Valeur par défaut : oui.';
$_lang['sitemapfriend.prop_desc.showHidden'] = 'Inclure les ressources ne faisant pas partie des menus ? Valeur par défaut : oui.';
$_lang['sitemapfriend.prop_desc.maxDepth'] = 'Profondeur de l\'indexation. Toute la hiérarchie des resources sera indexée si la valeur est 0 ou vide. Valeur par défaut : 0.';
$_lang['sitemapfriend.prop_desc.onlyTemplates'] = 'Liste d\'ID de modèles à inclure, séparés par une virgule. Passer au moins un ID pour activer le filtre.';
$_lang['sitemapfriend.prop_desc.skipTemplates'] = 'Liste d\'ID de modèles à exclure, séparés par une virgule. Passer au moins un ID pour activer le filtre.';
$_lang['sitemapfriend.prop_desc.includeWebLinks'] = 'Inclure les lien web ? Valeur par défaut : non.';
$_lang['sitemapfriend.prop_desc.excludeResources'] = 'Liste d\'ID des ressources à exclure du plan du site, séparés par une virgule. Les ressources enfants seront également exclues. Les ressources définies dans les options de Modx comme page d\'erreur, site indisponible, page non-autorisée, ainsi que le plan du site lui-même sont toujours exclues.';
$_lang['sitemapfriend.prop_desc.skipResources'] = 'Liste d\'ID des resources à masquer dans le plan du site, séparés par une virgule. Les ressources enfants ne sont PAS exclues.';
$_lang['sitemapfriend.prop_desc.includeResources'] = 'Liste d\'ID des ressources à inclure en permanence dans le plan du site, séparés par une virgule. Ces ressources seront incluses, même si elles devraient normalement être exclues par les options suivantes : showDeleted, showUnpublished, onlySearchable et showHidden.';
$_lang['sitemapfriend.prop_desc.excludeChildrenOf'] = 'Liste d\'ID des ressource dont les enfants sont exclus du plan du site. Les ressources listées ici, sont incluse dans le plan du site. Seuls leurs enfants en sont exclus.';
$_lang['sitemapfriend.prop_desc.parentTitles'] = 'Inclure le titre de la ressource parente. Valeur par défaut : non.';
$_lang['sitemapfriend.prop_desc.parentTitlesReversed'] = 'Inverser l\'ordre des titres des ressources parentes ? Valeur par défaut : non.';
$_lang['sitemapfriend.prop_desc.titleSeparator'] = 'Caractère de séparation des titres des ressources parentes. Valeur par défaut \' - \'.';
$_lang['sitemapfriend.prop_desc.sortBy'] = 'Champ utilisé pour trier des résultats. Valeur par défaut : menuindex.';
$_lang['sitemapfriend.prop_desc.sortDir'] = 'Ordre du tri des résulats. Valeur par défaut : ASC.';
$_lang['sitemapfriend.prop_desc.tplItem'] = '"Chunk" à utiliser pour chaque ressource listée. Valeur par défaut pour un plan du site HTML : sitemap_html_item. Pour un plan du site XML, sitemap_xml_item est toujours utilisé.';
$_lang['sitemapfriend.prop_desc.tplContainer'] = '"Chunk" à utiliser comme conteneur pour chaque liste d\'enfants. Toujours vide pour le plan du site XML.';
$_lang['sitemapfriend.prop_desc.tplOuter'] = '"Chunk" à utiliser comme conteneur général du plan du site. Valeur par défaut pour un plan du site HTML : sitemap_html_outer. Pour un plan du site XML, sitemap_xml_outer est toujours utilisé.';
$_lang['sitemapfriend.prop_desc.lastmodFormat'] = 'Format de la date de dernière modification, utilise le même format que la fonction PHP date(). Valeur par défaut pour un plan du site HTML : F j, Y, g:i a. Pour un plan du site XML, "c" est toujours utilisé (date au format ISO 8601).';
