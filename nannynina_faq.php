<?php

/**
 * Plugin Name: Nannynina FAQ API
 * Plugin URI:  https://someplugin.com
 * Description: nannynina faq api provider plugin.
 * Author:      Dumitru Galit
 * Author URI:  https://somepluginauthor.com/
 * Version:     1.0
 * Text Domain: project23
 */

//define plugin dir path, url path, plugin data
define( 'NANNYNINA_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'NANNYNINA_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
function nannynina_autoload( $class ) {

    if ( class_exists( $class ) || stripos( $class, 'NANNYNINA_' ) === false ) {
        return;
    }

    $name = str_replace( array( 'nannynina_', '_' ), '-', strtolower( $class ) );
    $path = NANNYNINA_PLUGIN_DIR . "core/class{$name}.php";

    if ( file_exists( $path ) ) {
        include( $path );
    }
}

spl_autoload_register( 'nannynina_autoload' );

new Nannynina_Bootstrap();