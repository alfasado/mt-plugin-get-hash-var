<?php
function smarty_function_mtsplitvar ( $args, &$ctx ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    if ( isset( $args[ 'set' ] ) ) $set = $args[ 'set' ];
    $var = $ctx->__stash[ 'vars' ][ $name ];
    if (! $var ) {
        $var = $ctx->__stash[ 'vars' ][ strtolower( $name ) ];
    }
    if (! $var ) {
        if ( isset( $args[ 'var' ] ) ) $var = $args[ 'var' ];
    }
    if ( $var ) {
        if ( $set ) $name = $set;
        if ( isset( $args[ 'glue' ] ) ) $glue = $args[ 'glue' ];
        if (! $glue ) $glue = ',';
        $vars = explode( $glue, $var );
        $ctx->__stash[ 'vars' ][ $name ] = $vars;
        $ctx->__stash[ 'vars' ][ strtolower( $name ) ] = $vars;
    }
    return '';
}
?>