<?php

class OCTA_Tables {

    public function __construct() {
        
    }

    public function oc_select() {
        
        global $wpdb;
        $gridSetting = $wpdb->get_results("SELECT * FROM ".PLUGIN_TBL);
        $noRows = $wpdb->get_results("SELECT COUNT(*) FROM ".PLUGIN_TBL);
        $array_rows = array($noRows);
        $rows = $array_rows[0][0];
        $general_array = array();
        array_push($general_array, $gridSetting, $rows);
        return $general_array;
        
    }

    public function oc_selectWithId($id) {
        
        global $wpdb;
        $gridSetting = $wpdb->get_row($wpdb->prepare("SELECT * FROM ".PLUGIN_TBL." WHERE  id=%d ", $id)); //%d for digits (int)
        $general_array = array();
        array_push($general_array, $gridSetting);
        return $general_array;
        
    }

    public function oc_AddSQL() {
        
        global $wpdb;
        ob_start();
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE IF NOT EXISTS ".PLUGIN_TBL."(";
            $sql .= implode(", ", self::oc_forLoop());
        $sql .= ", UNIQUE KEY (id)) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
        ob_clean();
    }

    public function oc_forLoop() {
        
        $configs = new OCTA_Config();
        $defult_args = self::_defult_args();
        $conficArr = $configs->configArray();
        $itemArray = array();
        $auto_val = '';
        foreach ($conficArr as $key => $value) {
            $auto_val = $class = isset($value['auto']) ? $value['auto'] : $defult_args['auto'];
            if ($value['name'] != 'oldalias') {
                $itemArray[] = $value['name'] . ' ' . $value['data_type'] . ' ' . $value['not_null'] . ' ' . $auto_val;
            }
        }
        return $itemArray;
        
    }

    public function _defult_args() {
        
        $defults = array (
            "name"          => "",
            "title"         => "",
            "data_type"     => "text",
            "type"          => "text",
            "section"       => "",
            "class"         => "",
            "description"   => "",
            "placeholder"   => "",
            "std"           => "",
            "not_null"      => "NOT NULL",
            "auto"          => "",
            "choices"       => array(),
            "parent"        => "",
            "group"         => "",
            "min"           => "",
            "max"           => "",
            'dependency'    => array(),
        );
        return $defults;
        
    }

    public function oc_delRow($id) {
        
        global $wpdb;
        $where = array('id' => $id);
        $wpdb->delete(PLUGIN_TBL, $where);
        
    }

    public function oc_insert_update($id) {
        
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        
        $titl = (isset($_POST['oc_data']['title'])) ? $_POST['oc_data']['title'] : "";
        $alia = (isset($_POST['oc_data']['alias'])) ? $_POST['oc_data']['alias'] : "";
        $oldalia = (isset($_POST['oc_hidden']['oldalias'])) ? $_POST['oc_hidden']['oldalias'] : "";
        $settingData = (isset($_POST['oc_data'])) ? $_POST['oc_data'] : "";
        
        $Set_arr = array();
        if (isset($settingData) && $settingData != '') {
            foreach ($settingData as $key => $value) {
               $Set_arr[$key] = stripcslashes($value);
            }
        }
                
        if ($alia == $oldalia && $oldalia != '') {
            $getAlias = $wpdb->get_row($wpdb->prepare("SELECT * FROM ".PLUGIN_TBL." WHERE  alias=%s ", $oldalia));
            $where = array('id' => $id);
            $wpdb->update(PLUGIN_TBL, $Set_arr, $where);
        } elseif ($alia != $oldalia && $oldalia != '') {
            $exstAlias = $wpdb->get_row($wpdb->prepare("SELECT * FROM ".PLUGIN_TBL." WHERE  alias=%s ", $alia));
            if (empty($exstAlias)) {
                $getAlias = $wpdb->get_row($wpdb->prepare("SELECT * FROM ".PLUGIN_TBL." WHERE  alias=%s ", $oldalia));
                $where = array('id' => $id);
                $wpdb->update(PLUGIN_TBL, $Set_arr, $where);
            }
        } elseif (!empty($titl)) {
            if ($titl != '' || $alia != '') {
                $exstAlias = $wpdb->get_row($wpdb->prepare("SELECT * FROM ".PLUGIN_TBL." WHERE  alias=%s ", $alia));
                if (empty($exstAlias)) {
                    $wpdb->insert(PLUGIN_TBL, $Set_arr);
                }
            }
        }
        
    }

    public function oc_duplicate_row($table, $id) {
        
        global $wpdb;
        $result = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$table} WHERE  id=%d ", $id));
        $config = new OCTA_Config();
        $conficArr = $config->configArray();
        $itemArray = array();
        foreach ($conficArr as $key => $value) {
            if ($value['name'] != 'oldalias') {
                $itemArray[] = [$value['name'] => $result->$value['name']];
            }
        }
        unset($itemArray[0], $itemArray[1], $itemArray[2], $itemArray[3]);
        $itemArray[1] = array('title' => $result->title . ' Copy');
        $itemArray[2] = array('alias' => $result->alias . '-copy');
        $itemArray[3] = array('shortcode' => '['.PLUGIN_PFX.' alias="' . $result->alias . '-copy"]');
        $count = count($itemArray);
        $row_arr= array();
        for ($i = 1; $i <= $count; $i++) {
            foreach ($itemArray[$i] as $key => $val) {
                $row_arr[$key] = stripcslashes($val);
            }
        }
        $wpdb->insert($table, $row_arr);
        
    }

