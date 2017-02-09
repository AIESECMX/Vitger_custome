<?php
include_once 'vtlib/Vtiger/Module.php';

$Vtiger_Utils_Log = true;

$MODULENAME = 'LC';

$moduleInstance = Vtiger_Module::getInstance($MODULENAME);
if ($moduleInstance || file_exists('modules/'.$MODULENAME)) {
        echo "Module already present - choose a different name.";
} else {
        $moduleInstance = new Vtiger_Module();
        $moduleInstance->name = $MODULENAME;
        $moduleInstance->parent= 'Tools';
        $moduleInstance->save();

        // Schema Setup
        $moduleInstance->initTables();

        // Field Setup
        $block = new Vtiger_Block();
        $block->label = 'LBL_'. strtoupper($moduleInstance->name) . '_INFORMATION';
        $moduleInstance->addBlock($block);

        $blockcf = new Vtiger_Block();
        $blockcf->label = 'LBL_CUSTOM_INFORMATION';
        $moduleInstance->addBlock($blockcf);

        $field1  = new Vtiger_Field();
        $field1->name = 'lc_id';
        $field1->label= 'lc_id';
        $field1->uitype= 2;
        $field1->column = $field1->name;
        $field1->columntype = 'VARCHAR(255)';
        $field1->typeofdata = 'V~M';
        $block->addField($field1);

        $field2  = new Vtiger_Field();
        $field2->name = 'name';
        $field2->label= 'Name';
        $field2->uitype= 2;
        $field2->column = $field2->name;
        $field2->columntype = 'VARCHAR(255)';
        $field2->typeofdata = 'V~M';
        $block->addField($field2);


        
        // MC
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


        $moduleInstance->setEntityIdentifier($field1);


        // Filter Setup
        $filter1 = new Vtiger_Filter();
        $filter1->name = 'All';
        $filter1->isdefault = true;
        $moduleInstance->addFilter($filter1);
        $filter1->addField($field1)->addField($field2, 1)->addField($field3, 2)->addField($mfield1, 3);

        // Sharing Access Setup
        $moduleInstance->setDefaultSharing();

        // Webservice Setup
        $moduleInstance->initWebservice();

        mkdir('modules/'.$MODULENAME);
        echo "OK\n";
}