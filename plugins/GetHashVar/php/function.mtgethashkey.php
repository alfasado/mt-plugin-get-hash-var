<?php
function smarty_function_mtgethashkey ( $args, &$ctx ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    if ( isset( $args[ 'value' ] ) ) $value = $args[ 'value' ];
    if ( isset( $args[ 'var' ] ) ) $value = $args[ 'var' ];
    if ( (! $name ) || (! $value ) ) return '';
    $hash = $ctx->__stash[ 'vars' ][ $name ];
    if ( is_array( $hash ) ) {
        $key = array_search( $value, $hash );
        return $key;
    }
}
?>