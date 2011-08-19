<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 Dirk Wildt <dirk.wildt.at.die-netzmacher.com>
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
class tx_ttnewsselectconf {

  var $prefixId      = 'tx_ttnewsselectconf';   // Same as class name
  var $scriptRelPath = 'class.tx_ttnewsselectconf.php'; // Path to this script relative to the extension dir.
  var $extKey        = 'ttnews_selectconf'; // The extension key.






  /**
 * Generating own markers by call of the hook in tt_news
 *
 * @param	array		$parentObject: tt_news object
 * @param	array		$selectConf: Array with the elements pidInList, where and leftjoin
 * @return	array
 */
  function processSelectConfHook($parentObject, $selectConf) {

    $conf     = $parentObject->conf;
	$newconf = $conf['extensions.']['ttnews_selectconf.'];

	if (is_array($newconf)) {
		foreach($newconf as $key=>$value) {
			if(strpos($key,'.')) {
				$keywithoutperiod=substr($key,0,-1);
				$selectConf[$keywithoutperiod] = trim($parentObject->cObj->stdWrap($newconf[$keywithoutperiod]?$newconf[$keywithoutperiod]:$selectConf[$keywithoutperiod],$value));
			} else {
				$selectConf[$key]=$value;
			}
		}
	}
    #var_dump($selectConf);
    /*
      array(3) {
        ["pidInList"]=>
        int(0)
        ["where"]=>
        string(148) "1=1 AND tt_news.sys_language_uid IN (0,-1) AND (tt_news.datetime=0 OR tt_news.datetime>1232208802) AND (IFNULL(tt_news_cat_mm.uid_foreign,0) IN (2))"
        ["leftjoin"]=>
        string(56) "tt_news_cat_mm ON tt_news.uid = tt_news_cat_mm.uid_local"
      }
    */
	return $selectConf;
  }




}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/ttnews_selectconf/class.tx_ttnewsselectconf.php']) {
  include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/ttnews_selectconf/class.tx_ttnewsselectconf.php']);
}
?>