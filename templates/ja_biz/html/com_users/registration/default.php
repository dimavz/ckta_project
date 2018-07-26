<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
if(version_compare(JVERSION, '3.0', 'lt')){
	JHtml::_('behavior.tooltip');
}
JHtml::_('behavior.formvalidation');

$tplparams = JFactory::getApplication()->getTemplate(true)->params;

$sitename  = $tplparams->get('sitename');
$slogan    = $tplparams->get('slogan', '');
$logotype  = $tplparams->get('logotype', 'text');
$logoimage = $tplparams->get('logoimage', 'templates/' . T3_TEMPLATE . '/images/logo-light.png');

if (!$sitename) {
	$sitename = JFactory::getConfig()->get('sitename');
}
?>

<div class="registration-wrap">
	<div class="registration<?php echo $this->pageclass_sfx?>">
		<div class="page-header">
      <div class="logo-image">
        <a href="<?php echo JURI::base(true) ?>" title="<?php echo strip_tags($sitename) ?>">
          <img class="logo-img" src="<?php echo JURI::base(true) . '/' . $logoimage ?>" alt="<?php echo strip_tags($sitename) ?>" />
        </a>
      </div>
			<?php if ($this->params->get('show_page_heading')) : ?>
			<h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
			<?php endif; ?>
		</div>
		
		<div class="form-registration">
			<form id="member-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=registration.register'); ?>" method="post" class="form-validate form-horizontal">
				<?php foreach ($this->form->getFieldsets() as $fieldset): // Iterate through the form fieldsets and display each one.?>
					<?php $fields = $this->form->getFieldset($fieldset->name);?>
					<?php $i = 0; ?>
					<?php if (count($fields)):?>
						<div class="row">
						<?php foreach ($fields as $field) :// Iterate through the fields in the set and display them.?>
							<?php $i++; ?>
							<?php if ($field->hidden):// If the field is hidden, just display the input.?>
								<?php echo $field->input;?>
							<?php else:?>
								<div class="form-input form-input-<?php echo $i; ?> col-md-6 col-sm-6 col-xs-12">
									<div class="reg-input">
										<?php echo $field->label; ?>
										<?php if (!$field->required && $field->type != 'Spacer') : ?>
											<span class="optional"><?php echo JText::_('COM_USERS_OPTIONAL');?></span>
										<?php endif; ?>
									
										<?php echo $field->input;?>
									</div>
								</div>
							<?php endif;?>
							
						<?php endforeach;?>
						</div>
					<?php endif;?>
					
				<?php endforeach;?>
			
				<div class="form-actions row">
					<div class="form-input">
						<button type="submit" class="btn btn-primary validate" alt="<?php echo JText::_('JREGISTER');?>"><?php echo JText::_('JREGISTER');?></button>
						<a class="btn cancel" href="<?php echo JRoute::_('');?>" title="<?php echo JText::_('JCANCEL');?>"><?php echo JText::_('JCANCEL');?></a>
						<input type="hidden" name="option" value="com_users" />
						<input type="hidden" name="task" value="registration.register" />
						<?php echo JHtml::_('form.token');?>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
