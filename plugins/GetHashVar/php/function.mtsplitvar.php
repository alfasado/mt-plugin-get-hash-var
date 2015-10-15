<?php
function smarty_function_mtsplitvar ( $args, &$ctx ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    $var = $ctx->__stash[ 'vars' ][ $name ];
    if (! $var ) {
        if ( isset( $args[ 'var' ] ) ) $var = $args[ 'var' ];
    }
    if ( $var ) {
        if ( isset( $args[ 'glue' ] ) ) $glue = $args[ 'glue' ];
        if (! $glue ) $glue = ',';
        $vars = explode( $glue, $var );
        $ctx->__stash[ 'vars' ][ $name ] = $vars;
    }
}
?>