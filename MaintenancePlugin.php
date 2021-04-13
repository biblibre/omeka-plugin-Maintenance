<?php

class MaintenancePlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array(
        'initialize',
        'install',
        'uninstall',
        'config_form',
        'config',
    );

    /**
     * @var array This plugin's options.
     */
    protected $_options = array(
        'maintenance_title' => 'Site under maintenance',
        'maintenance_message' => '<p>Sorry for the inconvenience but we’re performing some maintenance at the moment. We’ll be back online shortly!</p>
                                <br>
                                <p>— The Team</p>',
        'maintenance_fullpagemode' => 0
    );

    public function hookInitialize()
    {
        $front = Zend_Controller_Front::getInstance();
        $front->registerPlugin(new Maintenance_Controller_Plugin_Maintenance);
    }

    /**
     * Installs the plugin.
     */
    public function hookInstall()
    {
        $this->_installOptions();
    }

    /**
     * Uninstalls the plugin.
     */
    public function hookUninstall()
    {
        $this->_uninstallOptions();
    }

    /**
     * Shows plugin configuration page.
     */
    public function hookConfigForm($args)
    {
        $flash = Zend_Controller_Action_HelperBroker::getStaticHelper('FlashMessenger');
        $flash->addMessage(__('Warning: the site is in maintenance mode! Disable the module to make the site on.'), 'alert');

        $view = get_view();
        echo $view->partial('plugins/maintenance-config-form.php');
    }

    /**
     * Handle the config form.
     */
    public function hookConfig($args)
    {
        $post = $args['post'];
        $post = array_intersect_key($post, $this->_options);
        foreach ($post as $optionKey => $optionValue) {
            set_option($optionKey, $optionValue);
        }
    }
}
