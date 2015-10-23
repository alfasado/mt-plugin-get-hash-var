<?php
function smarty_function_mtappendvar ( $args, &$ctx ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    if ( isset( $args[ 'var' ] ) ) $var = $args[ 'var' ];
    if ( $name && $var ) {
    $ctx->__stash[ 'vars' ][ $name ][ $var ] = $ctx->__stash[ 'vars' ][ $var ];
    return '';
}
?>