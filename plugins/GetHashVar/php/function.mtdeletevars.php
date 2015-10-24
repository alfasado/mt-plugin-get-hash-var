<?php
function smarty_function_mtdeletevars ( $args, &$ctx ) {
    if ( isset( $args[ 'name' ] ) ) $name = $args[ 'name' ];
    if (! $name ) return '';
    $names = array();
    if (! is_array( $name ) ) {
        if ( strpos( $name, ':' ) !== FALSE ) {
            $_names = str_getcsv( $name, ':' );
            $__names = array();
            foreach ( $_names as $_name ) {
                if ( strpos( $_name, 'Array.' ) === 0 ) {
                    $_name = str_replace( 'Array.', '', $_name );
                    $_name = $ctx->__stash[ 'vars' ][ $_name ];
                }
                array_push( $__names, $_name );
            }
            $names = $__names;
        } else if ( strpos( $name, ' ' ) !== FALSE ) {
            $names = explode( ' ', $name );
        } else {
            $names = array( $name );
        }
    }
    foreach( $names as $name ) {
        $name = trim( $name );
        unset( $ctx->__stash[ 'vars' ][ $name ] );
    }
}
?>