<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$id = '';

if ($tagId = $params->get('tag_id', ''))
{
	$id = ' id="' . $tagId . '"';
}

// The menu class is deprecated. Use nav instead
?>
<ul class="hidden-xs">
<?php foreach ($list as $i => &$item)
{
	//print_r($item);
	$class = '';
	if ($item->route=='home'){
		$class .= 'home link';
	}

	if ($item->deeper)
	{
		$class .= 'dropdown';
	}

	// Если ID входит в путь ссылки, то делаем ссылку активной
	if (in_array($item->id, $path))
	{
		$class .= ' active';
	}

	/*if ($item->parent)
	{
		$class .= ' parent';
	}*/
	if ($class !=""){
		echo '<li class="' . $class . '">';
	}
	else{
		echo '<li class="link">';
	}

	//echo '<li class="' . $class . '">';

	switch ($item->type) :
		case 'separator':
		case 'component':
		case 'heading':
		case 'url':
			require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
			break;

		default:
			require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
			break;
	endswitch;

	// The next item is deeper.
	if ($item->deeper)
	{
		echo '<ul class="dropdown-menu">';
	}
	// The next item is shallower.
	elseif ($item->shallower)
	{
		echo '</li>';
		echo str_repeat('</ul></li>', $item->level_diff);
	}
	// The next item is on the same level.
	else
	{
		echo '</li>';
	}
}
?></ul>
