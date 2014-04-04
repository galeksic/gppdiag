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

if(!defined('GPPDIAG_PUGIN_NAME')) {
  define( 'GPPDIAG_PUGIN_NAME', 'GPP Diag (unofficial)');
}

// create custom plugin settings menu
add_action( 'admin_menu', 'gppdiag_create_menu' );

function gppdiag_create_menu() {
	add_options_page( GPPDIAG_PUGIN_NAME, GPPDIAG_PUGIN_NAME, 'manage_options', 'gppdiag_settings', 'gppdiag_config');
}

function gppdiag_config()
{
?>

<div class="wrap">

<h2><a href="https://wordpress.org/plugins/google-publisher/" alt="Google Publisher Plugin">Google Publisher Plugin</a> Diagnostics (unofficial)</h2>
<p>This is very simple unofficial helper tool for the official Google Publisher Plugin.</p>

<div class="narrow">

<h2>Report</h2>
<p>Please, make sure you don't have any personal or sensitive data in reports, if you want to share your reports with others.</p>

<p><textarea class="large-text code" rows="25" id="gppdiag-report">
gppdiag ### <?php echo date( 'c' ); ?> #########################################################

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

document.createElement('img');img.src = 'http://www.gstatic.com/publisher_plugin/red_marker_small.svg';
</textarea></p>

<h2>Access to gstatic.com</h2>
<p>You should see <a href="http://www.gstatic.com/publisher_plugin/red_marker_small.svg">red marker</a> below.</p>
<p id="gstaticMarkerID"></p>

<script>
var gstaticMarker = document.createElement('img');
gstaticMarker.onerror = function() { document.getElementById("gppdiag-report").value += "[Failed]\n\n###############################################################################################"; };
gstaticMarker.onload = function() { document.getElementById("gppdiag-report").value += "[Success]\n\n###############################################################################################"; };
gstaticMarker.src = 'http://www.gstatic.com/publisher_plugin/red_marker_small.svg';
document.getElementById("gstaticMarkerID").appendChild(gstaticMarker);
</script>

<h2>Help</h2>
<p>This plugin shows you some more-less relevant settings and parameters from Wordpress installation, if you have any issues with official plugin.</p>
<p>All you can see above on this page, is all this plugin is doing, it doesn't make any change, it doesn't affect your Wordpress installation in any way, nor ad serving.</p>
<p>If you don't need this plugin - uninstall it. You can always install it back, when and if needed.</p>

</div>

</div>

<?php
}
?>
