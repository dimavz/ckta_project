<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Mainbody 2 columns: content - sidebar
 */
?>
<div id="t3-mainbody" class="container t3-mainbody">
	<div class="main-container">
		<div class="row">

			<!-- MAIN CONTENT -->
			<div id="t3-content" class="t3-content col-xs-12 col-sm-8  col-md-9">
				<?php if($this->hasMessage()) : ?>
				<jdoc:include type="message" />
				<?php endif ?>
				<?php if ($this->countModules('masshead')) : ?>
					<!-- MASHEAD 2-->
					<div class="<?php $this->_c('masshead') ?>">
						<jdoc:include type="modules" name="<?php $this->_p('masshead') ?>" style="raw" />
					</div>
				<?php endif ?>
				<jdoc:include type="component" />
			</div>
			<!-- //MAIN CONTENT -->

			<div class="t3-sidebar t3-sidebar-right col-xs-12 col-sm-4  col-md-3">
				<div class="row">

					<!-- MASSCOL 1 -->
					<?php if ($vars['mastcol1']) : ?>
						<div class="t3-mastcol1 t3-mastcol1-1 <?php $this->_c($vars['mastcol1']) ?>">
							<jdoc:include type="modules" name="<?php $this->_p($vars['mastcol1']) ?>" style="T3Xhtml" />
						</div>
					<?php endif ?>
					<!-- //MASSCOL 1 -->

					<!-- SIDEBAR RIGHT -->
					<?php if ($vars['sidebar']) : ?>
					<div class="t3-sidebar col-xs-12 col-sm-4  col-md-3 <?php $this->_c($vars['sidebar']) ?>">
						<jdoc:include type="modules" name="<?php $this->_p($vars['sidebar']) ?>" style="T3Xhtml" />
					</div>
					<?php endif ?>
					<!-- //SIDEBAR RIGHT -->
					
				</div>
			</div>

		</div>
	</div>
</div> 