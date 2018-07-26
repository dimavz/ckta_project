<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Create shortcuts to some parameters.
$params  = $this->item->params;
$item = $this->item;
$images  = json_decode($this->item->images);
$urls    = json_decode($this->item->urls);
$canEdit = $params->get('access-edit');
$user    = JFactory::getUser();
$info    = $params->get('info_block_position', 0);

// Check if associations are implemented. If they are, define the parameter.
$assocParam = (JLanguageAssociations::isEnabled() && $params->get('show_associations'));
JHtml::_('behavior.caption');

?>
<div class="list_posts">
	<div class="post">
		<div class="post_header">
			<?php if ($params->get('show_title')) : ?>
				<h1>
					<?php echo $this->escape($this->item->title); ?>
				</h1>
			<?php endif; ?>
			<?php if ($this->item->state == 0) : ?>
				<span class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>
			<?php endif; ?>
			<?php if (strtotime($this->item->publish_up) > strtotime(JFactory::getDate())) : ?>
				<span class="label label-warning"><?php echo JText::_('JNOTPUBLISHEDYET'); ?></span>
			<?php endif; ?>
			<?php if ((strtotime($this->item->publish_down) < strtotime(JFactory::getDate())) && $this->item->publish_down != JFactory::getDbo()->getNullDate()) : ?>
				<span class="label label-warning"><?php echo JText::_('JEXPIRED'); ?></span>
			<?php endif; ?>
		</div>
		<div class="post_category">
			<span class="category">
				<?php echo JLayoutHelper::render('joomla.content.info_block.category', array('params' => $params, 'item' => $this->item, 'print' => false)); ?>
			</span>
			<div class="btn-group" role="group">
				<?php if ($canEdit || $params->get('show_print_icon') || $params->get('show_email_icon')) : ?>
					<?php echo JLayoutHelper::render('joomla.content.icons', array('params' => $params, 'item' => $this->item, 'print' => false)); ?>
				<?php endif; ?>
			</div>
		</div><!-- /.post_category -->
		<div class="post_rating">

		</div>

		<div class="post_info">
			<div class="post_image">
				<?php echo JLayoutHelper::render('joomla.content.full_image', $this->item); ?>
			</div>
			<div class="post_text">
				<?php echo $this->item->text; ?>
			</div>
			</div>
		<div class="post_metainfo">
			<ul>
				<?php //echo $params->get('show_publish_date');?>
				<?php if(!empty($params->get('show_create_date'))): ?>
					<li>
						<?php echo JLayoutHelper::render('joomla.content.info_block.create_date', array('item' => $this->item, 'params' => $params)); ?>
					</li>
				<?php endif;?>
				<?php if(!empty($params->get('show_publish_date'))): ?>
					<li>
						<?php echo JLayoutHelper::render('joomla.content.info_block.publish_date', array('item' => $this->item, 'params' => $params)); ?>
					</li>
				<?php endif;?>
				<?php if(!empty($params->get('show_modify_date'))): ?>
					<li>
						<?php echo JLayoutHelper::render('joomla.content.info_block.modify_date', array('item' => $this->item, 'params' => $params)); ?>
					</li>
				<?php endif;?>
				<?php if(!empty($params->get('show_hits'))): ?>
					<li>
						<?php echo JLayoutHelper::render('joomla.content.info_block.hits', array('item' => $this->item, 'params' => $params)); ?>
					</li>
				<?php endif;?>
				<?php if(!empty($params->get('show_author'))): ?>
					<li>
						<?php echo JLayoutHelper::render('joomla.content.info_block.author', array('item' => $this->item, 'params' => $params)); ?>
					</li>
				<?php endif;?>
			</ul>
			<?php //print_r($params); ?>

		</div>

		<?php
		if (!empty($this->item->pagination) && $this->item->pagination && !$this->item->paginationposition && !$this->item->paginationrelative) :
			echo $this->item->pagination;
		endif;
		?>


		<?php
		if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && !$this->item->paginationrelative) :
			echo $this->item->pagination;
		?>
	<?php endif; ?>

	<?php
	if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && $this->item->paginationrelative) :
		echo $this->item->pagination;
	?>
<?php endif; ?>
</div>
</div>
