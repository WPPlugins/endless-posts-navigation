<?php 

/*
Plugin Name: Endless Posts Navigation

Plugin URI: http://www.websitedesignwebsitedevelopment.com/wordpress/plugins/endless-posts-navigation
Description: Endless Posts Navigation is a great plugin to show your posts/pages in alphabetical order. It is compatible with custom taxonomies too.
Version: 2.1.1
Author: Fahad Mahmood 
Author URI: http://www.androidbubbles.com
License: GPL2

This WordPress Plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
This free software is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with this software. If not, see http://www.gnu.org/licenses/gpl-2.0.html.
*/ 





        

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

   	global $epn_data;     

	$epn_data = get_plugin_data(__FILE__);

	include('functions.php');

        

        





	







	function epn_menu()

	{







		 add_options_page('Endless Posts Navigation', 'Endless Posts Navigation', 'install_plugins', 'endless_posts_navigation', 'endless_posts_navigation');







	}



	function endless_posts_navigation() 



	{ 







		if ( !current_user_can( 'install_plugins' ) )  {







			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );







		}





		include('epn_settings.php');	



		



			







	}	







	



    function register_epn_scripts() {

            

			plugins_url('style.css', __FILE__);

			

			wp_enqueue_script(

				'epn-script',

				plugins_url('functions.js', __FILE__),

				array( 'jquery' )

			);

			

			if(is_admin())

            wp_register_style('epn-styles', plugins_url('admin-style.css', __FILE__));

			else

			wp_register_style('epn-styles', plugins_url('front-style.css', __FILE__));

			

			wp_enqueue_style( 'epn-styles' );

 

        }

	

        add_action( 'admin_enqueue_scripts', 'register_epn_scripts' );

		add_action( 'wp_enqueue_scripts', 'register_epn_scripts' );

	

	

	if(is_admin()){

		add_action( 'admin_menu', 'epn_menu' );	

	}

	