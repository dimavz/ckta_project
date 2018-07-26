<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Create a shortcut for params.
$params = $this->item->params;
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
$canEdit = $this->item->params->get('access-edit');
$item = $this->item;
//print_r($params); ?>
<div class="post_header">
	<?php echo JLayoutHelper::render('joomla.content.blog_style_default_item_title', $this->item); ?>
</div>
<div class="post_category">
	<span class="category">
		<a href="<?php echo $item->category_route;?>">
			<i class="fa fa-hashtag" aria-hidden="true"></i>
			<?php echo $item->category_title;?>
		</a>
	</span>
	<div class="btn-group" role="group">
		<?php if ($canEdit || $params->get('show_print_icon') || $params->get('show_email_icon')) : ?>
			<?php echo JLayoutHelper::render('joomla.content.icons', array('params' => $params, 'item' => $this->item, 'print' => false)); ?>
		<?php endif; ?>
	</div>
</div>
<div class="post_rating">
	
</div>
<div class="post_info">
	<div class="post_image">
		<?php echo JLayoutHelper::render('joomla.content.intro_image', $this->item); ?>
	</div>
	<div class="post_text">
		<?php echo $item->introtext; ?>
	</div>
		<?php if ($params->get('show_readmore') && $this->item->readmore) :
		if ($params->get('access-view')) :
			$link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language));
		else :
			$menu = JFactory::getApplication()->getMenu();
		$active = $menu->getActive();
		$itemId = $active->id;
		$link = new JUri(JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId, false));
		$link->setVar('return', base64_encode(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language)));
		endif; ?>
		<?php echo JLayoutHelper::render('joomla.content.readmore', array('item' => $this->item, 'params' => $params, 'link' => $link)); ?>
	<?php endif; ?>
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