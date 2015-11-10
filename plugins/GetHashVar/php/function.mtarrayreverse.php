<?php
function smarty_function_mtarrayreverse ( $args, &$ctx ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    if (! $name ) return '';
    $var = $ctx->__stash[ 'vars' ][ $name ];
    if (! $var ) {
        $var = $ctx->__stash[ 'vars' ][ strtolower( $name ) ];
    }
    if (! $var ) return '';
    $var = array_reverse( $var );
    $ctx->__stash[ 'vars' ][ $name ] = $var;
}
?>