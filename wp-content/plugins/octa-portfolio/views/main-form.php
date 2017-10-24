<?php
global $wpdb, $post;
$base_class = new OCTA_Base();
$dbObj = new OCTA_Tables();
$id = isset($_GET['id']) ? $_GET['id'] : '';
if (isset($_POST['saveBtn'])) {
    $action = 'save';
}
$allTables = $dbObj->oc_selectWithId($id);

?>

<div class="x_panel">
    <div class="x_title lg-b-pad">
        <h2>
            <?php if (empty($id)) {
                echo '<i class="dashicons dashicons-menu"></i>' . __('Create New Grid', PLUGIN_SLUG) . '<small>' . __('Choose from the following options', PLUGIN_SLUG) . '</small>';
            } else {
                echo '<i class="dashicons dashicons-edit"></i>' . __('Edit Grid', PLUGIN_SLUG) . '<small style="font-size:14px" class="main-color">'.$allTables[0]->title.'</small>';
            } ?>
        </h2>
        <div class="clearfix"></div>
    </div>
        
    <?php if (empty($id)) { ?>
    <form action="<?php echo admin_url(); ?>admin.php?page=<?php echo PLUGIN_PFX; ?>&action=save" method="post" class="oc_form save_gro form-horizontal form-label-left" novalidate>
        <div class="top-btns">
            <button type="submit" name="saveBtn" id="save_btn" class="btn btn-success oc_save_btn no-radius rel_btn"><i class="dashicons dashicons-thumbs-up"></i> <?php echo __('Save', PLUGIN_SLUG) ?></button>
            <a href="<?php echo admin_url(); ?>admin.php?page=<?php echo PLUGIN_PFX; ?>&do=create" name="add_new" id="add_new" class="btn-success add_new rel_btn"><i class="dashicons dashicons-plus-alt"></i><?php echo __('New', PLUGIN_SLUG) ?></a>
            <a class="top_imp rel_btn" href="<?php echo admin_url(); ?>admin.php?page=<?php echo PLUGIN_PFX; ?>-exp#tab=import_gr"><i class="dashicons dashicons-download"></i><?php echo __('Import', PLUGIN_SLUG) ?></a>
            <a class="top_exp rel_btn" href="<?php echo admin_url(); ?>admin.php?page=<?php echo PLUGIN_PFX; ?>-exp"><i class="dashicons dashicons-upload"></i><?php echo __('Export', PLUGIN_SLUG) ?></a>
            <a class="top_help rel_btn" href="http://wp.it-rays.net/docs/octa/" target="_blank"><i class="dashicons dashicons-info"></i><?php echo __('Help', PLUGIN_SLUG) ?></a>
        </div>
    <?php } else { ?>
    <form action="<?php echo admin_url(); ?>admin.php?page=<?php echo PLUGIN_PFX; ?>&do=create&action=edit&id=<?php echo $id ?>" method="post" class="oc_form form-horizontal form-label-left" novalidate>
        <div class="top-btns">
            <button type="submit" name="edit" id="edit_btn" class="btn btn-success edit_btn no-radius rel_btn"><i class="dashicons dashicons-edit"></i><?php echo __('Save', PLUGIN_SLUG) ?></button>
            <a href="<?php echo admin_url(); ?>admin.php?page=<?php echo PLUGIN_PFX; ?>&do=create" name="add_new" id="add_new" class="btn-success add_new rel_btn"><i class="dashicons dashicons-plus-alt"></i><?php echo __('New', PLUGIN_SLUG) ?></a>
            <a class="top_imp rel_btn" href="<?php echo admin_url(); ?>admin.php?page=<?php echo PLUGIN_PFX; ?>-exp#tab=import_gr"><i class="dashicons dashicons-download"></i><?php echo __('Import', PLUGIN_SLUG) ?></a>
            <a class="top_exp rel_btn" href="<?php echo admin_url(); ?>admin.php?page=<?php echo PLUGIN_PFX; ?>-exp"><i class="dashicons dashicons-upload"></i><?php echo __('Export', PLUGIN_SLUG) ?></a>
            <a class="top_help rel_btn" href="http://wp.it-rays.net/docs/octa/" target="_blank"><i class="dashicons dashicons-info"></i><?php echo __('Help', PLUGIN_SLUG) ?></a>
        </div>
        
    <?php
    }
    $base_class->oc_create_settings($id);
    $dbObj->oc_insert_update($id);
    ?>
    </form>
</div>