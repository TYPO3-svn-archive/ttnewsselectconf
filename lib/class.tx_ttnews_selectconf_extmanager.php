<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2012 Ulfried Herrmann <herrmann.at.die-netzmacher.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 *
 *
 *   37: class tx_ttnewsselectconf
 *   55:     function processSelectConfHook($parentObject, $selectConf)
 *
 * TOTAL FUNCTIONS: 1
 * (This index is automatically created/updated by the extension "extdeveval")
 *
 */
class tx_ttnews_selectconf_extmanager {
	var $prefixId      = 'tx_ttnews_selectconf_extmanager';    // Same as class name
	var $scriptRelPath = 'lib/class.tx_ttnewsselectconf.php';  // Path to this script relative to the extension dir.
	var $extKey        = 'ttnews_selectconf';                  // The extension key.
	var $promptWrap    = '<div class="typo3-message message-%1$s"><div class="message-body">%2$s</div></div>';
	                                                           // message wrapping

	/**
	 * compatVersionCheck(): Displays a prompt with the current state.
	 *                If the user enabled the adding of the installer page,
	 *                the installer page will be added in the database.
	 *
	 * @return  string    message wrapped in HTML
	 * @since   0.2.3
	 * @version 0.2.3
	 */
	function compatVersionCheck() {
			//.message-notice
			//.message-information
			//.message-ok
			//.message-warning
			//.message-error

		$str_prompt = '';
		$confArr    = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$this->extKey]);


			//  detect tt_news major version
		$ttnewsMajorVersion  = $this->_checkTtnewsVersion();
		if (is_null($ttnewsMajorVersion)) {
				//  tt_news not installed
			$str_prompt  = sprintf($this->promptWrap, 'error', $GLOBALS['LANG']->sL('LLL:EXT:' . $this->extKey . '/lib/locallang.xml:promptDependencyError'));
		} elseif (empty ($ttnewsMajorVersion)) {
				//  no automatic detection: fall back info
			$str_prompt  = sprintf($this->promptWrap, 'warning', $GLOBALS['LANG']->sL('LLL:EXT:' . $this->extKey . '/lib/locallang.xml:promptNoAutomatic'));
		} else {
			if (isset ($_POST['data']['compatVersion25'])) {
					//  detect compatVersion: current configuration
				$ttnewsCompatVersion = ($_POST['data']['compatVersion25'] == 0) ? 3 : 2;
			} else {
					//  detect compatVersion: saved configuration
				$ttnewsCompatVersion = (empty($confArr['compatVersion25'])) ? 3 : 2;
			}

				//  comparison result:
			if ($ttnewsMajorVersion < $ttnewsCompatVersion) {
					//  wrong configuration: compatMode needed
				$messageType = 'error';
				$messageText = 'Needed';
			} elseif ($ttnewsMajorVersion > $ttnewsCompatVersion) {
					//  wrong configuration: compatMode not needed
				$messageType = 'error';
				$messageText = 'NotNeeded';
			} else {
					//  proper configuration
				$messageType = 'ok';
				$messageText = 'Ok';
			}
			$str_prompt  = sprintf($this->promptWrap, $messageType, $GLOBALS['LANG']->sL('LLL:EXT:' . $this->extKey . '/lib/locallang.xml:promptCompatMode' . $messageText));
		}



		return $str_prompt;
	}

	/**
	 * Detect major version tt_news
	 *
	 * @return	int  tt_news major version
	 * @since   0.2.3
	 * @version 0.2.3
	 */
	private function _checkTtnewsVersion() {
		$_EXTKEY = 'tt_news';

		if (t3lib_extMgm::isLoaded($_EXTKEY) === FALSE) {
				//  abort if tt_news isn't installed
			return NULL;
		}

		$path    = t3lib_extMgm::extPath($_EXTKEY);
			//  uherrmann, 111206: FIX #32334
		$EM_CONF = tx_em_Tools::includeEMCONF($path . '/ext_emconf.php', $_EXTKEY);
		$ttnewsMajorVersion = (int)$EM_CONF['version'];

		return $ttnewsMajorVersion;
	}
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/ttnews_selectconf/lib/class.tx_ttnews_selectconf_extmanager.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/ttnews_selectconf/lib/class.tx_ttnews_selectconf_extmanager.php']);
}
?>