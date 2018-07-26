<?php

defined('_JEXEC') or die('Restricted access');

/* Sitemap cache plugin for Joomla 2.5/3.x - Version 1.0.6
--------------------------------------------------------------
 Copyright (C) 2017 Addon Dev. All rights reserved.
 Website: https://addondev.com
 GitHub: github.com/philip-sorokin
 Developer: Philip Sorokin
 Location: Russia, Moscow
 E-mail: philip.sorokin@gmail.com
 Created: April 2017
 License: GNU GPLv2 http://www.gnu.org/licenses/gpl-2.0.html
--------------------------------------------------------------- */

class PlgSystemSitemapcache extends JPlugin
{
	private $_cache = null;
	private $_cache_key = null;
	private $_store = false;

	public function onAfterRoute()
	{
		$app = JFactory::getApplication();
		$option = $app->input->get('option');
		$view = $app->input->get('view', 'html');
		
		if ($app->isSite() && in_array($option, array('com_osmap', 'com_xmap')) && in_array($view, array('html', 'xml')))
		{
			ini_set('display_errors', "0");

			JFactory::getConfig()->set('cache_platformprefix', '0');

			$id = $app->input->get('id');
			$lang = JFactory::getLanguage()->getTag();

			$news = $app->input->get('news') ? 1 : 0;
			$images = $app->input->get('images') ? 1 : 0;

			$this->_cache_key = "option:$option|view:$view|id:$id|lang:$lang|news:$news|images:$images";

			$options = array(
				'defaultgroup'  => 'sitemapcache',
				'language'      => $lang,
				'browsercache'  => false,
				'caching'       => true,
				'lifetime'      => (int) $this->params->get('lifetime', 15),
			);

			$this->_cache = JCache::getInstance('output', $options);

			if ($data = $this->_cache->get($this->_cache_key, 'sitemapcache'))
			{
				header("Content-Type: text/$view; charset=utf-8");
				
				if (JFactory::getConfig()->get('gzip') && $view === 'html') {
					header('Content-Encoding: gzip');
				}
				
				echo $data;
				exit;
			}
			
			$this->_store = true;
			ob_start();
		}
	}

	public function __destruct()
	{
		if ($this->_store) {
			$this->_cache->store(ob_get_flush(), $this->_cache_key);
		}
	}
}
