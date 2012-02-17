<?php

/**
 * @file plugins/generic/googleViewer/GoogleViewerPlugin.inc.php
 *
 * Copyright (c) 2003-2012 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class GoogleViewerPlugin
 *
 * @brief This plugin enables embedding of the google document viewer for PDF display
 */

import('classes.plugins.GenericPlugin');

class GoogleViewerPlugin extends GenericPlugin {
	function register($category, $path) {
		if (parent::register($category, $path)) {
			if ($this->getEnabled()) {
				HookRegistry::register('TemplateManager::include', array(&$this, '_callback'));
			}

			return true;
		}
		return false;
	}

	function getDisplayName() {
		return __('plugins.generic.googleViewer.name');
	}

	function getDescription() {
		return __('plugins.generic.googleViewer.description');
	}

	function _callback($hookName, $args) {
		if ($this->getEnabled()) {
			$templateMgr =& $args[0];
			$params =& $args[1];

			if (!isset($params['smarty_include_tpl_file'])) return false;

			switch ($params['smarty_include_tpl_file']) {
				case 'article/pdfViewer.tpl':
					$params['smarty_include_tpl_file'] = $this->getTemplatePath() . 'index.tpl';
					break;
			}
			return false;
		}
	}
}

?>
