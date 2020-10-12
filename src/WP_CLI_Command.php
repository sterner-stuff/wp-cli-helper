<?php 

namespace SternerStuff\WP_CLI_Helper;

abstract class WP_CLI_Command
{
    public $namespace;

	/**
	 * Optional args
	 * public $args See https://make.wordpress.org/cli/handbook/guides/commands-cookbook/#wp_cliadd_commands-third-args-parameter
	 */

	public static function register() {

        if ( !defined( 'WP_CLI' ) || !WP_CLI ) {
            return;
        }
        
        $instance = new static;
        if(empty( $instance->namespace )) {
            throw new \Exception("Command namespace not defined", 1);
            
        }
		\WP_CLI::add_command( $instance->namespace, $instance, $instance->args ?? null );
	}

}