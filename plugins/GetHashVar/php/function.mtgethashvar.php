<?php
function smarty_function_mtgethashvar ( $args, &$ctx ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    if ( isset( $args[ 'key' ] ) ) $key = $args[ 'key' ];
    if ( (! $name ) || (! $key ) ) return '';
    $hash = $ctx->__stash[ 'vars' ][ $name ];
    if (! $hash ) {
        $hash = $ctx->__stash[ 'vars' ][ strtolower( $name ) ];
    }
    if (! $hash ) {
        return '';
    }
    if ( strpos( $key, ':' ) !== FALSE ) {
        $keys = str_getcsv( $key, ':' );
    }
    if ( is_array( $hash ) ) {
        if ( $keys ) {
            $value = $hash;
            foreach( $keys as $key ) {
                if ( strpos( $key, 'Array.' ) === 0 ) {
                    $key = str_replace( 'Array.', '', $key );
                    $key = $ctx->__stash[ 'vars' ][ $key ];
                }
                $value = $value[ $key ];
            }
            return $value;
        }
        if ( isset( $hash[ $key ] ) ) {
            return $hash[ $key ];
        }
    }
    return '';
}
?>