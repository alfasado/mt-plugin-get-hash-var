<?php
function smarty_function_mtsubstrvar ( $args, &$ctx ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    if ( isset( $args[ 'start' ] ) ) $start = $args[ 'start' ];
    if ( isset( $args[ 'offset' ] ) ) $start = $args[ 'offset' ];
    if ( isset( $args[ 'length' ] ) ) $length = $args[ 'length' ];
    if (! $name ) return '';
    $var = $ctx->__stash[ 'vars' ][ $name ];
    if (! $var ) {
        $var = $ctx->__stash[ 'vars' ][ strtolower( $name ) ];
    }
    if (! $start ) $start = 0;
    return substr( $var, $start, $length );
}
?>