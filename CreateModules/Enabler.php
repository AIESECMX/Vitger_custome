<?php
include_once 'vtlib/Vtiger/Module.php';

$Vtiger_Utils_Log = true;

$MODULENAME = 'Enabler';

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
        //EXPA id
        $field1  = new Vtiger_Field();
        $field1->name = 'enabler_id';
        $field1->label= 'enabler_id';
        $field1->uitype= 2;
        $field1->column = $field1->name;
        $field1->columntype = 'VARCHAR(255)';
        $field1->typeofdata = 'V~M';
        $block->addField($field1);
                //name
        $field2 = new Vtiger_Field();
        $field2->name = 'name';
        $field2->label= 'Name';
        $field2->uitype= 2;
        $field2->column = $field2->name;
        $field2->columntype = 'VARCHAR(255)';
        $field2->typeofdata = 'V~M';
        $block->addField($field2);
                //url
        $field3  = new Vtiger_Field();
        $field3->name = 'url';
        $field3->label= 'Url';
        $field3->uitype= 1;
        $field3->column = $field3->name;
        $field3->columntype = 'VARCHAR(255)';
        $field3->typeofdata = 'V~O';
        $block->addField($field3);
                //website
        $field4  = new Vtiger_Field();
        $field4->name = 'website';
        $field4->label= 'Website';
        $field4->uitype= 17;
        $field4->column = $field4->name;
        $field4->columntype = 'VARCHAR(255)';
        $field4->typeofdata = 'V~O';
        $block->addField($field4);
                //summary
        $field5  = new Vtiger_Field();
        $field5->name = 'summary';
        $field5->label= 'Summary';
        $field5->uitype= 19;
        $field5->column = $field5->name;
        $field5->columntype = 'VARCHAR(255)';
        $field5->typeofdata = 'V~O';
        $block->addField($field5);
                //gep
        $field6  = new Vtiger_Field();
        $field6->name = 'ge';
        $field6->label= 'GE';
        $field6->uitype= 56;
        $field6->column = $field6->name;
        $field6->columntype = 'BOOLEAN';
        $field6->typeofdata = 'C~O';
        $block->addField($field6);
                //fromCOP
        $field7  = new Vtiger_Field();
        $field7->name = 'from_cop';
        $field7->label= 'From COP';
        $field7->uitype= 56;
        $field7->column = $field7->name;
        $field7->columntype = 'BOOLEAN';
        $field7->typeofdata = 'C~O';
        $block->addField($field7);
                //type
        $field8 = new Vtiger_Field();
        $field8->name = 'type';
        $field8->label= 'Type';
        $field8->uitype= 27;
        $field8->column = $field8->name;
        $field8->columntype = 'VARCHAR(255)';
        $field8->typeofdata = 'V~O';
        $block->addField($field8);
                //size
        $field9 = new Vtiger_Field();
        $field9->name = 'size';
        $field9->label= 'Size';
        $field9->uitype= 27;
        $field9->column = $field9->name;
        $field9->columntype = 'VARCHAR(255)';
        $field9->typeofdata = 'V~O';
        $block->addField($field9);
                //status
        $field10  = new Vtiger_Field();
        $field10->name = 'status';
        $field10->label= 'Status';
        $field10->uitype= 27;
        $field10->column = $field10->name;
        $field10->columntype = 'VARCHAR(255)';
        $field10->typeofdata = 'V~O';
        $block->addField($field10);

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