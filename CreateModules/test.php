<?php
include_once('vtlib/Vtiger/Module.php');
$moduleInstance = new Vtiger_Module();
$moduleInstance->name = 'MC';
$moduleInstance->save();
$moduleInstance->initTables();
$menuInstance = Vtiger_Menu::getInstance('Tools');
$menuInstance->addModule($moduleInstance);

?>