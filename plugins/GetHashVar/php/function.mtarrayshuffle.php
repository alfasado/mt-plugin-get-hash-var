<?php
function smarty_function_mtarrayshuffle ( $args, &$ctx ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    if (! $name ) return '';
    $var = $ctx->__stash[ 'vars' ][ $name ];
    if (! $var ) {
        $var = $ctx->__stash[ 'vars' ][ strtolower( $name ) ];
    }
    if (! $var ) return '';
    shuffle( $var );
    $ctx->__stash[ 'vars' ][ $name ] = $var;
}
?>