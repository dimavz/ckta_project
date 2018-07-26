<?php
/**
 * @package     Joomla.Site
 * @subpackage  Template.system
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/*
 * none (output raw module content)
 */
function modChrome_default($module, &$params, &$attribs)
{
	if($module->content){

		if ($module->showtitle)
		{
			echo '<h'.$headerlevel.'>';
			echo $module->title; 
			echo "</h".$headerlevel.">";
		}
		echo $module->content;
	}
}

function modChrome_sidebarmenu($module, &$params, &$attribs)
{
	if($module->content)
	{
		echo "<div class='col-xs-6 col-md-12'>";
		echo "<div class='wrap_panel'>";

		if ($module->showtitle)
		{
			echo "<div class='header_panel'>"; 
			echo "<h3 class='title_panel'>".$module->title."</h3>";
			echo "</div>";
		}
		echo "<div class='body_panel'>";
		echo $module->content;
		echo "</div>"; //body_panel
		echo "</div>"; //wrap_panel
		echo "</div>"; //col-xs-6 col-md-12
		//print_r($params);
	}
}

function modChrome_empty($module, &$params, &$attribs)
{
	if($module->content)
	{
		echo $module->content;
	}
}
function modChrome_left_block($module, &$params, &$attribs)
{
	if($module->content){
		echo '<div class="col-md-3 col-sm-6">';
		echo '<h2>';
		echo $module->title;
		echo '</h2>';
		echo $module->content;
		echo '</div>';
	}
}
function modChrome_center_block($module, &$params, &$attribs)
{
	if($module->content){
		echo '<div class="col-md-4 col-sm-6">';
		echo '<h2>';
		echo $module->title;
		echo '</h2>';
		echo $module->content;
		echo '</div>';
	}
}
function modChrome_right_block($module, &$params, &$attribs)
{
	if($module->content){
		echo '<div class="col-md-5 col-sm-12">';
		echo '<h2>';
		echo $module->title;
		echo '</h2>';
		echo $module->content;
		echo '</div>';
	}
}


function modChrome_footer_left_block($module, &$params, &$attribs)
{
	if($module->content){
//		echo '<div class="col-md-4 col-sm-4 col-xs-12">';
		echo '<div class="footer_left_block wow fadeInDown" data-wow-delay="0.2s">';
		echo '<h3 class="add_ad" role="button">';
		echo $module->title;
		echo '</h3>';
		echo '<div class="pay">';
		echo $module->content;
		echo '</div>';
		echo '</div>';
//		echo '</div>';
	}
}
function modChrome_footer_center_block($module, &$params, &$attribs)
{
	if($module->content){
//		echo '<div class="col-md-4 col-sm-4 col-xs-12">';
		echo '<div class="footer_center_block wow fadeInDown" data-wow-delay="0.4s">';
		echo '<h3 class="recinfo" role="button">';
		echo $module->title;
		echo '</h3>';
		echo'<div class="rec_content">';
		echo $module->content;
		echo '</div>';
		echo '</div>';
//		echo '</div>';
	}
}
function modChrome_footer_right_block($module, &$params, &$attribs)
{
	if($module->content){
//		echo '<div class="col-md-4 col-sm-4 col-xs-12">';
		echo '<div class="footer_right_block wow fadeInDown" data-wow-delay="0.6s">';
		echo '<h3 class="contacts" role="button">';
		echo $module->title;
		echo '</h3>';
		echo $module->content;
		echo '</div>';
//		echo '</div>';
	}
}
function modChrome_footer_bottomline($module, &$params, &$attribs)
{
	if($module->content){
		echo '<div class="footer_bottomline">
		<div class="conteiner">
			<div class="row">
				<div class="col-md-12">';
					echo $module->content;
					echo '</div>
				</div>
			</div>
		</div>';

	}
}
function modChrome_phones($module, &$params, &$attribs)
{
	if($module->content){
		echo '<i class="fa fa-phone-square fa-lg" aria-hidden="true"></i>';
		echo strip_tags($module->content);
	}
}

function modChrome_button_ecp($module, &$params, &$attribs)
{
	if($module->content){
		echo '<a class="btn btn-success " href="https://skko.by/" role="button">
		<i class="fa fa-key" aria-hidden="true"></i>';
		echo strip_tags($module->content);
		echo '</a>';
	}
}

function modChrome_button_mail($module, &$params, &$attribs)
{
	if($module->content){
		echo '<a class="btn btn-success " href="http://inbox.skko.by/" role="button"><i class="fa fa-envelope" aria-hidden="true"></i>';
		echo strip_tags($module->content);
		echo '</a>';
	}
}

function modChrome_message($module, &$params, &$attribs)
{
	if($module->content){
		echo '<marquee onmouseover=this.stop() onmouseout=this.start() behavior="scroll" direction="left">';
		echo strip_tags($module->content);
		//echo $module->content;
		echo '</marquee>';
	}
}

function modChrome_news($module, &$params, &$attribs)
{
	if($module->content){
		echo '<div class="tab-content wow zoomIn" style="visibility: visible; animation-name: zoomIn;">';
			echo '<div id="post_news" class="tab-pane active">';
				echo '<div class="article-row">';

					if ($module->showtitle)
					{
						echo "<h2>";
						echo $module->title; 
						echo "</h2>";
					}
					echo $module->content;
				echo '</div></div></div>';
	}
}