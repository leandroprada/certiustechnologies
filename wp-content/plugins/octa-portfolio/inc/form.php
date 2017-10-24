<?php
$do = isset($_GET['do']) ? $_GET['do'] : '';
$action = isset($_GET['action']) ? $_GET['action'] : '';
$page = isset($_GET['page']) ? $_GET['page'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$delbtn = isset($_GET['delbtn']) ? $_GET['delbtn'] : '';
$clonebtn = isset($_GET['cloneBtn']) ? $_GET['cloneBtn'] : '';
oc_display_settings($do, $action, $id, $delbtn);

function oc_display_settings($do, $action, $id, $delbtn) {
    $dbObj = new OCTA_Tables();
    if (isset($_POST['editBtn'])) {
        $do = 'create';
    }
    if (isset($_POST['cloneBtn'])) {
        $do = 'clone';
    }
    ?>
    <div class="<?php echo PLUGIN_SLUG; ?>-form">
        <?php
        require_once(PLUGIN_DIR . '/views/top-tbl.php');
        if (empty($do)) {
            require_once(PLUGIN_DIR . '/views/grids-list.php');
        } elseif ($do == 'create') {
            require_once(PLUGIN_DIR . '/views/main-form.php');
        }
        if (empty($do)) {
            //require_once(PLUGIN_DIR . '/views/footer.php');
        }
        ?>
    </div>

    <?php
    if (($action == 'save' && empty($id)) || ($action == 'save' && empty($id))) {
        $dbObj->oc_insert_update($id);
    }
    if ($action == 'edit' && $do == 'create' && !empty($id)) {
        $dbObj->oc_insert_update($id);
    }
    if ($do == 'clone' && !empty($id)) {
        $dbObj->oc_duplicate_row(PLUGIN_TBL, $id);
    }
    if (!empty($delbtn)) {
        $_SESSION['delRow'] = $id;
        if (isset($_SESSION['delRow'])) {
            $id = $_SESSION['delRow'];
            $dbObj->oc_delRow($id);
            unset($_SESSION['delRow']);
        }
    }
}
