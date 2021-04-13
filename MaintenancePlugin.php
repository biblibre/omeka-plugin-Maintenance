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

	protected $_filters = array (
		'public_navigation_admin_bar',
		'admin_navigation_global'
	);

    /**
     * @var array This plugin's options.
     */
    protected $_options = array(
        'maintenance_title' => 'Site under maintenance',
        'maintenance_message' => '<p>Sorry for the inconvenience but we’re performing some maintenance at the moment. We’ll be back online shortly!</p>
                                <br>
                                <p>— The Team</p>',
        'maintenance_mode_fullpage' => 0,
        'maintenance_show_reminder' => 0
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
	
	/**
     * 	Adds warning to admin bar, public side
     */
	public function filterPublicNavigationAdminBar($navLinks) 
	{
		$user = current_user();
		if (isset($user) && (bool)get_option('maintenance_show_reminder')) {
			// Creates new menu item, then adds it to navigation array
			$element = array(
				'label' => '**' . __('Site under maintenance') . '**',
				'uri' => admin_url('/plugins')
			);
			$navLinks = array_merge(array($element), $navLinks);
		}
		return $navLinks;
	}
	
	/**
     * 	Adds warning to admin bar, admin side
     */
	public function filterAdminNavigationGlobal($navLinks) 
	{
		$user = current_user();
		if (isset($user) && (bool)get_option('maintenance_show_reminder')) {
			// Creates new menu item, then adds it to navigation array
			$element = array(
				'label' => '**' . __('Site under maintenance') . '**',
				'uri' => admin_url('/plugins')
			);
			$navLinks = array_merge(array($element), $navLinks);
		}
		return $navLinks;
	}
}
