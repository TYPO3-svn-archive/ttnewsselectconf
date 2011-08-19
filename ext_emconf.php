<?php

########################################################################
# Extension Manager/Repository config file for ext "ttnews_selectconf".
#
# Auto generated 16-08-2011 15:04
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'tt_news select configuration',
	'description' => 'The extension  enables to add an andWhere clause to the SQL query of a tt_news. I.e. it is possible to display tt_news items in dependence on the fe_user ownership.',
	'category' => 'be',
	'shy' => 0,
	'version' => '0.1.2',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 0,
	'lockType' => '',
	'author' => 'Dirk Wildt, Die Netzmacher',
	'author_email' => 'wildt.at.die-netzmacher.de',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'tt_news' => '',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:6:{s:9:"ChangeLog";s:4:"7479";s:29:"class.tx_ttnewsselectconf.php";s:4:"f91e";s:12:"ext_icon.gif";s:4:"91db";s:17:"ext_localconf.php";s:4:"eaa4";s:14:"doc/manual.pdf";s:4:"fb78";s:14:"doc/manual.sxw";s:4:"cd47";}',
);

?>