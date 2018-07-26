<?php
/**
 * ------------------------------------------------------------------------
 * JA Image Hotspot Module for Joomla 2.5 & 3.2
 * ------------------------------------------------------------------------
 * Copyright (C) 2004-2011 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
 * @license - GNU/GPL, http://www.gnu.org/licenses/gpl.html
 * Author: J.O.O.M Solutions Co., Ltd
 * Websites: http://www.joomlart.com - http://www.joomlancers.com
 * ------------------------------------------------------------------------
 */


defined('_JEXEC') or die('Restricted access');

// load mootools
JHTML::_('behavior.framework');

include(dirname(__FILE__).'/assets/asset.php');
$doc = jFactory::getDocument();
$imgpath 				= $params->get('imgpath','');
$displayDropdown	 	= $params->get('positionchoiseoffice',1);
$dropdownPosition 		= $params->get('showchoicelocaltion','top-left');
$modules_des 			= $params->get('modules_des','');
$displaytooltips 		= $params->get('displaytooltips',1);
$description 			= $params->get('description', '');

$description = json_decode($description);
if(!is_array($description)) $description = array();

if($imgpath) {
	$layout = $params->get('layout', 'default');
	$layoutSelect = JModuleHelper::getLayoutPath('mod_jaimagehotspot', $layout.'_select');
	require JModuleHelper::getLayoutPath('mod_jaimagehotspot', $layout);
}