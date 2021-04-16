<?php echo js_tag('vendor/tinymce/tinymce.min'); ?>
<script type="text/javascript">
jQuery(document).ready(function () {
    Omeka.wysiwyg({
        selector: '.html-editor'
    });
});
</script>

<p><?= flash() ?></p>

<div class="field">
	<div class="two columns alpha">
		<?php echo $this->formLabel('maintenance_title', __('Title')); ?>
	</div>
	<div class='inputs five columns omega'>
		<p class="explanation">
			<?php echo __('The title of the message to display to visitors when the site is in maintenance mode.'); ?>
		</p>
		<?php echo $this->formText('maintenance_title', get_option('maintenance_title')); ?>
	</div>
</div>

<div class="field">
	<div class="two columns alpha">
		<?php echo $this->formLabel('maintenance_message', __('Message')); ?>
	</div>
	<div class='inputs five columns omega'>
		<p class="explanation">
			<?php echo __('The message to display to visitors when the site is in maintenance mode.'); ?>
		</p>
		<?php echo $this->formTextarea(
			'maintenance_message',
			get_option('maintenance_message'),
			array(
				'rows' => 5,
				'cols' => 60,
				'class' => array('textinput', 'html-editor'),
			 )
		); ?>
	</div>
</div>

<div class="field">
	<div class="two columns alpha">
		<?php echo $this->formLabel('maintenance_mode_fullpage', __('Full page mode')); ?>
	</div>
	<div class="inputs five columns omega">
		<p class="explanation">
			<?php echo __('If checked, displays the message in full page mode.'); ?>
		</p>
		<?php echo $this->formCheckbox('maintenance_mode_fullpage', get_option('maintenance_mode_fullpage'), null, array('1', '0')); ?>
	</div>
</div>

<div class="field">
	<div class="two columns alpha">
		<?php echo $this->formLabel('maintenance_show_reminder', __('Show reminder')); ?>
	</div>
	<div class="inputs five columns omega">
		<p class="explanation">
			<?php echo __('If checked, displays a reminder in the admin bars.'); ?>
		</p>
		<?php echo $this->formCheckbox('maintenance_show_reminder', get_option('maintenance_show_reminder'), null, array('1', '0')); ?>
	</div>
</div>
