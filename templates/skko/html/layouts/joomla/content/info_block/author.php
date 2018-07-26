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
<i class="fa fa-user fa-lg" aria-hidden="true" title="<?php echo JText::_('COM_CONTENT_AUTOR');?>"></i>
<span id="autor" title="<?php echo JText::_('COM_CONTENT_AUTOR');?>">
	<?php $author = ($displayData['item']->created_by_alias ?: $displayData['item']->author); ?>
	
	<?php if (!empty($displayData['item']->contact_link ) && $displayData['params']->get('link_author') == true) : ?>
		<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', JHtml::_('link', $displayData['item']->contact_link, $author, array('itemprop' => 'url'))); ?>
	<?php else : ?>
		<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
	<?php endif; ?>
</span>
	

