<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_search
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Including fallback code for the placeholder attribute in the search field.
//JHtml::_('jquery.framework');
JHtml::_('script', 'system/html5fallback.js', array('version' => 'auto', 'relative' => true));
?>
		<form class="form-inline" action="<?php echo JRoute::_('index.php'); ?>" method="post" >
			<div class="form-group">
					<div class="input-group">
						<input name="searchword" type="search" class="form-control" id="InputFind" placeholder="<?php echo $text ?>">
						<button class="input-group-addon btn btn-info" type="submit" onclick="this.form.searchword.focus();">Найти</button>
					</div><!-- end /.input-group -->
			</div><!-- end /.form-group -->
			<input type="hidden" name="task" value="search" />
			<input type="hidden" name="option" value="com_search" />
			<input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>" />
		</form>