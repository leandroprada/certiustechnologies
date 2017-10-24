<?php

?>
<div class="octa-form">
    <h2 class="oc_logo">
        <?php echo __( PLUGIN_NAME , PLUGIN_SLUG ); ?>
    </h2>

    <span class="hidden adm"><?php echo esc_attr(admin_url()); ?></span>

    <div class="x_panel">
        <div class="top-btns">
            <form class="add_new_gro" method="post" action="<?php echo admin_url(); ?>admin.php?page=<?php echo PLUGIN_PFX; ?>&do=create">
                <button type="submit" name="add_new" id="add_new" class="btn-success add_new rel_btn"><i class="dashicons dashicons-plus-alt"></i><?php echo __('New', PLUGIN_SLUG) ?></button>
            </form>

            <a class="top_imp rel_btn" href="<?php echo admin_url(); ?>admin.php?page=<?php echo PLUGIN_PFX; ?>-exp#tab=import_gr"><i class="dashicons dashicons-download"></i><?php echo __('Import', PLUGIN_SLUG) ?></a>

            <a class="top_exp rel_btn" href="<?php echo admin_url(); ?>admin.php?page=<?php echo PLUGIN_PFX; ?>-exp"><i class="dashicons dashicons-upload"></i><?php echo __('Export', PLUGIN_SLUG) ?></a>

            <a class="top_help rel_btn" href="http://wp.it-rays.net/docs/octa/" target="_blank"><i class="dashicons dashicons-info"></i><?php echo __('Help', PLUGIN_SLUG) ?></a>
        </div>
        <div class="x_title lg-b-pad">
            <h2>
                <i class="dashicons dashicons-admin-tools" style="margin-top: 0px"></i><?php echo __('Import Export Grids', PLUGIN_SLUG); ?>
                <small><?php echo __('Choose to import or export all grids from the plugin.', PLUGIN_SLUG) ?></small></h2>
            <div class="clearfix"></div>
        </div>

        <ul class="oc_tabs">
            <li class="active"><a href="#export_gr" data-toggle="tab"><i class="dashicons dashicons-upload"></i><?php echo __('Export Grids', PLUGIN_SLUG) ?></a></li>
            <li><a href="#import_gr" data-toggle="tab"><i class="dashicons dashicons-download"></i><?php echo __('Import Grids', PLUGIN_SLUG) ?></a></li>
        </ul>
        <div class="oc_tab_content">

            <div class="tab-pane active" id="export_gr">

                <div class="x_content">
                    <div class="item form-group">
                        <div class="lbl"><label class="opt-lbl">Export Grids</label><small class="description"><?php echo __('Click the button below to export all available grids.', PLUGIN_SLUG) ?></small></div>
                        <div class="control-input">
                            <form action="" method="post">
                                <button type="submit" class="btn btn-success rel_btn" name="export">Export Grids</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <div class="tab-pane" id="import_gr">

                <div class="x_content">
                    <form method="post" action="<?php echo admin_url(); ?>admin.php?page=<?php echo PLUGIN_PFX; ?>-exp&do=import" class="import_form" enctype="multipart/form-data" novalidate>
                        <div class="item form-group">
                            <div class="lbl"><label class="opt-lbl"><?php echo __('Upload .json file:', PLUGIN_SLUG) ?></label><small class="description"><?php echo __('Click the file upload below to import a .json file from your PC.', PLUGIN_SLUG) ?></small></div>
                            <div class="control-input">
                                <input type="file" class="form-control" name="importfile" id="impFile" data-valiation-text="Please Upload A .txt File First" required="required" />
                            </div>
                        </div>
                        <div class="item form-group">
                            <div class="lbl"><label class="opt-lbl"><?php echo __('Upload', PLUGIN_SLUG) ?></label><small class="description"><?php echo __('Click the button below to import from the file you uploaded.', PLUGIN_SLUG) ?></small></div>
                            <div class="control-input">
                                <button type="submit" class="btn btn-success imp_btn rel_btn" name="import"><?php echo __('Import Grids', PLUGIN_SLUG) ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>