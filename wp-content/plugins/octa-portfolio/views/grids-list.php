<?php
$dbObj = new OCTA_Tables();
$allTables = $dbObj->oc_select();
foreach ($allTables[1] as $i) {
    if (empty($i)) { ?>
        <div class="tbl redcolor"><i class="dashicons dashicons-no"></i><?php echo __('No Grids Were Found', PLUGIN_SLUG) ?></div>
    <?php } else { ?>
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="dashicons dashicons-dashboard"></i><?php echo __('Grids', PLUGIN_SLUG) ?> <small><?php echo __('List of available grids', PLUGIN_SLUG) ?></small></h2>
            <div class="top-btns">
                <a href="<?php echo admin_url(); ?>admin.php?page=<?php echo PLUGIN_PFX; ?>&do=create" name="add_new" id="add_new" class="btn-success add_new rel_btn"><i class="dashicons dashicons-plus-alt"></i><?php echo __('New', PLUGIN_SLUG) ?></a>
                <a class="top_imp rel_btn" href="<?php echo admin_url(); ?>admin.php?page=<?php echo PLUGIN_PFX; ?>-exp#tab=import_gr"><i class="dashicons dashicons-download"></i><?php echo __('Import', PLUGIN_SLUG) ?></a>
                <a class="top_exp rel_btn" href="<?php echo admin_url(); ?>admin.php?page=<?php echo PLUGIN_PFX; ?>-exp"><i class="dashicons dashicons-upload"></i><?php echo __('Export', PLUGIN_SLUG) ?></a>
                <a class="top_help rel_btn" href="http://wp.it-rays.net/docs/octa/" target="_blank"><i class="dashicons dashicons-info"></i><?php echo __('Help', PLUGIN_SLUG) ?></a>
            </div>
            <div class="clearfix"></div> 
        </div>
        <div class="x_content">
            <table class="oc_data_table">
                <thead>
                    <tr>
                        <th class="t-center" style="width: 10px"><?php echo __('ID', PLUGIN_SLUG) ?></th>
                        <th><?php echo __('Name', PLUGIN_SLUG) ?></th>
                        <th><?php echo __('Shortcode', PLUGIN_SLUG) ?></th>
                        <th class="t-center lst-th"><?php echo __('Settings', PLUGIN_SLUG) ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($allTables[0] as $sel) { $getDb = $dbObj->oc_selectWithId($sel->id); ?>
                    <tr>
                        <td class="t-center"><?php echo $sel->id; ?></td>
                        <td><?php echo $sel->title; ?></td>
                        <td><?php echo $sel->shortcode; ?></td>
                        <td class="t-center">
                        <?php if (isset($sel->id)) { ?>
                            <form action="<?php echo admin_url(); ?>admin.php?page=<?php echo PLUGIN_PFX; ?>&do=create&id=<?php echo $sel->id ?>" method="post" class="edit_btn inline-cell" enctype="multipart/form-data">
                                <button class="btn btn-success edit_btn rel_btn" type="submit" name="editBtn" title="<?php echo __('Edit', PLUGIN_SLUG) ?>"><i class="dashicons dashicons-admin-generic"></i></button>
                            </form>

                            <form action="<?php echo admin_url(); ?>admin.php?page=<?php echo PLUGIN_PFX; ?>&do=clone&id=<?php echo $sel->id ?>" method="post" class="clone_form inline-cell" enctype="multipart/form-data">
                                <button class="btn clone_btn rel_btn" type="submit" name="cloneBtn" title="<?php echo __('Duplicate', PLUGIN_SLUG) ?>"><i class="dashicons dashicons-admin-page"></i></button>
                            </form>

                            <form action="<?php echo admin_url(); ?>admin.php?page=<?php echo PLUGIN_PFX; ?>&delbtn=delete&id=<?php echo $sel->id ?>" method="post" class="del_form inline-cell" enctype="multipart/form-data">
                                <button class="btn btn-danger delete_btn rel_btn" type="submit" name="delBtn" title="<?php echo __('Remove', PLUGIN_SLUG) ?>"><i class="dashicons dashicons-trash"></i><span class="cs-lod dashicons dashicons-image-rotate"></span></button>
                            </form>
                        <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div><div class="clearfix"></div>
    </div>
    
    <?php
    }
}
