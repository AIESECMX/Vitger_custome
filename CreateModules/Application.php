<?php
include_once 'vtlib/Vtiger/Module.php';

$Vtiger_Utils_Log = true;

$MODULENAME = 'Application';

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

        //field expa i d
        $field1  = new Vtiger_Field();
        $field1->name = 'expa_id';
        $field1->label= 'expa_id';
        $field1->uitype= 2;
        $field1->column = $field1->name;
        $field1->columntype = 'VARCHAR(255)';
        $field1->typeofdata = 'V~M';
        $block->addField($field1);
        //field url
        $field2  = new Vtiger_Field();
        $field2->name = 'url';
        $field2->label= 'url';
        $field2->uitype= 1;
        $field2->column = $field2->name;
        $field2->columntype = 'VARCHAR(255)';
        $field2->typeofdata = 'V~O';
        $block->addField($field2);
        //field status
        $field3  = new Vtiger_Field();
        $field3->name = 'status';
        $field3->label= 'status';
        $field3->uitype= 27;
        $field3->column = $field3->name;
        $field3->columntype = 'VARCHAR(255)';
        $field3->typeofdata = 'V~O';
        $block->addField($field3);
        //current status
        $field4  = new Vtiger_Field();
        $field4->name = 'current_status';
        $field4->label= 'current_status';
        $field4->uitype= 27;
        $field4->column = $field4->name;
        $field4->columntype = 'VARCHAR(255)';
        $field4->typeofdata = 'V~M';
        $block->addField($field4);
        //person 
        $field5  = new Vtiger_Field();
        $field5->name = 'people_id';
        $field5->label= 'applicant';
        $field5->uitype= 10;
        $field5->column = $field5->name;
        $field5->columntype = 'VARCHAR(255)';
        $field5->typeofdata = 'V~M';
        $block->addField($field5);
        $field5->setrelatedmodules(array('People'));

        //opportunity
        $field6  = new Vtiger_Field();
        $field6->name = 'opportunity_id';
        $field6->label= 'opportunity';
        $field6->uitype= 10;
        $field6->column = $field6->name;
        $field6->columntype = 'VARCHAR(255)';
        $field6->typeofdata = 'V~O';
        $block->addField($field6);
        $field6->setrelatedmodules(array('Opportunity'));



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