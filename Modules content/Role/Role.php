<?php

include_once 'modules/Vtiger/CRMEntity.php';

class Role extends Vtiger_CRMEntity {
        var $table_name = 'vtiger_role';
        var $table_index= 'roleid';

        var $customFieldTable = Array('vtiger_rolecf', 'roleid');

        var $tab_name = Array('vtiger_crmentity', 'vtiger_role', 'vtiger_rolecf');

        var $tab_name_index = Array(
                'vtiger_crmentity' => 'crmid',
                'vtiger_role' => 'roleid',
                'vtiger_rolecf'=>'roleid');

        var $list_fields = Array (
                /* Format: Field Label => Array(tablename, columnname) */
                // tablename should not have prefix 'vtiger_'
                'expa_id' => Array('role', 'expa_id'),
                'Assigned To' => Array('crmentity','smownerid')
        );
        var $list_fields_name = Array (
                /* Format: Field Label => fieldname */
                'expa_id' => 'expa_id',
                'Assigned To' => 'assigned_user_id',
        );

        // Make the field link to detail view
        var $list_link_field = 'expa_id';

        // For Popup listview and UI type support
        var $search_fields = Array(
                /* Format: Field Label => Array(tablename, columnname) */
                // tablename should not have prefix 'vtiger_'
                'expa_id' => Array('role', 'expa_id'),
                'Assigned To' => Array('vtiger_crmentity','assigned_user_id'),
        );
        var $search_fields_name = Array (
                /* Format: Field Label => fieldname */
                'expa_id' => 'expa_id',
                'Assigned To' => 'assigned_user_id',
        );

        // For Popup window record selection
        var $popup_fields = Array ('expa_id');

        // For Alphabetical search
        var $def_basicsearch_col = 'expa_id';

        // Column value to use on detail view record text display
        var $def_detailview_recname = 'expa_id';

        // Used when enabling/disabling the mandatory fields for the module.
        // Refers to vtiger_field.fieldname values.
        var $mandatory_fields = Array('expa_id','assigned_user_id');

        var $default_order_by = 'expa_id';
        var $default_sort_order='ASC';
}