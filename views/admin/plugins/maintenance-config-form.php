<?php
/**
 * @var Omeka_View $this
 */
?>

<?php echo js_tag('vendor/tinymce/tinymce.min'); ?>
<script type="text/javascript">
jQuery(document).ready(function () {
    Omeka.wysiwyg({
        selector: '.html-editor'
    });
});
</script>

<p><?= flash() ?></p>

<fieldset id="fieldset-maintenance"><legend><?php echo __('Maintenance'); ?></legend>
    <div class="field">
        <div class="two columns alpha">
            <?php echo $this->formLabel('maintenance_message', __('Message')); ?>
        </div>
        <div class='inputs five columns omega'>
            <?php echo $this->formTextarea(
                'maintenance_message',
                get_option('maintenance_message'),
                array(
                    'rows' => 5,
                    'cols' => 60,
                    'class' => array('textinput', 'html-editor'),
                 )
            ); ?>
            <p class="explanation">
                <?php echo __('The message to display to visitors when the site is in maintenance mode'); ?>
            </p>
        </div>
    </div>
</fieldset>
