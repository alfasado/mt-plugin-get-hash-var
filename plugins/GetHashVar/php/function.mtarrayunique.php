<?php
function smarty_function_mtarrayunique ( $args, &$ctx ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    if (! $name ) return '';
    $var = $ctx->__stash[ 'vars' ][ $name ];
    if (! $var ) {
        $var = $ctx->__stash[ 'vars' ][ strtolower( $name ) ];
    }
    if (! $var ) return '';
    $result = array_unique( $var );
    $ctx->__stash[ 'vars' ][ $name ] = $result;
    return '';
}
?>