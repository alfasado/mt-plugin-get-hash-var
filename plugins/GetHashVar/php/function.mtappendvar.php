<?php
function smarty_function_mtappendvar ( $args, &$ctx ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    if ( isset( $args[ 'var' ] ) ) $var = $args[ 'var' ];
    if ( $name && $var ) {
        $_var = $ctx->__stash[ 'vars' ][ $var ];
        if (! $_var ) {
            $_var = $ctx->__stash[ 'vars' ][ strtolower( $var ) ];
        }
        $ctx->__stash[ 'vars' ][ $name ][ $var ] = $_var;
        $ctx->__stash[ 'vars' ][ strtolower( $name ) ][ $var ] = $_var;
        $ctx->__stash[ 'vars' ][ $name ][ strtolower( $var ) ] = $_var;
        $ctx->__stash[ 'vars' ][ strtolower( $name ) ][ strtolower( $var ) ] = $_var;
    }
    return '';
}
?>