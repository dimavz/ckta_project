<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

//JHtml::_('bootstrap.framework');

$canEdit = $displayData['params']->get('access-edit');

?>
	<?php if (empty($displayData['print'])) : ?>

		<?php if ($canEdit || $displayData['params']->get('show_print_icon') || $displayData['params']->get('show_email_icon')) : ?>
					<?php if ($displayData['params']->get('show_print_icon')) : ?>
						<li class="btn btn-default" type="button" data-toggle="tooltip" data-placement="bottom" title="Распечатать">
								<?php echo JHtml::_('icon.print_popup', $displayData['item'], $displayData['params']); ?>
						</li>
					<?php endif; ?>
					<?php if ($displayData['params']->get('show_email_icon')) : ?>
						<li class="btn btn-default" type="button" data-toggle="tooltip" data-placement="bottom" title="Отправить ссылку"> <?php echo JHtml::_('icon.email', $displayData['item'], $displayData['params']); ?> </li>
					<?php endif; ?>
					<?php if ($canEdit) : ?>
						<li class="btn btn-default" type="button" data-toggle="tooltip" data-placement="bottom" title="Редактировать"> <?php echo JHtml::_('icon.edit', $displayData['item'], $displayData['params']); ?> </li>
					<?php endif; ?>
		<?php endif; ?>

	<?php else : ?>

		<div class="pull-right">
			<?php echo JHtml::_('icon.print_screen', $displayData['item'], $displayData['params']); ?>
		</div>

	<?php endif; ?>
