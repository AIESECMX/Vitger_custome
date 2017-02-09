<?php
include_once('vtlib/Vtiger/Module.php');
$moduleInstance = Vtiger_Module::getInstance('MC');
$accountsModule = Vtiger_Module::getInstance('LC');
$relationLabel  = 'LCs';
$moduleInstance->setRelatedList(
      $accountsModule, $relationLabel, Array('ADD','SELECT')
);

?>