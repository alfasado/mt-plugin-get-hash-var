<?php
function smarty_function_mtgethashvar ( $args, &$ctx ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    if ( isset( $args[ 'key' ] ) ) $key = $args[ 'key' ];
    if ( (! $name ) || (! $key ) ) return '';
    $hash = $ctx->__stash[ 'vars' ][ $name ];
    if ( is_array( $hash ) ) {
        if ( isset( $hash[ $key ] ) ) {
            return $hash[ $key ];
        }
    }
}
?>