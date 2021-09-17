<?php
defined( 'ABSPATH' ) or exit;

/**
 * Plugin Name: WP Parser - Vendor Folder Ignorer
 * Description: An add-on for phpdoc-parser that ignores the /vendor folder when parsing a plugin for docs.
 * Plugin URI: https://github.com/csalzano/phpdoc-ignorer
 * Author: Corey Salzano
 * Author URI: https://breakfastco.xyz
 * Version: 1.0.0
 * License: GPLv2 or later
 */

/**
 * breakfast_ignore_vendor_folder
 *		
 * Filter whether to proceed with importing a prospective file.
 *
 * Returning a falsey value to the filter will short-circuit processing of the import file.
 *
 * @param bool  $display         Whether to proceed with importing the file. Default true.
 * @param array $file            File data
 * @return bool
 */
function breakfast_ignore_vendor_folder( $display, $file )
{
	return ! empty( $file['path'] ) && 'vendor/' != substr( $file['path'], 0, 7 );
}
add_filter( 'wp_parser_pre_import_file', 'breakfast_ignore_vendor_folder', 10, 2 );
