<?php
include_once 'vtlib/Vtiger/Module.php';

$Vtiger_Utils_Log = true;

$MODULENAME = 'People';

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
        $field1->name = 'people_id';
        $field1->label= 'people_id';
        $field1->uitype= 2;
        $field1->column = $field1->name;
        $field1->columntype = 'VARCHAR(255)';
        $field1->typeofdata = 'V~M';
        $block->addField($field1);

        $moduleInstance->setEntityIdentifier($field1);

//Name
        $field1  = new Vtiger_Field();
        $field1->name = 'name';
        $field1->label= 'name';
        $field1->uitype= 2;
        $field1->column = $field1->name;
        $field1->columntype = 'VARCHAR(255)';
        $field1->typeofdata = 'V~M';
        $block->addField($field1);
//url
        $field1  = new Vtiger_Field();
        $field1->name = 'url';
        $field1->label= 'url';
        $field1->uitype= 1;
        $field1->column = $field1->name;
        $field1->columntype = 'VARCHAR(255)';
        $field1->typeofdata = 'V~O';
        $block->addField($field1);
//phone
        $field1  = new Vtiger_Field();
        $field1->name = 'phone';
        $field1->label= 'phone';
        $field1->uitype= 2;
        $field1->column = $field1->name;
        $field1->columntype = 'VARCHAR(255)';
        $field1->typeofdata = 'V~O';
        $block->addField($field1);
//email
        $field1  = new Vtiger_Field();
        $field1->name = 'email';
        $field1->label= 'email';
        $field1->uitype= 13;
        $field1->column = $field1->name;
        $field1->columntype = 'VARCHAR(255)';
        $field1->typeofdata = 'V~M';
        $block->addField($field1);
//Contacted at
        $field1  = new Vtiger_Field();
        $field1->name = 'contacted_at';
        $field1->label= 'contacted';
        $field1->uitype= 23;
        $field1->column = $field1->name;
        $field1->columntype = 'DATE';
        $field1->typeofdata = 'D~O';
        $block->addField($field1);
//created at
        $field1  = new Vtiger_Field();
        $field1->name = 'created';
        $field1->label= 'created';
        $field1->uitype= 5;
        $field1->column = $field1->name;
        $field1->columntype = 'DATE';
        $field1->typeofdata = 'D~O';
        $block->addField($field1);
//Updated
        $field1  = new Vtiger_Field();
        $field1->name = 'updated';
        $field1->label= 'updated';
        $field1->uitype= 23;
        $field1->column = $field1->name;
        $field1->columntype = 'DATE';
        $field1->typeofdata = 'D~O';
        $block->addField($field1);
//Role
        $field1  = new Vtiger_Field();
        $field1->name = 'role';
        $field1->label= 'Role';
        $field1->uitype= 27;
        $field1->column = $field1->name;
        $field1->columntype = 'VARCHAR(255)';
        $field1->typeofdata = 'V~O';
        $block->addField($field1);
//programme
        $field1  = new Vtiger_Field();
        $field1->name = 'programme';
        $field1->label= 'programme';
        $field1->uitype= 27;
        $field1->column = $field1->name;
        $field1->columntype = 'VARCHAR(255)';
        $field1->typeofdata = 'V~O';
        $block->addField($field1);
//LC
        $field = new vtiger_field();
        $field->name = 'lc_id';
        $field->label = 'LC';
        $field->table = 'vtiger_people';
        $field->column = 'lc_id';
        $field->columntype = 'varchar(255)';
        $field->uitype = 10;
        $field->typeofdata = 'v~o';
        $block->addfield($field);
        $field->setrelatedmodules(array('LC'));


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