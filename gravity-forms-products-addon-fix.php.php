<?php
/*
Plugin Name: Gravity Forms Products AddOn Fix
Plugin URI:
Description: Updates all Product forms, adding a Total field if one doesn't exist.
Version: 1.0.0
Author: Catman Studios
Author URI: https://catmanstudios.com
 License: GNU General Public License v3.0
 License URI: http://www.gnu.org/licenses/gpl-3.0.html

*/


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GravityFormsProductsAddOnFix {

	/*--------------------------------------------*
	 * Constants
	 *--------------------------------------------*/
	const name = 'Gravity Forms Products AddOn Fix';
	const slug = 'gravity-forms-products-addon-fix';

	/**
	 * Constructor
	 */
	function __construct() {
		//register an activation hook for the plugin
		register_activation_hook( __FILE__, array( $this, 'install_gravity_forms_products_addon_fix' ) );

		
	}

	/**
	 * Runs when the plugin is activated
	 */
	function install_gravity_forms_products_addon_fix() {
		// do not generate any output here
		if(class_exists('GFAPI')){
			$forms = GFAPI::get_forms();
			foreach($forms as $form){
				$isproductform = false;
				$hastotal = false;
				foreach($form['fields'] as $field){
					if($field->type=='product'){
						$isproductform = true;
					}
					if($field->type=='total'){
						$hastotal = true;
					}

				}
				if($isproductform && !$hastotal){
					$totalfield = new GF_Field_Total();

					$form['fields'][] = $totalfield;

					GFAPI::update_form($form);
				}
			}
		}

	}

} // end class
new GravityFormsProductsAddOnFix();
