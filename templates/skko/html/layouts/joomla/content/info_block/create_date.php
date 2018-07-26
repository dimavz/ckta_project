<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

?>
<i class="fa fa-calendar fa-lg" aria-hidden="true"></i>
<span id="data_publish" title="<?php echo JText::_('COM_CONTENT_CREATED_DATE'); ?>">
	<?php echo JText::sprintf(JHtml::_('date', $displayData['item']->created, JText::_('DATE_FORMAT_LC3'))); ?>
</span>