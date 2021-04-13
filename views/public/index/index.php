<?php
    /**
     * @var Omeka_View $this
     */
    $mode_fullpage = (bool)get_option('maintenance_fullpagemode');

    if (!$mode_fullpage) {
        echo head(array(
            'bodyid' => 'home',
            'bodyclass' => 'maintenance',
        ));
    }
?>

<title>Site Maintenance</title>

<style>
    .maintenance_outer {
        display: table;
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
    }

    .maintenance_middle {
        display: table-cell;
        vertical-align: middle;
    }

    .maintenance_inner {
        margin-left: auto;
        margin-right: auto;
        width: 500px;
        padding: 20px; 
        border: 2px solid black; 
        border-radius: 10px; 
        background-color: lightyellow;
    }
    
    .maintenance_text {
        text-align: left; 
        font: 20px Helvetica, sans-serif; 
    }
    
    .maintenance_text h1 {
        font-size: 50px; 
        margin: 0;
    }
    
    .maintenance_text h2 {
        font-size: 20px; 
        margin-bottom: 20px;
        border-bottom: 1px solid black;
        text-align: right;
    }
    
    .centered {
        text-align: center;
    }
</style>

<?php if ($mode_fullpage): ?>
<div class="maintenance_outer">
    <div class="maintenance_middle">
        <div class="maintenance_inner maintenance_text">
            <h2><?php echo get_option('site_title'); ?></h2>
            <h1 class="centered"><?php echo get_option('maintenance_title'); ?></h1>
            <p><?php echo get_option('maintenance_message'); ?> </p>
        </div>
    </div>
</div>
<?php else: ?>
<div class="maintenance_text">
    <h1><?php echo get_option('maintenance_title'); ?></h1>
    <p><?php echo get_option('maintenance_message'); ?> </p>
</div>
<?php endif; ?>

<?php if (!$mode_fullpage) echo foot(); ?>
