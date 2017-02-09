<?php
include_once('vtlib/Vtiger/Module.php');

$moduleInstance = new Vtiger_Module();
$moduleInstance->name = 'Application';
$moduleInstance->save();
$moduleInstance->initTables();
$menuInstance = Vtiger_Menu::getInstance('Tools');
$menuInstance->addModule($moduleInstance);


$moduleInstance = new Vtiger_Module();
$moduleInstance->name = 'Nationality';
$moduleInstance->save();
$moduleInstance->initTables();
$menuInstance = Vtiger_Menu::getInstance('Tools');
$menuInstance->addModule($moduleInstance);


$moduleInstance = new Vtiger_Module();
$moduleInstance->name = 'MC';
$moduleInstance->save();
$moduleInstance->initTables();
$menuInstance = Vtiger_Menu::getInstance('Tools');
$menuInstance->addModule($moduleInstance);


$moduleInstance = new Vtiger_Module();
$moduleInstance->name = 'LC';
$moduleInstance->save();
$moduleInstance->initTables();
$menuInstance = Vtiger_Menu::getInstance('Tools');
$menuInstance->addModule($moduleInstance);


$moduleInstance = new Vtiger_Module();
$moduleInstance->name = 'Status';
$moduleInstance->save();
$moduleInstance->initTables();
$menuInstance = Vtiger_Menu::getInstance('Tools');
$menuInstance->addModule($moduleInstance);

$moduleInstance = new Vtiger_Module();
$moduleInstance->name = 'Role';
$moduleInstance->save();
$moduleInstance->initTables();
$menuInstance = Vtiger_Menu::getInstance('Tools');
$menuInstance->addModule($moduleInstance);


$moduleInstance = new Vtiger_Module();
$moduleInstance->name = 'Opportunity';
$moduleInstance->save();
$moduleInstance->initTables();
$menuInstance = Vtiger_Menu::getInstance('Tools');
$menuInstance->addModule($moduleInstance);


$moduleInstance = new Vtiger_Module();
$moduleInstance->name = 'Enabler';
$moduleInstance->save();
$moduleInstance->initTables();
$menuInstance = Vtiger_Menu::getInstance('Tools');
$menuInstance->addModule($moduleInstance);


$moduleInstance = new Vtiger_Module();
$moduleInstance->name = 'Product';
$moduleInstance->save();
$moduleInstance->initTables();
$menuInstance = Vtiger_Menu::getInstance('Tools');
$menuInstance->addModule($moduleInstance);


$moduleInstance = new Vtiger_Module();
$moduleInstance->name = 'Subproduct';
$moduleInstance->save();
$moduleInstance->initTables();
$menuInstance = Vtiger_Menu::getInstance('Tools');
$menuInstance->addModule($moduleInstance);


$moduleInstance = new Vtiger_Module();
$moduleInstance->name = 'Industry';
$moduleInstance->save();
$moduleInstance->initTables();
$menuInstance = Vtiger_Menu::getInstance('Tools');
$menuInstance->addModule($moduleInstance);


$moduleInstance = new Vtiger_Module();
$moduleInstance->name = 'People';
$moduleInstance->save();
$moduleInstance->initTables();
$menuInstance = Vtiger_Menu::getInstance('Tools');
$menuInstance->addModule($moduleInstance);


?>