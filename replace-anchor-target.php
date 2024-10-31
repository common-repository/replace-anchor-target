<?php
/*
	Plugin Name: Replace Anchor Target
	Plugin URI: http://wordpress.org/support/plugin/replace-anchor-target
	Description: Replaces the <em>target="_blank"</em> attribute applied by the built-in Tinymce editor with <em>class="target_blank"</em>. This allows for easier XHTML strict compliance.
	Version: 3.1.2
	Text Domain: replace_anchor_target
	Domain Path: /languages
	Author: iThemes
	Author URI: http://ithemes.com
	License: GPLv2
	Copyright 2014  iThemes  (email : updates@ithemes.com)
*/

//load the text domain
load_plugin_textdomain('replace_anchor_target', false, dirname(plugin_basename( __FILE__ )) . '/languages');

//Require common Bit51 library
require_once(plugin_dir_path(__FILE__) . 'lib/bit51/bit51.php');

if (!class_exists('bit51_rat')) {

	class bit51_rat extends Bit51 {
	
		public $pluginversion 	= '3.1.1'; //current plugin version
	
		//important plugin information
		public $hook 			= 'replace_anchor_target';
		public $pluginbase		= 'replace-anchor-target/replace-anchor-target.php';
		public $pluginname		= 'Replace Anchor Target';
		public $homepage		= 'http://wordpress.org/support/plugin/replace-anchor-target';
		public $supportpage 	= 'http://wordpress.org/support/plugin/replace-anchor-target';
		public $wppage 			= 'http://wordpress.org/extend/plugins/replace-anchor-target/';
		public $accesslvl		= 'manage_options';
		public $paypalcode		= 'QD87YEWSUYL7E';
		public $plugindata 		= 'bit51_rat_data';
		public $primarysettings	= 'bit51_rat';
		public $settings			= array(
			'bit51_rat_options' 		=> array(
				'bit51_rat' 				=> array(
					'callback' 					=> 'rat_val_options',
					'enabled' 					=> '1'
				)
			)
		);

		function __construct() {
		
			//set path information
			define('RAT_PP', plugin_dir_path(__FILE__));
			define('RAT_PU', plugin_dir_url(__FILE__));
		
			//require admin page
			require_once(plugin_dir_path(__FILE__) . 'inc/admin.php');
			new rat_admin();
			
			//require setup information
			require_once(plugin_dir_path(__FILE__) . 'inc/setup.php');
			register_activation_hook( __FILE__, array('rat_setup', 'on_activate'));
			register_deactivation_hook( __FILE__, array('rat_setup', 'on_deactivate'));
			register_uninstall_hook( __FILE__, array('rat_setup', 'on_uninstall'));
			
			$options = get_option('bit51_rat');
			
			//execute the filter if not in the backend and it is enabled in the options
			if(!is_admin() && $options['enabled'] == 1){
				require_once($this->pluginpath . 'inc/filter.php');
				new rat_filter();
			}
		}	
	}
}

//create plugin object
new bit51_rat();
