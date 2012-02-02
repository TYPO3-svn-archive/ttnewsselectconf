<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}



if (TYPO3_MODE!='BE') {
	require_once(t3lib_extMgm::extPath($_EXTKEY) . 'lib/class.tx_ttnewsselectconf.php');
}

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['tt_news']['selectConfHook'][] = 'tx_ttnewsselectconf';
?>