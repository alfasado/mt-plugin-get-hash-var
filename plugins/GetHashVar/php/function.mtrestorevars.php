<?php
function smarty_function_mtrestorevars ( $args, &$ctx ) {
    $key = '';
    if ( isset( $args[ 'key' ] ) ) $key = $args[ 'key' ];
    $ctx->__stash[ 'vars' ] = $ctx->stash( '__get_hash_var_old_vars_' . $key );
    $global_vars = $ctx->stash( '__get_hash_var_global_vars' );
    if( isset( $global_vars ) ) {
        foreach ( $global_vars as $key => $value ) {
            $ctx->__stash[ 'vars' ][ $key ] = $value;
        }
    }
}
?>