<?php
function smarty_block_mtsethashvars( $args, $content, &$ctx, &$repeat ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    if ( isset( $content ) ) {
        if ( $name ) {
            $vars =& $ctx->__stash[ 'vars' ];
            if (!is_array( $vars ) ) {
                $vars = array();
                $ctx->__stash[ 'vars' ] =& $vars;
            }
            $pairs = preg_split('/\r?\n/', trim( $content ) );
            foreach ( $pairs as $line ) {
                list( $var, $value ) = preg_split( '/\s*=/', $line, 2 );
                if ( isset( $var ) && isset( $value ) ) {
                    $var = trim( $var );
                    $vars[ $name ][ $var ] = $value;
                    $vars[ $name ][ strtolower( $var ) ] = $value;
                    $vars[ strtolower( $name ) ][ $var ] = $value;
                    $vars[ strtolower( $name ) ][ strtolower( $var ) ] = $value;
                }
            }
        }
    }
    return '';
}
?>