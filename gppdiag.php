<?php
/*
Plugin Name: GPP Diag (unofficial)
Plugin URI: http://88em.com/
Description: Google Publisher Plugin diagnostic tool (unofficial). This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. [<a href="options-general.php?page=gppdiag_settings">gppdiag Configuration</a>]
Version: 0.1
Author: galeksic
Author URI: https://productforums.google.com/forum/#!profile/adsense/APn2wQdYA5g69lgel_b3Jm72EpWgrIkFvqpazW9w2VhzqkYSZhsN0DRKW5dkPSrko18CUVwbv6sg
License: GPL2
*/

/*  Copyright 2012  galeksic  (email : )

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if(!defined('ABSPATH')) {
  exit;
}

define( 'GPPDIAG_PUGIN_NAME', 'GPP Diag (unofficial)');
define( 'GPPDIAG_PLUGIN_DIRECTORY', 'gppdiag');

// create custom plugin settings menu
add_action( 'admin_menu', 'gppdiag_create_menu' );

//call register settings function
//add_action( 'admin_init', 'gppdiag_register_settings' );

function gppdiag_create_menu() {
	add_options_page( GPPDIAG_PUGIN_NAME, GPPDIAG_PUGIN_NAME, 'manage_options', 'gppdiag_settings', 'gppdiag_config');
}

function gppdiag_config()
{

?>

<div class="wrap">
<h2><a href="https://wordpress.org/plugins/google-publisher/" alt="Google Publisher Plugin">Google Publisher Plugin</a> Diagnostics (unofficial)</h2>
<div class="narrow">
<h2>Help</h2>
<p>While configuring this plugin - don't use AdSense "live" code. Use placeholder text of your choice or this:</p>

<p><textarea class="large-text code" rows="25" id="gppdiag-report">
GooglePublisherPlugin_Version
[<?php echo get_option( 'GooglePublisherPlugin_Version' ); ?>]

GooglePublisherPlugin
[<?php var_dump( get_option( 'GooglePublisherPlugin' ) ); ?>]

$wp_version
[<?php echo $GLOBALS["wp_version"]; ?>]

WPLANG
[<?php echo WPLANG; ?>]

get_locale()
[<?php echo get_locale(); ?>]

home
[<?php echo get_option( 'home' ); ?>]

siteurl
[<?php echo get_option( 'siteurl' ); ?>]

admin_url()
[<?php echo admin_url(); ?>]

phpversion()
[<?php echo phpversion(); ?>]

REQUIRED_EXTENSIONS
<?php 
foreach ( array('filter', 'json', 'pcre', 'SPL') as $extension) {
  if (!extension_loaded($extension)) {
    echo "ERROR " . $extension . PHP_EOL;
  }else{
    echo "OK " . $extension . PHP_EOL;

  }
  
}
?>
</textarea></p>
<!--
  function UrlExists(url) {
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    http.send();
    return http.status != 404;
  }
-->
<h2>Access to gstatic.com</h2>

<p>You should see <a href="http://www.gstatic.com/publisher_plugin/red_marker_small.svg">red marker</a> below.</p>
<p><img src="http://www.gstatic.com/publisher_plugin/red_marker_small.svg" title="red marker" /></p>


</div>
</div>

<?php

}



?>