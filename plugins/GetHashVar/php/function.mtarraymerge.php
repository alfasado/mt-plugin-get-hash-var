<?php
function smarty_function_mtarraymerge ( $args, &$ctx ) {
    if ( isset( $args[ 'name' ] ) ) $names = $args[ 'name' ];
    if ( isset( $args[ 'set' ] ) ) $set = $args[ 'set' ];
    if (! $names ) return '';
    if (! is_array( $names ) ) {
        if ( strpos( $names, ':' ) !== FALSE ) {
            $names = str_getcsv( $names, ':' );
            $_names = array();
            foreach ( $names as $name ) {
                array_push( $_names, $name );
            }
            $names = $_names;
        }
    }
    $new_var = array();
    foreach( $names as $name ) {
        $var = $ctx->__stash[ 'vars' ][ $name ];
        if (! $var ) {
            $var = $ctx->__stash[ 'vars' ][ strtolower( $name ) ];
        }
        $new_var = array_merge( $new_var, $var );
    }
    $ctx->__stash[ 'vars' ][ $set ] = $new_var;
    $ctx->__stash[ 'vars' ][ strtolower( $set ) ] = $new_var;
}
?>