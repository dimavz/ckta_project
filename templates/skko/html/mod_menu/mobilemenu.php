<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$countItem = 1;
?>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	<?php foreach ($list as $i => &$item)
	{
		if($item->level ==1)
		{
			echo '<div class="panel panel-info">';
			echo '<div class="panel-heading" >';
			echo '<h4 class="panel-title">';
			if(!empty($item->link))
			{
				echo '<a href="'.$item->route.'">';
				echo $item->title;
				echo '</a>';
				echo '</h4></div></div>';
			}
			else
			{
				echo '<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$countItem.'" aria-expanded="false">';
				echo $item->title;
				echo '<i class="fa fa-chevron-circle-down" aria-hidden="true"></i>';
				echo '</a>';
				echo '</h4></div>';
			}
		}
		else
		{
			echo '<li>';
			echo '<a href="'.$item->route.'">';
			echo $item->title;
			echo '</a>';
			echo '</li>';
		}
			
	//The next item is deeper.
		if ($item->deeper)
		{
			echo '<div id="collapse'.$countItem.'" class="panel-collapse collapse">';
			echo '<div class="panel-body">';
			echo '<ul>';
			$countItem++;
		}
	// The next item is shallower.
		elseif ($item->shallower)
		{
		echo '</ul></div></div>';
		echo '</div>';
			//echo str_repeat('</ul></div></div>', $item->level_diff);
		}		
	}
	?>
</div>
