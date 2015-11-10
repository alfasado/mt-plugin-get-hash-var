<?php
function smarty_function_mtgethashkey ( $args, &$ctx ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    if ( isset( $args[ 'value' ] ) ) $value = $args[ 'value' ];
    if ( isset( $args[ 'var' ] ) ) $value = $args[ 'var' ];
    if ( (! $name ) || (! $value ) ) return '';
    $hash = $ctx->__stash[ 'vars' ][ $name ];
    if (! $hash ) {
        $hash = $ctx->__stash[ 'vars' ][ strtolower( $name ) ];
    }
    if (! $hash ) {
        return '';
    }
    if ( is_array( $hash ) ) {
        $key = '';
        $key = array_search( $value, $hash );
        if (! $key ) {
            $value = preg_quote( $value, '/' );
            foreach ( $hash as $_key => $val ) {
                if ( preg_match( '/^' . $value . '$/i', $val ) ) {
                    $key = $_key;
                    break;
                }
            }
        }
        return $key;
    }
    return '';
}
?>