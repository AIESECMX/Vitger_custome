<?php
include_once('vtlib/Vtiger/Module.php');

//MC tiene muchos Committees
$moduleInstance = Vtiger_Module::getInstance('MC');
$accountsModule = Vtiger_Module::getInstance('LC');
$relationLabel  = 'LC';
$moduleInstance->setRelatedList(
      $accountsModule, $relationLabel, Array('SELECT'),'get_dependents_list'
);

/*

//Committee tiene miembros
$moduleInstance = Vtiger_Module::getInstance('Committee');
$accountsModule = Vtiger_Module::getInstance('People');
$relationLabel  = 'People';
$moduleInstance->setRelatedList(
      $accountsModule, $relationLabel, Array('ADD')
);

//Committee tiene opportunidades
$moduleInstance = Vtiger_Module::getInstance('Committee');
$accountsModule = Vtiger_Module::getInstance('Opportunity');
$relationLabel  = 'Opportunities';
$moduleInstance->setRelatedList(
      $accountsModule, $relationLabel, Array('ADD')
);

//Opportunidad tiene aplicaciones
$moduleInstance = Vtiger_Module::getInstance('Opportunity');
$accountsModule = Vtiger_Module::getInstance('Application');
$relationLabel  = 'Applications';
$moduleInstance->setRelatedList(
      $accountsModule, $relationLabel, Array('ADD')
);

//Persona tiene aplicaciones
$moduleInstance = Vtiger_Module::getInstance('People');
$accountsModule = Vtiger_Module::getInstance('Application');
$relationLabel  = 'Applications';
$moduleInstance->setRelatedList(
      $accountsModule, $relationLabel, Array('ADD')
);

//Enabler tiene oportunidades
$moduleInstance = Vtiger_Module::getInstance('Enabler');
$accountsModule = Vtiger_Module::getInstance('Opportunity');
$relationLabel  = 'Opportunities';
$moduleInstance->setRelatedList(
      $accountsModule, $relationLabel, Array('ADD')
);

//Opportunidades tiene mangerss
$moduleInstance = Vtiger_Module::getInstance('Opportunity');
$accountsModule = Vtiger_Module::getInstance('People');
$relationLabel  = 'Managers';
$moduleInstance->setRelatedList(
      $accountsModule, $relationLabel, Array('ADD','SELECT')
);

//Enablers tienen managers
$moduleInstance = Vtiger_Module::getInstance('Enabler');
$accountsModule = Vtiger_Module::getInstance('People');
$relationLabel  = 'Managers';
$moduleInstance->setRelatedList(
      $accountsModule, $relationLabel, Array('ADD','SELECT')
);

//Gente va a eventos
$moduleInstance = Vtiger_Module::getInstance('Event');
$accountsModule = Vtiger_Module::getInstance('People');
$relationLabel  = 'Delegates';
$moduleInstance->setRelatedList(
      $accountsModule, $relationLabel, Array('ADD','SELECT')
);
*/
?>