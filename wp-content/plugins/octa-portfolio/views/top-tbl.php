<?php
/*
includes top tools in the OCTA admin page..
*/
?>
<div class="oc_logo">
    <?php echo __('OCTA Portfolio', PLUGIN_SLUG) ?>
    <div class="f-right">
        <form action="<?php echo admin_url(); ?>admin.php?page=<?php echo PLUGIN_PFX; ?>&action=save" method="post" class="oc_form save_gro form-horizontal form-label-left" novalidate>
            <div class="top-btns blockk">
                
                <a href="<?php echo admin_url(); ?>admin.php?page=<?php echo PLUGIN_PFX; ?>&do=create" name="add_new" id="add_new" class="btn-success add_new rel_btn"><i class="dashicons dashicons-plus-alt"></i><?php echo __('New', PLUGIN_SLUG) ?></a>
                <a class="top_imp rel_btn" href="<?php echo admin_url(); ?>admin.php?page=<?php echo PLUGIN_PFX; ?>-exp#tab=import_gr"><i class="dashicons dashicons-download"></i><?php echo __('Import', PLUGIN_SLUG) ?></a>
                <a class="top_exp rel_btn" href="<?php echo admin_url(); ?>admin.php?page=<?php echo PLUGIN_PFX; ?>-exp"><i class="dashicons dashicons-upload"></i><?php echo __('Export', PLUGIN_SLUG) ?></a>
                <a class="top_help rel_btn" href="http://wp.it-rays.net/docs/octa/" target="_blank"><i class="dashicons dashicons-info"></i><?php echo __('Help', PLUGIN_SLUG) ?></a>
            </div>
        </form>    
    </div>
</div>
<span class="hidden adm"><?php echo esc_attr(admin_url()); ?></span>