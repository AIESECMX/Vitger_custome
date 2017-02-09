<?php
include_once 'vtlib/Vtiger/Module.php';

$Vtiger_Utils_Log = true;

$MODULENAME = 'Opportunity';

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
        //expa id
        $field1  = new Vtiger_Field();
        $field1->name = 'opportunity_id';
        $field1->label= 'opportunity_id';
        $field1->uitype= 2;
        $field1->column = $field1->name;
        $field1->columntype = 'VARCHAR(255)';
        $field1->typeofdata = 'V~M';
        $block->addField($field1);

        

        //title
        $field2  = new Vtiger_Field();
        $field2->name = 'title';
        $field2->label= 'Title';
        $field2->uitype= 2;
        $field2->column = $field2->name;
        $field2->columntype = 'VARCHAR(255)';
        $field2->typeofdata = 'V~M';
        $block->addField($field2);
        $moduleInstance->setEntityIdentifier($field2);
        //url
        $field3  = new Vtiger_Field();
        $field3->name = 'url';
        $field3->label= 'Url';
        $field3->uitype= 1;
        $field3->column = $field3->name;
        $field3->columntype = 'VARCHAR(255)';
        $field3->typeofdata = 'V~O';
        $block->addField($field3);
        //programme
        $field4  = new Vtiger_Field();
        $field4->name = 'programme';
        $field4->label= 'programme';
        $field4->uitype= 1;
        $field4->column = $field4->name;
        $field4->columntype = 'VARCHAR(255)';
        $field4->typeofdata = 'V~O';
        $block->addField($field4);
        //start date
        $field5  = new Vtiger_Field();
        $field5->name = 'start_date';
        $field5->label= 'Start date';
        $field5->uitype= 5;
        $field5->column = $field5->name;
        $field5->columntype = 'DATE';
        $field5->typeofdata = 'D~M';
        $block->addField($field5);
        //end date
        $field6  = new Vtiger_Field();
        $field6->name = 'end_date';
        $field6->label= 'End date';
        $field6->uitype= 23;
        $field6->column = $field6->name;
        $field6->columntype = 'DATE';
        $field6->typeofdata = 'D~M';
        $block->addField($field6);
        //apps closed
        $field7  = new Vtiger_Field();
        $field7->name = 'apps_closed';
        $field7->label= 'Apps closed';
        $field7->uitype= 23;
        $field7->column = $field7->name;
        $field7->columntype = 'DATE';
        $field7->typeofdata = 'D~O';
        $block->addField($field7);
        //created
        $field8  = new Vtiger_Field();
        $field8->name = 'created';
        $field8->label= 'Created';
        $field8->uitype= 5;
        $field8->column = $field8->name;
        $field8->columntype = 'DATE';
        $field8->typeofdata = 'D~M';
        $block->addField($field8);
        //updated
        $field9  = new Vtiger_Field();
        $field9->name = 'updated';
        $field9->label= 'Updated';
        $field9->uitype= 23;
        $field9->column = $field9->name;
        $field9->columntype = 'DATE';
        $field9->typeofdata = 'D~O';
        $block->addField($field9);
        //status
        $field10  = new Vtiger_Field();
        $field10->name = 'status';
        $field10->label= 'status';
        $field10->uitype= 27;
        $field10->column = $field10->name;
        $field10->columntype = 'VARCHAR(255)';
        $field10->typeofdata = 'V~O';
        $block->addField($field10);

        // LC
        $field = new vtiger_field();
        $field->name = 'lc_id';
        $field->label = 'LC';
        $field->table = 'vtiger_opportunity';
        $field->column = 'lc_id';
        $field->columntype = 'varchar(255)';
        $field->uitype = 10;
        $field->typeofdata = 'v~o';
        $block->addfield($field);
        $field->setrelatedmodules(array('LC'));

        //enabler
        $field11  = new Vtiger_Field();
        $field11->name = 'enabler';
        $field11->label= 'enabler';
        $field11->uitype= 10;
        $field11->column = $field11->name;
        $field11->columntype = 'VARCHAR(255)';
        $field11->typeofdata = 'V~O';
        $block->addField($field11);
        $field11->setrelatedmodules(array('Enabler'));

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