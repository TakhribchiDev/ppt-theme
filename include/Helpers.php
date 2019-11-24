<?php
/** 
 * Helper functions
 * List of functions globally used in theme
 * 
 * @package ppttheme
*/

if ( ! function_exists( 'dd' ) ) {
    /**
     * Var dump and die method
     * @return void
     */
    function dd() {
        echo '<pre>';
        array_map( function( $x ) {
            var_dump( $x );
        }, func_get_args() );
        echo '</pre>';
        die;
    }
}

if ( ! function_exists( 'svg' ) ) {
    /**
     * Get desired inline svg
     * 
     * @param $name
     * @return void
     */
    function svg( $name ) {
        if ( ! $name ) return;
        
        echo get_template_part( 'svg/', $name . '.svg' );
    }
}



