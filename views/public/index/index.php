<?php
/**
 * @var Omeka_View $this
 */

echo head(array(
    'bodyid' => 'home',
    'bodyclass' => 'maintenance',
));
?>

<?php $message = get_option('maintenance_message') ?: '<p>Omeka is currently under maintenance.</p>'; ?>
<?php echo $message; ?>

<?php echo foot();