    public function oc_export_data() {
        
        global $wpdb;
        $gridSetting = $wpdb->get_results("SELECT * FROM " . PLUGIN_TBL);
        $configs = new OCTA_Config();
        $conficArr = $configs->configArray();
        $itemArray = array();
        $griSet = array();
        if (!empty($gridSetting)) {
            foreach ($gridSetting as $gsData) {
                foreach ($conficArr as $key => $value) {
                    $itemArray[$value['name']] = $gsData->$value['name'];
                }
                unset($itemArray['id']);
                $griSet[] = $itemArray;
            }
            nocache_headers();
            header('Content-Type: text/plain; charset=utf-8');
            header('Content-Disposition: attachment; filename='.PLUGIN_PFX.'_export-' . date('d-m-Y[h:i:s]') . '.json');
            header("Expires: 0");
            ob_end_clean();
            echo json_encode($griSet);
            exit;
        }
        
    }

    public function oc_import_file($do) {
        
        global $wpdb;
        $gridSetting = $wpdb->get_results("SELECT * FROM ".PLUGIN_TBL);
        $file_name = $_FILES['importfile']['name'];
        $ext = explode('.', $file_name);
        $file_extension = end($ext);
        if ($file_extension != 'json') {
            wp_die( __('Please upload a valid .json file', PLUGIN_SLUG ) );
        }
        $import_file = $_FILES['importfile']['tmp_name'];
        $grst_Alias = array();
        foreach ($gridSetting as $booAli) {
            $grst_Alias[] = $booAli->alias;
        }
        $grst_Alias2 = implode(" ", $grst_Alias);
        if (!empty($import_file)) {
            $configs = new OCTA_Config();
            $conficArr = $configs->configArray();
            $itemArray = array();
            $jsonData = (array) json_decode(file_get_contents($import_file), true);
            foreach ($jsonData as $row) {
                if (strpos($grst_Alias2, $row['alias']) !== false) {
                    $getAlias = $wpdb->get_row($wpdb->prepare("SELECT * FROM ".PLUGIN_TBL." WHERE  alias=%s ", $row['alias']));
                    foreach ($conficArr as $key => $value) {
                        if ($value['name'] == 'id') {
                            $itemArray[$value['name']] = $getAlias->oc_id;
                        } elseif ($value['name'] == 'oldalias') {
                           // nothing here... 
                        } else {
                            $itemArray[$value['name']] = $row[$value['name']];
                        }
                    }
                    $settingData = $itemArray;
                    $where = array('id' => $getAlias->oc_id);
                    $wpdb->update(PLUGIN_TBL, $settingData, $where);
                } else {
                    unset($row['oldalias']);
                    $wpdb->insert(PLUGIN_TBL, $row);
                }
            }
        }
        die();
        
    }

    public function oc_import_export() {
        
        if (isset($_POST['export'])) {
            $this->oc_export_data();
        }
        
        $do = isset($_GET['do']) ? $_GET['do'] : '';
        
        if (isset($_POST['import'])) {
            $do = 'import';
        }
        
        if ($do == 'import') {
            $this->oc_import_file($do);
        }
        
        require_once(PLUGIN_DIR . 'views/import_export.php');
        
    }
    
}

new OCTA_Tables();