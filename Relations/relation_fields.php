<?php
include_once('vtlib/Vtiger/Module.php');
include_once('vtlib/vtiger/module.php');
include_once('vtlib/vtiger/menu.php');

//MC tiene muchos Committees
/*
$moduleInstance = Vtiger_Module::getInstance('MC');
$accountsModule = Vtiger_Module::getInstance('Committee');
$relationLabel  = 'Committees';
$moduleInstance->setRelatedList(
      $accountsModule, $relationLabel, Array('ADD')
);
*

relationship 1:m (1 account, x tests )
*/

// define instances
$account = vtiger_module::getinstance('MC');
$custom = vtiger_module::getinstance('LC');
$block = vtiger_block::getinstance('lbl_lc_information', $custom);
//un lc pertenece a un mc
// add field
$field = new vtiger_field();
$field->name = 'mc_id';
$field->label = 'MC';
$field->table = 'vtiger_lc';
$field->column = 'mc_id';
$field->columntype = 'varchar(255)';
$field->uitype = 10;
$field->typeofdata = 'v~o';
$block->addfield($field);
$field->setrelatedmodules(array('MC'));
/*

//Committee tiene miembros
$moduleInstance = Vtiger_Module::getInstance('Committee');
$accountsModule = Vtiger_Module::getInstance('People');
$relationLabel  = 'People';
$moduleInstance->setRelatedList(
      $accountsModule, $relationLabel, Array('ADD')
);
// define instances
$account = vtiger_module::getinstance('Commitee');
$custom = vtiger_module::getinstance('People');
$block = vtiger_block::getinstance('lbl_people_information', $custom);

// add field
$field = new vtiger_field();
$field->name = 'commitee_id';
$field->label = 'Commitee';
$field->table = 'vtiger_people';
$field->column = 'commitee_id';
$field->columntype = 'int(255)';
$field->uitype = 10;
$field->typeofdata = 'v~o';
$block->addfield($field);
$field->setrelatedmodules(array('Commitee'));

/*
//Committee tiene opportunidades
$moduleInstance = Vtiger_Module::getInstance('Committee');
$accountsModule = Vtiger_Module::getInstance('Opportunity');
$relationLabel  = 'Opportunities';
$moduleInstance->setRelatedList(
      $accountsModule, $relationLabel, Array('ADD')
);

// define instances
$account = vtiger_module::getinstance('Commitee');
$custom = vtiger_module::getinstance('Opportunity');
$block = vtiger_block::getinstance('lbl_opportunity_information', $custom);

// add field
$field = new vtiger_field();
$field->name = 'commitee_id';
$field->label = 'Commitee';
$field->table = 'vtiger_opportunity';
$field->column = 'commitee_id';
$field->columntype = 'int(255)';
$field->uitype = 10;
$field->typeofdata = 'v~o';
$block->addfield($field);
$field->setrelatedmodules(array('Commitee'));

/*
//Opportunidad tiene aplicaciones
$moduleInstance = Vtiger_Module::getInstance('Opportunity');
$accountsModule = Vtiger_Module::getInstance('Application');
$relationLabel  = 'Applications';
$moduleInstance->setRelatedList(
      $accountsModule, $relationLabel, Array('ADD')
);
// define instances
$account = vtiger_module::getinstance('Opportunity');
$custom = vtiger_module::getinstance('Application');
$block = vtiger_block::getinstance('lbl_application_information', $custom);

// add field
$field = new vtiger_field();
$field->name = 'opportunity_id';
$field->label = 'Opportunity';
$field->table = 'vtiger_application';
$field->column = 'opportunity_id';
$field->columntype = 'int(255)';
$field->uitype = 10;
$field->typeofdata = 'v~o';
$block->addfield($field);
$field->setrelatedmodules(array('Opportunity'));

/*
//Persona tiene aplicaciones
$moduleInstance = Vtiger_Module::getInstance('People');
$accountsModule = Vtiger_Module::getInstance('Application');
$relationLabel  = 'Applications';
$moduleInstance->setRelatedList(
      $accountsModule, $relationLabel, Array('ADD')
);
$account = vtiger_module::getinstance('People');
$custom = vtiger_module::getinstance('Application');
$block = vtiger_block::getinstance('lbl_application_information', $custom);

// add field
$field = new vtiger_field();
$field->name = 'people_id';
$field->label = 'Applicant';
$field->table = 'vtiger_application';
$field->column = 'people_id';
$field->columntype = 'int(255)';
$field->uitype = 10;
$field->typeofdata = 'v~o';
$block->addfield($field);
$field->setrelatedmodules(array('People'));

/*
//Enabler tiene oportunidades
$moduleInstance = Vtiger_Module::getInstance('Enabler');
$accountsModule = Vtiger_Module::getInstance('Opportunity');
$relationLabel  = 'Opportunities';
$moduleInstance->setRelatedList(
      $accountsModule, $relationLabel, Array('ADD')
);
$account = vtiger_module::getinstance('Enabler');
$custom = vtiger_module::getinstance('Opportunity');
$block = vtiger_block::getinstance('lbl_opportunity_information', $custom);

// add field
$field = new vtiger_field();
$field->name = 'enabler_id';
$field->label = 'Enabler';
$field->table = 'vtiger_opportunity';
$field->column = 'enabler_id';
$field->columntype = 'int(255)';
$field->uitype = 10;
$field->typeofdata = 'v~o';
$block->addfield($field);
$field->setrelatedmodules(array('Enabler'));

/*
//Opportunidades tiene mangerss
$moduleInstance = Vtiger_Module::getInstance('Opportunity');
$accountsModule = Vtiger_Module::getInstance('People');
$relationLabel  = 'Managers';
$moduleInstance->setRelatedList(
      $accountsModule, $relationLabel, Array('ADD','SELECT')
);
$account = vtiger_module::getinstance('Opportunity');
$custom = vtiger_module::getinstance('People');
$block = vtiger_block::getinstance('lbl_people_information', $custom);

// add field
$field = new vtiger_field();
$field->name = 'opportunity_id';
$field->label = 'Opportunity';
$field->table = 'vtiger_people';
$field->column = 'opportunity_id';
$field->columntype = 'int(255)';
$field->uitype = 10;
$field->typeofdata = 'v~o';
$block->addfield($field);
$field->setrelatedmodules(array('Opportunity'));

/*
//Enablers tienen managers
$moduleInstance = Vtiger_Module::getInstance('Enabler');
$accountsModule = Vtiger_Module::getInstance('People');
$relationLabel  = 'Managers';
$moduleInstance->setRelatedList(
      $accountsModule, $relationLabel, Array('ADD','SELECT')
);
$account = vtiger_module::getinstance('Enabler');
$custom = vtiger_module::getinstance('People');
$block = vtiger_block::getinstance('lbl_people_information', $custom);

// add field
$field = new vtiger_field();
$field->name = 'enabler_id';
$field->label = 'Enabler';
$field->table = 'vtiger_people';
$field->column = 'enabler_id';
$field->columntype = 'int(255)';
$field->uitype = 10;
$field->typeofdata = 'v~o';
$block->addfield($field);
$field->setrelatedmodules(array('Enabler'));

/*
//Gente va a eventos
$moduleInstance = Vtiger_Module::getInstance('Event');
$accountsModule = Vtiger_Module::getInstance('People');
$relationLabel  = 'Delegates';
$moduleInstance->setRelatedList(
      $accountsModule, $relationLabel, Array('ADD','SELECT')
);


$account = vtiger_module::getinstance('Event');
$custom = vtiger_module::getinstance('People');
$block = vtiger_block::getinstance('lbl_people_information', $custom);

// add field
$field = new vtiger_field();
$field->name = 'events_id';
$field->label = 'Event';
$field->table = 'vtiger_people';
$field->column = 'events_id';
$field->columntype = 'int(255)';
$field->uitype = 10;
$field->typeofdata = 'v~o';
$block->addfield($field);
$field->setrelatedmodules(array('Event'));
*/
?>